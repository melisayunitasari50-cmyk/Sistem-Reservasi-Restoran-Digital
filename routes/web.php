<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganRestoranController;

Route::get('/', function () {
    return view('welcome');
});

// Jalur untuk menampilkan data (Read)
Route::get('/pelanggan', [PelangganRestoranController::class, 'index'])->name('pelanggan.index');

// Jalur untuk menampilkan form tambah data (Create)
Route::get('/pelanggan/tambah', [PelangganRestoranController::class, 'create'])->name('pelanggan.create');

// Jalur untuk menyimpan data yang dikirim dari form (Store)
Route::post('/pelanggan/simpan', [PelangganRestoranController::class, 'store'])->name('pelanggan.store');

// Jalur untuk Edit, Update, dan Hapus (Sudah diberi nama agar tidak error lagi)
Route::get('/pelanggan/{id}/edit', [PelangganRestoranController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganRestoranController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganRestoranController::class, 'destroy'])->name('pelanggan.destroy');