<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;


    public function all()
    {
        return Category::all();
    }
}
