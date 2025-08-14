<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\RegisterController;

Route::get('/', [SessionController::class, 'show']);
Route::get('/login', [LoginController::class, 'edit']);
Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [RegisterController::class, 'update']);

Route::get('/{id}/dashboard', [SessionController::class, 'show'])->middleware('auth');