<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    // HALAMAN KONFIRMASI
    public function konfirmasi($id_transaksi)
    {
        return view('pages.konfirmasiPembayaran', compact('id_transaksi'));
    }

    // SIMPAN BUKTI PEMBAYARAN
    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'bukti'        => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('bukti')->store('bukti_transfer', 'public');

        DB::table('pembayaran')->insert([
            'id_transaksi'   => $request->id_transaksi,
            'bukti_transfer' => $path,
            'status'         => 'pending',
            'created_at'     => now(),
            'updated_at'     => now()
        ]);

        return redirect()
            ->route('customer.transaksi')
            ->with('success', 'Bukti pembayaran berhasil dikirim, menunggu verifikasi agen.');
    }
}
