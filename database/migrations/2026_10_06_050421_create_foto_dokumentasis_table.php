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
        Schema::create('foto_dokumentasis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pk_id')->constrained('pks')->cascadeOnDelete();
    $table->foreignId('uploader_id')->constrained('users')->cascadeOnDelete();
    $table->string('file_path_url');
    $table->decimal('latitude', 10, 8)->nullable();
    $table->decimal('longitude', 11, 8)->nullable();
    $table->timestamp('timestamp_exif')->nullable();
    $table->enum('status_verifikasi', ['PENDING', 'VALID', 'INVALID'])->default('PENDING');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_dokumentasis');
    }
};
