<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Penyelenggara;
use App\Models\UmkmRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil penyelenggara dari session
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        $penyelenggara = Penyelenggara::find($penyelenggaraId);
        
        if (!$penyelenggara) {
            Session::flush();
            return redirect()->route('penyelenggara.login')
                           ->with('error', 'Silakan login terlebih dahulu');
        }

        // Total event milik penyelenggara ini
        $totalEvents = Event::where('penyelenggara_id', $penyelenggara->id)->count();
        
        // Event aktif (tanggal ≥ hari ini)
        $activeEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                            ->where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))
                            ->count();
        
        // Event selesai (tanggal < hari ini)
        $completedEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                                ->where('tanggal_event', '<', Carbon::now()->format('Y-m-d'))
                                ->count();
        
        // Event bulan ini
        $monthlyEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                              ->whereMonth('tanggal_event', Carbon::now()->month)
                              ->whereYear('tanggal_event', Carbon::now()->year)
                              ->count();

        // 🔥 TAMBAHAN: Total pendaftar UMKM untuk event milik penyelenggara ini
        $totalUmkmRegistrations = UmkmRegistration::whereHas('event', function ($q) use ($penyelenggara) {
            $q->where('penyelenggara_id', $penyelenggara->id);
        })->count();

        // 5 event terbaru
        $recentEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // 5 event mendatang
        $upcomingEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                               ->where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))
                               ->orderBy('tanggal_event', 'asc')
                               ->take(5)
                               ->get();

        // Chart: 6 bulan terakhir
        $chartLabels = [];
        $chartData = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $chartLabels[] = $date->format('M Y');
            
            $count = Event::where('penyelenggara_id', $penyelenggara->id)
                          ->whereMonth('tanggal_event', $date->month)
                          ->whereYear('tanggal_event', $date->year)
                          ->count();
            $chartData[] = $count;
        }

        return view('penyelenggara.dashboard', compact(
            'penyelenggara',
            'totalEvents',
            'activeEvents',
            'completedEvents',
            'monthlyEvents',
            'totalUmkmRegistrations', // 🔥 TAMBAHKAN INI
            'recentEvents',
            'upcomingEvents',
            'chartLabels',
            'chartData'
        ));
    }

    public function eventSaya()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');

        $events = Event::where('penyelenggara_id', $penyelenggaraId)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('penyelenggara.event.index', compact('events'));
    }
}