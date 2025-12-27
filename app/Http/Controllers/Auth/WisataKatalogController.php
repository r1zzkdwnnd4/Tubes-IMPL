<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Wisata;

class WisataKatalogController extends Controller
{
    public function index()
    {
        // Ambil semua wisata, dikelompokkan berdasarkan Area
        $wisataPerArea = Wisata::orderBy('Area')
            ->get()
            ->groupBy('Area');

        return view('pages.katalog-wisata', compact('wisataPerArea'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);

        return view('pages.detail-wisata', compact('wisata'));
    }

}
