<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryService
{

    public function verifyUniqueName($name)
    {
        return Category::where('user_id', Auth::id())->where('name', $name)->first();
    }
    public function paginate()
    {
        return Category::select(['id', 'name'])->where('user_id', Auth::id())->orderBy('name')->paginate(15);
    }
    public function list(array|string $columns = '*')
    {
        return Category::select($columns)->where('user_id', Auth::id())->get();
    }

    public function store(array $data) 
    {
        Gate::authorize('create', Category::class);
        if ($this->verifyUniqueName($data['name'])):
            throw new \Exception("Você já criou uma categoria com este nome! Por favor escolha um nome diferente.");
            
        endif;
        $data['user_id'] = Auth::id();
       return Category::create($data);
    }

    public function find(int $id) 
    {
        Gate::authorize('create', Category::class);
        
       return Category::where('user_id', Auth::id())->findOrFail($id);
    }

    public function update(int $id, array $request) : bool
    {
        $category = $this->find($id);
        Gate::authorize('update', $category);

        $data = array_filter($request, fn ($value) => !is_null($value));
        
       return $category->update($data);
    }
    
    public function delete(int $id) : bool
    {
        $category = $this->find($id);
        Gate::authorize('delete', $category);
        
       return $category->delete();
    }

}
