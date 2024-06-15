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
        Schema::create('liputans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('deskripsi_kegiatan');
            $table->string('lokasi');
            $table->dateTime('waktu');
            $table->string('bukti_liputan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liputans');
    }
};
