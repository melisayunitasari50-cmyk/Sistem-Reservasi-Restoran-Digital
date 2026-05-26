<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Pelanggan Restoran</h5>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-light">➕ Tambah Pelanggan Baru</a>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor HP</th>
                        <th>Catatan Khusus</th> 
                        <th>Tanggal Bergabung</th> 
                        <th width="15%">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($pelanggan as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td>{{ $p->nomor_hp }}</td>
                            <td>{{ $p->catatan_khusus ?? '-' }}</td> 
                            <td>{{ $p->created_at ? $p->created_at->format('d-m-Y H:i') : '-' }}</td> 
                            <td> <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
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

</body>
</html>