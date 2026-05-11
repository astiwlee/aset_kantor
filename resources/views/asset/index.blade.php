<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Asset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5 class="mb-0">Manajemen Asset</h5>
            <a href="{{ route('asset.create') }}" class="btn btn-light btn-sm">Tambah Asset</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Asset</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asset as $item)
                    <tr>
                        <td>{{ $item->asset_id }}</td>
                        <td>{{ $item->nama_asset }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->nama_lokasi }}</td>
                        <td>
                            <span class="badge {{ $item->status == 'baik' ? 'bg-success' : ($item->status == 'rusak' ? 'bg-danger' : 'bg-warning') }}">
                                {{ strtoupper($item->status) }}
                            </span>
                        </td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('asset.destroy', $item->asset_id) }}" method="POST">
                             @csrf
                             @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>