<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UmkmRegistration;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index()
    {
        $umkms = UmkmRegistration::with('event.penyelenggara')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.umkm.index', compact('umkms'));
    }

    public function show($id)
    {
        $umkm = UmkmRegistration::with('event.penyelenggara')->findOrFail($id);
        return view('admin.umkm.show', compact('umkm'));
    }

    // ===============================
    // ✅ APPROVE UMKM
    // ===============================
    public function approve($id)
    {
        $umkm = UmkmRegistration::findOrFail($id);
        $umkm->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'UMKM berhasil disetujui');
    }

    // ===============================
    // ❌ REJECT UMKM
    // ===============================
    public function reject($id)
    {
        $umkm = UmkmRegistration::findOrFail($id);
        $umkm->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'UMKM berhasil ditolak');
    }

    // ❌ DISABLE CREATE / STORE / EDIT
    public function create() { abort(404); }
    public function store(Request $r) { abort(404); }
    public function edit($id) { abort(404); }
    public function update(Request $r, $id) { abort(404); }

    public function destroy($id)
    {
        UmkmRegistration::findOrFail($id)->delete();
        return redirect()->route('admin.umkms.index')
            ->with('success', 'Data UMKM berhasil dihapus');
    }
}
