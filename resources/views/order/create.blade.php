<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow border-0 rounded-3">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0 fw-bold">📝 Form Pesanan Baru</h4>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label fw-semibold">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_meja" class="form-label fw-semibold">Nomor Meja</label>
                        <input type="number" name="nomor_meja" id="nomor_meja" class="form-control" placeholder="Contoh: 5" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label fw-semibold">Total Harga (Rp)</label>
                        <input type="number" name="total_harga" id="total_harga" class="form-control" placeholder="Contoh: 75000" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">Status Awal</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" selected>Pending (Belum Bayar)</option>
                            <option value="selesai">Selesai (Sudah Bayar)</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success w-100 fw-semibold">Simpan Pesanan</button>
                        <a href="{{ route('order.index') }}" class="btn btn-outline-secondary w-50">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>