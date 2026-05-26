<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    // Daftarkan nama kolom database yang boleh diisi lewat form
    protected $fillable = [
        'nomor_meja',
        'kapasitas',
        'status'
    ];
}