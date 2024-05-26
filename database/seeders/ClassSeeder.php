<?php

namespace Database\Seeders;

use App\Models\ClassSchool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassSchool::insert([
            'tingkat_kelas' => '11', // walaupun berupa angka, tetap harus dibungkus menggunakan string karna tipe data adalah enum
            'jurusan' => 5, // tipe data bertipe integer
            'alphabet' => 'B',
            'wali_kelas' => 2
        ]);
    }
}
