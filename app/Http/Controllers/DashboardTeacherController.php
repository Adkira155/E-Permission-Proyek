<?php

namespace App\Http\Controllers;

use App\Models\ClassSchool;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardTeacherController extends Controller
{
    public function index()
    {
        if(auth()->user()->jabatan == 'siswa') {
            return redirect('/siswa');
        }
        
        $countStudents = User::where('jabatan', 'siswa')->count();
        $countClass = ClassSchool::count();
        $teachers = User::where('jabatan', 'guru')->get();
        return view('teachers.index', [
            'title' => 'Dashboard Guru',
            'active' => 'dashboard guru',
            'countStudents' => $countStudents,
            'countClass' => $countClass,
            'teachers' => $teachers
        ]);
    }

    public function cariGuru(Request $request)
    {
        $query = $request->email;
        if(auth()->user()->jabatan == 'siswa') {
            return redirect('/siswa');
        }
        
        $countStudents = User::where('jabatan', 'siswa')->count();
        $countClass = ClassSchool::count();

        $teachers = User::where('email', 'like', '%'. $query . '%')->where('jabatan', 'guru')->get();

        return view('teachers.index', [
            'title' => 'Dashboard Guru',
            'active' => 'dashboard guru',
            'countStudents' => $countStudents,
            'countClass' => $countClass,
            'teachers' => $teachers
        ]);
    }

    public function create()
    {
        $subjects = Subject::get();
        return view('teachers.create', [
            'title' => 'Verifikasi Data Guru',
            'active' => 'dashboard guru',
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|unique:teachers',
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'subject' => 'required'
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Verifikasi Data Guru berhasil');
    }

    public function edit($id)
    {
        $teacher = User::where('id', $id)->first();
        $subjects = Subject::get();

        return view('teachers.edit', [
            'title' => 'Edit Guru',
            'active' => 'dashboard',
            'teacher' => $teacher,
            'subjects' => $subjects
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'user_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'subject' => 'required'
        ];

        $validated = $request->validate($rules);

        Teacher::where('user_id', $id)->update($validated);

        return redirect()->back()->with('success', 'Data Guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        Teacher::where('user_id', $id)->delete();

        return redirect()->back();
    }
}
