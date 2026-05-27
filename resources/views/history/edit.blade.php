<h1>Edit History</h1>

<form action="{{ route('history.update', $history->history_id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nama Asset</label>

    <select name="asset_id">

        @foreach($asset as $a)

        <option value="{{ $a->asset_id }}"
        {{ $history->asset_id == $a->asset_id ? 'selected' : '' }}>

            {{ $a->nama_asset }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Tanggal Update</label>

    <input type="date"
    name="tanggal_update"
    value="{{ $history->tanggal_update }}">

    <br><br>

    <label>Status Baru</label>

    <select name="status_baru">

        <option value="baik"
        {{ $history->status_baru == 'baik' ? 'selected' : '' }}>
            Baik
        </option>

        <option value="rusak"
        {{ $history->status_baru == 'rusak' ? 'selected' : '' }}>
            Rusak
        </option>

        <option value="hilang"
        {{ $history->status_baru == 'hilang' ? 'selected' : '' }}>
            Hilang
        </option>

        <option value="dipinjam"
        {{ $history->status_baru == 'dipinjam' ? 'selected' : '' }}>
            Dipinjam
        </option>

    </select>

    <br><br>

    <label>Catatan</label>

    <textarea name="catatan">{{ $history->catatan }}</textarea>

    <br><br>

    <button type="submit">
        Update
    </button>

</form>