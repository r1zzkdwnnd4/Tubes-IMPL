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
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/wisata'), $namaGambar);
        }

        Wisata::create([
            'NamaWisata' => $request->nama_wisata,
            'Area'       => ucwords(strtolower(trim($request->area))),
            'Harga'      => $request->harga,
            'Deskripsi'  => $request->deskripsi,
            'Gambar'     => $namaGambar
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
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $wisata = Wisata::where('Id_wisata', $id)->firstOrFail();

        if ($request->hasFile('gambar')) {
            if ($wisata->Gambar && file_exists(public_path('uploads/wisata/' . $wisata->Gambar))) {
                unlink(public_path('uploads/wisata/' . $wisata->Gambar));
            }

            $file = $request->file('gambar');
            $namaGambar = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/wisata'), $namaGambar);

            $wisata->Gambar = $namaGambar;
        }

        $wisata->update([
            'NamaWisata' => $request->nama_wisata,
            'Area'       => ucwords(strtolower(trim($request->area))),
            'Harga'      => $request->harga,
            'Deskripsi'  => $request->deskripsi
        ]);

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil diperbarui');
    }

    // ===================== DELETE =====================
    public function destroy($id)
    {
        $wisata = Wisata::where('Id_wisata', $id)->first();

        if ($wisata && $wisata->Gambar && file_exists(public_path('uploads/wisata/' . $wisata->Gambar))) {
            unlink(public_path('uploads/wisata/' . $wisata->Gambar));
        }

        Wisata::where('Id_wisata', $id)->delete();

        return redirect()
            ->route('admin.wisata')
            ->with('success', 'Wisata berhasil dihapus');
    }
}
