<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        return view('dishes.index', [
            'dishes' => Dish::with('category')->orderBy('id')->get(),
        ]);
    }

    public function show(string $id)
    {
        return view('dishes.show', [
            'dish' => Dish::with(['category', 'ingredients'])
                ->findOrFail($id),
        ]);
    }
}