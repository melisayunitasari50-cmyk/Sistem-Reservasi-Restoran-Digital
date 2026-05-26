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
        Schema::create('pelanggan_restorans', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pelanggan");
            $table->string("nomor_hp");
            $table->text("catatan_khusus")->nullable();
            $table->timestamps(); //ini akan membuat tanggal daftar otomatis!
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan__restorans');
    }
};
