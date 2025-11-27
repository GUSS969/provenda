<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\PenyelenggaraController;
use App\Http\Controllers\admin\UMKMController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\PartisipasiEventController;
use App\Http\Controllers\admin\InteraksiEventController;
use App\Http\Controllers\admin\StatistikPromosiController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\user\UserController;

/*
|--------------------------------------------------------------------------
| PROVENDA - ROUTES CONFIGURATION
|--------------------------------------------------------------------------
| File: routes/web.php
| 
| Struktur Routing:
| 1. USER ROUTES     → / (Public, Tanpa Auth)
| 2. AUTH ROUTES     → /login (Guest Only)
| 3. ADMIN ROUTES    → /admin/* (Protected, Auth Required)
| 4. FALLBACK        → Redirect ke homepage
|
*/

// ============================================================================
// USER ROUTES (Public Website - Tanpa Login)
// ============================================================================
// Prefix: /
// Akses: Semua pengunjung (public)
// Contoh: /, /events, /events/1
// ============================================================================

Route::name('user.')->group(function () {
    // Homepage - Landing page utama
    Route::get('/', [UserController::class, 'index'])->name('home');
    
    // Daftar Event - Browse & filter events
    Route::get('/events', [UserController::class, 'events'])->name('events');
    
    // Detail Event - Info lengkap per event
    Route::get('/events/{id}', [UserController::class, 'showEvent'])->name('event.show');
});

// ============================================================================
// AUTH ROUTES (Login - Guest Only)
// ============================================================================
// Prefix: /
// Akses: Hanya untuk yang belum login
// Redirect: Jika sudah login akan di-redirect
// ============================================================================

// Form Login
Route::get('login', [AuthController::class, 'login'])->name('login');

// Proses Login
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

// ============================================================================
// ADMIN ROUTES (Admin Panel - Protected)
// ============================================================================
// Prefix: /admin
// Akses: Hanya untuk admin yang sudah login
// Middleware: auth
// ============================================================================

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // ------------------------------------------------------------------------
    // DASHBOARD
    // ------------------------------------------------------------------------
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ------------------------------------------------------------------------
    // MASTER DATA MANAGEMENT
    // ------------------------------------------------------------------------
    
    // Event Management
    Route::resource('events', EventController::class);
    
    // Admin Management
    Route::resource('admins', AdminController::class);
    
    // Penyelenggara Management
    Route::resource('penyelenggaras', PenyelenggaraController::class);
    
    // UMKM Management
    Route::resource('umkms', UMKMController::class);
    
    // Produk Management
    Route::resource('produks', ProdukController::class);

    // ------------------------------------------------------------------------
    // EVENT INTERACTION
    // ------------------------------------------------------------------------
    
    // Partisipasi Event
    Route::resource('partisipasi-events', PartisipasiEventController::class);
    
    // Interaksi Event
    Route::resource('interaksi-events', InteraksiEventController::class);

    // ------------------------------------------------------------------------
    // STATISTICS & REPORTS
    // ------------------------------------------------------------------------
    
    // Statistik Promosi
    Route::resource('statistik-promosi', StatistikPromosiController::class);

    // ------------------------------------------------------------------------
    // LOGOUT
    // ------------------------------------------------------------------------
    Route::post('logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    })->name('logout');
});

// ============================================================================
// FALLBACK ROUTE
// ============================================================================
// Handle 404 - Redirect ke homepage
// ============================================================================

Route::fallback(function () {
    return redirect()->route('user.home');
});