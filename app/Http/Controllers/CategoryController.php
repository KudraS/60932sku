<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::orderBy('id')->get(),
        ]);
    }

    public function show(string $id)
    {
        return view('categories.show', [
            'category' => Category::with('dishes')->findOrFail($id),
        ]);
    }
}