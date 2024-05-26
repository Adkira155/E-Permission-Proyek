<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class DashboardTeacherPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::where('status', 'waiting')->get();
        return view('teachers.permissions.index', [
            'title' => 'Data Izin',
            'active' => 'izin',
            'permissions' => $permissions
        ]);
    }

    public function show($id)
    {
        $permission = Permission::where('id', $id)->first();

        return view('teachers.permissions.show', [
            'title' => 'Data Izin',
            'active' => 'izin',
            'permission' => $permission
        ]);
    }

    public function accept(Request $request, $id) {
        $rules = [
            'status' => 'required'
        ];

        $validated = $request->validate($rules);

        Permission::where('id', $id)->update($validated);

        return redirect()->back();
    }

    public function reject(Request $request, $id) {
        $rules = [
            'status' => 'required'
        ];

        $validated = $request->validate($rules);

        Permission::where('id', $id)->update($validated);

        return redirect()->back();
    }
}
