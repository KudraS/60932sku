<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', [
        'title' => 'Лабораторная работа №2',
        'message' => 'Привет из Laravel!',
        'author' => 'Сираждинов Кудратбек Умудбекович',
        'group' => '609-32',
    ]);
});

Route::get('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->whereNumber('id');

Route::get('/dishes', [DishController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dishes/create', [DishController::class, 'create']);

    Route::post('/dishes', [DishController::class, 'store']);

    Route::get('/dishes/{id}/edit', [DishController::class, 'edit'])
        ->whereNumber('id');

    Route::put('/dishes/{id}', [DishController::class, 'update'])
        ->whereNumber('id');

    Route::delete('/dishes/{id}', [DishController::class, 'destroy'])
        ->whereNumber('id');
});

Route::get('/dishes/{id}', [DishController::class, 'show'])
    ->whereNumber('id');

Route::get('/ingredients', [IngredientController::class, 'index']);

Route::get('/ingredients/{id}', [IngredientController::class, 'show'])
    ->whereNumber('id');
