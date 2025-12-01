<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show Login Form
     */
    public function showLoginForm()
    {
        // Kalau sudah login, redirect ke dashboard
        if (Session::has('penyelenggara_id')) {
            return redirect()->route('penyelenggara.dashboard');
        }

        return view('penyelenggara.auth.login');
    }

    /**
     * Process Login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 3 karakter'
        ]);

        // Cari penyelenggara berdasarkan email
        $penyelenggara = Penyelenggara::where('email', $request->email)->first();

        // Cek apakah penyelenggara ditemukan
        if (!$penyelenggara) {
            return back()->with('error', 'Email tidak terdaftar')->withInput();
        }

        // Cek password
        // UNTUK TESTING: Pakai plain text comparison
        // UNTUK PRODUCTION: Pakai Hash::check()
        
        // Coba dulu plain text (kalau password di DB belum di-hash)
        if ($request->password !== $penyelenggara->password) {
            // Kalau gagal, coba pakai hash
            if (!Hash::check($request->password, $penyelenggara->password)) {
                return back()->with('error', 'Password salah')->withInput();
            }
        }

        // Simpan session
        Session::put('penyelenggara_id', $penyelenggara->id);
        Session::put('penyelenggara_nama', $penyelenggara->nama);
        Session::put('penyelenggara_email', $penyelenggara->email);

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('penyelenggara.dashboard')
                        ->with('success', 'Selamat datang, ' . $penyelenggara->nama);
    }

    /**
     * Logout
     */
    public function logout()
    {
        // Hapus session penyelenggara
        Session::forget('penyelenggara_id');
        Session::forget('penyelenggara_nama');
        Session::forget('penyelenggara_email');

        return redirect()->route('penyelenggara.login')
                        ->with('success', 'Anda telah logout');
    }
}