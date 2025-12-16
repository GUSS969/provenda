<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\EventUMKMRegistration;
use Illuminate\Http\Request;

class UmkmVerificationController extends Controller
{
    public function approve($id)
    {
        $data = EventUMKMRegistration::findOrFail($id);
        $data->status = 'approved';
        $data->save();

        return back()->with('success', 'UMKM berhasil disetujui');
    }

    public function reject($id)
    {
        $data = EventUMKMRegistration::findOrFail($id);
        $data->status = 'rejected';
        $data->save();

        return back()->with('success', 'UMKM ditolak');
    }
}
