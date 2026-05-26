<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja - Sistem Reservasi Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-grid-3x3"></i> Form Tambah Meja Baru</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('meja.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nomor_meja" class="form-label fw-bold">Nomor Meja</label>
                            <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" placeholder="Contoh: Meja 01 atau T-01" required>
                        </div>

                        <div class="mb-3">
                            <label for="kapasitas" class="form-label fw-bold">Kapasitas (Orang)</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control" min="1" placeholder="Contoh: 4" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status Awal</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Kosong">Kosong (Tersedia)</option>
                                <option value="Terisi">Terisi</option>
                                <option value="Direservasi">Direservasi</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between gap-2">
                            <a href="{{ route('meja.index') }}" class="btn btn-secondary w-100">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-gold w-100 fw-bold">
                                <i class="bi bi-check-circle"></i> Simpan Data
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