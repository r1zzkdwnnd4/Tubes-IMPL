<?php

use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Http\Request;

class ResetPasswordController
{
    public function resetPassword(Request $request)
{
    $request->validate([
        'email'        => 'required|email',
        'old_password' => 'required',
        'new_password' => 'required|min:6',
    ]);

    $customer = Customer::where('Email', $request->email)->first();

    if (!$customer) {
        return back()->withErrors(['email' => 'Email tidak ditemukan']);
    }

    // cek password lama
    if (!Hash::check($request->old_password, $customer->Password)) {
        return back()->withErrors(['old_password' => 'Password lama salah']);
    }

    // UPDATE PASSWORD (AMAN)
    $customer->Password = Hash::make($request->new_password);
    $customer->save();

    return redirect()->route('customer.login')
        ->with('success', 'Password berhasil diubah, silakan login kembali');
    }
}
