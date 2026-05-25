<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">

<div class="container py-5" style="max-width: 600px;">
    <h4 class="fw-bold mb-1">Edit Lokasi</h4>
    
    <hr class="my-3">

    <form action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="form-label small fw-semibold text-secondary">NAMA LOKASI / RUANGAN</label>
            <input type="text" 
                   name="nama_lokasi" 
                   class="form-control form-control-sm @error('nama_lokasi') is-invalid @enderror" 
                   value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" 
                   placeholder="Contoh: Gudang A, Laboratorium, dll.">
            
            @error('nama_lokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('lokasi.index') }}" class="btn btn-light btn-sm px-3">Batal</a>
            <button type="submit" class="btn btn-dark btn-sm px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>