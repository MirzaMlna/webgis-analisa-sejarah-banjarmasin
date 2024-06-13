<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users/index', [
            'title' => 'Data Pengguna',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'users/user_create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required|string',
        ]);

        // Supaya auto increment selalu berurutan
        $maxId = User::max('id');
        $newId = $maxId ? $maxId + 1 : 1;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level,
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::findOrFail($id);
        // return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // Supaya auto increment selalu berurutan
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        DB::statement('SET @count = 0');
        DB::statement('UPDATE users SET id = @count:= @count + 1');
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
