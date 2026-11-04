<?php

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
