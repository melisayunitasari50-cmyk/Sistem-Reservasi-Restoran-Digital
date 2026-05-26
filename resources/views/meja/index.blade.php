<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Meja - Sistem Reservasi Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Meja Restoran (PKG-12-1)</h5>
            <div>
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm fw-bold me-2">
                    <i class="bi bi-house-door"></i> Beranda
                </a>
                <a href="{{ url('/meja/create') }}" class="btn btn-light btn-sm fw-bold">+ Tambah Meja</a>
            </div>
        </div>
        
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nomor Meja</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mejas as $index => $meja)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $meja->nomor_meja }}</td>
                        <td>{{ $meja->kapasitas }} Orang</td>
                        <td>
                            {{-- Menggunakan strtolower untuk mengabaikan sensitivitas huruf besar/kecil --}}
                            @if(strtolower($meja->status) == 'kosong' || strtolower($meja->status) == 'tersedia')
                                <span class="badge bg-success">Kosong</span>
                            @elseif(strtolower($meja->status) == 'terisi')
                                <span class="badge bg-danger">Terisi</span>
                            @elseif(strtolower($meja->status) == 'direservasi' || strtolower($meja->status) == 'reserved')
                                <span class="badge bg-warning text-dark">Direservasi</span>
                            @else
                                <span class="badge bg-secondary">{{ $meja->status }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/meja/'.$meja->id.'/edit') }}" class="btn btn-warning btn-sm text-dark fw-bold">Edit</a>
                            
                            <form action="{{ url('/meja/'.$meja->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus meja ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Belum ada data meja. Silakan klik tombol <strong>+ Tambah Meja</strong> untuk mengisi data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>