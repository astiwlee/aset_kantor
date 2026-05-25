<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <h5 class="mb-0 fw-bold text-dark">Daftar Lokasi Penyimpanan</h5>
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary btn-sm">Tambah Lokasi</a>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th>Nama Lokasi</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lokasi as $item)
                        <tr>
                            <td class="text-secondary fw-semibold">#{{ $item->lokasi_id }}</td>
                            <td class="text-dark fw-semibold">{{ $item->nama_lokasi }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');" action="{{ route('lokasi.destroy', $item->lokasi_id) }}" method="POST">
                                    <a href="{{ route('lokasi.edit', $item->lokasi_id) }}" class="btn btn-sm btn-outline-success me-1">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">Data lokasi belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top py-3">
            <a href="{{ route('asset.index') }}" class="btn btn-sm btn-link text-decoration-none p-0">← Kembali ke Daftar Asset</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>