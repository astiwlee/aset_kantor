<h1>Tambah History</h1>

<form action="{{ route('history.store') }}" method="POST">

    @csrf

    <label>Nama Asset</label>

    <select name="asset_id">

        @foreach($asset as $a)

        <option value="{{ $a->asset_id }}">
            {{ $a->nama_asset }}
        </option>

        @endforeach

    </select>

    <br><br>

    <label>Tanggal Update</label>
    <input type="date" name="tanggal_update">

    <br><br>

    <label>Status Baru</label>

    <select name="status_baru">

        <option value="baik">Baik</option>
        <option value="rusak">Rusak</option>
        <option value="hilang">Hilang</option>
        <option value="dipinjam">Dipinjam</option>

    </select>

    <br><br>

    <label>Catatan</label>

    <textarea name="catatan"></textarea>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>