<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Baru | Premium Emerald Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Tema Hijau Emerald Mewah sesuai foto Pesi */
        body {
            background-color: #022c22; /* Hijau botol super gelap */
            background-image: radial-gradient(circle at top right, #064e3b, transparent);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: 20px 0;
        }

        .card-luxury {
            background: rgba(6, 78, 59, 0.4); /* Transparan kaca hijau */
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            overflow: hidden;
        }

        .card-header-luxury {
            background: linear-gradient(135deg, #022c22 0%, #064e3b 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px;
        }

        .form-label {
            color: #a7f3d0; /* Hijau muda soft */
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control, .form-select {
            background-color: rgba(2, 44, 34, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #f8fafc !important;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(2, 44, 34, 0.9) !important;
            border-color: #10b981; /* Glow hijau terang */
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.25);
        }

        .form-control::placeholder {
            color: #047857; /* Placeholder hijau lumut */
        }

        /* Warna Emas/Amber premium untuk tombol simpan utama */
        .btn-gold {
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
            border: none;
            color: #022c22;
            font-weight: 700;
            padding: 14px 30px;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(217, 119, 6, 0.4);
            color: #000;
        }

        .btn-outline-cancel {
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #6ee7b7;
            font-weight: 600;
            padding: 14px 30px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-outline-cancel:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #f8fafc;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            background: rgba(16, 185, 129, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #34d399;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-luxury shadow-2xl">
                    <div class="card-header-luxury d-flex align-items-center">
                        <div class="icon-box">
                            <i class="fa-solid fa-mortar-pestle"></i>
                        </div>
                        <div>
                            <h4 class="m-0 text-white fw-bold">Tambah Menu Baru</h4>
                            <p class="m-0 small opacity-75" style="color: #6ee7b7;">Racik dan data sajian terbaik restoran anda</p>
                        </div>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="nama_menu" class="form-label"><i class="fa-solid fa-utensils me-2"></i>Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" required placeholder="Contoh: Nasi Goreng">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="kategori" class="form-label"><i class="fa-solid fa-tags me-2"></i>Kategori</label>
                                    <select class="form-select" id="kategori" name="kategori" required>
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        <option value="makanan">Makanan</option>
                                        <option value="minuman">Minuman</option>
                                        <option value="snack">Snack</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="harga" class="form-label"><i class="fa-solid fa-money-bill-wave me-2"></i>Harga (Rp)</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required placeholder="Contoh: 15000">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="foto" class="form-label"><i class="fa-solid fa-image me-2"></i>Foto Menu Kuliner</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi" class="form-label"><i class="fa-solid fa-pen-fancy me-2"></i>Deskripsi (Opsional)</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Penjelasan singkat mengenai menu..."></textarea>
                            </div>

                            <div class="d-flex flex-column flex-md-row gap-3 mt-5">
                                <button type="submit" class="btn btn-gold flex-grow-1">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Menu
                                </button>
                                <a href="{{ route('menu.index') }}" class="btn btn-outline-cancel text-decoration-none text-center">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>