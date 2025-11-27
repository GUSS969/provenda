<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $total_event = Event::count();
        
        // Hitung event berdasarkan tanggal, bukan status
        $event_aktif = Event::where('tanggal_event', '>=', Carbon::now()->format('Y-m-d'))->count(); // Event mendatang
        $event_selesai = Event::where('tanggal_event', '<', Carbon::now()->format('Y-m-d'))->count(); // Event yang sudah lewat

        // Event bulan ini
        $event_bulan_ini = Event::whereMonth('tanggal_event', Carbon::now()->month)
                                ->whereYear('tanggal_event', Carbon::now()->year)
                                ->count();

        // Event minggu ini
        $event_minggu_ini = Event::whereBetween('tanggal_event', [
                                    Carbon::now()->startOfWeek(),
                                    Carbon::now()->endOfWeek()
                                ])->count();

        // Ambil 4 event terbaru
        $event_terbaru = Event::orderBy('created_at', 'desc')->take(4)->get();

        // Data untuk chart - Event per bulan dalam 6 bulan terakhir
        $chart_labels = [];
        $chart_data = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $chart_labels[] = $date->format('M Y'); // Sep 2024, Oct 2024, dll
            
            $count = Event::whereMonth('tanggal_event', $date->month)
                          ->whereYear('tanggal_event', $date->year)
                          ->count();
            $chart_data[] = $count;
        }

        return view('admin.dashboard', [
            'total_event'       => $total_event,
            'event_aktif'       => $event_aktif,
            'event_selesai'     => $event_selesai,
            'event_terbaru'     => $event_terbaru,
            'event_bulan_ini'   => $event_bulan_ini,
            'event_minggu_ini'  => $event_minggu_ini,
            'chart_labels'      => $chart_labels,
            'chart_data'        => $chart_data
        ]);
    }
}