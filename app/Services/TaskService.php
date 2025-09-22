<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskService
{
    public function verifyUniqueTitle($title)
    {
        return Task::where('user_id', Auth::id())->where('title', $title)->first();
    }
    public function list()
    {
        Gate::authorize('create', Task::class);
        return Task::where('user_id', Auth::id())->with('category:id,name')->orderBy('due_date')->paginate(15);
    }

    public function store(array $data)
    {
        Gate::authorize('create', Task::class);
        if ($this->verifyUniqueTitle($data['title'])):
            throw new \Exception("Você já criou uma tarefa com este título! Por favor escolha um nome diferente.");
        endif;
        $data['user_id'] =  Auth::id();
        return Task::create($data);
    }

    public function find(int $id)
    {
        $task = Task::with('category:id,name')
        ->where('user_id', Auth::id())
        ->where('id', $id)->firstOrFail();

        Gate::authorize('view', $task);

        return $task;
    }

    public function update(int $id, array $request): bool
    {
        $task = $this->find($id);
        Gate::authorize('update', $task);

        $data = $request;
        $description = $data['description'];
        
        $data = array_filter($data, fn ($value) => !is_null($value));
        $data['description'] = $description;
        
        $task->update($data);

        return $task->update($data);
    }
    
    public function delete(int $id): bool
    {
        $task = $this->find($id);
        Gate::authorize('delete', $task);

        return $task->delete();
    }
}
