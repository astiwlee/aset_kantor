<h1>Edit Laporan</h1>

<form action="{{ route('laporan.update', $laporan->report_id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nama Laporan</label>

    <input type="text"
    name="nama_laporan"
    value="{{ $laporan->nama_laporan }}">

    <br><br>

    <label>Tipe Laporan</label>

    <select name="tipe_laporan">

        <option value="aset_rusak"
        {{ $laporan->tipe_laporan == 'aset_rusak' ? 'selected' : '' }}>
            Aset Rusak
        </option>

        <option value="aset_per_lokasi"
        {{ $laporan->tipe_laporan == 'aset_per_lokasi' ? 'selected' : '' }}>
            Aset Per Lokasi
        </option>

        <option value="seluruh_aset"
        {{ $laporan->tipe_laporan == 'seluruh_aset' ? 'selected' : '' }}>
            Seluruh Aset
        </option>

    </select>

    <br><br>

    <label>Tanggal Generate</label>

    <input type="date"
    name="tanggal_generate"
    value="{{ $laporan->tanggal_generate }}">

    <br><br>

    <label>Isi Laporan</label>

    <textarea name="isi_laporan">{{ $laporan->isi_laporan }}</textarea>

    <br><br>

    <label>User</label>

    <select name="user_id">

        @foreach($user as $u)

        <option value="{{ $u->user_id }}"
        {{ $laporan->user_id == $u->user_id ? 'selected' : '' }}>

            {{ $u->name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">
        Update
    </button>

</form>