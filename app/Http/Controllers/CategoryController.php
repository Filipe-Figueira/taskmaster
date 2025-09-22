<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequests\CategoryStoreUpdateRequest;
use App\Models\Category;
use App\Models\Task;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $categoryService) {
        $this->service = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->service->list();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreUpdateRequest $request)
    {
        try {
            $this->service->store($request->validated());
        return to_route('categories.index')->with('message', 'Categoria criada com sucesso!');
        } catch (\Throwable $e) {
            return back()->withErrors($e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $category = $this->service->find($id);

        $tasks = Task::select(['id', 'title'])->where('user_id', Auth::id())->where('category_id', $id)->paginate(15);
        return view('categories.show', compact('category','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->service->find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreUpdateRequest $request, string $id)
    {
        $category = $this->service->find($id);

        $this->service->update($id, $request->validated());
        return to_route('categories.index')->with('message', 'Categoria actualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return response()->json("Categoria excluída.", 204);
    }
}
