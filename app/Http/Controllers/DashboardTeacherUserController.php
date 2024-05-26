<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardTeacherUserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('teachers.users.index', [
            'title' => 'Kelola Pengguna',
            'active' => 'pengguna',
            'users' => $users
        ]);
    }

    public function cariPengguna(Request $request)
    {
        $query = $request->email;

        $users = User::where('email', 'like', '%'. $query . '%')->get();

        return view('teachers.users.index', [
            'title' => 'Kelola Pengguna',
            'active' => 'pengguna',
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('teachers.users.create', [
            'title' => 'Tambah Pengguna',
            'active' => 'pengguna',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'jabatan' => 'required'
        ]);

        $image      = $request->file('image');
        $fn   = date('Y-m-d').$image->getClientOriginalName();
        $path       = 'photo-user/'.$fn;

        Storage::disk('public')->put($path, file_get_contents($image));

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make( $request->password);
        $data['image'] = $fn;

        $validated['password'] = Hash::make($request->input('password'));

        User::create($data);

        return redirect()->back()->with('success', 'Data Pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('teachers.users.edit', [
            'title' => 'Edit Pengguna',
            'active' => 'pengguna',
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ];

        $validated = $request->validate($rules);

        if($request->input('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($validated);

        return redirect()->back()->with('success', 'Data Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back();
    }

    public function profile()
    {
        $users = User::get();
        return view('students.profile', [
            'title' => 'Profile',
            'active' => 'pengguna',
            'users' => $users
        ]);
    }
}
