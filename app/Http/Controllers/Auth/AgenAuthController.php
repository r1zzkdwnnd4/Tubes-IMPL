<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenAuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.agenLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required'
        ]);

        $credentials = [
            'Email' => $request->input('Email'),
            'password' => $request->input('Password')
        ];

        if (Auth::guard('agen')->attempt($credentials)) {

            // WAJIB untuk keamanan (tanpa mengubah struktur field)
            $request->session()->regenerate();

            return redirect()->route('agen.dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('agen')->logout();

        // Bersihkan session sepenuhnya
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('agen.login');
    }
}
