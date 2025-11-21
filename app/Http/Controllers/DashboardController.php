<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $total_event     = Event::count();
        $event_aktif     = Event::where('status', 'aktif')->count();
        $event_selesai   = Event::where('status', 'nonaktif')->count();

        // Event Terbaru (6 event)
        $event_terbaru = Event::with('penyelenggara')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Chart: Event per Bulan - Cara Simple
        $bulan_labels = [];
        $bulan_data = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $bulan_labels[] = $date->format('M');
            
            $count = Event::whereYear('tanggal_mulai', $date->year)
                ->whereMonth('tanggal_mulai', $date->month)
                ->count();
            
            $bulan_data[] = $count;
        }
        
        $event_per_bulan = collect(array_combine($bulan_labels, $bulan_data));

        // Chart: Event per Kategori
        $categories = Event::select('kategori_event')
            ->whereNotNull('kategori_event')
            ->distinct()
            ->pluck('kategori_event');
        
        $kategori_data = [];
        foreach ($categories as $cat) {
            $kategori_data[$cat] = Event::where('kategori_event', $cat)->count();
        }
        
        $event_per_kategori = collect($kategori_data)->isEmpty() 
            ? collect(['Belum Ada' => 0]) 
            : collect($kategori_data);

        // Chart: Event per Lokasi (Top 5)
        $lokasi = Event::select('lokasi')
            ->whereNotNull('lokasi')
            ->get()
            ->groupBy('lokasi')
            ->map(function ($items) {
                return $items->count();
            })
            ->sortDesc()
            ->take(5);
        
        $event_per_lokasi = $lokasi->isEmpty() 
            ? collect(['Belum Ada' => 0]) 
            : $lokasi;

        // Statistik Tambahan
        $event_bulan_ini = Event::whereMonth('tanggal_mulai', Carbon::now()->month)
            ->whereYear('tanggal_mulai', Carbon::now()->year)
            ->count();
            
        $event_minggu_ini = Event::whereBetween('tanggal_mulai', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();

        return view('admin.dashboard', [
            'total_event'           => $total_event,
            'event_aktif'           => $event_aktif,
            'event_selesai'         => $event_selesai,
            'event_terbaru'         => $event_terbaru,
            'event_per_bulan'       => $event_per_bulan,
            'event_per_kategori'    => $event_per_kategori,
            'event_per_lokasi'      => $event_per_lokasi,
            'event_bulan_ini'       => $event_bulan_ini,
            'event_minggu_ini'      => $event_minggu_ini,
        ]);
    }
}