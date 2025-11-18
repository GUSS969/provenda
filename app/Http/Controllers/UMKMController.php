<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UMKMController extends Controller
{
    public function index()
    {
        $data = UMKM::with('admin')->get();
        return view('admin.umkm.index', compact('data'));
    }

    public function create()
    {
        $admins = Admin::all();
        return view('admin.umkm.create', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:umkms',
            'password' => 'required|min:5',
            'status' => 'required',
            'admin_id' => 'required'
        ]);

        UMKM::create([
            'nama_umkm'   => $request->nama_umkm,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat'      => $request->alamat,
            'no_hp'       => $request->no_hp,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'status'      => $request->status,
            'admin_id'    => $request->admin_id,
        ]);

        return redirect()->route('umkms.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkm = UMKM::findOrFail($id);
        $admins = Admin::all();
        return view('admin.umkm.edit', compact('umkm', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'admin_id' => 'required'
        ]);

        $umkm = UMKM::findOrFail($id);

        // Update basic data
        $umkm->update([
            'nama_umkm' => $request->nama_umkm,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'status' => $request->status,
            'admin_id' => $request->admin_id,
        ]);

        // Update password jika diisi
        if ($request->password) {
            $umkm->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('umkms.index')->with('success', 'UMKM berhasil diperbarui!');
    }

    public function destroy($id)
    {
        UMKM::findOrFail($id)->delete();
        return redirect()->route('umkms.index')->with('success', 'UMKM berhasil dihapus!');
    }
}
