<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja - Sistem Reservasi Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0 fw-bold">Form Ubah Data Meja</h5>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('/meja/'.$meja->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Wajib ada untuk memberi tahu Laravel ini adalah proses UPDATE --}}

                        <div class="mb-3">
                            <label for="nomor_meja" class="form-label fw-bold">Nomor Meja</label>
                            <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" value="{{ $meja->nomor_meja }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kapasitas" class="form-label fw-bold">Kapasitas (Orang)</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control" min="1" value="{{ $meja->kapasitas }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status Meja</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Kosong" {{ $meja->status == 'Kosong' ? 'selected' : '' }}>Kosong (Tersedia)</option>
                                <option value="Terisi" {{ $meja->status == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                                <option value="Direservasi" {{ $meja->status == 'Direservasi' ? 'selected' : '' }}>Direservasi</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/meja') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-warning fw-bold text-dark">Update Data</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>