<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminWisataController extends Controller
{
    // ===================== READ =====================
    public function index()
    {
        $wisata = DB::table('wisata')
            ->select(
                'id_wisata',
                'NamaWisata',
                'Area',
                'Harga'
            )
            ->orderByDesc('id_wisata')
            ->get();

        return view('pages.adminManajemenWisata', compact('wisata'));
    }

    // ===================== CREATE =====================
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:120',
            'area'        => 'required|string|max:100',
            'harga'       => 'required|numeric'
        ]);

        DB::table('wisata')->insert([
            'NamaWisata' => $request->nama_wisata,
            'Area'       => $request->area,
            'Harga'      => $request->harga
        ]);

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil ditambahkan');
    }

    // ===================== UPDATE =====================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:120',
            'area'        => 'required|string|max:100',
            'harga'       => 'required|numeric'
        ]);

        DB::table('wisata')
            ->where('id_wisata', $id)
            ->update([
                'NamaWisata' => $request->nama_wisata,
                'Area'       => $request->area,
                'Harga'      => $request->harga
            ]);

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil diperbarui');
    }

    // ===================== DELETE =====================
    public function destroy($id)
    {
        DB::table('wisata')
            ->where('id_wisata', $id)
            ->delete();

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil dihapus');
    }
}
