<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function showRegister()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'NamaCustomer'  => 'required',
            'Email'    => 'required|email|unique:Customer,Email',
            'Password' => 'required|min:6',
            'Alamat'   => 'nullable',
            'NoHP'     => 'nullable',
        ]);

        Customer::create([
            'NamaCustomer'  => $request->NamaCustomer,
            'Email'    => $request->Email,
            'Password' => Hash::make($request->Password),
            'Alamat'   => $request->Alamat,
            'NoHP'     => $request->NoHP,
        ]);

        return redirect()->route('customer.login')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'Email' => $request->email,       // field DB
            'password' => $request->password  // input form
        ];

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('customer.home');
        }

        return back()->with('error', 'Email atau password salah.');
    }


    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
