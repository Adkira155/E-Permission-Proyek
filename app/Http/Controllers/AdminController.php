<?php

namespace App\Http\Controllers;

use App\Models\ClassSchool;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->jabatan == 'siswa') {
            return redirect('/siswa');
        }

        $countStudents = User::where('jabatan', 'siswa')->count();
        $countClass = ClassSchool::count();
        $teachers = User::where('jabatan', 'guru')->get();
        return view('admins.index', [
            'title' => 'Admin',
            'active' => 'admin',
            'countStudents' => $countStudents,
            'countClass' => $countClass,
            'teachers' => $teachers
        ]);
    }
}
