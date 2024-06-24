<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function print()
    {
        return view('users.user_print', [
            'users' => User::orderedByLevel()->get(),
        ]);
    }
    public function index()
    {
        return view('users.index', [
            'title' => 'Data Akun',
            'users' => User::orderedByLevel()->get(),
        ]);
    }

    public function create()
    {
        return view(
            'users/user_create'
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'level' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'level' => $request->level,
        ]);
        return redirect()->route('users.index')->with('success', 'Pengguna Berhasil Ditambahkan');
    }


    public function show(string $id)
    {
        // 
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.user_edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string',
            'level' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level = $request->level;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna Berhasil Diedit !');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna Berhasil Dihapus');
    }
}
