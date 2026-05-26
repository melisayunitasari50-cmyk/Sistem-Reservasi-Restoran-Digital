<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganRestoranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Route Pelanggan
Route::get('/pelanggan', [PelangganRestoranController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganRestoranController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganRestoranController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganRestoranController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganRestoranController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganRestoranController::class, 'destroy'])->name('pelanggan.destroy');

// Route Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Route Meja
Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');
Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');
Route::get('/meja/{id}/edit', [MejaController::class, 'edit'])->name('meja.edit');
Route::put('/meja/{id}', [MejaController::class, 'update'])->name('meja.update');
Route::delete('/meja/{id}', [MejaController::class, 'destroy'])->name('meja.destroy');

// Route Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// Route Order
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');