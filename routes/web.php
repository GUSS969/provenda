<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// =====================
// ADMIN PANEL ROUTES
// =====================
Route::prefix('admin')->group(function () {

    // Dashboard utama
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Manajemen Event
    Route::get('/event', [AdminController::class, 'event'])->name('admin.event.index');

    // Manajemen Promosi
    Route::get('/promosi', [AdminController::class, 'promosi'])->name('admin.promo.index');

    // Data Pengguna
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.user.index');

    // Komentar & Ulasan
    Route::get('/komentar', [AdminController::class, 'komentar'])->name('admin.komentar.index');

    // Laporan & Statistik
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');

    // Pengaturan
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.settings');
});
