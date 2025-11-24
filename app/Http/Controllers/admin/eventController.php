<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use App\Models\Penyelenggara;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
            'penyelenggara_id' => 'nullable',
            'id_admin' => 'nullable',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
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
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
    }
}
