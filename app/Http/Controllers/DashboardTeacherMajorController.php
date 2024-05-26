<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class DashboardTeacherMajorController extends Controller
{
    public function index()
    {
        $majors = Major::get();
        return view('teachers.majors.index', [
            'title' => 'Kelola Jurusan',
            'active' => 'jurusan',
            'majors' => $majors
        ]);
    }

    public function cariJurusan(Request $request)
    {
        $query = $request->jurusan;

        $majors = Major::where('major', 'like', '%'. $query . '%')->get();

        return view('teachers.majors.index', [
            'title' => 'Kelola Jurusan',
            'active' => 'jurusan',
            'majors' => $majors
        ]);
    }

    public function create()
    {
        return view('teachers.majors.create', [
            'title' => 'Tambah Jurusan',
            'active' => 'jurusan',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'major' => 'required'
        ]);

        Major::create($validated);

        return redirect()->back()->with('success', 'Jurusan baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $major = Major::where('id', $id)->first();
        return view('teachers.majors.edit', [
            'title' => 'Edit Jurusan',
            'active' => 'jurusan',
            'major' => $major
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'major' => 'required'
        ];

        $validated = $request->validate($rules);

        Major::where('id', $id)->update($validated);

        return redirect()->back()->with('success', 'Jurusan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Major::where('id', $id)->delete();

        return redirect()->back();
    }
}
