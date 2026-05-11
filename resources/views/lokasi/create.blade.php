<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Lokasi Baru</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('lokasi.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nama Lokasi / Ruangan</label>
                            <input type="text" 
                                   name="nama_lokasi" 
                                   class="form-control @error('nama_lokasi') is-invalid @enderror" 
                                   value="{{ old('nama_lokasi') }}" 
                                   placeholder="Contoh: Gudang A, Laboratorium, atau Kantor Pusat"
                                   autofocus>
                            
                            @error('nama_lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted mt-1 d-block">Pastikan nama lokasi spesifik agar mudah ditemukan.</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Simpan Lokasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>