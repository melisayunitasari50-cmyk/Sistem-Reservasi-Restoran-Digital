<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Restoran | Premium Emerald Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Mengunci background emerald gelap terdalam agar terlihat tajam/HD */
        html, body {
            background-color: #011c16 !important;
            color: #ffffff !important;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* Styling Kartu Tabel Premium Modern (Efek HD Glass) */
        .card-table-custom {
            border: 1px solid rgba(52, 211, 153, 0.15) !important; /* Border tipis menyala halus */
            border-radius: 14px !important;
            background-color: #04392e !important; 
            overflow: hidden;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.05) !important;
        }

        .table-custom {
            color: #ffffff !important;
            margin-bottom: 0 !important;
            background-color: transparent !important;
        }

        /* Memastikan baris tabel mengikuti warna dasar kartu */
        .table-custom tr, .table-custom td, .table-custom th {
            background-color: transparent !important;
        }

        /* Desain Kepala Tabel Mewah Muted */
        .table-custom thead {
            background-color: #02261f !important;
        }

        .table-custom th {
            color: rgba(255, 255, 255, 0.7) !important; /* Putih soft mutiara tidak nabrak */
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1.2px;
            border-bottom: 2px solid rgba(52, 211, 153, 0.2) !important;
            padding: 18px 12px !important;
        }

        .table-custom td {
            padding: 16px 12px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04) !important;
            color: #ffffff !important;
            font-size: 0.95rem;
        }

        /* Efek Hover Baris dengan Efek Glow Lembut */
        .table-custom tbody tr {
            transition: background-color 0.2s ease;
        }
        .table-custom tbody tr:hover td {
            background-color: rgba(52, 211, 153, 0.05) !important;
        }

        /* Badge Nomor Meja */
        .badge-meja-custom {
            background-color: rgba(59, 130, 246, 0.15) !important;
            color: #93c5fd !important;
            border: 1px solid rgba(59, 130, 246, 0.3) !important;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 6px;
        }

        /* Badge Status Premium */
        .badge-status-pending {
            background-color: rgba(245, 158, 11, 0.15) !important;
            color: #fcd34d !important;
            border: 1px solid rgba(245, 158, 11, 0.3) !important;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 6px;
        }

        .badge-status-selesai {
            background-color: rgba(16, 185, 129, 0.15) !important;
            color: #6ee7b7 !important;
            border: 1px solid rgba(16, 185, 129, 0.3) !important;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 6px;
        }

        /* Custom Tombol Detail Premium */
        .btn-detail-custom {
            background: linear-gradient(135deg, #fef08a, #fde047) !important;
            color: #713f12 !important;
            font-weight: 600;
            border: none !important;
            border-radius: 6px;
            padding: 6px 16px;
            box-shadow: 0 4px 12px rgba(253, 224, 71, 0.15);
            transition: all 0.2s ease-in-out;
        }
        .btn-detail-custom:hover {
            background: linear-gradient(135deg, #fde047, #facc15) !important;
            box-shadow: 0 4px 16px rgba(253, 224, 71, 0.35);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 p-2">
            <div class="d-flex align-items-center">
                <div class="p-2.5 rounded-3 me-3" style="background-color: rgba(255, 193, 7, 0.1); border: 1px solid rgba(255, 193, 7, 0.15);">
                    <i class="fa-solid fa-clipboard-list fa-xl text-warning"></i>
                </div>
                <h2 class="fw-bold m-0 text-white" style="letter-spacing: 0.8px;">Daftar Pesanan Masuk</h2>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible border-0 rounded-3 p-3 mb-4" 
                 style="background-color: rgba(16, 185, 129, 0.15) !important; color: #34d399 !important; border: 1px solid rgba(16, 185, 129, 0.2) !important;">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card card-table-custom">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4 text-center" style="width: 80px;">No</th>
                                <th>Nama Pelanggan</th>
                                <th>No. Meja</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th class="pe-4 text-center" style="width: 130px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $index => $order)
                                <tr>
                                    <td class="ps-4 text-center fw-semibold text-white-50">{{ $index + 1 }}</td>
                                    <td class="fw-bold text-white">{{ $order->nama_pelanggan }}</td>
                                    <td>
                                        <span class="badge-meja-custom">
                                            <i class="fa-solid fa-chair me-1" style="font-size: 0.8rem;"></i> Meja {{ $order->nomor_meja }}
                                        </span>
                                    </td>
                                    <td class="fw-bold" style="color: #34d399 !important;">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge-status-pending text-capitalize">
                                                <i class="fa-solid fa-clock me-1"></i> {{ $order->status }}
                                            </span>
                                        @elseif($order->status == 'selesai')
                                            <span class="badge-status-selesai text-capitalize">
                                                <i class="fa-solid fa-circle-check me-1"></i> {{ $order->status }}
                                            </span>
                                        @else
                                            <span class="badge text-capitalize" style="background-color: rgba(255,255,255,0.08) !important; color: #e2e8f0 !important; padding: 5px 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.15);">
                                                {{ $order->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pe-4 text-center">
                                        <button class="btn btn-sm btn-detail-custom">
                                            <i class="fa-solid fa-eye me-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-white-50">
                                        <i class="fa-solid fa-bowl-rice fa-3x mb-3 opacity-25" style="color: #34d399;"></i>
                                        <p class="mb-0 fs-5 fw-semibold opacity-50">Belum ada pesanan masuk saat ini.</p>
                                    </td>
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