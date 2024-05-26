<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data dummy untuk mengisi user siswa dummy
        Student::insert([
            'id_user' => 1,
            'class' => '11',
            'major' => 'Pengembangan Perangkat Lunak dan Gim',
            'gender' => 'male',
            'birthday' => '2007-01-01',
            'address' => 'Kayu Tangi' 
        ]);
    }
}
