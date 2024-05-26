<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardTeacherSubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        return view('teachers.subjects.index', [
            'title' => 'Kelola Mapel',
            'active' => 'mapel',
            'subjects' => $subjects
        ]);
    }

    public function cariMapel(Request $request)
    {
        $query = $request->subject;

        $subjects = Subject::where('subject', 'like', '%'. $query . '%')->get();

        return view('teachers.subjects.index', [
            'title' => 'Kelola Mapel',
            'active' => 'mapel',
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        return view('teachers.subjects.create', [
            'title' => 'Tambah Mapel',
            'active' => 'mapel'
        ]);
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'subject' => 'required'
        ]);

        Subject::create($validated);

        return redirect()->back()->with('success', 'Mata Pelajaran Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('teachers.subjects.edit', [
            'title' => 'Edit Mapel',
            'active' => 'mapel',
            'subject' => $subject
        ]);
    }

    public function update(Request $request, $id) 
    {
        $rules = [
            'subject' => 'required'
        ];

        $validated = $request->validate($rules);

        Subject::where('id', $id)->update($validated);

        return redirect()->back()->with('success', 'Mata Pelajaran Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Subject::where('id', $id)->delete();

        return redirect()->back();
    }
}
