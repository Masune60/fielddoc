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
        Schema::create('pks', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tahap_id')->nullable()->constrained('tahap_penagihans')->nullOnDelete();
    $table->string('nomor_pk')->unique();
    $table->string('nama_pekerjaan');
    $table->decimal('nilai_pekerjaan', 15, 2)->default(0);
    $table->enum('status_konstruksi', ['PROSES', 'SELESAI_100'])->default('PROSES');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pks');
    }
};
