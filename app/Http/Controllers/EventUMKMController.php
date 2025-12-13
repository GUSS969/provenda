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
            'pemilik' => 'required|string|max:255',
            'email' => 'nullable|email',
            'no_wa' => 'required|string|max:20',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        // Cek apakah event buka pendaftaran
        if (!$event->open_registration) {
            return back()->with('error', 'Pendaftaran untuk event ini sudah ditutup.');
        }

        // Cek kuota
        if ($event->max_participants) {
            $registered = $event->umkmRegistrations->count();
            if ($registered >= $event->max_participants) {
                return back()->with('error', 'Maaf, kuota pendaftaran sudah penuh!');
            }
        }

        // Generate Stand Number Otomatis
        $standNumber = $this->generateStandNumber($event->id);

        // Simpan pendaftaran
        $registration = UmkmRegistration::create([
            'event_id' => $event->id,
            'nama_umkm' => $validated['nama_umkm'],
            'pemilik' => $validated['pemilik'],
            'email' => $validated['email'],
            'no_wa' => $validated['no_wa'],
            'kategori' => $validated['kategori'],
            'deskripsi' => $validated['deskripsi'],
            'stand_number' => $standNumber,
        ]);

        // Redirect ke halaman sukses
        return redirect()->route('user.event.registration.success', $registration->id);
    }

    /**
     * Tampilkan halaman sukses setelah pendaftaran
     */
    public function showSuccess($id)
    {
        $registration = UmkmRegistration::with('event')->findOrFail($id);
        
        return view('events.registration-success', compact('registration'));
    }

    /**
     * Generate Stand Number Otomatis
     * Format: A-01, A-02, ... A-99, B-01, dst
     */
    private function generateStandNumber($eventId)
    {
        $lastRegistration = UmkmRegistration::where('event_id', $eventId)
                                            ->whereNotNull('stand_number')
                                            ->orderBy('id', 'desc')
                                            ->first();

        if (!$lastRegistration || !$lastRegistration->stand_number) {
            return 'A-01'; // Stand pertama
        }

        // Parse nomor terakhir (misal: A-01)
        $parts = explode('-', $lastRegistration->stand_number);
        
        if (count($parts) !== 2) {
            return 'A-01'; // Fallback jika format salah
        }
        
        $letter = $parts[0];
        $number = intval($parts[1]);

        // Increment nomor
        if ($number < 99) {
            $number++;
            return $letter . '-' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } else {
            // Pindah ke huruf berikutnya
            if ($letter == 'Z') {
                $letter = 'AA';
            } else if (strlen($letter) == 2) {
                $letter = chr(ord($letter[0]) + 1) . 'A';
            } else {
                $letter = chr(ord($letter) + 1);
            }
            return $letter . '-01';
        }
    }
}