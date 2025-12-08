<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UmkmRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventUMKMController extends Controller
{
    public function register(Request $request, $eventId)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'kategori' => 'required|in:makanan,fashion,kerajinan,jasa,lainnya',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cari event
        $event = Event::findOrFail($eventId);

        // Cek apakah event memang khusus UMKM
        if (!$event->for_umkm) {
            return back()->withErrors(['error' => 'Event ini tidak terbuka untuk UMKM.']);
        }

        // Cek apakah event masih aktif (belum selesai)
        if (\Carbon\Carbon::parse($event->tanggal_event)->isPast()) {
            return back()->withErrors(['error' => 'Pendaftaran untuk event ini sudah ditutup.']);
        }

        // Cek kuota UMKM (jika ada)
        if ($event->max_umkm_participants && $event->umkmRegistrations()->count() >= $event->max_umkm_participants) {
            return back()->withErrors(['error' => 'Kuota UMKM sudah penuh.']);
        }

        // Cek apakah UMKM dengan nama dan WA yang sama sudah terdaftar
        $existingRegistration = $event->umkmRegistrations()
            ->where('no_wa', $request->no_wa)
            ->orWhere(function ($query) use ($request) {
                $query->where('nama_umkm', $request->nama_umkm);
            })
            ->first();

        if ($existingRegistration) {
            return back()->withErrors(['error' => 'UMKM ini sudah terdaftar ke event ini.']);
        }

        // Simpan data pendaftaran
        $event->umkmRegistrations()->create([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'email' => $request->email ?? null,
            'no_wa' => $request->no_wa,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi ?? null,
        ]);

        return back()->with('success', 'Pendaftaran UMKM berhasil! Tunggu info selanjutnya dari penyelenggara.');
    }
}