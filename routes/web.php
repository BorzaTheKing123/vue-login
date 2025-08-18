<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserControllers\LoginController;
use App\Http\Controllers\UserControllers\RegisterController;
use App\Http\Controllers\StrankeController;

Route::get('/', [SessionController::class, 'show']);

Route::get('/login', [LoginController::class, 'edit'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/{id}/stranke', [SessionController::class, 'index'])->name('stranke.index');
    Route::get('/{id}/stranke/dodaj', [StrankeController::class, 'create']);
    Route::post('/{id}/stranke/dodaj', [StrankeController::class, 'store']);
    Route::get('/{id}/stranke/{id_stranke}/uredi', [StrankeController::class, 'edit'])->can('edit', 'id_stranke');
    Route::put('/{id}/stranke/{id_stranke}/uredi', [StrankeController::class, 'update']);
    Route::delete('/{id}/stranke/{id_stranke}/edit', [StrankeController::class, 'destroy']);
});