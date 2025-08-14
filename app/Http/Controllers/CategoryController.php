<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
protected $categoryService;

public function __construct(CategoryService $categoryService) {
    $this->categoryService = $categoryService;
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->categoryService->all();
        } catch (\Throwable $e) {
            return $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'name' => 'required']);
        $category = Category::create($data);
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$category = Category::where('id', $id)->first()):
            return back()->json(['message' => 'Não encontrado', 404]);
        endif;

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::where('id', $id)->first();
        $category = $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        return $category->delete();
    }
}
