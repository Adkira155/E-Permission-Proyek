<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function loginApp(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($validate)) {
            if(auth()->user()->jabatan == 'guru') {
                return redirect('/guru');
            } else if('admin') {
                return redirect('/admin');
            } else {
                return redirect('/siswa');
            }
        }  else {
            return redirect()->route('login')->with('failed', 'Username atau password tidak valid');
        }
    }

    public function logout()
    {
        // Auth::logout();
        // return redirect('/login');

         Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil Logout');
    }

}
