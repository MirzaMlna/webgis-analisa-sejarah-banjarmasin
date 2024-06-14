<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index']);
// Route::resource('login', LoginController::class);
Route::resource('home', HomeController::class);
Route::resource('users', UserController::class);
Route::resource('marks', MarkController::class);

Route::get('login-form', [LoginController::class, 'index'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
