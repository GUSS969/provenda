@extends('penyelenggara.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<style>
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-card.teal {
        border-left-color: var(--primary-teal);
    }

    .stat-card.orange {
        border-left-color: var(--primary-orange);
    }

    .stat-card.blue {
        border-left-color: #3B82F6;
    }

    .stat-card.purple {
        border-left-color: #8B5CF6;
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-icon.teal {
        background: rgba(13, 148, 136, 0.1);
        color: var(--primary-teal);
    }

    .stat-icon.orange {
        background: rgba(249, 115, 22, 0.1);
        color: var(--primary-orange);
    }

    .stat-icon.blue {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
    }

    .stat-icon.purple {
        background: rgba(139, 92, 246, 0.1);
        color: #8B5CF6;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #64748b;
        font-weight: 500;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .stat-trend {
        font-size: 0.85rem;
        color: #10b981;
        font-weight: 600;
    }

    .stat-trend i {
        font-size: 1rem;
    }

    /* Content Cards */
    .content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 25px;
    }

    .content-card {
        background: white;
        border-radius: 15px;
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-body {
        padding: 25px;
    }

    /* Event List */
    .event-item {
        padding: 15px;
        border-radius: 12px;
        background: #f8fafc;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .event-item:hover {
        background: #f1f5f9;
        transform: translateX(5px);
    }

    .event-info h6 {
        margin: 0 0 5px 0;
        font-weight: 600;
        color: #1f2937;
    }

    .event-info p {
        margin: 0;
        font-size: 0.85rem;
        color: #64748b;
    }

    .event-date {
        text-align: right;
    }

    .event-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .badge-upcoming {
        background: rgba(13, 148, 136, 0.1);
        color: var(--primary-teal);
    }

    .badge-completed {
        background: rgba(100, 116, 139, 0.1);
        color: #64748b;
    }

    /* Quick Actions */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .action-btn {
        padding: 20px;
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-btn:hover {
        border-color: var(--primary-teal);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    .action-btn i {
        font-size: 2rem;
        color: var(--primary-teal);
        margin-bottom: 10px;
    }

    .action-btn h6 {
        margin: 0;
        font-weight: 600;
        color: #1f2937;
    }

    /* Chart Container */
    .chart-container {
        position: relative;
        height: 300px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #94a3b8;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card teal">
        <div class="stat-header">
            <div>
                <p class="stat-label">Total Event</p>
                <h2 class="stat-value">{{ $totalEvents }}</h2>
                <p class="stat-trend">
                    <i class="ti ti-trending-up"></i> {{ $monthlyEvents }} bulan ini
                </p>
            </div>
            <div class="stat-icon teal">
                <i class="ti ti-calendar-event"></i>
            </div>
        </div>
    </div>

    <div class="stat-card orange">
        <div class="stat-header">
            <div>
                <p class="stat-label">Event Aktif</p>
                <h2 class="stat-value">{{ $activeEvents }}</h2>
                <p class="stat-trend">
                    <i class="ti ti-clock"></i> Sedang berlangsung
                </p>
            </div>
            <div class="stat-icon orange">
                <i class="ti ti-player-play"></i>
            </div>
        </div>
    </div>

    <div class="stat-card blue">
        <div class="stat-header">
            <div>
                <p class="stat-label">Event Selesai</p>
                <h2 class="stat-value">{{ $completedEvents }}</h2>
                <p class="stat-trend">
                    <i class="ti ti-check"></i> Berhasil
                </p>
            </div>
            <div class="stat-icon blue">
                <i class="ti ti-flag-check"></i>
            </div>
        </div>
    </div>

    <div class="stat-card purple">
        <div class="stat-header">
            <div>
                <p class="stat-label">Total Peserta</p>
                <h2 class="stat-value">0</h2>
                <p class="stat-trend">
                    <i class="ti ti-users"></i> Segera hadir
                </p>
            </div>
            <div class="stat-icon purple">
                <i class="ti ti-users-group"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <a href="#" class="action-btn">
        <i class="ti ti-plus-circle"></i>
        <h6>Buat Event Baru</h6>
    </a>
    <a href="#" class="action-btn">
        <i class="ti ti-chart-bar"></i>
        <h6>Lihat Laporan</h6>
    </a>
    <a href="#" class="action-btn">
        <i class="ti ti-ticket"></i>
        <h6>Kelola Tiket</h6>
    </a>
    <a href="#" class="action-btn">
        <i class="ti ti-settings"></i>
        <h6>Pengaturan</h6>
    </a>
</div>

<!-- Content Grid -->
<div class="content-grid">
    <!-- Recent Events -->
    <div class="content-card">
        <div class="card-header">
            <h5 class="card-title">
                <i class="ti ti-calendar"></i>
                Event Terbaru
            </h5>
            <a href="#" style="color: var(--primary-teal); text-decoration: none; font-weight: 600;">Lihat Semua</a>
        </div>
        <div class="card-body">
            @if($recentEvents->count() > 0)
                @foreach($recentEvents as $event)
                <div class="event-item">
                    <div class="event-info">
                        <h6>{{ $event->nama_event }}</h6>
                        <p><i class="ti ti-map-pin"></i> {{ $event->lokasi }}</p>
                    </div>
                    <div class="event-date">
                        <span class="event-badge badge-upcoming">
                            {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                        </span>
                        <p style="margin: 0; font-size: 0.85rem; color: #64748b;">
                            {{ \Carbon\Carbon::parse($event->created_at)->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="ti ti-calendar-off"></i>
                    <p>Belum ada event yang dibuat</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="content-card">
        <div class="card-header">
            <h5 class="card-title">
                <i class="ti ti-clock"></i>
                Event Mendatang
            </h5>
            <a href="#" style="color: var(--primary-teal); text-decoration: none; font-weight: 600;">Lihat Semua</a>
        </div>
        <div class="card-body">
            @if($upcomingEvents->count() > 0)
                @foreach($upcomingEvents as $event)
                <div class="event-item">
                    <div class="event-info">
                        <h6>{{ $event->nama_event }}</h6>
                        <p><i class="ti ti-map-pin"></i> {{ $event->lokasi }}</p>
                    </div>
                    <div class="event-date">
                        <span class="event-badge badge-upcoming">
                            {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                        </span>
                        <p style="margin: 0; font-size: 0.85rem; color: var(--primary-teal); font-weight: 600;">
                            {{ \Carbon\Carbon::parse($event->tanggal_event)->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="ti ti-calendar-off"></i>
                    <p>Tidak ada event mendatang</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="content-card" style="margin-top: 25px;">
    <div class="card-header">
        <h5 class="card-title">
            <i class="ti ti-chart-line"></i>
            Performa Event (6 Bulan Terakhir)
        </h5>
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="eventChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Event Chart
    const ctx = document.getElementById('eventChart').getContext('2d');
    const eventChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Jumlah Event',
                data: {!! json_encode($chartData) !!},
                borderColor: '#0D9488',
                backgroundColor: 'rgba(13, 148, 136, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#0D9488',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
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
                    backgroundColor: '#1f2937',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    },
                    cornerRadius: 8
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
                        color: '#f1f5f9'
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
</script>
@endpush