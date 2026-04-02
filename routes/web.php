<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class, 'shop'])->name('shop');

Route::get('/shop-item/{id}',[App\Http\Controllers\FrontController::class, 'shopItem'])->name('shop-item');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
