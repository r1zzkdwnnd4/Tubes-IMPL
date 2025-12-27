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
        $status = $request->query('status');

        $query = DB::table('transaksi')
            ->join('customer', 'transaksi.Id_cust', '=', 'customer.Id_cust')
            ->join('wisata', 'transaksi.Id_wisata', '=', 'wisata.Id_wisata')
            ->join('menawarkan', 'customer.Id_cust', '=', 'menawarkan.Id_cust')
            ->where('menawarkan.Id_agen', $agen->Id_agen)
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

        // FILTER STATUS (sesuai tombol UI)
        if ($status === 'confirmed') {
            $query->where('transaksi.Status', 'Dikonfirmasi');
        }

        if ($status === 'pending') {
            $query->where('transaksi.Status', 'Pending');
        }

        if ($status === 'rejected') {
            $query->where('transaksi.Status', 'Ditolak');
        }


        $riwayat = $query->get();

        return view('pages.agenRiwayat', [
            'riwayat' => $riwayat
        ]);
    }
}