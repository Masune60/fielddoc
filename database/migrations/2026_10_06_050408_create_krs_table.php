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
        Schema::create('krs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('khs_id')->constrained('khs')->cascadeOnDelete();
    $table->string('nomor_kr')->unique();
    $table->text('spesifikasi_teknis')->nullable();
    $table->text('syarat_apd_k3')->nullable();
    $table->text('standar_material')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
