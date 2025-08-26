<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('tasks', TaskController::class)->middleware('auth');

Route::resource('categories', CategoryController::class)->middleware('auth');