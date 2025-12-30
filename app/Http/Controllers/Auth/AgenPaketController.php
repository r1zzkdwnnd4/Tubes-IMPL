<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgenPaketController extends Controller
{
    public function index()
    {
        // ambil agen yang sedang login (guard agen)
        $agen = Auth::guard('agen')->user();

        // ambil paket wisata sesuai area agen
        $paketWisata = DB::table('wisata')
            ->where('Area', $agen->Area)
            ->get();


        return view('pages.agenPaket', [
            'paketWisata' => $paketWisata
        ]);
    }
}