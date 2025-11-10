<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('layout.dashboard');
    }

    public function event() {
        return view('admin.event');
    }

    public function promosi() {
        return view('admin.promosi');
    }

    public function pengguna() {
        return view('admin.pengguna');
    }

    public function komentar() {
        return view('admin.komentar');
    }

    public function laporan() {
        return view('admin.laporan');
    }

    public function pengaturan() {
        return view('admin.pengaturan');
    }
}
