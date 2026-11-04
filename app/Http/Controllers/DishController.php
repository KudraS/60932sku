<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('dishes.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateDish($request);

        $dish = new Dish();
        $dish->name = $validated['name'];
        $dish->category_id = $validated['category_id'];
        $dish->cooking_method = $validated['cooking_method'];
        $dish->cooking_time = $validated['cooking_time'];
        $dish->save();

        return redirect('/dishes')
            ->with('success', 'Блюдо добавлено.');
    }

    public function edit(string $id)
    {
        return view('dishes.edit', [
            'dish' => Dish::findOrFail($id),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $dish = Dish::findOrFail($id);
        $validated = $this->validateDish($request);

        $dish->name = $validated['name'];
        $dish->category_id = $validated['category_id'];
        $dish->cooking_method = $validated['cooking_method'];
        $dish->cooking_time = $validated['cooking_time'];
        $dish->save();

        return redirect('/dishes')
            ->with('success', 'Блюдо изменено.');
    }

    public function destroy(string $id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect('/dishes')
            ->with('success', 'Блюдо удалено.');
    }

    private function validateDish(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'cooking_method' => ['required', 'string', 'max:10000'],
            'cooking_time' => ['required', 'integer', 'min:1', 'max:10080'],
        ], [
            'name.required' => 'Введите название блюда.',
            'name.max' => 'Название должно содержать не более 150 символов.',
            'category_id.required' => 'Выберите категорию.',
            'category_id.integer' => 'Некорректная категория.',
            'category_id.exists' => 'Выбранная категория не существует.',
            'cooking_method.required' => 'Укажите способ приготовления.',
            'cooking_method.max' => 'Описание слишком длинное.',
            'cooking_time.required' => 'Укажите время приготовления.',
            'cooking_time.integer' => 'Время должно быть целым числом.',
            'cooking_time.min' => 'Время должно быть не менее 1 минуты.',
            'cooking_time.max' => 'Время должно быть не более 10080 минут.',
        ]);
    }
}