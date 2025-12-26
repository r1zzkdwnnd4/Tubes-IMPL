<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\Wisata;

class CustomerHomeController extends Controller
{
    /**
     * Menampilkan halaman home customer
     * (hanya 3 wisata sebagai contoh)
     */
    public function index()
    {
        // Ambil 3 wisata saja untuk HOME (contoh / highlight)
        $wisata = Wisata::orderBy('Id_wisata', 'DESC')
            ->limit(3)
            ->get();

        return view('pages.customerHome', compact('wisata'));
    }
}
