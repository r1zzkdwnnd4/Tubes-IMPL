<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    // Tampilkan semua customer
    public function index()
    {
        $customers = Customer::all();
        return view('pages.adminManajemenCustomer', compact('customers'));
    }

    // Store customer baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'Email'         => 'required|email|unique:Customer,Email',
            'password'      => 'required|min:6',
            'no_hp'         => 'nullable'
        ]);

        Customer::create([
            'NamaCustomer' => $request->nama_customer,
            'Email'        => $request->Email,   // FIX
            'Password'     => Hash::make($request->password),
            'NoHP'         => $request->no_hp
        ]);


        return back()->with('success', 'Customer berhasil ditambahkan!');
    }

    // Update customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'nama_customer' => 'required',
            'Email'         => 'required|email|unique:Customer,Email,' . $id . ',Id_cust',
            'no_hp'         => 'nullable'
        ]);

        $customer->update([
            'NamaCustomer' => $request->nama_customer,
            'Email'        => $request->Email,   // FIX
            'NoHP'         => $request->no_hp
        ]);


        return back()->with('success', 'Customer berhasil diupdate!');
    }

    // Delete customer
    public function destroy($id)
    {
        Customer::where('Id_cust', $id)->delete();
        return back()->with('success', 'Customer berhasil dihapus!');
    }
}
