<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        // Mengambil data kategori terbaru di atas (descending)
        // Ubah dari 'desc' ke 'asc'
        $kategori = DB::table('kategori')->orderBy('kategori_id', 'asc')->get();
        
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Menampilkan halaman form tambah kategori.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
            'deskripsi'     => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong!',
            'nama_kategori.unique'   => 'Nama kategori ini sudah ada.',
        ]);

        // 2. Insert Data
        DB::table('kategori')->insert([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 3. Redirect ke Index dengan notifikasi
        return redirect()->route('kategori.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit berdasarkan ID kategori.
     */
    public function edit($id)
    {
        // Mengambil satu data kategori berdasarkan ID
        $kategori = DB::table('kategori')->where('kategori_id', $id)->first();

        // Cek jika data tidak ditemukan
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Mengupdate data kategori di database.
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input (Nama kategori unik kecuali untuk ID yang sedang diedit)
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        // 2. Proses Update
        DB::table('kategori')->where('kategori_id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'updated_at'    => now(),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy($id)
    {
        // Proses Hapus
        DB::table('kategori')->where('kategori_id', $id)->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}