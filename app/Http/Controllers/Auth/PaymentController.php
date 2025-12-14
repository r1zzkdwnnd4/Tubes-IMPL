<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan halaman pembayaran
     */
    public function show($id)
    {
        // Ambil transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Hitung total biaya (jika ada biaya tambahan)
        $harga = $transaction->harga;
        $biayaAdmin = $transaction->biaya_admin ?? 0;

        $totalBayar = $harga + $biayaAdmin;

        return view('payment.index', [
            'transaction' => $transaction,
            'totalBayar'  => $totalBayar
        ]);
    }

    /**
     * Proses pembayaran (update status)
     */
    public function process(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        // Status pembayaran
        $transaction->status_pembayaran = 'PAID'; 
        $transaction->tanggal_bayar = now();

        $transaction->save();

        return redirect()->back()->with(
            'success',
            'Pembayaran berhasil disimpan'
        );
    }
}
