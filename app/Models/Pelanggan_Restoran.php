<?php

namespace App\Models; // Ini penting agar Laravel tahu lokasinya

use Illuminate\Database\Eloquent\Model; // Ini untuk menghubungkan ke database

class Pelanggan_Restoran extends Model
{
    // Tambahkan ini agar Laravel tahu persis tabel mana yang dipakai
    protected $table = 'pelanggan_restorans';
    // Tambahkan ini agar data bisa tersimpan (Mass Assignment)
    protected $fillable = ['nama_pelanggan', 'nomor_hp', 'catatan_khusus'];
}