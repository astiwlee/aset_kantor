<h1>Tambah Laporan</h1>

<form action="{{ route('laporan.store') }}" method="POST">

    @csrf

    <label>Nama Laporan</label>
    <input type="text" name="nama_laporan">
    <br><br>

    <label>Tipe Laporan</label>

    <select name="tipe_laporan">

        <option value="aset_rusak">
            Aset Rusak
        </option>

        <option value="aset_per_lokasi">
            Aset Per Lokasi
        </option>

        <option value="seluruh_aset">
            Seluruh Aset
        </option>

    </select>

    <br><br>

    <label>Tanggal Generate</label>
    <input type="date" name="tanggal_generate">
    <br><br>

    <label>Isi Laporan</label>
    <textarea name="isi_laporan"></textarea>
    <br><br>

    <label>User</label>

    <select name="user_id">

        @foreach($user as $u)

        <option value="{{ $u->user_id }}">
            {{ $u->nama }}
        </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>