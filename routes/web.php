<?php

use Illuminate\Support\Facades\Route;

// =====================
// HALAMAN UTAMA
// =====================
// Langsung tampilkan view 'welcome' (karena cuma itu yang ada)
Route::get('/', function () {
    return view('welcome');
});