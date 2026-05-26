<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganRestoranController; // Pastikan ini ada
use App\Http\Controllers\KaryawanController;         // Pastikan ini ada

// 1. Halaman Utama
Route::get('/', function () {
    return view('dashboard');
});

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