<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Restoran | Premium Emerald Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Mengunci background utama sesuai tema hijau gelap kamu */
        html, body {
            background-color: #01231b !important;
            color: #ffffff !important;
        }

        /* Card container form dibuat hijau emerald pekat */
        .card-form-custom {
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 16px !important;
            background-color: #04392e !important;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4) !important;
            overflow: hidden;
        }

        /* Header diubah jadi emas tua gelap agar teks putihnya nampak jelas & mewah */
        .header-form-custom {
            background-color: #b45309 !important; 
            color: #ffffff !important; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Mengubah kolom input text, dropdown, dan textarea jadi gelap */
        .form-control, .form-select {
            background-color: #022c22 !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            border-radius: 8px !important;
        }
        
        /* Efek saat kolom input diklik */
        .form-control:focus, .form-select:focus {
            background-color: #022c22 !important;
            border-color: #34d399 !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(52, 211, 153, 0.25) !important;
        }

        /* FIX: Menyalakan & menebalkan tanda panah dropdown select menjadi putih terang */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
            background-size: 14px 14px !important;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
        }

        /* Tombol Simpan Perubahan */
        .btn-submit-custom {
            background-color: #34d399 !important;
            color: #022c22 !important;
            font-weight: 600;
            border: none !important;
            transition: all 0.3s ease;
        }
        .btn-submit-custom:hover {
            background-color: #059669 !important;
            color: #ffffff !important;
        }

        /* Tombol Batal */
        .btn-cancel-custom {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }
        .btn-cancel-custom:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body>

    <div class="container my-5 d-flex justify-content-center">
        <div class="card card-form-custom w-100" style="max-width: 600px;">
            
            <div class="header-form-custom p-3 text-center">
                <h4 class="m-0 fw-bold"><i class="fa-solid fa-pen-to-square me-2"></i>Form Edit Menu</h4>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="makanan" {{ old('kategori', $menu->kategori) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ old('kategori', $menu->kategori) == 'minuman' ? 'selected' : '' }}>Minuman</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $menu->harga < 1000 ? $menu->harga * 1000 : $menu->harga) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Stok</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="tersedia" {{ old('status', $menu->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="habis" {{ old('status', $menu->status) == 'habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label">Ganti Foto Menu (Opsional)</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        @if($menu->foto)
                            <div class="text-white-50 mt-1" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-image me-1 text-warning"></i> Foto saat ini: <span class="text-warning fw-semibold">{{ $menu->foto }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-submit-custom flex-fill py-2">Simpan Perubahan</button>
                        <a href="{{ route('menu.index') }}" class="btn btn-cancel-custom flex-fill py-2 text-center">Batal</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>