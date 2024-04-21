<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;


// Rutas logeo
Route::get('/login', LoginController::class);
Route::post('/login', LoginController::class);

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');








