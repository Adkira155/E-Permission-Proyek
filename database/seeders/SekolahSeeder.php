<?php

namespace Database\Seeders;

use App\Http\Controllers\SekolahController;
use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
           'namasekolah'    => 'SMK Negeri 2 Banjarmasin',
           'npsn'    => '30304268',
           'alamat'    => 'BRIGJEN H. HASAN BASRI NO. 6,  Sungai miai, Kec.Banjarmasin Utara, Kota Banjarmasin',
           'kodepost'    => '70123',
           'email'    => 'surel@smkn2-bjm.sch.id',
           'kelurahan'    => 'Sungai Miai',
           'kecamatan'    => 'Banjarmasin Utara',
           'provinsi'    => 'Kalimantan Selatan',
           'sosmed'    => 'https://smkn2-bjm.sch.id',
        ]);
    }
}
