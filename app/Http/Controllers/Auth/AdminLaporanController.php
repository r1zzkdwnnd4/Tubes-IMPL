<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    /**
     * LAPORAN TRANSAKSI
     */
    public function laporanTransaksi(Request $request)
{
    $query = DB::table('transaksi');

    if ($request->filled('start_date')) {
        $query->whereDate('tanggal_travel', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->whereDate('tanggal_travel', '<=', $request->end_date);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $totalTransaksi = $query->count();
    $totalPendapatan = $query->sum('total');

    return view('pages.laporanTransaksi', compact(
        'totalTransaksi',
        'totalPendapatan'
    ));
}


    /**
     * LAPORAN PELANGGAN
     */
    public function laporanPelanggan()
    {
        $totalCustomer = DB::table('customer')->count();

        $repeatCustomer = DB::table('transaksi')
            ->join('customer', 'transaksi.id_cust', '=', 'customer.id_cust')
            ->select(
                'customer.NamaCustomer',
                DB::raw('COUNT(transaksi.id_transaksi) as total_transaksi')
            )
            ->groupBy('customer.NamaCustomer')
            ->having('total_transaksi', '>', 1)
            ->orderByDesc('total_transaksi')
            ->get();

        return view('pages.laporanPelanggan', compact(
            'totalCustomer',
            'repeatCustomer'
        ));
    }



    /**
     * LAPORAN AGEN
     */
    public function laporanAgen()
    {
        $totalAgen = DB::table('agen')->count();

        $agenPerArea = DB::table('agen')
            ->select(
                'Area',
                DB::raw('COUNT(id_agen) as jumlah_agen')
            )
            ->groupBy('Area')
            ->orderByDesc('jumlah_agen')
            ->get();

        $listAgen = DB::table('agen')
            ->select('NamaAgen', 'Email', 'Area')
            ->orderBy('NamaAgen')
            ->get();

        return view('pages.laporanAgen', compact(
            'totalAgen',
            'agenPerArea',
            'listAgen'
        ));
    }



}
