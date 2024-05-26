<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function sekolah(Request $request){

        $data = Sekolah::get();

        return view('admins.sekolah',compact('data'), [
            'title' => 'data sekolah',
            'active' => 'admin',
        ]);
    }
}
