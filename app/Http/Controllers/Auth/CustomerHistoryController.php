<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class CustomerHistoryController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();

        $transaksi = Transaksi::with('wisata')
            ->where('Id_cust', $customer->Id_cust)
            ->orderByDesc('Id_transaksi')
            ->get();

        return view('pages.customer-history', compact('transaksi'));
    }
}
