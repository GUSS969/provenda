<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use App\Models\Penyelenggara;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['penyelenggara'])->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $penyelenggaras = Penyelenggara::all();
        $admins = Admin::all();
        return view('admin.event.create', compact('penyelenggaras', 'admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_event',
            'tanggal_event',
            'lokasi',
            'deskripsi',
            'kategori',
            'status',
            'penyelenggara_id',
        ]);

        if ($request->hasFile('poster')) {
            $filename = time() . '.' . $request->poster->extension();
            $request->poster->storeAs('posters', $filename);
            $data['poster'] = $filename;
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $penyelenggaras = Penyelenggara::all();
        $admins = Admin::all();
        return view('admin.event.edit', compact('event', 'penyelenggaras', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        $event = Event::findOrFail($id);
        
        $data = $request->only([
            'nama_event',
            'tanggal_event',
            'lokasi',
            'deskripsi',
            'kategori',
            'status',
            'penyelenggara_id',
        ]);
        
        if ($request->hasFile('poster')) {
            if ($event->poster) {
                Storage::delete('posters/' . $event->poster);
            }

            $filename = time() . '.' . $request->poster->extension();
            $file = $request->poster->storeAs('posters', $filename);
            $data['poster'] = $filename;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->poster) {
            Storage::disk('public')->delete('posters/' . $event->poster);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.event.show', compact('event'));
    }
}
