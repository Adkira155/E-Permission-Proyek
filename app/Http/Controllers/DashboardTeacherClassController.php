<?php

namespace App\Http\Controllers;

use App\Models\ClassSchool;
use App\Models\Major;
use Illuminate\Http\Request;

class DashboardTeacherClassController extends Controller
{
    public function index()
    {
        $class = ClassSchool::get();
        return view('teachers.class.index', [
            'title' => 'Kelola Kelas',
            'active' => 'kelas',
            'class' => $class
        ]);
    }

    public function create()
    {
        $majors = Major::get();
        return view('teachers.class.create', [
            'title' => 'Tambah Kelas',
            'active' => 'kelas',
            'majors' => $majors
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tingkat_kelas' => 'required',
            'alphabet' => 'required',
            'jurusan' => 'required',
            'wali_kelas' => 'required'
        ]);

        ClassSchool::create($validated);

        return redirect()->back()->with('success', 'Kelas baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $class = ClassSchool::where('id_kelas', $id)->first();
        $majors = Major::get();
        return view('teachers.class.edit', [
            'title' => 'Edit Kelas',
            'active' => 'kelas',
            'class' => $class,
            'majors' => $majors
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'tingkat_kelas' => 'required',
            'alphabet' => 'required',
            'jurusan' => 'required',
            'wali_kelas' => 'required'
        ];

        $validated = $request->validate($rules);

        ClassSchool::where('id_kelas', $id)->update($validated);

        return redirect()->back()->with('success', 'Data kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        ClassSchool::where('id_kelas', $id)->delete();

        return redirect()->back();
    }
}
