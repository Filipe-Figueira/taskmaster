<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequests\CategoryStoreUpdateRequest;
use App\Models\Category;
use App\Models\Task;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select(['id', 'name'])->paginate(15);
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
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Category::create($data);
        return to_route('categories.index')->with('message', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = auth()->user()->id;
        
        if (!$category = Category::select(['name'])->where('user_id', $userId)->find($id)):
            return back();
        endif;

        $tasks = Task::select(['id', 'title'])->where('user_id', $userId)->where('category_id', $id)->paginate(15);
    
        return view('categories.show', compact('category','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$category = Category::where('id', $id)->first()):
            return back();
        endif;

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreUpdateRequest $request, string $id)
    {
        $category = Category::where('id', $id)->first();
        $category = $category->update($request->validated());
        return to_route('categories.index')->with('message', 'Categoria actualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$category = Category::find($id)):
            return response()->json('Categoria não encontrada!', 404);
        endif;
        $category->delete();
        return response()->json("Categoria deletada", 200);
    }
}
