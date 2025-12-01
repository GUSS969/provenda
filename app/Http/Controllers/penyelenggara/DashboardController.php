<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Penyelenggara;
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
                           ->with('error', 'Penyelenggara tidak ditemukan');
        }

        // Total event milik penyelenggara ini
        $totalEvents = Event::where('penyelenggara_id', $penyelenggara->id)->count();
        
        // Event aktif (mendatang)
        $activeEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                            ->where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))
                            ->count();
        
        // Event selesai
        $completedEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                                ->where('tanggal_event', '<', Carbon::now()->format('Y-m-d'))
                                ->count();
        
        // Event bulan ini
        $monthlyEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                              ->whereMonth('tanggal_event', Carbon::now()->month)
                              ->whereYear('tanggal_event', Carbon::now()->year)
                              ->count();

        // Recent Events (5 terbaru)
        $recentEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // Upcoming Events (5 mendatang)
        $upcomingEvents = Event::where('penyelenggara_id', $penyelenggara->id)
                               ->where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))
                               ->orderBy('tanggal_event', 'asc')
                               ->take(5)
                               ->get();

        // Data untuk chart - Event per bulan dalam 6 bulan terakhir
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
            'recentEvents',
            'upcomingEvents',
            'chartLabels',
            'chartData'
        ));
    }
}