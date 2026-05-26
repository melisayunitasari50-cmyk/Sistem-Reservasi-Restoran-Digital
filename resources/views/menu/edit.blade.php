<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="card-title m-0 fw-bold">Form Edit Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label for="nama_menu" class="form-label fw-bold">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-bold">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="makanan" {{ $menu->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ $menu->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="snack" {{ $menu->kategori == 'snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $menu->harga }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status Stok</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="tersedia" {{ $menu->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="habis" {{ $menu->status == 'habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $menu->deskripsi }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning px-4">Simpan Perubahan</button>
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>