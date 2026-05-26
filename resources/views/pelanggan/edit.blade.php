<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
                </div>
                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" value="{{ $pelanggan->nomor_hp }}" required>
                </div>
                <div class="mb-3">
                    <label>Catatan Khusus</label>
                    <textarea name="catatan_khusus" class="form-control">{{ $pelanggan->catatan_khusus }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>