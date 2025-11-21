<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Penyelenggara;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['penyelenggara', 'admin'])->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $penyelenggaras = Penyelenggara::all();
        $admins = Admin::all();

        return view('admin.event.create', compact('penyelenggaras', 'admins'));
    }

    // ========================================
    // UBAH METHOD INI - TAMBAH UPLOAD POSTER
    // ========================================
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kategori_event' => 'required',
            'status' => 'required',
            'penyelenggara_id' => 'required',
            'id_admin' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // TAMBAH INI
        ]);

        $data = $request->all();

        // TAMBAH INI - Handle Upload Poster
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('event', $filename, 'public');
            $data['poster'] = $filename;
        }

        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $penyelenggaras = Penyelenggara::all();
        $admins = Admin::all();

        return view('admin.event.edit', compact('event', 'penyelenggaras', 'admins'));
    }

    // ========================================
    // UBAH METHOD INI - TAMBAH UPLOAD POSTER
    // ========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kategori_event' => 'required',
            'status' => 'required',
            'penyelenggara_id' => 'required',
            'id_admin' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // TAMBAH INI
        ]);

        $event = Event::findOrFail($id);
        $data = $request->all();

        // TAMBAH INI - Handle Upload Poster Baru
        if ($request->hasFile('poster')) {
            // Hapus poster lama
            if ($event->poster && Storage::disk('public')->exists('event/' . $event->poster)) {
                Storage::disk('public')->delete('event/' . $event->poster);
            }

            // Upload poster baru
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('event', $filename, 'public');
            $data['poster'] = $filename;
        } else {
            $data['poster'] = $event->poster;
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
    }

    // ========================================
    // UBAH METHOD INI - HAPUS POSTER JUGA
    // ========================================
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // TAMBAH INI - Hapus poster dari storage
        if ($event->poster && Storage::disk('public')->exists('event/' . $event->poster)) {
            Storage::disk('public')->delete('event/' . $event->poster);
        }
        
        $event->delete();
        
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }
}