<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequests\TaskStoreRequest;
use App\Http\Requests\TaskRequests\TaskUpdateRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->with('category:id,name')->paginate(15);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] =  Auth::user()->id;
        Task::create($data);
        
        return to_route('tasks.index')->with('message', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$task = Task::find($id)) return back();

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$task = Task::find($id)) return back();
        $categories = Category::select(['id', 'name'])->get();
    
        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        if (!Task::find($id)) return back();
        $data = array_filter($request->validated());
        
        Task::where('id', $id)->update($data);
        return to_route('tasks.index')->with('message', 'Tarefa actualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::destroy($id);
        return back()->with('message', 'Tarefa excluída.');
    }
}
