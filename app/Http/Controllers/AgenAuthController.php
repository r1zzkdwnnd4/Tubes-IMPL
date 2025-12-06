<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenAuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.agen.login'); //ganti ke halaman login agen
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('agen')->attempt($credentials)) {
            return redirect()->route('agen.dashboard'); //ganti ke halaman home agen
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::guard('agen')->logout();
        return redirect()->route('agen.login');
    }
}
