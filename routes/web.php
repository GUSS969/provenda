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

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Hanya user login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
    | LOGOUT (AMAN, via POST)
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});
