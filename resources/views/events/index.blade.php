@extends('layouts.user')

@section('content')
<!-- Page Header -->
<section class="gradient-bg text-white py-5">
    <div class="container">
        <h1 class="fw-bold mb-2">Daftar Event</h1>
        <p class="mb-0">Temukan event menarik di daerah Anda</p>
    </div>
</section>

<!-- Events List -->
<section class="py-5">
    <div class="container">
        <!-- Search and Filter -->
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <form action="{{ route('user.events') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari event..." value="{{ request('search') }}">
                        <button class="btn btn-purple" type="submit">
                            <i class="ti ti-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mb-3">
                <select class="form-select" onchange="window.location.href=this.value">
                    <option value="{{ route('user.events') }}">Semua Kategori</option>
                    <option value="{{ route('user.events', ['kategori' => 'Seminar']) }}" {{ request('kategori') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                    <option value="{{ route('user.events', ['kategori' => 'Workshop']) }}" {{ request('kategori') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="{{ route('user.events', ['kategori' => 'Konser']) }}" {{ request('kategori') == 'Konser' ? 'selected' : '' }}>Konser</option>
                    <option value="{{ route('user.events', ['kategori' => 'Festival']) }}" {{ request('kategori') == 'Festival' ? 'selected' : '' }}>Festival</option>
                    <option value="{{ route('user.events', ['kategori' => 'Pameran']) }}" {{ request('kategori') == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                </select>
            </div>
        </div>

        <!-- Events Grid -->
        <div class="row">
            @forelse($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    @if($event->poster)
                    <img src="{{ route('poster.show', basename($event->poster)) }}" 
                         class="card-img-top" 
                         alt="{{ $event->nama_event }}" 
                         style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top gradient-bg d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="ti ti-calendar-event text-white" style="font-size: 5rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $event->kategori }}</span>
                        <h5 class="card-title fw-bold">{{ $event->nama_event }}</h5>
                        <p class="text-muted small mb-2">
                            <i class="ti ti-user"></i> {{ $event->penyelenggara->nama ?? 'Penyelenggara tidak tersedia' }}
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="ti ti-calendar"></i> {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                        </p>
                        <p class="text-muted small mb-3">
                            <i class="ti ti-map-pin"></i> {{ $event->lokasi }}
                        </p>
                        <p class="card-text">{{ Str::limit($event->deskripsi, 80) }}</p>
                        <a href="{{ route('user.event.show', $event->id) }}" class="btn btn-purple btn-sm w-100 mt-auto">
                            <i class="ti ti-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="ti ti-info-circle fs-1"></i>
                    <h5 class="mt-3">Tidak ada event ditemukan</h5>
                    <p class="mb-0">Coba gunakan kata kunci pencarian yang berbeda</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                {{ $events->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        @endif
    </div>
</section>

<style>
/* Custom Pagination Styling */
.pagination {
    margin-bottom: 0;
}

.pagination .page-link {
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    color: #6c757d;
    border: 1px solid #dee2e6;
    margin: 0 2px;
}

.pagination .page-item.active .page-link {
    background-color: #7c3aed;
    border-color: #7c3aed;
    color: white;
}

.pagination .page-link:hover {
    background-color: #f8f9fa;
    color: #7c3aed;
}

.pagination .page-link:focus {
    box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.25);
}

/* Fix icon size in pagination if using icons */
.pagination svg {
    width: 1em;
    height: 1em;
}
</style>
@endsection