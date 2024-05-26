<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini adalah data seeder agar data untuk table subject terisi untuk sementara...
        Subject::insert([
            'subject' => 'Matematika'
        ]);

        Subject::insert([
            'subject' => 'Bahasa Indonesia'
        ]);

        Subject::insert([
            'subject' => 'Kejuruan PPLG'
        ]);
    }
}
