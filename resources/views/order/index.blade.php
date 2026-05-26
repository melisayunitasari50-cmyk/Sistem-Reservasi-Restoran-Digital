<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">📋 Daftar Pesanan Masuk</h2>
            <a href="{{ route('order.create') }}" class="btn btn-primary fw-semibold">+ Buat Pesanan Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Meja</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th class="pe-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $index => $order)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $index + 1 }}</td>
                                <td class="fw-bold text-secondary">{{ $order->nama_pelanggan }}</td>
                                <td><span class="badge bg-info text-dark">Meja {{ $order->nomor_meja }}</span></td>
                                <td class="text-success fw-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning text-dark text-capitalize">{{ $order->status }}</span>
                                    @elseif($order->status == 'selesai')
                                        <span class="badge bg-success text-capitalize">{{ $order->status }}</span>
                                    @else
                                        <span class="badge bg-secondary text-capitalize">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-center">
                                    <button class="btn btn-sm btn-outline-dark">Detail</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <p class="mb-0 fs-5">Belum ada pesanan masuk saat ini.</p>
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