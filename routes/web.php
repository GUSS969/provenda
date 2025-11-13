<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// =====================
// HALAMAN DEPAN
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');

// =====================
// ADMIN AUTH (LOGIN TEMPLATE)
// =====================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =====================
// ADMIN PANEL (Protected Area)
// =====================
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/event', [AdminController::class, 'event'])->name('admin.event.index');
    Route::get('/promosi', [AdminController::class, 'promosi'])->name('admin.promo.index');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.user.index');
    Route::get('/komentar', [AdminController::class, 'komentar'])->name('admin.komentar.index');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.settings');
});
