@extends('layouts.user')

@section('content')
    <style>
        .event-detail-header {
            background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            padding: 40px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .event-detail-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .breadcrumb-custom {
            position: relative;
            z-index: 2;
        }

        .breadcrumb-custom .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: white;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: white;
            text-decoration: underline;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Main Content */
        .event-detail-content {
            margin-top: -60px;
            position: relative;
            z-index: 3;
            padding-bottom: 4rem;
        }

        /* Event Card */
        .event-main-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .event-poster {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
        }

        .event-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .event-poster-placeholder {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .event-poster-placeholder::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .event-poster-placeholder i {
            font-size: 150px;
            color: white;
            z-index: 1;
        }

        .event-category-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            background: rgba(124, 58, 237, 0.95);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .event-info-section {
            padding: 3rem;
        }

        .event-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        .event-meta-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #f3f4f6;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .meta-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .meta-content {
            flex: 1;
        }

        .meta-label {
            font-size: 0.85rem;
            color: #9ca3af;
            font-weight: 500;
            margin-bottom: 0.2rem;
        }

        .meta-value {
            font-size: 1.1rem;
            color: #1f2937;
            font-weight: 600;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title i {
            color: #7C3AED;
            font-size: 2rem;
        }

        .event-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 3rem;
            text-align: justify;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            border: 2px solid #f3f4f6;
            transition: all 0.3s ease;
        }

        .sidebar-card:hover {
            border-color: #A78BFA;
            box-shadow: 0 8px 30px rgba(124, 58, 237, 0.15);
        }

        .sidebar-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .sidebar-title i {
            color: #7C3AED;
            font-size: 1.6rem;
        }

        .organizer-info {
            text-align: center;
        }

        .organizer-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 3rem;
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        }

        .organizer-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .organizer-role {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .organizer-contact {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: #f3f4f6;
        }

        .contact-item i {
            color: #7C3AED;
            font-size: 1.3rem;
            width: 30px;
        }

        .contact-item span {
            color: #4b5563;
            font-weight: 500;
            flex: 1;
        }

        .btn-share {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            margin-top: 1.5rem;
        }

        .btn-share:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
            color: white;
        }

        /* Related Events */
        .related-events-section {
            padding: 4rem 0;
            background: linear-gradient(to bottom, white, #f9fafb);
        }

        .related-event-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 2px solid transparent;
            height: 100%;
        }

        .related-event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(124, 58, 237, 0.2);
            border-color: #A78BFA;
        }

        .related-event-image {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .related-event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-event-card:hover .related-event-image img {
            transform: scale(1.1);
        }

        .related-event-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .related-event-placeholder i {
            font-size: 80px;
            color: white;
        }

        .related-event-body {
            padding: 1.5rem;
        }

        .related-event-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: rgba(124, 58, 237, 0.1);
            color: #7C3AED;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .related-event-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
        }

        .related-event-meta {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1rem;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .related-event-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .related-event-meta i {
            color: #7C3AED;
            font-size: 1rem;
        }

        .btn-view-related {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-view-related:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(124, 58, 237, 0.3);
            color: white;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: white;
            color: #7C3AED;
            border: 2px solid #7C3AED;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .btn-back:hover {
            background: #7C3AED;
            color: white;
            transform: translateX(-5px);
        }

        /* Empty State */
        .empty-related {
            text-align: center;
            padding: 3rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .empty-related i {
            font-size: 80px;
            color: #e5e7eb;
            margin-bottom: 1rem;
        }

        .empty-related p {
            color: #9ca3af;
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .event-title {
                font-size: 2rem;
            }

            .event-poster,
            .event-poster-placeholder {
                height: 300px;
            }

            .event-info-section {
                padding: 2rem 1.5rem;
            }

            .event-meta-bar {
                gap: 1rem;
            }

            .meta-item {
                width: 100%;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .related-events-section {
                padding: 2rem 0;
            }
        }
    </style>

    <!-- Header -->
    <section class="event-detail-header">
        <div class="container">
            <div class="breadcrumb-custom">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.home') }}">
                                <i class="ti ti-home"></i> Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.events') }}">Event</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="event-detail-content">
        <div class="container">
            <a href="{{ route('user.events') }}" class="btn-back">
                <i class="ti ti-arrow-left"></i>
                Kembali ke Daftar Event
            </a>

            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="event-main-card">
                        <!-- Poster -->
                        <div class="event-image">
                            @if ($event->poster)
                                <img src="{{ route('poster.show', $event->poster) }}" alt="{{ $event->nama_event }}"
                                    class="img-fluid">
                            @else
                                <div class="event-placeholder">
                                    <i class="ti ti-calendar-event"></i>
                                </div>
                            @endif
                        </div>


                        <span class="event-category-badge">
                            <i class="ti ti-tag"></i> {{ $event->kategori ?? 'Umum' }}
                        </span>
                    </div>

                    <!-- Info -->
                    <div class="event-info-section">
                        <h1 class="event-title">{{ $event->nama_event }}</h1>

                        <!-- Meta Bar -->
                        <div class="event-meta-bar">
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Tanggal Event</div>
                                    <div class="meta-value">
                                        {{ \Carbon\Carbon::parse($event->tanggal_event)->isoFormat('dddd, D MMMM YYYY') }}
                                    </div>
                                </div>
                            </div>

                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="ti ti-clock"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Waktu</div>
                                    <div class="meta-value">
                                        {{ $event->waktu ?? '09:00 WIB' }}
                                    </div>
                                </div>
                            </div>

                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="ti ti-map-pin"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Lokasi</div>
                                    <div class="meta-value">{{ $event->lokasi }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <h2 class="section-title">
                                <i class="ti ti-info-circle"></i>
                                Tentang Event
                            </h2>
                            <div class="event-description">
                                {!! nl2br(e($event->deskripsi)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Organizer Info -->
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <i class="ti ti-user"></i>
                        Penyelenggara
                    </h3>
                    <div class="organizer-info">
                        <div class="organizer-avatar">
                            <i class="ti ti-building"></i>
                        </div>
                        <h4 class="organizer-name">
                            {{ optional($event->penyelenggara)->nama ?? 'Penyelenggara Event' }}
                        </h4>
                        <p class="organizer-role">Event Organizer</p>

                        <div class="organizer-contact">
                            @if (optional($event->penyelenggara)->email)
                                <div class="contact-item">
                                    <i class="ti ti-mail"></i>
                                    <span>{{ $event->penyelenggara->email }}</span>
                                </div>
                            @endif

                            @if (optional($event->penyelenggara)->telepon)
                                <div class="contact-item">
                                    <i class="ti ti-phone"></i>
                                    <span>{{ $event->penyelenggara->telepon }}</span>
                                </div>
                            @endif

                            @if (optional($event->penyelenggara)->alamat)
                                <div class="contact-item">
                                    <i class="ti ti-map-pin"></i>
                                    <span>{{ $event->penyelenggara->alamat }}</span>
                                </div>
                            @endif
                        </div>

                        <button class="btn-share" onclick="shareEvent()">
                            <i class="ti ti-share"></i>
                            Bagikan Event
                        </button>
                    </div>
                </div>

                <!-- Quick Info -->
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <i class="ti ti-info-square"></i>
                        Informasi Cepat
                    </h3>
                    <div class="organizer-contact">
                        <div class="contact-item">
                            <i class="ti ti-calendar-event"></i>
                            <span>
                                <strong>Dibuat:</strong><br>
                                {{ \Carbon\Carbon::parse($event->created_at)->isoFormat('D MMM YYYY') }}
                            </span>
                        </div>
                        <div class="contact-item">
                            <i class="ti ti-tag"></i>
                            <span>
                                <strong>Kategori:</strong><br>
                                {{ $event->kategori ?? 'Umum' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Related Events -->
    @if ($relatedEvents->count() > 0)
        <section class="related-events-section">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="ti ti-calendar"></i>
                    Event Serupa
                </h2>

                <div class="row g-4">
                    @foreach ($relatedEvents as $related)
                        <div class="col-lg-4 col-md-6">
                            <div class="related-event-card">
                                <div class="related-event-image">
                                    @if ($event->poster)
                                        <img src="{{ route('poster.show', $event->poster) }}"
                                            alt="{{ $event->nama_event }}"
                                            style="width:100%;height:350px;object-fit:cover;border-radius:12px;">
                                    @else
                                        <div class="event-poster-placeholder">
                                            <i class="ti ti-calendar-event"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="related-event-body">
                                    <span class="related-event-category">{{ $related->kategori ?? 'Umum' }}</span>
                                    <h3 class="related-event-title">{{ $related->nama_event }}</h3>
                                    <div class="related-event-meta">
                                        <span>
                                            <i class="ti ti-calendar"></i>
                                            {{ \Carbon\Carbon::parse($related->tanggal_event)->format('d M Y') }}
                                        </span>
                                        <span>
                                            <i class="ti ti-map-pin"></i>
                                            {{ $related->lokasi }}
                                        </span>
                                    </div>
                                    <a href="{{ route('user.event.show', $related->id) }}" class="btn-view-related">
                                        <i class="ti ti-eye"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="related-events-section">
            <div class="container">
                <div class="empty-related">
                    <i class="ti ti-calendar-off"></i>
                    <p>Belum ada event serupa lainnya</p>
                </div>
            </div>
        </section>
    @endif

    <script>
        function shareEvent() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $event->nama_event }}',
                    text: 'Lihat event menarik ini: {{ $event->nama_event }}',
                    url: window.location.href
                }).then(() => {
                    console.log('Berhasil dibagikan!');
                }).catch((error) => {
                    console.log('Error sharing:', error);
                    fallbackShare();
                });
            } else {
                fallbackShare();
            }
        }

        function fallbackShare() {
            const url = window.location.href;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link event berhasil disalin ke clipboard!');
                });
            } else {
                prompt('Copy link ini:', url);
            }
        }
    </script>
@endsection
