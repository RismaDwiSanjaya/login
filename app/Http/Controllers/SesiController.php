<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'petugas') {
                return redirect('/petugas');
            } elseif (Auth::user()->role == 'pimpinan') {
                return redirect('/pimpinan');
            }
        }

        return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
    }

    public function logout(): RedirectResponse
{
    // Cek jika user terautentikasi
    if (Auth::check()) {
        Auth::logout();  // Logout user yang sedang terautentikasi
    }

    // Redirect setelah logout
    return redirect (route('login'));
    }
}