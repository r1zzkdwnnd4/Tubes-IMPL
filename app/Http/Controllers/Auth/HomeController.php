<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // TAMPIL SEMUA WISATA
    public function index()
    {
        $wisata = DB::table('wisata')->get();
        return view('home', compact('wisata'));
    }

    // 🔍 SEARCH WISATA BERDASARKAN AREA
    public function search(Request $request)
    {
        $wisata = DB::table('wisata')
            ->where('Area', 'like', '%' . $request->area . '%')
            ->get();

        return view('home', compact('wisata'));
    }
}
