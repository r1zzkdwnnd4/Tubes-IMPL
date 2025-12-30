<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgenDashboardController extends Controller
{
    public function index()
    {
        $agen = Auth::guard('agen')->user();

        // PESANAN MASUK (Pending) sesuai area agen
        $pesananMasuk = DB::table('transaksi')
            ->join('customer', 'transaksi.Id_cust', '=', 'customer.Id_cust')
            ->join('wisata', 'transaksi.Id_wisata', '=', 'wisata.Id_wisata')
            ->where('wisata.Area', $agen->Area)
            ->where('transaksi.Status', 'Pending')
            ->select(
                'transaksi.Id_transaksi',
                'customer.NamaCustomer',
                'wisata.NamaWisata',
                'transaksi.Tanggal_Travel',
                'transaksi.Jumlah_Orang',
                'transaksi.Total'
            )
            ->orderByDesc('transaksi.Tanggal_Travel')
            ->get();

        return view('pages.agenDashboard', [
            'agen' => $agen,
            'areaAgen' => $agen->Area,
            'pesananMasuk' => $pesananMasuk
        ]);
    }
}
