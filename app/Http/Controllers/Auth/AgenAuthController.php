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
            'Email' => $request->Email,
            'password' => $request->Password
        ];

        if (Auth::guard('agen')->attempt($credentials)) {
            return redirect()->route('agen.dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::guard('agen')->logout();
        return redirect()->route('agen.login');
    }
}

