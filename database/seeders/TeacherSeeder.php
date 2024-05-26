<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data dummy untuk mengisi data user guru
        Teacher::insert([
            'user_id' => 2,
            'name' => 'Ms Ipsum',
            'gender' => 'female',
            'birthday' => '1998-01-01',
            'subject' => 'Matematika'
        ]);
    }
}
