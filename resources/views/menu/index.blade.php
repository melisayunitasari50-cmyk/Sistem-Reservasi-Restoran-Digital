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
        /* Mengunci background gelap terdalam agar mempertajam efek HD */
        html, body {
            background-color: #011c16 !important;
            color: #ffffff !important;
            font-family: 'Segoe UI', Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* Header Box dengan konsep HD Glassmorphism */
        .header-box-custom {
            background-color: #04392e !important;
            border: 1px solid rgba(52, 211, 153, 0.15) !important;
            border-radius: 14px !important;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.05) !important;
        }

        /* Tombol Tambah Menu Premium Gradient */
        .btn-add-custom {
            background: linear-gradient(135deg, #fef08a, #fde047) !important;
            color: #713f12 !important;
            font-weight: 600;
            border: none !important;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(253, 224, 71, 0.15);
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-add-custom:hover {
            background: linear-gradient(135deg, #fde047, #facc15) !important;
            box-shadow: 0 4px 16px rgba(253, 224, 71, 0.35);
            transform: translateY(-1px);
            color: #713f12 !important;
        }

        .text-primary-theme {
            color: #ffffff !important;
        }
        
        /* Card Menu ringkas & compact */
        .card-menu {
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            transition: all 0.3s ease;
            overflow: hidden;
            background-color: #04392e !important;
        }
        .card-menu:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4) !important;
        }

        /* Ukuran foto proporsional */
        .img-menu-wrapper {
            height: 160px; 
            overflow: hidden;
            width: 100%;
        }
        .img-menu-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-kategori {
            background-color: #d1fae5 !important;
            color: #065f46 !important; 
            font-weight: 600;
            font-size: 0.75rem;
        }
        .badge-tersedia {
            background-color: #e6f4ea !important;
            color: #137333 !important;
            font-size: 0.75rem;
        }
        .badge-habis {
            background-color: #fce8e6 !important;
            color: #c5221f !important;
            font-size: 0.75rem;
        }
        .price-tag {
            color: #34d399 !important;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .btn-edit-theme {
            background-color: #fef08a !important;
            color: #854d0e !important;
            border: none !important;
        }
        .btn-edit-theme:hover {
            background-color: #fde047 !important;
            color: #854d0e !important;
        }

        /* Jarak peletakan kontainer alert */
        .alert-container-box {
            position: relative;
            width: 100%;
            height: 20px; 
            margin-bottom: 0.5rem !important; 
        }

        /* Posisi melayang alert */
        .smooth-fly-alert {
            position: absolute !important;
            top: -10px; 
            left: 0;
            width: 100%;
            z-index: 999;
            opacity: 1;
            transform: translateY(0);
            transition: transform 0.6s cubic-bezier(0.55, 0.055, 0.675, 0.19), opacity 0.5s ease-out !important;
        }

        /* Class pemicu terbang ke atas & menghilang halus */
        .smooth-fly-alert.fly-away {
            opacity: 0 !important;
            transform: translateY(-50px) !important;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 header-box-custom">
            <div class="d-flex align-items-center">
                <div class="p-2.5 rounded-3 me-3" style="background-color: rgba(52, 211, 153, 0.1); border: 1px solid rgba(52, 211, 153, 0.15);">
                    <i class="fa-solid fa-utensils fa-xl text-warning"></i>
                </div>
                <h2 class="fw-bold m-0 text-white" style="letter-spacing: 0.8px;">Daftar Menu Restoran</h2>
            </div>
            <a href="{{ route('menu.create') }}" class="btn btn-add-custom px-4 py-2 fw-semibold shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Tambah Menu
            </a>
        </div>

        <div class="alert-container-box">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible border-0 rounded-3 p-3 smooth-fly-alert" 
                     role="alert" 
                     style="background-color: #dcfce7 !important; color: #15803d !important;">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="row">
            @forelse($menus as $menu)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card card-menu h-100">
                        
                        <div class="img-menu-wrapper">
                            @if($menu->foto)
                                <img src="{{ asset('images/menu/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}">
                            @else
                                <div class="bg-dark text-muted d-flex flex-column align-items-center justify-content-center h-100">
                                    <i class="fa-solid fa-bowl-food fa-xl mb-1 opacity-50"></i>
                                    <span class="small opacity-50" style="font-size: 0.75rem;">Belum ada foto</span>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="card-title fw-bold m-0 text-truncate text-white" style="max-width: 60%;" title="{{ $menu->nama_menu }}">
                                    {{ $menu->nama_menu }}
                                </h6>
                                <span class="badge badge-kategori px-2 py-1 rounded-2">
                                    {{ ucfirst($menu->kategori) }}
                                </span>
                            </div>
                            
                            <p class="card-text text-white-50 small mb-3" style="min-height: 36px; line-height: 1.5; font-size: 0.8rem;">
                                {{ $menu->deskripsi ?? 'Tidak ada deskripsi menu.' }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-secondary">
                                <h6 class="price-tag m-0">
                                    Rp {{ number_format($menu->harga < 1000 ? $menu->harga * 1000 : $menu->harga, 0, ',', '.') }}
                                </h6>
                                
                                @if($menu->status == 'tersedia')
                                    <span class="badge badge-tersedia px-2 py-1 rounded-2">Tersedia</span>
                                @else
                                    <span class="badge badge-habis px-2 py-1 rounded-2">Habis</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="card-footer bg-transparent border-top-0 d-flex gap-2 px-3 pb-3">
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-edit-theme btn-sm flex-fill py-1.5 fw-semibold rounded-2 shadow-sm" style="font-size: 0.85rem;">Edit</a>
                            
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100 py-1.5 fw-semibold rounded-2 shadow-sm" style="background-color: #ef4444; border: none !important; color: #fff !important; font-size: 0.85rem;">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center" style="background-color: #04392e; border: 1px solid rgba(255,255,255,0.05) !important;">
                        <i class="fa-solid fa-folder-open fa-3x mb-3 text-white-50"></i>
                        <p class="text-white-50 m-0 fw-semibold">Belum ada data menu. Silakan tambah menu baru!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.querySelector('.smooth-fly-alert');
            if (alertElement) {
                setTimeout(function() {
                    alertElement.classList.add('fly-away');
                    setTimeout(function() {
                        alertElement.remove();
                    }, 600); 
                }, 1000); 
            }
        });
    </script>
</body>
</html>