@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Total Event</p>
                            <h2 class="mb-0 fw-bold">{{ $events->total() }}</h2>
                        </div>
                        <div class="opacity-50">
                            <i class="ti ti-calendar-event" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Event Aktif</p>
                            <h2 class="mb-0 fw-bold">{{ \App\Models\Event::where('tanggal_event', '>=', now())->count() }}</h2>
                        </div>
                        <div class="opacity-50">
                            <i class="ti ti-rocket" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Buka UMKM</p>
                            <h2 class="mb-0 fw-bold">{{ \App\Models\Event::where('open_registration', 1)->count() }}</h2>
                        </div>
                        <div class="opacity-50">
                            <i class="ti ti-users" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Penyelenggara</p>
                            <h2 class="mb-0 fw-bold">{{ \App\Models\Penyelenggara::count() }}</h2>
                        </div>
                        <div class="opacity-50">
                            <i class="ti ti-building" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header & Actions -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-0 fw-bold">
                        <i class="ti ti-calendar-event me-2 text-primary"></i>Manajemen Event
                    </h3>
                    <p class="text-muted mb-0 mt-1 small">Kelola semua event promosi daerah</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="btn-group me-2">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="ti ti-filter me-1"></i>Filter
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="ti ti-download me-1"></i>Export
                        </button>
                    </div>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-lg shadow-sm">
                        <i class="ti ti-plus me-1"></i> Buat Event Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="ti ti-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Events Grid -->
    <div class="row">
        @forelse($events as $event)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100 event-card">
                <!-- Poster -->
                @if($event->poster)
                    <img src="{{ route('poster.show', basename($event->poster)) }}" class="card-img-top" alt="{{ $event->nama_event }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-gradient d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="ti ti-calendar-event text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif
                
                <!-- Status Badge -->
                <div class="position-absolute top-0 end-0 m-3">
                    @if($event->open_registration)
                        <span class="badge bg-success shadow-sm">
                            <i class="ti ti-circle-check me-1"></i>Buka UMKM
                        </span>
                    @else
                        <span class="badge bg-secondary shadow-sm">
                            <i class="ti ti-circle-x me-1"></i>Tutup UMKM
                        </span>
                    @endif
                </div>

                <div class="card-body">
                    <!-- Kategori -->
                    @if($event->kategori)
                        <span class="badge bg-primary mb-2">{{ $event->kategori }}</span>
                    @endif
                    
                    <!-- Nama Event -->
                    <h5 class="card-title fw-bold mb-3">{{ Str::limit($event->nama_event, 50) }}</h5>
                    
                    <!-- Info -->
                    <div class="mb-2">
                        <small class="text-muted">
                            <i class="ti ti-building me-1"></i>
                            {{ $event->penyelenggara->nama }}
                        </small>
                    </div>
                    
                    <div class="mb-2">
                        <small class="text-muted">
                            <i class="ti ti-calendar me-1"></i>
                            {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                        </small>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="ti ti-map-pin me-1"></i>
                            {{ Str::limit($event->lokasi, 40) }}
                        </small>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-sm btn-info flex-fill">
                            <i class="ti ti-eye"></i> Lihat
                        </a>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning flex-fill">
                            <i class="ti ti-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus event ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="ti ti-calendar-off" style="font-size: 5rem; color: #dee2e6;"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Event</h5>
                    <p class="text-muted">Klik tombol "Buat Event Baru" untuk menambahkan event pertama</p>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mt-3">
                        <i class="ti ti-plus me-1"></i> Buat Event Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($events->hasPages())
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    Menampilkan {{ $events->firstItem() }} - {{ $events->lastItem() }} dari {{ $events->total() }} event
                </div>
                <nav>
                    {{ $events->onEachSide(1)->links() }}
                </nav>
            </div>
        </div>
    </div>
    @endif

</div>

<style>
/* Event Card Hover Effect */
.event-card {
    transition: all 0.3s ease;
    overflow: hidden;
}

.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}

.event-card img {
    transition: transform 0.3s ease;
}

.event-card:hover img {
    transform: scale(1.05);
}

/* Pagination Style */
.pagination {
    margin-bottom: 0;
}

.pagination .page-link {
    font-size: 13px;
    padding: 6px 12px;
    border-radius: 6px;
    margin: 0 3px;
    border: 1px solid #dee2e6;
    color: #495057;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}

.pagination .page-link:hover {
    background-color: #e9ecef;
    color: #0d6efd;
}

.pagination svg {
    width: 14px;
    height: 14px;
}

.pagination .page-link span {
    display: none;
}

/* Button Effects */
.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Badge Style */
.badge {
    padding: 6px 12px;
    font-weight: 500;
}

/* Stats Card Animation */
.card {
    transition: all 0.3s ease;
}
</style>
@endsection