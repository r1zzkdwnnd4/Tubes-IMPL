<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Menampilkan form booking
    public function formBooking()
    {
        return view('form-booking');
    }

    // Memproses booking
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'destinasi' => 'required|string',
            'jumlah_orang' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string',
            'tanggal_travel' => 'required|date',
        ]);

        // Simpan ke database
        $booking = Booking::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'destinasi' => $request->destinasi,
            'jumlah_orang' => $request->jumlah_orang,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_travel' => $request->tanggal_travel,
        ]);

        // Redirect ke halaman pembayaran
        return redirect()->route('payment', ['id' => $booking->id])
                        ->with('success', 'Booking berhasil! Silakan lanjut ke pembayaran.');
    }
}
