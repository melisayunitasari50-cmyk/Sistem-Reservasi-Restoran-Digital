<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-gold btn-sm">
            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
        </a>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Pelanggan Restoran</h5>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-gold">
                <i class="bi bi-plus-lg"></i> Tambah Pelanggan Baru
            </a>
        </div>
        <div class="card-body">

            <form action="{{ route('pelanggan.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Cari nama atau nomor HP..." 
                           value="{{ $search ?? '' }}">
                    <button type="submit" class="btn btn-gold">Cari</button>
                    @if(isset($search) && $search)
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </form>

            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor HP</th>
                        <th>Catatan Khusus</th> 
                        <th>Tanggal Bergabung</th> 
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggan as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td>{{ $p->nomor_hp }}</td>
                            <td>{{ $p->catatan_khusus ?? '-' }}</td> 
                            <td>{{ $p->created_at ? $p->created_at->format('d-m-Y H:i') : '-' }}</td> 
                            <td> 
                                <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data pelanggan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        var alertElement = document.getElementById('success-alert');
        if (alertElement) {
            var alert = new bootstrap.Alert(alertElement);
            alert.close();
        }
    }, 3000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>