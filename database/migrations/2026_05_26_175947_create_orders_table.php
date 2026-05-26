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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan'); // Menambahkan kolom nama pelanggan
            $table->integer('nomor_meja');     // Menambahkan kolom nomor meja
            $table->decimal('total_harga', 10, 2); // Menambahkan kolom total harga (bisa menampung nominal besar)
            $table->string('status')->default('pending'); // Menambahkan kolom status pesanan (default-nya pending)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};