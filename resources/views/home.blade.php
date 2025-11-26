@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg text-white py-5" style="min-height: 500px; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">Promosikan Event Daerah Anda!</h1>
                <p class="lead mb-4">Platform terpercaya untuk mempromosikan berbagai event daerah. Jangkau lebih banyak peserta dengan layanan promosi profesional kami.</p>
                <a href="{{ route('user.events') }}" class="btn btn-light btn-lg px-5 py-3" style="border-radius: 50px;">
                    <i class="ti ti-calendar-event"></i> Lihat Event
                </a>
            </div>
            <div class="col-lg-6">
                <div style="background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.1) 100%); border-radius: 15px; padding: 80px; text-align: center; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                    <i class="ti ti-calendar-event" style="font-size: 10rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="ti ti-calendar-event text-purple" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-0 fw-bold">{{ $totalEvents }}</h3>
                        <p class="text-muted">Total Event</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="ti ti-users text-purple" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-0 fw-bold">{{ $totalOrganizers }}</h3>
                        <p class="text-muted">Penyelenggara</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="ti ti-calendar-check text-purple" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-0 fw-bold">{{ $upcomingEvents }}</h3>
                        <p class="text-muted">Event Mendatang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="ti ti-map-pin text-purple" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-0 fw-bold">10+</h3>
                        <p class="text-muted">Kota</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5" id="tentang">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Layanan Kami</h2>
            <p class="text-muted">Berbagai layanan promosi untuk kesuksesan event Anda</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="gradient-bg text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="ti ti-speakerphone" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Promosi Digital</h5>
                        <p class="text-muted">Jangkau audiens lebih luas melalui platform digital dan media sosial</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="gradient-bg text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="ti ti-chart-line" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Analisis Event</h5>
                        <p class="text-muted">Dapatkan laporan dan analisis lengkap performa event Anda</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="gradient-bg text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="ti ti-headset" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Support 24/7</h5>
                        <p class="text-muted">Tim support kami siap membantu Anda kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Events Section -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Event Unggulan</h2>
            <p class="text-muted">Event populer yang sedang trending saat ini</p>
        </div>
        <div class="row">
            @forelse($featuredEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    @if($event->poster)
                    <img src="{{ asset('storage/' . $event->poster) }}" class="card-img-top" alt="{{ $event->nama_event }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top gradient-bg d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="ti ti-calendar-event text-white" style="font-size: 5rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <span class="badge bg-success mb-2">{{ $event->kategori }}</span>
                        <h5 class="card-title fw-bold">{{ $event->nama_event }}</h5>
                        <p class="text-muted small mb-3">
                            {{ optional($event->penyelenggara)->nama ?? 'Penyelenggara tidak tersedia' }}
                        </p>
                        <p class="text-muted small mb-3">
                            <i class="ti ti-calendar"></i> {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                        </p>
                        <p class="text-muted small mb-3">
                            <i class="ti ti-map-pin"></i> {{ $event->lokasi }}
                        </p>
                        <p class="card-text">{{ Str::limit($event->deskripsi, 100) }}</p>
                        <a href="{{ route('user.event.show', $event->id) }}" class="btn btn-purple btn-sm w-100">
                            <i class="ti ti-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada event unggulan</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('user.events') }}" class="btn btn-purple btn-lg">
                <i class="ti ti-arrow-right"></i> Lihat Semua Event
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="gradient-bg text-white py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Siap Mempromosikan Event Anda?</h2>
        <p class="lead mb-4">Bergabunglah dengan ratusan penyelenggara event yang telah mempercayai kami</p>
        <a href="{{ route('user.events') }}" class="btn btn-light btn-lg px-5 py-3" style="border-radius: 50px;">
            <i class="ti ti-rocket"></i> Mulai Sekarang
        </a>
    </div>
</section>
@endsection