<h1>Data History</h1>

<a href="{{ route('history.create') }}">
    Tambah History
</a>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Nama Asset</th>
        <th>Tanggal Update</th>
        <th>Status Baru</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>

    @foreach($history as $h)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $h->asset->nama_asset }}</td>

        <td>{{ $h->tanggal_update }}</td>

        <td>{{ $h->status_baru }}</td>

        <td>{{ $h->catatan }}</td>

        <td>

            <a href="{{ route('history.edit', $h->history_id) }}">
                Edit
            </a>

            <form action="{{ route('history.destroy', $h->history_id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>