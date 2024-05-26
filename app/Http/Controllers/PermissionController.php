<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return view('students.permission', [
            'title' => 'Permission',
            'active' => 'membuat'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        $validated['id_siswa'] = $request->input('id_siswa');

        Permission::create($validated);

        return redirect()->back()->with('success', 'Izin berhasil dibuat');
    }

    public function wait()
    {
        $permissions = Permission::where('id_siswa', auth()->user()->id)->where('status', 'waiting')->orderBy('id', 'desc')->get();

        return view('students.waiting', [
            'title' => 'Menunggu Persetujuan',
            'active' => 'menunggu',
            'permissions' => $permissions
        ]);
    }

    public function accept()
    {
        $permissions = Permission::where('id_siswa', auth()->user()->id)->where('status', 'confirmed')->orderBy('id', 'desc')->get();

        return view('students.waiting', [
            'title' => 'Persetujuan Diterima',
            'active' => 'diterima',
            'permissions' => $permissions
        ]);
    }

    public function reject()
    {
        $permissions = Permission::where('id_siswa', auth()->user()->id)->where('status', 'rejected')->orderBy('id', 'desc')->get();

        return view('students.waiting', [
            'title' => 'Persetujuan Ditolak',
            'active' => 'ditolak',
            'permissions' => $permissions
        ]);
    }

    public function izin(Request $request){

        $data = Permission::get();

        return view('admins.showizin',compact('data'), [
            'title' => 'data izin',
            'active' => 'admin',
        ]);
    }
}
