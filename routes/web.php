<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;

// Halaman utama sekarang mengarah ke Dashboard Restoran
Route::get('/', function () {
    return view('dashboard');
});

// Route untuk Modul-Modul (Meja dan Menu)
Route::resource('meja', MejaController::class);
Route::resource('menu', MenuController::class);