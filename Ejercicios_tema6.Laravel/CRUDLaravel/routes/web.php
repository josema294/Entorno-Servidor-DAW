<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


// Ruta para otra página, formcrud
Route::get('/login', LoginController::class);
Route::post('/login', LoginController::class);




