<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi Restoran Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" style="color: var(--gold);" href="{{ url('/') }}">
                <i class="bi bi-shop-window me-2"></i>RestoDigital
            </a>
            <span class="navbar-text text-white-50 small d-none d-sm-block">
                Sistem Reservasi Restoran Digital v1.0
            </span>
        </div>
    </nav>

    <div class="text-white py-5 shadow-sm mb-5 text-center" style="background-color: var(--emerald-card);">
        <div class="container py-3">
            <h1 class="display-5 fw-bold mb-2">Selamat Datang di Sistem Restoran</h1>
            <p class="lead mb-0" style="color: var(--cream);">Kelola operasional dan layanan restoran digital Anda secara terintegrasi melalui satu dashboard.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center mb-4">
            <div class="col-10 text-center">
                <h4 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px; color: var(--gold);">Daftar Komponen Modul Sistem</h4>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle p-3 mx-auto mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--emerald-dark); color: var(--gold);">
                            <i class="bi bi-table fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">Modul Meja</h5>
                        <p class="card-text small">Kelola data fisik meja restoran, kapasitas, serta status ketersediaan.</p>
                        <a href="{{ url('/meja') }}" class="btn btn-outline-success btn-sm w-100 mt-2 fw-bold">Buka Modul</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle p-3 mx-auto mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--emerald-dark); color: var(--gold);">
                            <i class="bi bi-journal-text fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">Modul Menu</h5>
                        <p class="card-text small">Manajemen master data hidangan makanan, minuman, harga, dan ketersediaan.</p>
                        <a href="{{ url('/menu') }}" class="btn btn-outline-primary btn-sm w-100 mt-2 fw-bold">Buka Modul</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle p-3 mx-auto mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--emerald-dark); color: var(--gold);">
                            <i class="bi bi-people fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">Modul Pelanggan</h5>
                        <p class="card-text small">Pencatatan database keanggotaan pelanggan dan histori kunjungan.</p>
                        <a href="{{ url('/pelanggan') }}" class="btn btn-outline-warning btn-sm w-100 mt-2 fw-bold">Buka Modul</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle p-3 mx-auto mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--emerald-dark); color: var(--gold);">
                            <i class="bi bi-cart-check fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">Modul Pesanan</h5>
                        <p class="card-text small">Transaksi reservasi pemesanan meja dan pesanan menu hidangan.</p>
                        <a href="{{ url('/order') }}" class="btn btn-outline-danger btn-sm w-100 mt-2 fw-bold">Buka Modul</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle p-3 mx-auto mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--emerald-dark); color: var(--gold);">
                            <i class="bi bi-person-badge fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">Modul Karyawan</h5>
                        <p class="card-text small">Pengelolaan otorisasi akun staf serta penugasan pelayanan meja.</p>
                        <a href="{{ url('/karyawan') }}" class="btn btn-outline-info btn-sm w-100 mt-2 fw-bold">Buka Modul</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-white border-top text-center py-3 fixed-bottom d-none d-md-block">
        <p class="mb-0 text-muted small">&copy; 2026 Tugas Besar PPL - Sistem Reservasi Restoran Digital.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>