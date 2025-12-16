<?php

namespace App\Http\Controllers\admin;

use App\Models\Penyelenggara;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PenyelenggaraController extends Controller
{
    public function index()
    {
        $penyelenggaras = Penyelenggara::paginate(10);

        return view('admin.penyelenggara.index', compact('penyelenggaras'));
    }

    public function create()
    {
        return view('admin.penyelenggara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penyelenggaras',
            'password' => 'required|min:5',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Penyelenggara::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password), // WAJIB hashing
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.penyelenggaras.index')
            ->with('success', 'Penyelenggara berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        return view('admin.penyelenggara.edit', compact('penyelenggara'));
    }

    public function update(Request $request, $id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penyelenggaras,email,' . $penyelenggara->id,
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        // update password hanya jika tidak kosong
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $penyelenggara->update($data);

        return redirect()->route('admin.penyelenggaras.index')
            ->with('success', 'Penyelenggara berhasil diperbarui');
    }

    public function destroy($id)
    {
        Penyelenggara::findOrFail($id)->delete();

        return redirect()->route('admin.penyelenggaras.index')
            ->with('success', 'Penyelenggara berhasil dihapus');
    }
}
