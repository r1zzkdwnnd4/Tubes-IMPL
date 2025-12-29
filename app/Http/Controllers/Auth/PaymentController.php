<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Halaman payment (ringkasan transaksi)
     */
    public function show()
    {
        $transaksiId = session('transaksi_id');

        if (!$transaksiId) {
            return redirect()->route('customer.home')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaksi = Transaksi::with(['customer', 'wisata'])
            ->findOrFail($transaksiId);

        return view('pages.payment', compact('transaksi'));
    }

    /**
     * Halaman konfirmasi pembayaran (formalitas)
     */
    public function konfirmasi()
    {
        $transaksiId = session('transaksi_id');

        if (!$transaksiId) {
            return redirect()->route('customer.home')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        // update status saja (dummy)
        Transaksi::where('Id_transaksi', $transaksiId)
            ->update([
                'Status' => 'Paid'
            ]);

        return view('pages.konfirmasi-pembayaran');
    }

    /**
     * HALAMAN TIKET
     * - generate kode booking DI SINI
     * - tanpa parameter route
     */
    public function tiket()
    {
        $transaksiId = session('transaksi_id');

        if (!$transaksiId) {
            return redirect()->route('customer.home')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaksi = Transaksi::with(['customer', 'wisata'])
            ->findOrFail($transaksiId);

        // JIKA KODE BOOKING BELUM ADA → GENERATE
        if (!$transaksi->Kode_Booking) {
            $transaksi->Kode_Booking = 'TRV-' . strtoupper(substr(uniqid(), -8));
            $transaksi->save();
        }

        return view('pages.tiket', [
            'transaksi'   => $transaksi,
            'kodeBooking' => $transaksi->Kode_Booking
        ]);
    }
}
