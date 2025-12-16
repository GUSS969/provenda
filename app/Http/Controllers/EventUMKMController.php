<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UmkmRegistration;
use Illuminate\Http\Request;

class EventUMKMController extends Controller
{
    /**
     * Register UMKM ke event
     */
    public function register(Request $request, Event $event)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'pemilik'   => 'required|string|max:255',
            'email'     => 'nullable|email',
            'no_wa'     => 'required|string|max:20',
            'kategori'  => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        // Cek apakah event buka pendaftaran
        if (!$event->open_registration) {
            return back()->with('error', 'Pendaftaran untuk event ini sudah ditutup.');
        }

        // Cek kuota
        if ($event->max_participants) {
            $registered = $event->umkmRegistrations()->count();
            if ($registered >= $event->max_participants) {
                return back()->with('error', 'Maaf, kuota pendaftaran sudah penuh!');
            }
        }

        // Generate Stand Number
        $standNumber = $this->generateStandNumber($event->id);

        // SIMPAN UMKM (🔥 STATUS PENDING 🔥)
        $registration = UmkmRegistration::create([
            'event_id'     => $event->id,
            'nama_umkm'    => $validated['nama_umkm'],
            'pemilik'      => $validated['pemilik'],
            'email'        => $validated['email'],
            'no_wa'        => $validated['no_wa'],
            'kategori'     => $validated['kategori'],
            'deskripsi'    => $validated['deskripsi'],
            'stand_number' => $standNumber,
            'status'       => 'pending', // ⬅️ WAJIB
        ]);

        return redirect()->route('user.event.registration.success', $registration->id);
    }

    /**
     * Halaman sukses
     */
    public function showSuccess($id)
    {
        $registration = UmkmRegistration::with('event')->findOrFail($id);
        return view('events.registration-success', compact('registration'));
    }

    /**
     * Generate Stand Number
     */
    private function generateStandNumber($eventId)
    {
        $last = UmkmRegistration::where('event_id', $eventId)
            ->whereNotNull('stand_number')
            ->orderBy('id', 'desc')
            ->first();

        if (!$last || !$last->stand_number) {
            return 'A-01';
        }

        [$letter, $number] = explode('-', $last->stand_number);
        $number = (int) $number;

        if ($number < 99) {
            return $letter . '-' . str_pad($number + 1, 2, '0', STR_PAD_LEFT);
        }

        // naik huruf
        $nextLetter = chr(ord($letter) + 1);
        return $nextLetter . '-01';
    }
}
