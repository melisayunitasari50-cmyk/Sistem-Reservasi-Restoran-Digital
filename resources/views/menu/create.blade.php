<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title m-0 fw-bold">Form Tambah Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label fw-bold">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" required placeholder="Contoh: Nasi Goreng">
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-bold">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" required placeholder="Contoh: 15000">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Penjelasan singkat mengenai menu..."></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">Simpan Menu</button>
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>