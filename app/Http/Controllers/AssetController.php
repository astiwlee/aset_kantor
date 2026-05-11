<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Menampilkan daftar asset dengan join ke kategori dan lokasi
     */
    public function index()
    {
        $asset = DB::table('asset')
            ->join('kategori', 'asset.kategori_id', '=', 'kategori.kategori_id')
            ->join('lokasi', 'asset.lokasi_id', '=', 'lokasi.lokasi_id')
            ->select('asset.*', 'kategori.nama_kategori', 'lokasi.nama_lokasi')
            ->orderBy('asset.asset_id', 'asc')
            ->get();

        return view('asset.index', compact('asset'));
    }

    /**
     * Menampilkan form tambah asset
     */
    public function create()
    {
        // Mengambil data untuk pilihan di form (dropdown)
        $kategori = DB::table('kategori')->get();
        $lokasi = DB::table('lokasi')->get();
        
        return view('asset.create', compact('kategori', 'lokasi'));
    }

    /**
     * Menyimpan data asset baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_asset'    => 'required|string|max:255',
            'kategori_id'   => 'required|integer',
            'lokasi_id'     => 'required|integer',
            'status'        => 'required|in:baik,rusak,hilang,dipinjam',
            'tanggal_dibeli'=> 'nullable|date',
            'harga'         => 'nullable|numeric',
        ]);

        DB::table('asset')->insert([
            'nama_asset'     => $request->nama_asset,
            'kategori_id'    => $request->kategori_id,
            'lokasi_id'      => $request->lokasi_id,
            'status'         => $request->status,
            'tanggal_dibeli' => $request->tanggal_dibeli,
            'harga'          => $request->harga,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()->route('asset.index')->with('success', 'Asset berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit asset
     */
    public function edit($id)
    {
        $asset = DB::table('asset')->where('asset_id', $id)->first();
        
        if (!$asset) {
            return redirect()->route('asset.index')->with('error', 'Data tidak ditemukan!');
        }

        $kategori = DB::table('kategori')->get();
        $lokasi = DB::table('lokasi')->get();

        return view('asset.edit', compact('asset', 'kategori', 'lokasi'));
    }

    /**
     * Memperbarui data asset
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_asset'    => 'required|string|max:255',
            'kategori_id'   => 'required|integer',
            'lokasi_id'     => 'required|integer',
            'status'        => 'required|in:baik,rusak,hilang,dipinjam',
            'tanggal_dibeli'=> 'nullable|date',
            'harga'         => 'nullable|numeric',
        ]);

        DB::table('asset')->where('asset_id', $id)->update([
            'nama_asset'     => $request->nama_asset,
            'kategori_id'    => $request->kategori_id,
            'lokasi_id'      => $request->lokasi_id,
            'status'         => $request->status,
            'tanggal_dibeli' => $request->tanggal_dibeli,
            'harga'          => $request->harga,
            'updated_at'     => now(),
        ]);

        return redirect()->route('asset.index')->with('success', 'Asset berhasil diperbarui!');
    }

    /**
     * Menghapus data asset
     */
    public function destroy($id)
    {
        DB::table('asset')->where('asset_id', $id)->delete();
        return redirect()->route('asset.index')->with('success', 'Asset berhasil dihapus!');
    }
}