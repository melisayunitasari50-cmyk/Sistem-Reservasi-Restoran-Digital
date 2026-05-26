<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // 1. Menentukan nama tabel di database (opsional, Laravel otomatis mendeteksi jamak/plural 'orders')
    protected $table = 'orders';

    // 2. Mendaftarkan kolom yang boleh diisi massal (Mass Assignment)
    protected $fillable = [
        'nama_pelanggan',
        'nomor_meja',
        'total_harga',
        'status',
    ];
}