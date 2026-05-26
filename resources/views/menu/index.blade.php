<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: var(--cream);">Daftar Menu Restoran</h2>
            <a href="{{ route('menu.create') }}" class="btn btn-outline-primary">+ Tambah Menu Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
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
                                {{ ucfirst($menu->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-footer bg-transparent border-top-0 d-flex gap-2 pb-3">
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-warning btn-sm flex-fill">Edit</a>
                        
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert" style="background-color: var(--emerald-card); color: var(--cream); border: none; text-align: center;">Belum ada data menu. Silakan tambah menu baru!</div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>