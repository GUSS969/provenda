<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index()
    {
        return response()->json(UMKM::with('admin')->get());
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

        $data = UMKM::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = UMKM::findOrFail($id);
        $data->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        UMKM::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
