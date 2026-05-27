<h1>Data Laporan</h1>

<a href="{{ route('laporan.create') }}">
    Tambah Laporan
</a>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Nama Laporan</th>
        <th>Tipe</th>
        <th>Tanggal</th>
        <th>Isi Laporan</th>
        <th>User</th>
        <th>Aksi</th>
    </tr>

    @foreach($laporan as $l)
    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $l->nama_laporan }}</td>

        <td>{{ $l->tipe_laporan }}</td>

        <td>{{ $l->tanggal_generate }}</td>

        <td>{{ $l->isi_laporan }}</td>

        <td>{{ $l->user_id }}</td>

        <td>

            <a href="{{ route('laporan.edit', $l->report_id) }}">
                Edit
            </a>

            <form action="{{ route('laporan.destroy', $l->report_id) }}" method="POST">

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