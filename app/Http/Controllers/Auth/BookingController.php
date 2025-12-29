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
    public function create(Request $request)
{
    $wisata = Wisata::all();

    // ambil wisata dari query (?wisata=ID)
    $selectedWisata = $request->query('wisata');

    return view('pages.form-booking', compact('wisata', 'selectedWisata'));
}


    /**
     * Proses booking & redirect ke halaman pembayaran sesuai metode
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

        // hitung total (walau dummy, tetap realistis)
        $total = $wisata->Harga * $request->JumlahOrang;

        // simpan transaksi (tetap oke untuk histori / tiket)
        $transaksi = Transaksi::create([
            'Id_cust'           => $customer->Id_cust,
            'Id_wisata'         => $wisata->Id_wisata,
            'Jumlah_Orang'      => $request->JumlahOrang,
            'Tanggal_Travel'    => $request->Tanggal,
            'Metode_Pembayaran' => $request->MetodePembayaran,
            'Total'             => $total,
            'Status'            => 'Menunggu Pembayaran',
            'Kode_Booking'      => 'TRV-' . strtoupper(uniqid()),
        ]);

        // simpan id transaksi ke session (optional, buat histori / tiket)
        session([
            'transaksi_id' => $transaksi->Id_transaksi,
            'kode_booking' => $transaksi->Kode_Booking
        ]);


        // =============================
        // REDIRECT SESUAI METODE
        // =============================
        switch ($request->MetodePembayaran) {
            case 'Transfer Bank':
                return redirect()->route('pembayaran.transfer-bank');

            case 'Kartu Kredit':
                return redirect()->route('pembayaran.kartu-kredit');

            case 'Paypal':
                return redirect()->route('pembayaran.paypal');

            default:
                return redirect()->route('konfirmasi.pembayaran');
        }
    }
}
