<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index()
{
    $events = Event::with('penyelenggara')->paginate(10);
    
    return view('admin.events.index', compact('events'));
}

    /**
     * Show the form for creating a new event
     */
    public function create()
    {
        $penyelenggaras = Penyelenggara::orderBy('nama', 'asc')->get();
        
        return view('admin.events.create', compact('penyelenggaras'));
    }

    /**
     * Store a newly created event
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'penyelenggara_id' => 'required|exists:penyelenggaras,id',
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
        
        $validated['open_registration'] = $request->has('open_registration') ? 1 : 0;
        
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'local');
            $validated['poster'] = $posterPath;
        }
        
        Event::create($validated);
        
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified event
     */
    public function show(string $id)
    {
        $event = Event::with('penyelenggara', 'umkmRegistrations')->findOrFail($id);
        
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $penyelenggaras = Penyelenggara::orderBy('nama', 'asc')->get();
        
        return view('admin.events.edit', compact('event', 'penyelenggaras'));
    }

    /**
     * Update the specified event
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'penyelenggara_id' => 'required|exists:penyelenggaras,id',
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
        
        $validated['open_registration'] = $request->has('open_registration') ? 1 : 0;
        
        $event = Event::findOrFail($id);
        
        if ($request->hasFile('poster')) {
            if ($event->poster && \Storage::exists($event->poster)) {
                \Storage::delete($event->poster);
            }
            
            $posterPath = $request->file('poster')->store('posters', 'local');
            $validated['poster'] = $posterPath;
        }
        
        $event->update($validated);
        
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified event
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        
        if ($event->poster && \Storage::exists($event->poster)) {
            \Storage::delete($event->poster);
        }
        
        $event->delete();
        
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil dihapus!');
    }
}