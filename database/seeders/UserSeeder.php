<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Mirza Maulana',
            'email' => 'mirzamaulana713@gmail.com',
            'password' => Hash::make('mirza'),
            'phone' => '085814313224',
            'level' => 'Super Admin',
        ]);
    }
}
