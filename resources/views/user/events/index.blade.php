@extends('layouts.user')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .page-header-content {
        position: relative;
        z-index: 2;
    }

    .page-title {
        font-size: 3rem;
        font-weight: bold;
        color: white;
        margin-bottom: 1rem;
    }

    .page-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Filter Section */
    .filter-section {
        background: white;
        padding: 2rem 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        margin-top: -40px;
        position: relative;
        z-index: 3;
        border-radius: 20px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        outline: none;
    }

    .search-box i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-size: 1.3rem;
    }

    .filter-select {
        padding: 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        outline: none;
    }

    .btn-filter {
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
        color: white;
        border: none;
        border-radius: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
    }

    .btn-reset {
        padding: 1rem 2rem;
        background: #f3f4f6;
        color: #6b7280;
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-reset:hover {
        background: #e5e7eb;
        color: #374151;
    }

    /* Events Grid */
    .events-grid {
        padding: 4rem 0;
    }

    .event-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 2px solid transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(124, 58, 237, 0.2);
        border-color: #A78BFA;
    }

    .event-image {
        width: 100%;
        height: 250px;
        position: relative;
        overflow: hidden;
    }

    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .event-card:hover .event-image img {
        transform: scale(1.1);
    }

    .event-placeholder {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .event-placeholder::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .event-placeholder i {
        font-size: 100px;
        color: white;
        z-index: 1;
    }

    .event-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(124, 58, 237, 0.95);
        backdrop-filter: blur(10px);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        z-index: 2;
    }

    .event-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .event-title {
        font-size: 1.3rem;
        font-weight: bold;
        color: #1f2937;
        margin-bottom: 0.8rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-organizer {
        color: #9ca3af;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .event-organizer i {
        color: #7C3AED;
    }

    .event-meta {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        margin-bottom: 1.2rem;
    }

    .event-meta-item {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        color: #6b7280;
        font-size: 0.95rem;
    }

    .event-meta-item i {
        color: #7C3AED;
        font-size: 1.2rem;
        width: 24px;
    }

    .event-description {
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-view-detail {
        width: 100%;
        padding: 0.9rem;
        background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-view-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
    }

    .empty-state i {
        font-size: 120px;
        color: #e5e7eb;
        margin-bottom: 2rem;
    }

    .empty-state-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 0.8rem;
    }

    .empty-state-text {
        color: #9ca3af;
        font-size: 1.1rem;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
    }

    .pagination .page-link {
        padding: 0.8rem 1.2rem;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        color: #6b7280;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: #7C3AED;
        border-color: #7C3AED;
        color: white;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
        border-color: transparent;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        background: #f3f4f6;
        border-color: #e5e7eb;
        color: #9ca3af;
    }

    /* Results Count */
    .results-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .results-count {
        font-size: 1.1rem;
        color: #6b7280;
        font-weight: 500;
    }

    .results-count strong {
        color: #7C3AED;
        font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .filter-section {
            margin-top: -20px;
        }

        .event-card {
            margin-bottom: 2rem;
        }
    }
</style>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content text-center">
            <h1 class="page-title">Jelajahi Event Daerah</h1>
            <p class="page-subtitle">Temukan berbagai event menarik di daerah Anda</p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="container">
    <div class="filter-section">
        <form action="{{ route('user.events') }}" method="GET">
            <div class="container">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label fw-semibold mb-2">
                            <i class="ti ti-search"></i> Cari Event
                        </label>
                        <div class="search-box">
                            <i class="ti ti-search"></i>
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control" 
                                placeholder="Cari nama event, lokasi..." 
                                value="{{ request('search') }}"
                            >
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-semibold mb-2">
                            <i class="ti ti-category"></i> Kategori
                        </label>
                        <select name="kategori" class="form-select filter-select">
                            <option value="">Semua Kategori</option>
                            <option value="Musik" {{ request('kategori') == 'Musik' ? 'selected' : '' }}>Musik</option>
                            <option value="Olahraga" {{ request('kategori') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Seni & Budaya" {{ request('kategori') == 'Seni & Budaya' ? 'selected' : '' }}>Seni & Budaya</option>
                            <option value="Teknologi" {{ request('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Pendidikan" {{ request('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Festival" {{ request('kategori') == 'Festival' ? 'selected' : '' }}>Festival</option>
                            <option value="Pameran" {{ request('kategori') == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                            <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label fw-semibold mb-2">
                            <i class="ti ti-sort-ascending"></i> Urutkan
                        </label>
                        <select name="sort" class="form-select filter-select">
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                            <option value="nama_az" {{ request('sort') == 'nama_az' ? 'selected' : '' }}>Nama A-Z</option>
                            <option value="nama_za" {{ request('sort') == 'nama_za' ? 'selected' : '' }}>Nama Z-A</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-filter w-100">
                                <i class="ti ti-search"></i>
                            </button>
                            <a href="{{ route('user.events') }}" class="btn btn-reset">
                                <i class="ti ti-refresh"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Events Grid -->
<section class="events-grid">
    <div class="container">
        @if($events->count() > 0)
            <!-- Results Info -->
            <div class="results-info">
                <div class="results-count">
                    Menampilkan <strong>{{ $events->count() }}</strong> dari <strong>{{ $events->total() }}</strong> event
                </div>
            </div>

            <!-- Events Grid -->
            <div class="row g-4">
                @foreach($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        <div class="event-image">
                            @if($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->nama_event }}">
                            @else
                                <div class="event-placeholder">
                                    <i class="ti ti-calendar-event"></i>
                                </div>
                            @endif
                            <span class="event-badge">{{ $event->kategori ?? 'Umum' }}</span>
                        </div>
                        <div class="event-body">
                            <h3 class="event-title">{{ $event->nama_event }}</h3>
                            <div class="event-organizer">
                                <i class="ti ti-user"></i>
                                {{ optional($event->penyelenggara)->nama ?? 'Penyelenggara' }}
                            </div>
                            <div class="event-meta">
                                <div class="event-meta-item">
                                    <i class="ti ti-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</span>
                                </div>
                                <div class="event-meta-item">
                                    <i class="ti ti-map-pin"></i>
                                    <span>{{ $event->lokasi }}</span>
                                </div>
                            </div>
                            <p class="event-description">
                                {{ Str::limit($event->deskripsi, 120) }}
                            </p>
                            <a href="{{ route('user.event.show', $event->id) }}" class="btn-view-detail">
                                <i class="ti ti-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $events->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="ti ti-calendar-off"></i>
                <h3 class="empty-state-title">Event Tidak Ditemukan</h3>
                <p class="empty-state-text">
                    @if(request('search') || request('kategori'))
                        Tidak ada event yang sesuai dengan pencarian Anda. Coba kata kunci lain.
                    @else
                        Belum ada event yang tersedia saat ini. Silakan cek kembali nanti.
                    @endif
                </p>
                @if(request('search') || request('kategori'))
                    <a href="{{ route('user.events') }}" class="btn btn-purple mt-3">
                        <i class="ti ti-refresh"></i> Reset Filter
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection