<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];

    public function index(): object
    {
        return Category::all();
    }

    public function store(Request $request): object
    {
        $this->validate($request, $this->rules);

        return Category::create($request->all());
    }

    public function show(Category $category): object
    {
        return $category;
    }

    public function update(Request $request, Category $category): object
    {
        $this->validate($request, $this->rules);

        $category->update($request->all());

        return $category;
    }

    public function destroy(Category $category): Response
    {
        $category->delete();

        return response()->noContent();
    }
}
