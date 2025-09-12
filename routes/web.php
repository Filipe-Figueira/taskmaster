<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('register', [AuthController::class, 'create'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
    Route::post('/register', [AuthController::class, 'register'])->name('storeUser');
    
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class)->except(['store', 'index', 'show']);
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::put('password-update', [UserController::class, 'passwordUpdate'])->name('password.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

