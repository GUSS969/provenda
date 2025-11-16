<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    public function index()
    {
        return response()->json(Penyelenggara::with('admin')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penyelenggaras',
            'password' => 'required|min:5',
            'no_hp' => 'required',
            'alamat' => 'required',
            'admin_id' => 'required',
        ]);

        $data = Penyelenggara::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Penyelenggara::findOrFail($id);
        $data->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Penyelenggara::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
