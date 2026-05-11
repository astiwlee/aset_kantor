<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    /**
     * Menampilkan daftar lokasi
     */
    public function index()
    {
        $lokasi = DB::table('lokasi')->orderBy('lokasi_id', 'asc')->get();
        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Form tambah lokasi
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Menyimpan lokasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255|unique:lokasi,nama_lokasi',
        ], [
            'nama_lokasi.required' => 'Nama lokasi wajib diisi!',
            'nama_lokasi.unique'   => 'Nama lokasi ini sudah terdaftar.',
        ]);

        DB::table('lokasi')->insert([
            'nama_lokasi' => $request->nama_lokasi,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan!');
    }

    /**
     * Form edit lokasi
     */
    public function edit($id)
    {
        $lokasi = DB::table('lokasi')->where('lokasi_id', $id)->first();

        if (!$lokasi) {
            return redirect()->route('lokasi.index')->with('error', 'Data lokasi tidak ditemukan!');
        }

        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update data lokasi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        DB::table('lokasi')->where('lokasi_id', $id)->update([
            'nama_lokasi' => $request->nama_lokasi,
            'updated_at'  => now(),
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui!');
    }

    /**
     * Menghapus lokasi
     */
    public function destroy($id)
    {
        // Catatan: Jika lokasi sudah dipakai di tabel Asset, 
        // proses hapus ini mungkin akan gagal karena Foreign Key constraint.
        try {
            DB::table('lokasi')->where('lokasi_id', $id)->delete();
            return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('lokasi.index')->with('error', 'Gagal menghapus! Lokasi ini masih digunakan oleh data Asset.');
        }
    }
}