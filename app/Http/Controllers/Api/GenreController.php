<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    private $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];

    public function index(): object
    {
        return Genre::all();
    }

    public function store(Request $request): object
    {
        $this->validate($request, $this->rules);

        return Genre::create($request->all());
    }

    public function show(Genre $genre): object
    {
        return $genre;
    }

    public function update(Request $request, Genre $genre): object
    {
        $this->validate($request, $this->rules);

        $genre->update($request->all());

        return $genre;
    }

    public function destroy(Genre $genre): Response
    {
        $genre->delete();

        return response()->noContent();
    }
}
