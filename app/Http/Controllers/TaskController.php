<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequests\TaskStoreRequest;
use App\Http\Requests\TaskRequests\TaskUpdateRequest;
use App\Models\Task;
use App\Services\CategoryService;
use App\Services\TaskService;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    protected $service;
    protected $categoryService;

    public function __construct(TaskService $taskService, CategoryService $categoryService)
    {
        $this->service = $taskService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->service->list();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = $this->categoryService->list(['id', 'name']);

        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        try {
            $this->service->store($request->validated());

        return to_route('tasks.index')->with('message', 'Tarefa criada com sucesso!');
        } catch (\Throwable $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = $this->service->find($id);
        
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = $this->service->find($id);
        $categories = $this->categoryService->list(['id', 'name']);

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        $this->service->update($id, $request->validated());
        return to_route('tasks.index')->with('message', 'Tarefa actualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return response()->json([
            'message' => 'Tarefa excluída!',
            'redirectRoute' =>  route('tasks.index')
    ]);
    }
}
