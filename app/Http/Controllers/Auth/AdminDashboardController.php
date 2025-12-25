<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // SUMMARY
        $totalCustomer = DB::table('customer')->count();
        $totalWisata   = DB::table('wisata')->count();

        // TRANSAKSI TERBARU (limit 5)
        $transaksi = DB::table('transaksi')
            ->join('customer', 'transaksi.id_cust', '=', 'customer.id_cust')
            ->join('wisata', 'transaksi.id_wisata', '=', 'wisata.id_wisata')
            ->select(
                'transaksi.kode_booking',
                'customer.NamaCustomer as customer',
                'wisata.NamaWisata as paket',
                'transaksi.total',
                'transaksi.status',
                'transaksi.tanggal_travel'
            )
            ->orderByDesc('transaksi.id_transaksi')
            ->limit(5)
            ->get();

        return view('pages.adminDashboard', compact(
            'totalCustomer',
            'totalWisata',
            'transaksi'
        ));
    }
}
