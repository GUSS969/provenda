<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // ============================
    // HALAMAN LOGIN ADMIN
    // ============================
    public function showLoginForm()
    {
        return view('admin.login'); // buat file view ini
    }

    // ============================
    // PROSES LOGIN ADMIN
    // ============================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek login pakai guard admin
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // ============================
    // LOGOUT ADMIN
    // ============================
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // ============================
    // DASHBOARD ADMIN
    // ============================
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // ============================
    // CRUD ADMIN (Punya Kamu)
    // ============================
    public function index()
    {
        $data = Admin::latest()->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5'
        ]);

        $admin = Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => true, 'data' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update($request->only('nama', 'username', 'email'));

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
