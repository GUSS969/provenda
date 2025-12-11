<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\UmkmRegistration; // 🔥 Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of events (Event Saya)
     */
    public function eventSaya()
    {
        // Ambil semua event milik penyelenggara yang sedang login
        $events = Event::where('penyelenggara_id', auth()->id())
                      ->orderBy('tanggal_event', 'desc')
                      ->paginate(10);
        
        return view('penyelenggara.events.index', compact('events'));
    }

    /**
     * Display UMKM Registrations
     */
    public function umkmRegistrations()
    {
        // Ambil semua pendaftaran UMKM yang terkait dengan event milik penyelenggara ini
        $registrations = UmkmRegistration::whereHas('event', function ($q) {
            $q->where('penyelenggara_id', auth()->id());
        })->with('event')->get();

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
        // Coming soon
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Coming soon
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Coming soon
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Coming soon
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Coming soon
    }
}