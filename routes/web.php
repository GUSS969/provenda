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
| USER ROUTES (Public - Pengunjung Website)
|--------------------------------------------------------------------------
| Routes untuk pengunjung umum yang mengakses website
| Tidak perlu login, siapa saja bisa akses
| URL: / , /events, /events/{id}
*/
Route::name('user.')->group(function () {
    // Homepage User - Landing page untuk pengunjung
    Route::get('/', [UserController::class, 'index'])->name('home');
    
    // Daftar Event User - List semua event dengan filter & search
    Route::get('/events', [UserController::class, 'events'])->name('events');
    
    // Detail Event User - Info lengkap 1 event
    Route::get('/events/{id}', [UserController::class, 'showEvent'])->name('event.show');
});

/*
    |--------------------------------------------------------------------------
    | AUTH ROUTES (Guest Only - Belum Login)
    |--------------------------------------------------------------------------
    | Route untuk login admin, hanya bisa diakses kalau belum login
    */
        // Halaman Login
      Route::get('login', [AuthController::class, 'login'])->name('login');
        
        // Proses Login (POST)
      Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (Protected - Admin Panel)
|--------------------------------------------------------------------------
| Routes untuk admin panel dengan prefix /admin
| Harus login sebagai admin untuk akses
| URL: /admin/login, /admin/dashboard, /admin/events, dll
*/
Route::prefix('admin')->name('admin.')->group(function () {
    
    

    /*
    |--------------------------------------------------------------------------
    | PROTECTED ROUTES (Auth Required - Harus Login)
    |--------------------------------------------------------------------------
    | Semua route di sini butuh login dulu
    */
    Route::middleware('auth')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        // Dashboard Admin - Statistik & Overview
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | EVENT CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Event untuk Admin
        Route::resource('events', EventController::class);

        /*
        |--------------------------------------------------------------------------
        | ADMIN CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Admin (Kelola akun admin)
        Route::resource('admins', AdminController::class);

        /*
        |--------------------------------------------------------------------------
        | PENYELENGGARA CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Penyelenggara Event
        Route::resource('penyelenggaras', PenyelenggaraController::class);

        /*
        |--------------------------------------------------------------------------
        | UMKM CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD UMKM (Usaha Mikro Kecil Menengah)
        Route::resource('umkms', UMKMController::class);

        /*
        |--------------------------------------------------------------------------
        | PRODUK CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Produk UMKM
        Route::resource('produks', ProdukController::class);

        /*
        |--------------------------------------------------------------------------
        | PARTISIPASI EVENT CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Partisipasi Event
        Route::resource('partisipasi-events', PartisipasiEventController::class);

        /*
        |--------------------------------------------------------------------------
        | INTERAKSI EVENT CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Interaksi Event
        Route::resource('interaksi-events', InteraksiEventController::class);

        /*
        |--------------------------------------------------------------------------
        | STATISTIK PROMOSI CRUD
        |--------------------------------------------------------------------------
        */
        // CRUD Statistik Promosi
        Route::resource('statistik-promosi', StatistikPromosiController::class);

        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */
        // Logout Admin (POST method)
        Route::post('/logout', function () {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'Berhasil logout');
        })->name('logout');

    });
});

/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE (Opsional)
|--------------------------------------------------------------------------
| Route ini akan handle semua URL yang tidak ditemukan
| Redirect ke homepage user
*/
Route::fallback(function () {
    return redirect()->route('user.home');
});