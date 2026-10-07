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
        Schema::create('khs', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_khs')->unique();
    $table->string('judul_kontrak');
    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai');
    $table->string('status_kontrak')->default('AKTIF');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
