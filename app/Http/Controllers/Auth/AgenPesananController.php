<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgenPesananController extends Controller
{
    /**
     * List pesanan masuk (Pending) sesuai area agen
     */
    public function index()
    {
        $agen = Auth::guard('agen')->user();

        $pesanan = DB::table('transaksi')
            ->join('wisata', 'transaksi.Id_wisata', '=', 'wisata.Id_wisata')
            ->where('wisata.Area', $agen->Area)
            ->where('transaksi.Status', 'Pending')
            ->select(
                'transaksi.Id_transaksi',
                'transaksi.Kode_Booking',
                'transaksi.Tanggal_Travel',
                'transaksi.Total',
                'transaksi.Status',
                'wisata.NamaWisata'
            )
            ->orderByDesc('transaksi.Id_transaksi')
            ->get();

        return view('pages.agenPesanan', compact('pesanan'));
    }

    /**
     * Update status pesanan (Pending → Dikonfirmasi / Ditolak)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Dikonfirmasi,Ditolak'
        ]);

        $agen = Auth::guard('agen')->user();

        // Ambil transaksi + validasi area
        $transaksi = DB::table('transaksi')
            ->join('wisata', 'transaksi.Id_wisata', '=', 'wisata.Id_wisata')
            ->where('transaksi.Id_transaksi', $id)
            ->where('wisata.Area', $agen->Area)
            ->where('transaksi.Status', 'Pending')
            ->select('transaksi.Id_transaksi')
            ->first();

        if (!$transaksi) {
            abort(403, 'Akses tidak diizinkan');
        }

        DB::table('transaksi')
            ->where('Id_transaksi', $id)
            ->update([
                'Status' => $request->status
            ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}
