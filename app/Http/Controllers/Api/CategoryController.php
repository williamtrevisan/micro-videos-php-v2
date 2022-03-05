<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): object
    {
        return Category::all();
    }

    public function store(Request $request): object
    {
        return Category::create($request->all());
    }

    public function show(Category $category): object
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
