<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // 1. Menentukan nama tabel di database yang terhubung dengan model ini
    protected $table = 'menus';

    // 2. Mendaftarkan kolom apa saja yang boleh diisi data (Mass Assignable)
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'status',
        'foto'
    ];

    // Jika di tabel database kamu nanti TIDAK menggunakan kolom otomatis 'created_at' dan 'updated_at',
    // kamu bisa mengaktifkan baris di bawah ini dengan menghapus tanda hiasan garis miring (//):
    // public $timestamps = false;
}