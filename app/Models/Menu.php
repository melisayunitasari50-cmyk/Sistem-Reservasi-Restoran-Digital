<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'menus';

    // Kolom yang diizinkan untuk diisi data (Mass Assignable)
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'status',
        'foto'
    ];
}