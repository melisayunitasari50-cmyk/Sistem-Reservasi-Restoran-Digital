<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Meja - Sistem Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">

    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-gold btn-sm px-3">
            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="card shadow-lg border-0 bg-dark-emerald text-white">
        <div class="card-header border-0 bg-transparent d-flex justify-content-between align-items-center pt-4 px-4">
            <h3 class="fw-bold mb-0 text-gold">Daftar Meja Restoran</h3>
            <a href="{{ route('meja.create') }}" class="btn btn-gold btn-sm fw-bold">
                <i class="bi bi-plus-lg"></i> Tambah Meja
            </a>
        </div>
        
        <div class="card-body p-4">
            
            {{-- Alert Berhasil (Diperbaiki agar teks berwarna hitam dan tebal) --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0" role="alert" 
                     style="background-color: #d1e7dd;">
                    <span class="text-dark fw-bold">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover mt-2 align-middle" style="color: #eee;">
                    <thead style="background-color: #1a1a1a; color: #d1b464;">
                        <tr>
                            <th width="5%" class="text-center py-3">No</th>
                            <th>Nomor Meja</th>
                            <th>Kapasitas</th>
                            <th class="text-center">Status</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mejas as $index => $meja)
                        <tr class="border-secondary">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $meja->nomor_meja }}</td>
                            <td>{{ $meja->kapasitas }} Orang</td>
                            <td class="text-center">
                                @if(strtolower($meja->status) == 'kosong' || strtolower($meja->status) == 'tersedia')
                                    <span class="badge bg-success px-3 py-2">Kosong</span>
                                @elseif(strtolower($meja->status) == 'terisi')
                                    <span class="badge bg-danger px-3 py-2">Terisi</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">Direservasi</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('meja.edit', $meja->id) }}" class="btn btn-sm btn-warning fw-bold shadow-sm">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('meja.destroy', $meja->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus meja ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger fw-bold shadow-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">Belum ada data meja.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>