<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja - Sistem Reservasi Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Tambah Meja Baru</h5>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('/meja') }}" method="POST">
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

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/meja') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn bg-primary text-white fw-bold">Simpan Data</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>