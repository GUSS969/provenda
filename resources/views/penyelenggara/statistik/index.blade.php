@extends('penyelenggara.layouts.app')

@section('page-title', 'Statistik')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="ti ti-chart-bar"></i>
        Statistik
    </h1>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background: #cfe2ff;">
            <i class="ti ti-calendar-event" style="color: #084298;"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $totalEvents }}</h3>
            <p>Total Event</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: #d1e7dd;">
            <i class="ti ti-users" style="color: #0a3622;"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $totalRegistrations }}</h3>
            <p>Total Pendaftar UMKM</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: #fff3cd;">
            <i class="ti ti-calendar-month" style="color: #997404;"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $eventsThisMonth }}</h3>
            <p>Event Bulan Ini</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: #f8d7da;">
            <i class="ti ti-calendar-up" style="color: #58151c;"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $upcomingEvents }}</h3>
            <p>Event Mendatang</p>
        </div>
    </div>
</div>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }
    
    .stat-content h3 {
        font-size: 32px;
        font-weight: 700;
        margin: 0 0 5px 0;
        color: #1a1a1a;
    }
    
    .stat-content p {
        margin: 0;
        color: #6c757d;
        font-size: 14px;
    }
</style>
@endsection