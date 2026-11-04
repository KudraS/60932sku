<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::orderBy('id')->get(),
        ]);
    }

    public function show(string $id)
    {
        return view('ingredients.show', [
            'ingredient' => Ingredient::with('dishes')
                ->findOrFail($id),
        ]);
    }
}