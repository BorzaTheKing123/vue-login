<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\RegisterController;

Route::get('/', [SessionController::class, 'show']);
Route::get('/stranke/{id}');

Route::get('/login', [LoginController::class, 'edit']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/{id}/stranke', [SessionController::class, 'show'])->middleware('auth');
Route::post('/{id}/stranke')->middleware('auth');

Route::get('/{id}/stranke/{id_stranke}/edit')->middleware('auth');
Route::put('/{id}/stranke/{id_stranke}/edit')->middleware('auth');
Route::delete('/{id}/stranke/{id_stranke}/edit')->middleware('auth');