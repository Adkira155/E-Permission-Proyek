<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // saat ini daftar jurusan yang ada di SMKN 2 Banjarmasin ada 8 sebagai berikut:
        Major::insert([
            'major' => 'Pekerjaan Sosial'
        ]);

        Major::insert([
            'major' => 'Teknik Jaringan Komputer dan Telekomunikasi'
        ]);
        
        Major::insert([
            'major' => 'Desain Komunikasi Visual'
        ]);

        
        Major::insert([
            'major' => 'Animasi'
        ]);
        
        
        Major::insert([
            'major' => 'Pengembangan Perangkat Lunak dan Gim'
        ]);

        
        Major::insert([
            'major' => 'Broadcasting dan Perfilman'
        ]);
        
        Major::insert([
            'major' => 'Teknik Kimia Industri'
        ]);
        
        Major::insert([
            'major' => 'Teknik Furnitur'
        ]);
    }
}
