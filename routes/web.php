<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganRestoranController; // Pastikan ini ada
use App\Http\Controllers\KaryawanController;         // Pastikan ini ada

// 1. Halaman Utama
// 1. Halaman Utama Website
use App\Http\Controllers\PelangganRestoranController;

// Halaman utama sekarang mengarah ke Dashboard Restoran
Route::get('/', function () {
    return view('dashboard');
});

// 2. Jalur Modul Pelanggan (Punya Kawanmu)
Route::get('/pelanggan', [PelangganRestoranController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/tambah', [PelangganRestoranController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan/simpan', [PelangganRestoranController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganRestoranController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganRestoranController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganRestoranController::class, 'destroy'])->name('pelanggan.destroy');

// 3. Jalur Modul Menu (Punya Pesi)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/tambah', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/simpan', [MenuController::class, 'store'])->name('menu.store');

// 4. Jalur Modul Pesanan Makanan (Punya Pesi - Tanpa Edit & Hapus)
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/tambah', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/simpan', [OrderController::class, 'store'])->name('order.store');
// Route untuk Modul-Modul (Meja dan Menu)
// 2. Modul Meja
Route::resource('meja', MejaController::class);

// 3. Modul Menu
Route::resource('menu', MenuController::class);

// 4. Modul Pelanggan
Route::resource('pelanggan', PelangganRestoranController::class);

// 5. Modul Pesanan
Route::resource('order', OrderController::class);

// 6. Modul Karyawan
Route::resource('karyawan', KaryawanController::class);
