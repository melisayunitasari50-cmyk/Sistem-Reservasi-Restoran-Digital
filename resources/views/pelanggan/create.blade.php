<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Pelanggan Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Catatan Khusus</label>
                    <textarea name="catatan_khusus" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>