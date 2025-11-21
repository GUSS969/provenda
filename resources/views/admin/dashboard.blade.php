@extends('layouts.main')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}">
@endpush

@section('content')

<div class="pc-content">

    <!-- =============== BREADCRUMB =============== -->
    <div class="page-header">
        <div class="page-block">
            <div class="page-header-title">
                <h5 class="mb-0 font-medium">Dashboard Promosi Event Daerah</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
            </ul>
        </div>
    </div>

    <!-- =============== QUICK ACTIONS =============== -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('events.create') }}" class="btn btn-primary btn-action">
                    <i class="ti ti-plus me-2"></i>Tambah Event Baru
                </a>
                <button class="btn btn-outline-primary btn-action" onclick="location.reload()">
                    <i class="ti ti-refresh me-2"></i>Refresh Data
                </button>
                <a href="{{ route('events.index') }}" class="btn btn-outline-secondary btn-action">
                    <i class="ti ti-list me-2"></i>Lihat Semua Event
                </a>
            </div>
        </div>
    </div>

    <!-- =============== STATISTIK CARDS (GRID 2x2 SQUARE) =============== -->
    <div class="row g-4 mb-4">

        <!-- TOTAL EVENT -->
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card stats-card stats-grid">
                <div class="card-body">
                    <div class="icon-box icon-primary">
                        <i class="ti ti-calendar-stats"></i>
                    </div>
                    <div class="stats-text">
                        <p class="stats-label">Total Event</p>
                        <h3 class="stats-number">{{ $total_event }}</h3>
                        <span class="stats-sub"><i class="ti ti-arrow-up"></i> {{ $event_bulan_ini }} bulan ini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- EVENT AKTIF -->
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card stats-card stats-grid">
                <div class="card-body">
                    <div class="icon-box icon-success">
                        <i class="ti ti-circle-check"></i>
                    </div>
                    <div class="stats-text">
                        <p class="stats-label">Event Aktif</p>
                        <h3 class="stats-number text-success">{{ $event_aktif }}</h3>
                        <span class="stats-sub"><i class="ti ti-activity"></i> Sedang berjalan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- EVENT SELESAI -->
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card stats-card stats-grid">
                <div class="card-body">
                    <div class="icon-box icon-secondary">
                        <i class="ti ti-circle-x"></i>
                    </div>
                    <div class="stats-text">
                        <p class="stats-label">Event Selesai</p>
                        <h3 class="stats-number text-muted">{{ $event_selesai }}</h3>
                        <span class="stats-sub"><i class="ti ti-archive"></i> Telah berakhir</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- EVENT MINGGU INI -->
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card stats-card stats-grid">
                <div class="card-body">
                    <div class="icon-box icon-warning">
                        <i class="ti ti-clock-hour-4"></i>
                    </div>
                    <div class="stats-text">
                        <p class="stats-label">Minggu Ini</p>
                        <h3 class="stats-number text-warning">{{ $event_minggu_ini }}</h3>
                        <span class="stats-sub"><i class="ti ti-calendar-event"></i> 7 hari terakhir</span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- =============== CHARTS ROW =============== -->
    <div class="row g-3 mb-4">

        <!-- LINE CHART -->
        <div class="col-lg-8">
            <div class="card chart-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Trend Event 6 Bulan Terakhir</h5>
                            <small class="text-muted">Statistik event per bulan</small>
                        </div>
                        <div class="chart-legend">
                            <span class="legend-dot bg-primary"></span>
                            <span>Jumlah Event</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="eventTrendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- DONUT CHART -->
        <div class="col-lg-4">
            <div class="card chart-card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Distribusi Status</h5>
                    <small class="text-muted">Perbandingan event aktif & selesai</small>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="chart-container-small">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- =============== BAR CHART =============== -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card chart-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Top 5 Lokasi Event Terbanyak</h5>
                            <small class="text-muted">Berdasarkan jumlah event yang diselenggarakan</small>
                        </div>
                        <span class="badge bg-primary">Top 5</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="lokasiChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =============== EVENT TERBARU =============== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Event Daerah Terbaru</h5>
                            <small class="text-muted">{{ $event_terbaru->count() }} event terbaru</small>
                        </div>
                        <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="ti ti-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if($event_terbaru->count() > 0)
                    <div class="row g-3">

                        @foreach($event_terbaru as $ev)
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card">
                                <!-- Status Badge -->
                                <div class="event-status">
                                    @if($ev->status === 'aktif')
                                        <span class="badge bg-success">
                                            <i class="ti ti-circle-check me-1"></i>Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="ti ti-circle-x me-1"></i>Selesai
                                        </span>
                                    @endif
                                </div>

                                <!-- Image -->
                                <div class="event-image">
                                    @if($ev->poster)
                                        <img src="{{ asset('storage/event/'.$ev->poster) }}" 
                                             alt="{{ $ev->nama_event }}"
                                             onerror="this.src='https://via.placeholder.com/400x250?text=No+Image'">
                                    @else
                                        <div class="no-image">
                                            <i class="ti ti-photo"></i>
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="event-content">
                                    <h6 class="event-title">{{ Str::limit($ev->nama_event, 40) }}</h6>

                                    <div class="event-meta">
                                        <div class="meta-item">
                                            <i class="ti ti-calendar"></i>
                                            <span>{{ \Carbon\Carbon::parse($ev->tanggal_mulai)->format('d M Y') }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="ti ti-map-pin"></i>
                                            <span>{{ Str::limit($ev->lokasi, 25) }}</span>
                                        </div>
                                        @if($ev->penyelenggara)
                                        <div class="meta-item">
                                            <i class="ti ti-user"></i>
                                            <span>{{ Str::limit($ev->penyelenggara->nama, 25) }}</span>
                                        </div>
                                        @endif
                                    </div>

                                    @if($ev->kategori_event)
                                    <span class="event-category">
                                        <i class="ti ti-tag"></i>
                                        {{ $ev->kategori_event }}
                                    </span>
                                    @endif

                                    <p class="event-description">
                                        {{ Str::limit($ev->deskripsi, 70) }}
                                    </p>

                                    <!-- Actions -->
                                    <div class="event-actions">
                                        <a href="{{ route('events.edit', $ev->id) }}" 
                                           class="btn btn-sm btn-outline-primary flex-fill">
                                            <i class="ti ti-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('events.show', $ev->id) }}" 
                                           class="btn btn-sm btn-primary flex-fill">
                                            <i class="ti ti-eye"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="ti ti-calendar-off"></i>
                        </div>
                        <h5>Belum Ada Event</h5>
                        <p>Mulai tambahkan event daerah pertama Anda!</p>
                        <a href="{{ route('events.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-2"></i>Tambah Event
                        </a>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// ========================================
// LINE CHART - Trend Event 6 Bulan Terakhir
// ========================================
const eventTrendCtx = document.getElementById('eventTrendChart');
if (eventTrendCtx) {
    new Chart(eventTrendCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chart_labels) !!},
            datasets: [{
                label: 'Jumlah Event',
                data: {!! json_encode($chart_data) !!},
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBackgroundColor: '#667eea',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#667eea',
                pointHoverBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    borderColor: '#667eea',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// ========================================
// DONUT CHART - Distribusi Status
// ========================================
const statusCtx = document.getElementById('statusChart');
if (statusCtx) {
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Event Aktif', 'Event Selesai'],
            datasets: [{
                data: [{{ $event_aktif }}, {{ $event_selesai }}],
                backgroundColor: [
                    '#2ca87f',
                    '#6c757d'
                ],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: {
                            size: 13
                        },
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            cutout: '65%'
        }
    });
}


</script>
@endpush