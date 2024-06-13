<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('login', function () {
    return view('login/index');
});

Route::get('home', function () {
    return view('home/index', [
        'title' => 'Sistem Informasi Geografi'
    ]);
});


Route::get('marks_data', function () {
    return view('marks/index', [
        'title' => 'Data Penanda'
    ]);
});


Route::resource('users', UserController::class);
