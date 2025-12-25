<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminAgenController extends Controller
{
    /**
     * READ – tampilkan daftar agen
     */
    public function index()
{
    $agen = DB::table('agen')
        ->select(
            'agen.id_agen',
            'agen.NamaAgen',
            'agen.Email',
            'agen.Area'
        )
        ->orderByDesc('agen.id_agen')
        ->get();

    return view('pages.adminManajemenAgen', compact('agen'));
}


    /**
     * CREATE – tambah agen
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_agen' => 'required|string|max:120',
            'email'     => 'required|email|unique:agen,Email',
            'password'  => 'required|string|min:6',
            'area'      => 'required|string|max:100',
        ]);

        DB::table('agen')->insert([
            'NamaAgen' => $request->nama_agen,
            'Email'    => $request->email,
            'Password' => Hash::make($request->password), // 🔑 WAJIB HASH
            'Area'     => $request->area,
        ]);

        return redirect()
            ->route('admin.agen')
            ->with('success', 'Agen berhasil ditambahkan');
    }


    /**
     * UPDATE – edit agen
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_agen' => 'required|string|max:120',
            'email'     => 'required|email',
            'area'      => 'required|string|max:100',
        ]);

        DB::table('agen')
            ->where('id_agen', $id)
            ->update([
                'NamaAgen' => $request->nama_agen,
                'Email'    => $request->email,
                'Area'     => $request->area,
            ]);

        return redirect()
            ->route('admin.agen')
            ->with('success', 'Agen berhasil diperbarui');
    }

    /**
     * DELETE – hapus agen
     */
    public function destroy($id)
    {
        // hapus relasi dulu (aman)
        DB::table('mengelola')->where('id_agen', $id)->delete();

        DB::table('agen')->where('id_agen', $id)->delete();

        return redirect()
            ->route('admin.agen')
            ->with('success', 'Agen berhasil dihapus');
    }
}
