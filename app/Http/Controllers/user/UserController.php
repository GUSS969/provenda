<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
        // Hitung statistik
        $totalEvents = Event::count();
        $totalOrganizers = Penyelenggara::count();
        
        // Hitung event mendatang (tanggal >= hari ini)
        $upcomingEvents = Event::where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))->count();
        
        // Ambil 3 event terbaru untuk featured events
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

        // Sorting berdasarkan pilihan user
        $sort = $request->get('sort', 'terbaru'); // Default: terbaru
        
        switch ($sort) {
            case 'terlama':
                $query->orderBy('id', 'asc');
                break;
            case 'nama_az':
                $query->orderBy('nama_event', 'asc');
                break;
            case 'nama_za':
                $query->orderBy('nama_event', 'desc');
                break;
            case 'tanggal_terdekat':
                $query->orderBy('tanggal_event', 'asc');
                break;
            case 'tanggal_terjauh':
                $query->orderBy('tanggal_event', 'desc');
                break;
            default: // terbaru
                $query->orderBy('id', 'desc');
                break;
        }

        // Pagination dengan 9 item per halaman + tetap menyimpan query string
        $events = $query->paginate(9)->withQueryString();

        return view('events.index', compact('events'));
    }

    /**
     * Detail event berdasarkan ID
     */
    public function showEvent($id)
    {
        // Ambil event dengan relasi penyelenggara dan hitung pendaftar UMKM
        $event = Event::with('penyelenggara')
            ->withCount('umkmRegistrations') // Hitung jumlah pendaftar UMKM
            ->findOrFail($id);
        
        // Ambil 3 event serupa (kategori sama, kecuali event ini)
        $relatedEvents = Event::with('penyelenggara')
            ->where('kategori', $event->kategori)
            ->where('id', '!=', $event->id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
    
}
