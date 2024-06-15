<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    // Method Untuk Masuk Tanpa Akun
    public function guestLogin()
    {
        $data = [
            'email' => 'tamu@gmail.com',
            'password' => 'tamu',
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('home.index')->with('success', 'Masuk sebagai ');
        }
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home.index')->with('success', 'Selamat datang kembali ');
        } else {
            return
                redirect()->route('login-form')->with('failed', 'Akun salah atau tidak terdaftar. Silahkan coba lagi');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-form')->with('success', 'Berhasil keluar !');
    }
}
