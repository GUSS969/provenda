<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        $penyelenggara = Penyelenggara::findOrFail($penyelenggaraId);
        
        return view('penyelenggara.pengaturan.index', compact('penyelenggara'));
    }
    
    public function update(Request $request)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        $penyelenggara = Penyelenggara::findOrFail($penyelenggaraId);
        
        $validated = $request->validate([
            'nama_penyelenggara' => 'required|string|max:255',
            'email' => 'required|email|unique:penyelenggara,email,' . $penyelenggaraId,
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'password' => 'nullable|min:6|confirmed',
        ]);
        
        // Update data
        $penyelenggara->nama_penyelenggara = $validated['nama_penyelenggara'];
        $penyelenggara->email = $validated['email'];
        $penyelenggara->no_telepon = $validated['no_telepon'] ?? null;
        $penyelenggara->alamat = $validated['alamat'] ?? null;
        
        // Update password jika diisi
        if (!empty($validated['password'])) {
            $penyelenggara->password = Hash::make($validated['password']);
        }
        
        $penyelenggara->save();
        
        return redirect()->route('penyelenggara.pengaturan')
                         ->with('success', 'Pengaturan berhasil diperbarui!');
    }
}