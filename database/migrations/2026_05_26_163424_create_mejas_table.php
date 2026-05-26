<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mejas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_meja');
            $table->integer('kapasitas');
            // Kita ubah menjadi string biasa agar bebas menampung status apa saja
            $table->string('status'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mejas');
    }
};