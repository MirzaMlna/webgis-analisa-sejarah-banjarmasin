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
            'email' => 'mirzamaulana@gmail.com',
            'password' => Hash::make('mirza'),
            'phone' => '085814313224',
            'level' => 'Kepala',
        ]);
        User::create([
            'name' => 'Muhammad Wahyu',
            'email' => 'muhammadwahyu@gmail.com',
            'password' => Hash::make('wahyu'),
            'phone' => '085822222222',
            'level' => 'Super Admin',
        ]);
        User::create([
            'name' => 'Renny Melanda Febriyanti',
            'email' => 'rennymelanda@gmail.com',
            'password' => Hash::make('renny'),
            'phone' => '085833333333',
            'level' => 'Admin',
        ]);
        User::create([
            'name' => 'Muhammad Fajar Hermawan',
            'email' => 'fajarhermawan@gmail.com',
            'password' => Hash::make('fajar'),
            'phone' => '085844444444',
            'level' => 'Admin',
        ]);
        User::create([
            'name' => 'Rifqi Riandi Rahman',
            'email' => 'rifqiriandi@gmail.com',
            'password' => Hash::make('rifqi'),
            'phone' => '08585555555555',
            'level' => 'Admin',
        ]);
        User::create([
            'name' => 'Tamu',
            'email' => 'tamu@gmail.com',
            'password' => Hash::make('tamu'),
            'phone' => '-',
            'level' => 'Tamu',
        ]);
    }
}
