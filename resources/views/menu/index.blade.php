<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu Restoran | Premium Emerald Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Tema Hijau Emerald Mewah Sinkron dengan Create */
        body {
            background-color: #f0fdf4; /* Abu-abu kehijauan super soft */
        }
        .text-primary-theme {
            color: #022c22 !important; /* Hijau botol gelap */
        }
        .bg-primary-theme {
            background-color: #022c22 !important;
        }
        .btn-primary-theme {
            background-color: #022c22 !important;
            border-color: #022c22 !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }
        .btn-primary-theme:hover {
            background-color: #064e3b !important; 
            box-shadow: 0 4px 12px rgba(2, 44, 34, 0.2);
        }
        .card-menu {
            border: none;
            border-radius: 16px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(2, 44, 34, 0.1) !important;
        }
        .badge-kategori {
            background-color: #d1fae5 !important;
            color: #065f46 !important; 
            font-weight: 600;
        }
        .badge-tersedia {
            background-color: #e6f4ea !important;
            color: #137333 !important;
        }
        .badge-habis {
            background-color: #fce8e6 !important;
            color: #c5221f !important;
        }
        .price-tag {
            color: #059669; 
            font-weight: 700;
        }
        .btn-edit-theme {
            background-color: #fef08a !important;
            color: #854d0e !important;
            border: none;
        }
        .btn-edit-theme:hover {
            background-color: #fde047 !important;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: var(--cream);">Daftar Menu Restoran</h2>
            <a href="{{ route('menu.create') }}" class="btn btn-outline-primary">+ Tambah Menu Baru</a>
        <div class="d-flex justify-content-between align-items-center mb-5 p-4 bg-white rounded-4 shadow-sm border-start border-success border-4">
            <div>
                <h2 class="fw-bold m-0 text-primary-theme">Daftar Menu Restoran</h2>
                <p class="text-muted small m-0 mt-1">Kelola data kuliner dan foto menu secara real-time</p>
            </div>
            <a href="{{ route('menu.create') }}" class="btn btn-primary-theme px-4 py-2 fw-semibold rounded-3">+ Tambah Menu</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert" style="background-color: #dcfce7; color: #15803d;">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold m-0 text-truncate" style="max-width: 70%; color: var(--cream);">{{ $menu->nama_menu }}</h5>
                            <span class="badge" style="background-color: #6c757d !important; color: #fff;">{{ ucfirst($menu->kategori) }}</span>
                        </div>
                        
                        <p class="card-text small" style="color: #b0a893; min-height: 40px;">
                            {{ $menu->deskripsi ?? 'Tidak ada deskripsi untuk menu ini.' }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="fw-bold m-0" style="color: var(--gold);">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                            <span class="badge" style="background-color: {{ $menu->status == 'tersedia' ? '#198754' : '#dc3545' }} !important; color: #fff;">
                <div class="card card-menu shadow-sm h-100 bg-white">
                    
                    @if($menu->foto)
                        <img src="{{ asset('images/menu/' . $menu->foto) }}" class="card-img-top" alt="{{ $menu->nama_menu }}" style="height: 220px; object-fit: cover;">
                    @else
                        <div class="bg-light text-muted d-flex flex-column align-items-center justify-content-center" style="height: 220px;">
                            <i class="fa-solid fa-bowl-food fa-3x mb-2 text-opacity-20" style="color: #064e3b;"></i>
                            <span class="small text-muted opacity-50">Belum ada foto</span>
                        </div>
                    @endif

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title fw-bold m-0 text-truncate text-primary-theme" style="max-width: 65%;">
                                {{ $menu->nama_menu }}
                            </h5>
                            <span class="badge badge-kategori px-2.5 py-1.5 rounded-3 text-xs">
                                {{ ucfirst($menu->kategori) }}
                            </span>
                        </div>
                        
                        <p class="card-text text-muted small" style="min-height: 45px; line-height: 1.6;">
                            {{ $menu->deskripsi ?? 'Tidak ada deskripsi untuk menu ini.' }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-light">
                            <h5 class="price-tag m-0">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                            <span class="badge {{ $menu->status == 'tersedia' ? 'badge-tersedia' : 'badge-habis' }} px-2.5 py-1.5 rounded-3">
                                {{ ucfirst($menu->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-footer bg-transparent border-top-0 d-flex gap-2 pb-3">
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-warning btn-sm flex-fill">Edit</a>
                    <div class="card-footer bg-transparent border-top-0 d-flex gap-2 px-4 pb-4">
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-edit-theme btn-sm flex-fill py-2 fw-semibold rounded-3 shadow-sm">Edit</a>
                        
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">Hapus</button>
                            <button type="submit" class="btn btn-danger btn-sm w-100 py-2 fw-semibold rounded-3 shadow-sm" style="background-color: #ef4444; border: none;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert" style="background-color: var(--emerald-card); color: var(--cream); border: none; text-align: center;">Belum ada data menu. Silakan tambah menu baru!</div>
                <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
                    <i class="fa-solid fa-folder-open fa-3x mb-3 text-muted"></i>
                    <p class="text-muted m-0 fw-semibold">Belum ada data menu. Silakan tambah menu baru!</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>