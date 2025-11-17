<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(Produk::with('umkm')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'umkm_id' => 'required',
        ]);

        $data = Produk::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Produk::findOrFail($id);
        $data->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
