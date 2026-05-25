<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Asset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Manajemen Asset</h5>
            <a href="{{ route('asset.create') }}" class="btn btn-primary btn-sm">Tambah Asset</a>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Asset</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asset as $item)
                        <tr>
                            <td>{{ $item->asset_id }}</td>
                            <td class="fw-semibold">{{ $item->nama_asset }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->nama_lokasi }}</td>
                            <td>
                                @if($item->status == 'baik')
                                    <span class="badge bg-success">BAIK</span>
                                @elseif($item->status == 'rusak')
                                    <span class="badge bg-danger">RUSAK</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ strtoupper($item->status) }}</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <form action="{{ route('asset.destroy', $item->asset_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus asset ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>