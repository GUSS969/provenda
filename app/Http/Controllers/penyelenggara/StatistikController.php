<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\UmkmRegistration;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Total event
        $totalEvents = Event::where('penyelenggara_id', $penyelenggaraId)->count();
        
        // Total pendaftar UMKM
        $totalRegistrations = UmkmRegistration::whereHas('event', function ($q) use ($penyelenggaraId) {
            $q->where('penyelenggara_id', $penyelenggaraId);
        })->count();
        
        // Event bulan ini
        $eventsThisMonth = Event::where('penyelenggara_id', $penyelenggaraId)
            ->whereMonth('tanggal_event', Carbon::now()->month)
            ->whereYear('tanggal_event', Carbon::now()->year)
            ->count();
        
        // Event mendatang
        $upcomingEvents = Event::where('penyelenggara_id', $penyelenggaraId)
            ->where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))
            ->count();
        
        return view('penyelenggara.statistik.index', compact(
            'totalEvents',
            'totalRegistrations',
            'eventsThisMonth',
            'upcomingEvents'
        ));
    }
}