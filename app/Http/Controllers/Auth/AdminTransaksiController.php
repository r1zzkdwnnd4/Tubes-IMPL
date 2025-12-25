<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->join('customer', 'transaksi.id_cust', '=', 'customer.id_cust')
            ->join('wisata', 'transaksi.id_wisata', '=', 'wisata.id_wisata')
            ->select(
                'transaksi.id_transaksi',
                'transaksi.kode_booking',
                'customer.NamaCustomer as customer',
                'wisata.NamaWisata as paket',
                'transaksi.total',
                'transaksi.status',
                'transaksi.tanggal_travel'
            )
            ->orderByDesc('transaksi.id_transaksi')
            ->get();

        return view('pages/adminHistoryTransaksi', compact('transaksi'));
    }
}
