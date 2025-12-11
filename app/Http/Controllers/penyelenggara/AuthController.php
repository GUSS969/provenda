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
     * ============================
     * SHOW LOGIN FORM
     * ============================
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
     * ============================
     * LOGIN PROCESS
     * ============================
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

        // Cari data penyelenggara
        $penyelenggara = Penyelenggara::where('email', $request->email)->first();

        // Jika email tidak ditemukan
        if (!$penyelenggara) {
            return back()->with('error', 'Email tidak terdaftar')->withInput();
        }

        /**
         * Cek password
         * - Coba plain text (buat testing)
         * - Kalau tidak cocok, pakai Hash::check
         */
        if ($request->password !== $penyelenggara->password) {
            if (!Hash::check($request->password, $penyelenggara->password)) {
                return back()->with('error', 'Password salah')->withInput();
            }
        }

        // Simpan session
        Session::put('penyelenggara_id', $penyelenggara->id);
        Session::put('penyelenggara_nama', $penyelenggara->nama);
        Session::put('penyelenggara_email', $penyelenggara->email);

        return redirect()->route('penyelenggara.dashboard')
                        ->with('success', 'Selamat datang, ' . $penyelenggara->nama);
    }

    /**
     * ============================
     * SHOW REGISTER FORM
     * ============================
     */
    public function showRegisterForm()
    {
        if (Session::has('penyelenggara_id')) {
            return redirect()->route('penyelenggara.dashboard');
        }

        return view('penyelenggara.auth.register');
    }

    /**
     * ============================
     * REGISTER PROCESS (FIXED!)
     * ============================
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:penyelenggaras,email',
            'telepon' => 'required|string|min:10|max:15',
            'alamat' => 'required|string|min:10',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'telepon.required' => 'Nomor telepon harus diisi',
            'telepon.min' => 'Nomor telepon minimal 10 digit',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat minimal 10 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Simpan data baru
        $penyelenggara = Penyelenggara::create([
            'nama' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        // Auto login setelah registrasi
        Session::put('penyelenggara_id', $penyelenggara->id);
        Session::put('penyelenggara_nama', $penyelenggara->nama);
        Session::put('penyelenggara_email', $penyelenggara->email);

        return redirect()->route('penyelenggara.dashboard')
                        ->with('success', 'Akun berhasil dibuat! Selamat datang, ' . $penyelenggara->nama);
    }

    /**
     * ============================
     * LOGOUT PROCESS
     * ============================
     */
    public function logout()
    {
        Session::forget('penyelenggara_id');
        Session::forget('penyelenggara_nama');
        Session::forget('penyelenggara_email');

        return redirect()->route('penyelenggara.login')
                        ->with('success', 'Anda telah logout');
    }
}