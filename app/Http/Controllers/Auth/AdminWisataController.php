<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;

class AdminWisataController extends Controller
{
    // ===================== READ =====================
    public function index()
    {
        $wisata = Wisata::orderByDesc('Id_wisata')->get();

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

        Wisata::create([
            'NamaWisata' => $request->nama_wisata,
            'Area'       => ucwords(strtolower(trim($request->area))), // NORMALISASI
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

        Wisata::where('Id_wisata', $id)->update([
            'NamaWisata' => $request->nama_wisata,
            'Area'       => ucwords(strtolower(trim($request->area))), // NORMALISASI
            'Harga'      => $request->harga
        ]);

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil diperbarui');
    }

    // ===================== DELETE =====================
    public function destroy($id)
    {
        Wisata::where('Id_wisata', $id)->delete();

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil dihapus');
    }
}
