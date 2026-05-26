<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
<<<<<<< HEAD
use App\Http\Controllers\OrderController;

// 1. Halaman Utama Website
=======
use App\Http\Controllers\PelangganRestoranController;

// Halaman utama sekarang mengarah ke Dashboard Restoran
>>>>>>> 8cc7fbf0915b5fc3028a93d0e1f2396c41d82ef4
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
Route::resource('meja', MejaController::class);
Route::resource('menu', MenuController::class);

// Jalur untuk pelanggan
Route::resource('pelanggan', PelangganRestoranController::class);
