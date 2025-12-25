<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wisata;
use App\Models\Transaksi;

class BookingController extends Controller
{
    /**
     * Tampilkan form booking
     */
    public function create()
    {
        $wisata = Wisata::all();
        return view('pages.form-booking', compact('wisata'));
    }

    /**
     * Simpan data booking ke tabel Transaksi
     */
    public function store(Request $request)
    {
        $request->validate([
            'Id_wisata'        => 'required|exists:Wisata,Id_wisata',
            'JumlahOrang'      => 'required|integer|min:1',
            'Tanggal'          => 'required|date',
            'MetodePembayaran' => 'required|string',
        ]);

        $customer = Auth::guard('customer')->user();
        $wisata   = Wisata::findOrFail($request->Id_wisata);

        // Hitung total harga
        $total = $wisata->Harga * $request->JumlahOrang;

        // Generate kode booking
        $kodeBooking = 'TRV-' . strtoupper(uniqid());

        // Simpan transaksi (SESUAI MODEL TRANSAKSI KAMU)
        $transaksi = Transaksi::create([
            'Id_cust'           => $customer->Id_cust,
            'Id_wisata'         => $wisata->Id_wisata,
            'Jumlah_Orang'      => $request->JumlahOrang,
            'Tanggal_Travel'    => $request->Tanggal,
            'Metode_Pembayaran' => $request->MetodePembayaran,
            'Total'             => $total,
            'Status'            => 'Menunggu Pembayaran',
            'Kode_Booking'      => $kodeBooking,
        ]);

        // Simpan ID transaksi ke session (dipakai di payment & tiket)
        session(['transaksi_id' => $transaksi->Id_transaksi]);

       

        return redirect()->route('customer.payment');
    }
}
