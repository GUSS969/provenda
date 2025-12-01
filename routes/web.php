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
use App\Http\Controllers\penyelenggara\AuthController as PenyelenggaraAuth;
use App\Http\Controllers\penyelenggara\DashboardController as PenyelenggaraDashboard;

/*
|--------------------------------------------------------------------------
| PROVENDA - ROUTES CONFIGURATION
|--------------------------------------------------------------------------
| File: routes/web.php
| 
| Struktur Routing:
| 1. USER ROUTES               → / (Public, Tanpa Auth)
| 2. AUTH ROUTES (ADMIN)       → /login (Guest Only)
| 3. ADMIN ROUTES              → /admin/* (Protected, Auth Required)
| 4. AUTH ROUTES (PENYELENGGARA) → /penyelenggara/login (Guest Only)
| 5. PENYELENGGARA ROUTES      → /penyelenggara/* (Protected, Session Auth)
| 6. FALLBACK                  → Redirect ke homepage
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
// AUTH ROUTES - ADMIN (Login - Guest Only)
// ============================================================================
// Prefix: /
// Akses: Hanya untuk yang belum login
// Redirect: Jika sudah login akan di-redirect
// ============================================================================

// Form Login Admin
Route::get('login', [AuthController::class, 'login'])->name('login');

// Proses Login Admin
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
// AUTH ROUTES - PENYELENGGARA (Login - Guest Only)
// ============================================================================
// Prefix: /penyelenggara
// Akses: Hanya untuk yang belum login (guest)
// Redirect: Jika sudah login akan di-redirect ke dashboard
// ============================================================================

Route::prefix('penyelenggara')->name('penyelenggara.')->group(function () {
    
    // ------------------------------------------------------------------------
    // LOGIN PENYELENGGARA
    // ------------------------------------------------------------------------
    // URL: /penyelenggara/login (GET)
    // Controller: penyelenggara\AuthController@showLoginForm
    // ------------------------------------------------------------------------
    Route::get('login', [PenyelenggaraAuth::class, 'showLoginForm'])->name('login');
    
    // ------------------------------------------------------------------------
    // PROSES LOGIN PENYELENGGARA
    // ------------------------------------------------------------------------
    // URL: /penyelenggara/login (POST)
    // Controller: penyelenggara\AuthController@login
    // ------------------------------------------------------------------------
    Route::post('login', [PenyelenggaraAuth::class, 'login'])->name('login.submit');
});

// ============================================================================
// PENYELENGGARA ROUTES (Dashboard - Protected)
// ============================================================================
// Prefix: /penyelenggara
// Akses: Hanya untuk penyelenggara yang sudah login
// Middleware: penyelenggara.auth (Session-based)
// ============================================================================

Route::prefix('penyelenggara')->name('penyelenggara.')->middleware('penyelenggara.auth')->group(function () {
    
    // ------------------------------------------------------------------------
    // DASHBOARD PENYELENGGARA
    // ------------------------------------------------------------------------
    // URL: /penyelenggara/dashboard
    // Controller: penyelenggara\DashboardController@index
    // ------------------------------------------------------------------------
    Route::get('dashboard', [PenyelenggaraDashboard::class, 'index'])->name('dashboard');
    
    // ------------------------------------------------------------------------
    // LOGOUT PENYELENGGARA
    // ------------------------------------------------------------------------
    // URL: /penyelenggara/logout (POST)
    // Controller: penyelenggara\AuthController@logout
    // ------------------------------------------------------------------------
    Route::post('logout', [PenyelenggaraAuth::class, 'logout'])->name('logout');
    
    // ------------------------------------------------------------------------
    // EVENT MANAGEMENT (Coming Soon)
    // ------------------------------------------------------------------------
    // Route::resource('events', PenyelenggaraEventController::class);
    
    // ------------------------------------------------------------------------
    // STATISTICS (Coming Soon)
    // ------------------------------------------------------------------------
    // Route::get('statistics', [PenyelenggaraDashboard::class, 'statistics'])->name('statistics');
    
    // ------------------------------------------------------------------------
    // SETTINGS (Coming Soon)
    // ------------------------------------------------------------------------
    // Route::get('settings', [PenyelenggaraDashboard::class, 'settings'])->name('settings');
});

// ============================================================================
// FALLBACK ROUTE
// ============================================================================
// Handle 404 - Redirect ke homepage
// ============================================================================

Route::fallback(function () {
    return redirect()->route('user.home');
});