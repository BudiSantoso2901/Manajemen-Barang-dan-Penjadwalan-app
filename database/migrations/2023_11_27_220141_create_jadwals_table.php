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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->dateTime('waktu');
            $table->enum('status', ['Completed', 'Canceled', 'Pending'])->default('Pending');
            $table->string('kondisi_sebelum')->nullable();
            $table->string('kondisi_sesudah')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
