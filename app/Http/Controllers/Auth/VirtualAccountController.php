<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VirtualAccountController extends Controller
{
    // HALAMAN GENERATE VA
    public function generate($id_transaksi)
    {
        $transaksi = DB::table('transaksi')
            ->where('id_transaksi', $id_transaksi)
            ->first();

        // Generate VA random
        $kodeVA = '8808' . rand(1000000000, 9999999999);

        DB::table('virtual_account')->insert([
            'id_transaksi' => $id_transaksi,
            'kode_va'      => $kodeVA,
            'expired_at'   => now()->addHours(24),
            'created_at'   => now(),
            'updated_at'   => now()
        ]);

        return view('pages.virtualAccount', compact('transaksi', 'kodeVA'));
    }
}
