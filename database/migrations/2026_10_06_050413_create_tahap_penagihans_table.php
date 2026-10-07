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
        Schema::create('tahap_penagihans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('kr_id')->constrained('krs')->cascadeOnDelete();
    $table->string('nomor_tahap'); // Misal: Tahap 1, Tahap 2
    $table->date('tanggal_pengajuan')->nullable();
    $table->enum('status_penagihan', ['DRAFT', 'DIAJUKAN', 'DICAIRKAN'])->default('DRAFT');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahap_penagihans');
    }
};
