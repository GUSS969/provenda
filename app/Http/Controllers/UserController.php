<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Homepage - Landing page untuk pengunjung
     */
    public function index()
    {
        // Hitung statistik (tanpa filter tanggal dulu)
        $totalEvents = Event::count();
        $totalOrganizers = Penyelenggara::count();
        $upcomingEvents = Event::count(); // Sementara sama dengan total
        
        // Ambil 3 event terbaru (tanpa filter tanggal dulu)
        $featuredEvents = Event::with('penyelenggara')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('totalEvents', 'totalOrganizers', 'upcomingEvents', 'featuredEvents'));
    }

    /**
     * Daftar semua event dengan filter & search
     */
    public function events(Request $request)
    {
        $query = Event::with('penyelenggara');

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_event', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        // Filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Urutkan berdasarkan ID terbaru
        $events = $query->orderBy('id', 'desc')->paginate(9);

        return view('events.index', compact('events'));
    }

    /**
     * Detail event berdasarkan ID
     */
    public function showEvent($id)
    {
        // Ambil event dengan relasi penyelenggara
        $event = Event::with('penyelenggara')->findOrFail($id);
        
        // Ambil 3 event serupa (kategori sama, kecuali event ini)
        $relatedEvents = Event::with('penyelenggara')
            ->where('kategori', $event->kategori)
            ->where('id', '!=', $event->id)
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}