<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\UmkmRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of events (Event Saya)
     */
    public function eventSaya()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        $events = Event::where('penyelenggara_id', $penyelenggaraId)
                      ->orderBy('tanggal_event', 'desc')
                      ->paginate(10);
        
        return view('penyelenggara.events.index', compact('events'));
    }

    /**
     * Display UMKM Registrations
     */
    public function umkmRegistrations()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        $registrations = UmkmRegistration::whereHas('event', function ($q) use ($penyelenggaraId) {
            $q->where('penyelenggara_id', $penyelenggaraId);
        })->with('event')->paginate(10);

        return view('penyelenggara.umkm-registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyelenggara.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Validasi LENGKAP termasuk field UMKM
        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'open_registration' => 'nullable|boolean',
            'max_participants' => 'nullable|integer|min:1',
            'registration_info' => 'nullable|string',
        ]);
        
        // Set default untuk open_registration
        $validated['open_registration'] = $request->has('open_registration') ? 1 : 0;
        
        // Handle upload poster
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'local');
            $validated['poster'] = $posterPath;
        }
        
        // Tambahkan penyelenggara_id
        $validated['penyelenggara_id'] = $penyelenggaraId;
        
        // Buat event baru
        Event::create($validated);
        
        return redirect()->route('penyelenggara.event_saya')
                         ->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Ambil event dengan relasi
        $event = Event::where('id', $id)
                      ->where('penyelenggara_id', $penyelenggaraId)
                      ->with(['penyelenggara', 'umkmRegistrations'])
                      ->firstOrFail();
        
        // ✅ FIX: Tambah relatedEvents biar gak error
        $relatedEvents = Event::where('penyelenggara_id', $penyelenggaraId)
                              ->where('id', '!=', $id)
                              ->where('tanggal_event', '>=', now())
                              ->orderBy('tanggal_event', 'asc')
                              ->limit(3)
                              ->get();
        
        return view('penyelenggara.events.show', compact('event', 'relatedEvents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        $event = Event::where('id', $id)
                      ->where('penyelenggara_id', $penyelenggaraId)
                      ->firstOrFail();
        
        return view('penyelenggara.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Validasi LENGKAP termasuk field UMKM
        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'open_registration' => 'nullable|boolean',
            'max_participants' => 'nullable|integer|min:1',
            'registration_info' => 'nullable|string',
        ]);
        
        // Set default untuk open_registration
        $validated['open_registration'] = $request->has('open_registration') ? 1 : 0;
        
        $event = Event::where('id', $id)
                      ->where('penyelenggara_id', $penyelenggaraId)
                      ->firstOrFail();
        
        // Handle upload poster baru
        if ($request->hasFile('poster')) {
            // Hapus poster lama jika ada
            if ($event->poster && Storage::exists($event->poster)) {
                Storage::delete($event->poster);
            }
            
            $posterPath = $request->file('poster')->store('posters', 'local');
            $validated['poster'] = $posterPath;
        }
        
        // Update event
        $event->update($validated);
        
        return redirect()->route('penyelenggara.event_saya')
                         ->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        $event = Event::where('id', $id)
                      ->where('penyelenggara_id', $penyelenggaraId)
                      ->firstOrFail();
        
        // Hapus poster jika ada
        if ($event->poster && Storage::exists($event->poster)) {
            Storage::delete($event->poster);
        }
        
        // Hapus event
        $event->delete();
        
        return redirect()->route('penyelenggara.event_saya')
                         ->with('success', 'Event berhasil dihapus!');
    }
}