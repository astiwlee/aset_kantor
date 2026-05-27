<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        $user = User::all();

        return view('laporan.create', compact('user'));
    }

    
    public function store(Request $request)
    {
        Laporan::create([
            'nama_laporan' => $request->nama_laporan,
            'tipe_laporan' => $request->tipe_laporan,
            'tanggal_generate' => $request->tanggal_generate,
            'isi_laporan' => $request->isi_laporan,
            'user_id' => $request->user_id
        ]);

        return redirect('laporan.index');
    }


    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $user = User::all();

        return view('laporan.edit', compact('laporan', 'user'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->update([
            'nama_laporan' => $request->nama_laporan,
            'tipe_laporan' => $request->tipe_laporan,
            'tanggal_generate' => $request->tanggal_generate,
            'isi_laporan' => $request->isi_laporan,
            'user_id' => $request->user_id
        ]);

        return redirect('laporan.index');
    }

    
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->delete();

        return redirect('laporan.index');
    }
}