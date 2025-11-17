<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PartisipasiEventController;
use App\Http\Controllers\InteraksiEventController;
use App\Http\Controllers\StatistikPromosiController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE (Pengunjung tidak perlu login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Hanya untuk yang sudah login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

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

});
