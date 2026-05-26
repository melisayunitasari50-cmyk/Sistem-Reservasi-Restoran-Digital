<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis (Primary Key)
            $table->string('nama_menu', 150); // Kolom untuk nama makanan/minuman
            $table->enum('kategori', ['makanan', 'minuman', 'snack']); // Kolom pilihan kategori
            $table->integer('harga'); // Kolom untuk harga rupiah
            $table->text('deskripsi')->nullable(); // Kolom deskripsi (nullable = boleh kosong)
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia'); // Status stok menu
            $table->string('foto')->nullable(); // Kolom nama file gambar/foto menu (boleh kosong)
            $table->timestamps(); // Kolom otomatis 'created_at' dan 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};