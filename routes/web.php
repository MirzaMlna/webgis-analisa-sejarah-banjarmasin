<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index']);
// Route::resource('login', LoginController::class);
Route::resource('home', HomeController::class);
Route::resource('users', UserController::class);
Route::resource('locations', LocationController::class);

// Untuk Login
Route::get('login-form', [LoginController::class, 'index'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('guest-login', [LoginController::class, 'guestLogin'])->name('guestLogin');

// Untuk Mengambil Kordinat
Route::get('/api/coordinates', [LocationController::class, 'getCoordinates']);

//Untuk Cetak User
Route::get('users.print', [UserController::class, 'print'])->name('users.print');
