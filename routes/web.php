<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PartisipasiEventController;
use App\Http\Controllers\InteraksiEventController;
use App\Http\Controllers\StatistikPromosiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| USER ROUTES (Public - Pengunjung Website)
|--------------------------------------------------------------------------
| Routes untuk pengunjung umum yang mengakses website
| URL: / , /events, /events/{id}
*/
Route::name('user.')->group(function () {
    // Homepage - Landing page untuk pengunjung
    Route::get('/', [UserController::class, 'index'])->name('home');
    
    // Events List - Daftar semua event dengan filter & search
    Route::get('/events', [UserController::class, 'events'])->name('events');
    
    // Event Detail - Detail lengkap event berdasarkan ID
    Route::get('/events/{id}', [UserController::class, 'showEvent'])->name('event.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (Protected - Admin Panel)
|--------------------------------------------------------------------------
| Routes untuk admin panel dengan prefix /admin
| URL: /admin, /admin/login, /admin/events, dll
*/
Route::prefix('admin')->name('admin.')->group(function () {
    
    /*
    |--------------------------------------------------------------------------
    | AUTH ROUTES (Guest Only)
    |--------------------------------------------------------------------------
    */
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    /*
    |--------------------------------------------------------------------------
    | PROTECTED ROUTES (Auth Required)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        /*
        |--------------------------------------------------------------------------
        | EVENT CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('events', EventController::class);

        /*
        |--------------------------------------------------------------------------
        | ADMIN CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('admins', AdminController::class);

        /*
        |--------------------------------------------------------------------------
        | PENYELENGGARA CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('penyelenggaras', PenyelenggaraController::class);

        /*
        |--------------------------------------------------------------------------
        | UMKM CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('umkms', UMKMController::class);

        /*
        |--------------------------------------------------------------------------
        | PRODUK CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('produks', ProdukController::class);

        /*
        |--------------------------------------------------------------------------
        | PARTISIPASI EVENT CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('partisipasi-events', PartisipasiEventController::class);

        /*
        |--------------------------------------------------------------------------
        | INTERAKSI EVENT CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('interaksi-events', InteraksiEventController::class);

        /*
        |--------------------------------------------------------------------------
        | STATISTIK PROMOSI CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('statistik-promosi', StatistikPromosiController::class);

        /*
        |--------------------------------------------------------------------------
        | LOGOUT (via POST)
        |--------------------------------------------------------------------------
        */
        Route::post('/logout', function () {
            Auth::logout(); 
            return redirect()->route('admin.login');
        })->name('logout');

    });
});