<?php

namespace App\Http\Controllers;

use App\History;
use App\Asset;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // tampil data
    public function index()
    {
        $history = History::all();

        return view('history.index', compact('history'));
    }

    // form tambah
    public function create()
    {
        $asset = Asset::all();

        return view('history.create', compact('asset'));
    }

    // simpan data
    public function store(Request $request)
    {
        History::create([
            'asset_id' => $request->asset_id,
            'tanggal_update' => $request->tanggal_update,
            'status_baru' => $request->status_baru,
            'catatan' => $request->catatan
        ]);

        return redirect('/history');
    }

    // form edit
    public function edit($id)
    {
        $history = History::findOrFail($id);
        $asset = Asset::all();

        return view('history.edit', compact('history', 'asset'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);

        $history->update([
            'asset_id' => $request->asset_id,
            'tanggal_update' => $request->tanggal_update,
            'status_baru' => $request->status_baru,
            'catatan' => $request->catatan
        ]);

        return redirect('/history');
    }

    // hapus data
    public function destroy($id)
    {
        $history = History::findOrFail($id);

        $history->delete();

        return redirect('/history');
    }
}