@extends('layouts.user')

@section('content')
<!-- Event Header -->
<section class="gradient-bg text-white py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}" class="text-white">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.events') }}" class="text-white">Event</a></li>
                <li class="breadcrumb-item active text-white">{{ $event->nama_event }}</li>
            </ol>
        </nav>
        <h1 class="fw-bold">{{ $event->nama_event }}</h1>
        <p class="mb-0">
            <span class="badge bg-light text-dark">{{ $event->kategori }}</span>
        </p>
    </div>
</section>

<!-- Event Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Event Poster -->
            <div class="col-lg-5 mb-4">
                @if($event->poster)
                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->nama_event }}" class="img-fluid rounded shadow-lg">
                @else
                <div class="gradient-bg d-flex align-items-center justify-content-center rounded shadow-lg" style="height: 400px;">
                    <i class="ti ti-calendar-event text-white" style="font-size: 8rem;"></i>
                </div>
                @endif

                <!-- Quick Info Card -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Informasi Cepat</h5>
                        <div class="mb-3">
                            <i class="ti ti-calendar text-purple"></i>
                            <strong>Tanggal:</strong><br>
                            <span class="ms-4">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}</span>
                        </div>
                        <div class="mb-3">
                            <i class="ti ti-clock text-purple"></i>
                            <strong>Waktu:</strong><br>
                            <span class="ms-4">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('H:i') }} WIB</span>
                        </div>
                        <div class="mb-3">
                            <i class="ti ti-map-pin text-purple"></i>
                            <strong>Lokasi:</strong><br>
                            <span class="ms-4">{{ $event->lokasi }}</span>
                        </div>
                        <div class="mb-0">
                            <i class="ti ti-user text-purple"></i>
                            <strong>Penyelenggara:</strong><br>
                            <span class="ms-4">{{ $event->penyelenggara->nama }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Description -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">Tentang Event</h3>
                        <p style="white-space: pre-line;">{{ $event->deskripsi }}</p>
                        
                        <hr class="my-4">
                        
                        <h5 class="fw-bold mb-3">Detail Event</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Kategori:</strong>
                                <p>{{ $event->kategori }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Status:</strong>
                                <p>
                                    @if(\Carbon\Carbon::parse($event->tanggal_event)->isFuture())
                                        <span class="badge bg-success">Akan Datang</span>
                                    @else
                                        <span class="badge bg-secondary">Selesai</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="fw-bold mb-3">Kontak Penyelenggara</h5>
                        <p>
                            <i class="ti ti-mail"></i> {{ $event->penyelenggara->email }}<br>
                            <i class="ti ti-phone"></i> {{ $event->penyelenggara->telepon }}
                        </p>

                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('user.events') }}" class="btn btn-outline-secondary">
                                <i class="ti ti-arrow-left"></i> Kembali ke Daftar Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Events -->
@if($relatedEvents->count() > 0)
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h3 class="fw-bold mb-4">Event Serupa</h3>
        <div class="row">
            @foreach($relatedEvents as $relatedEvent)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    @if($relatedEvent->poster)
                    <img src="{{ asset('storage/' . $relatedEvent->poster) }}" class="card-img-top" alt="{{ $relatedEvent->nama_event }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top gradient-bg d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="ti ti-calendar-event text-white" style="font-size: 4rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $relatedEvent->kategori }}</span>
                        <h6 class="card-title fw-bold">{{ $relatedEvent->nama_event }}</h6>
                        <p class="text-muted small mb-2">
                            <i class="ti ti-calendar"></i> {{ \Carbon\Carbon::parse($relatedEvent->tanggal_event)->format('d M Y') }}
                        </p>
                        <a href="{{ route('user.event.show', $relatedEvent->id) }}" class="btn btn-purple btn-sm w-100">
                            <i class="ti ti-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection