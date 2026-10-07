<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\KrController;
use App\Http\Controllers\PkController;
use App\Http\Controllers\TahapPenagihanController;
use App\Http\Controllers\ExportZipController;
use App\Http\Controllers\FotoDokumentasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Resource Management User
    Route::resource('users', UserController::class);

    // Route Resource Master KHS
    Route::resource('users', UserController::class);
    Route::resource('khs', KhsController::class);
    Route::resource('kr', KrController::class)->except(['index', 'show']);

    // Route Resource Master Tahap Penagihan
    Route::resource('users', UserController::class);
    Route::resource('khs', KhsController::class);
    Route::resource('kr', KrController::class)->except(['index', 'show']);
    Route::resource('tahap', TahapPenagihanController::class);
    Route::resource('pk', PkController::class);

    // Route Upload & Hapus Foto
    Route::post('/pk/{pk}/foto', [FotoDokumentasiController::class, 'store'])->name('foto.store');
    Route::delete('/foto/{foto}', [FotoDokumentasiController::class, 'destroy'])->name('foto.destroy');

    // Route Export ZIP
    Route::get('/tahap/{tahap}/export', [ExportZipController::class, 'download'])->name('tahap.export');
});

require __DIR__.'/auth.php';