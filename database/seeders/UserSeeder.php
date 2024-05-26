<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // akun dummy untuk siswa
        User::insert([
            'name' => 'Akira',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('siswa123'),
            'jabatan' => 'siswa'
        ]);

        // akun dummy untuk guru
        User::insert([
            'name' => 'Akira',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('guru123'),
            'jabatan' => 'guru'
        ]);

        // akun dummy untuk admin
        User::insert([
            'name' => 'Akira',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'jabatan' => 'admin'
        ]);
    }
}
