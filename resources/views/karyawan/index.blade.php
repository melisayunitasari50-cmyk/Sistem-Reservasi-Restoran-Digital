<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-gold btn-sm">
            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Karyawan</h5>
            <a href="{{ route('karyawan.create') }}" class="btn btn-sm btn-gold">
                <i class="bi bi-plus-lg"></i> Tambah Karyawan
            </a>
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawan as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-center">
                            <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data karyawan.</td>
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