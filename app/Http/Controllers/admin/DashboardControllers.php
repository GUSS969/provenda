<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $total_event     = Event::count();
        $event_aktif     = Event::where('status', 'aktif')->count();
        $event_selesai   = Event::where('status', 'nonaktif')->count();

        // Ambil 4 event terbaru
        $event_terbaru = Event::orderBy('created_at', 'desc')->take(4)->get();

        return view('admin.dashboard', [
            'total_event'   => $total_event,
            'event_aktif'   => $event_aktif,
            'event_selesai' => $event_selesai,
            'event_terbaru' => $event_terbaru,
        ]);
    }
}
