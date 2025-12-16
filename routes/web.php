<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
use App\Http\Controllers\penyelenggara\UmkmVerificationController;

// 🔥 CONTROLLER BARU UNTUK PENDAFTARAN UMKM KE EVENT
use App\Http\Controllers\EventUMKMController;

/*
|--------------------------------------------------------------------------
| PROVENDA - ROUTES CONFIGURATION
|--------------------------------------------------------------------------
*/

/* ============================================================================
   USER ROUTES (Public Website)
============================================================================ */

Route::name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/events', [UserController::class, 'events'])->name('events');
    Route::get('/events/{id}', [UserController::class, 'showEvent'])->name('event.show');

    // Route pendaftaran UMKM
    Route::post('/event/{event}/daftar-umkm', [EventUMKMController::class, 'register'])->name('event.daftar.umkm');

    // ✅ TAMBAH ROUTE INI
    Route::get('/event/registration/success/{id}', [EventUMKMController::class, 'showSuccess'])->name('event.registration.success');
});

/* ============================================================================
   AUTH ROUTES - ADMIN
============================================================================ */

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

/* ============================================================================
   ADMIN ROUTES
============================================================================ */

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // APPROVE & REJECT UMKM
    Route::post('umkms/{id}/approve', [UMKMController::class, 'approve'])
        ->name('umkms.approve');

    Route::post('umkms/{id}/reject', [UMKMController::class, 'reject'])
        ->name('umkms.reject');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('events', EventController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('penyelenggaras', PenyelenggaraController::class);
    Route::resource('umkms', UMKMController::class);
    Route::resource('produks', ProdukController::class);

    Route::resource('partisipasi-events', PartisipasiEventController::class);
    Route::resource('interaksi-events', InteraksiEventController::class);

    Route::resource('statistik-promosi', StatistikPromosiController::class);

    Route::post('logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    })->name('logout');
});

/* ============================================================================
   AUTH ROUTES - PENYELENGGARA (LOGIN + REGISTER)
============================================================================ */

Route::prefix('penyelenggara')->name('penyelenggara.')->group(function () {
    // LOGIN
    Route::get('login', [PenyelenggaraAuth::class, 'showLoginForm'])->name('login');
    Route::post('login', [PenyelenggaraAuth::class, 'login'])->name('login.submit');

    // REGISTER
    Route::get('register', [PenyelenggaraAuth::class, 'showRegisterForm'])->name('register');
    Route::post('register', [PenyelenggaraAuth::class, 'register'])->name('register.submit');
});

/* ============================================================================
   PENYELENGGARA PROTECTED ROUTES (BUTUH LOGIN)
============================================================================ */

Route::prefix('penyelenggara')->name('penyelenggara.')
    ->middleware('penyelenggara.auth')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [PenyelenggaraDashboard::class, 'index'])->name('dashboard');

        // Event Saya (List)
        Route::get('/event-saya', [App\Http\Controllers\penyelenggara\EventController::class, 'eventSaya'])->name('event_saya');

        // Event CRUD
        Route::get('/events/create', [App\Http\Controllers\penyelenggara\EventController::class, 'create'])->name('events.create');
        Route::post('/events', [App\Http\Controllers\penyelenggara\EventController::class, 'store'])->name('events.store');
        Route::get('/events/{id}', [App\Http\Controllers\penyelenggara\EventController::class, 'show'])->name('events.show');
        Route::get('/events/{id}/edit', [App\Http\Controllers\penyelenggara\EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{id}', [App\Http\Controllers\penyelenggara\EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{id}', [App\Http\Controllers\penyelenggara\EventController::class, 'destroy'])->name('events.destroy');

        // Lihat Pendaftar UMKM
        Route::get('/pendaftar-umkm', [App\Http\Controllers\penyelenggara\EventController::class, 'umkmRegistrations'])->name('umkm.registrations');
        // APPROVE & REJECT UMKM OLEH PENYELENGGARA
        Route::post('/umkm/{id}/approve', [UmkmVerificationController::class, 'approve'])
            ->name('umkm.approve');

        Route::post('/umkm/{id}/reject', [UmkmVerificationController::class, 'reject'])
            ->name('umkm.reject');
        // Statistik
        Route::get('/statistik', [App\Http\Controllers\penyelenggara\StatistikController::class, 'index'])->name('statistik');

        // Pengaturan
        Route::get('/pengaturan', [App\Http\Controllers\penyelenggara\PengaturanController::class, 'index'])->name('pengaturan');
        Route::put('/pengaturan', [App\Http\Controllers\penyelenggara\PengaturanController::class, 'update'])->name('pengaturan.update');

        // Logout
        Route::post('/logout', [PenyelenggaraAuth::class, 'logout'])->name('logout');
    });

/* ============================================================================
   SECURE POSTER ROUTE (Serve File dari Storage Private)
============================================================================ */

Route::get('/poster/{filename}', function ($filename) {
    $path = Storage::path('posters/' . $filename);

    if (!File::exists($path)) {
        return redirect('https://via.placeholder.com/400x250?text=No+Image');
    }

    return Response::file($path);
})->name('poster.show');

/* ============================================================================
   FALLBACK ROUTE
============================================================================ */

Route::fallback(function () {
    return redirect()->route('user.home');
});