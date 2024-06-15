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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 12)->unique();
            $table->tinyInteger('type')->default(0);/* Users: 0=>Member, 1=>Super Admin */
            $table->string('nama');
            $table->string('alamat');
            $table->string('job_desk')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->enum('status',['Aktif','Kurang Aktif'])->default('Aktif');
            $table->string('kelas');
            $table->string('pengalaman');
            $table->string('profile_picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
