<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        // Ambil transaksi_id dari session
        $transaksiId = session('transaksi_id');

        if (!$transaksiId) {
            return redirect()->route('customer.home')
                ->with('error', 'Transaksi tidak ditemukan.');
        }

        // Ambil data transaksi + relasi
        $transaksi = Transaksi::with(['customer', 'wisata'])
            ->findOrFail($transaksiId);

        // Kirim ke view
        return view('pages.payment', compact('transaksi'));
    }

    public function konfirmasi()
{
    $transaksiId = session('transaksi_id');

    if (!$transaksiId) {
        return redirect()->route('customer.home')
            ->with('error', 'Transaksi tidak ditemukan.');
    }

    $transaksi = Transaksi::findOrFail($transaksiId);

    // update status & pastikan kode booking ada
    if (!$transaksi->Kode_Booking) {
        $transaksi->update([
            'Status' => 'Paid',
            'Kode_Booking' => 'BOOK-' . strtoupper(uniqid())
        ]);
    } else {
        $transaksi->update([
            'Status' => 'Paid'
        ]);
    }

    return view('pages.konfirmasi-pembayaran', [
        'kodeBooking' => $transaksi->Kode_Booking
    ]);
}

public function tiket($kode_booking)
{
    $transaksi = Transaksi::with(['customer', 'wisata'])
        ->where('Kode_Booking', $kode_booking)
        ->firstOrFail();

    return view('pages.tiket', compact('transaksi'));
}

}