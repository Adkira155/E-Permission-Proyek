<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    public function index()
    {
        if(auth()->user()->jabatan == 'guru') {
            return redirect('/guru');
        }
        return view('students.index', [
            'title' => 'Dashboard Siswa',
            'active' => 'dashboard'
        ]);
    }
}
