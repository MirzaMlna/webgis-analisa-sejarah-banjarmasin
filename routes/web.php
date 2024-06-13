<?php

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
Route::get('users_data', function () {
    return view('users/index', [
        'title' => 'Data Pengguna',
        'users' => User::all()
    ]);
});
Route::get('marks_data', function () {
    return view('marks/index', [
        'title' => 'Data Penanda'
    ]);
});
