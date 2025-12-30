<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgenRiwayatController extends Controller
{
    public function index(Request $request)
{
    $agen = Auth::guard('agen')->user();

    $query = DB::table('transaksi')
        ->join('customer', 'transaksi.Id_cust', '=', 'customer.Id_cust')
        ->join('wisata', 'transaksi.Id_wisata', '=', 'wisata.Id_wisata')
        ->where('wisata.Area', $agen->Area)
        ->select(
            'transaksi.Id_transaksi',
            'customer.NamaCustomer',
            'wisata.NamaWisata',
            'transaksi.Tanggal_Travel',
            'transaksi.Jumlah_Orang',
            'transaksi.Total',
            'transaksi.Status'
        )
        ->orderByDesc('transaksi.Tanggal_Travel');

    /* =========================
       FILTER STATUS (READ ONLY)
       ========================= */
    if ($request->status === 'confirmed') {
        $query->where('transaksi.Status', 'Dikonfirmasi');
    }

    if ($request->status === 'rejected') {
        $query->where('transaksi.Status', 'Ditolak');
    }

    // ❌ Pending TIDAK perlu difilter di riwayat
    // Pending sudah ditangani di Dashboard Agen

    /* =========================
       FILTER SEARCH
       ========================= */
    if ($request->q) {
        $query->where(function ($q) use ($request) {
            $q->where('customer.NamaCustomer', 'like', '%' . $request->q . '%')
              ->orWhere('wisata.NamaWisata', 'like', '%' . $request->q . '%');
        });
    }

    /* =========================
       FILTER TANGGAL
       ========================= */
    if ($request->start_date && $request->end_date) {
        $query->whereBetween('transaksi.Tanggal_Travel', [
            $request->start_date,
            $request->end_date
        ]);
    }

    $riwayat = $query->get();

    return view('pages.agenRiwayat', [
        'riwayat' => $riwayat
    ]);
}


}