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
            <span class="badge bg-light text-dark">{{ $event->kategori ?? 'Umum' }}</span>
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
                <img src="{{ route('poster.show', basename($event->poster)) }}" alt="{{ $event->nama_event }}" class="img-fluid rounded shadow-lg">
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
                            <span class="ms-4">{{ $event->penyelenggara->nama_penyelenggara }}</span>
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

                        {{-- 
                        ========================================
                        ALUR PENDAFTARAN UMKM:
                        ========================================
                        1. Cek: open_registration == 1?
                           - TIDAK → Skip, gak tampil apapun
                           - YA → Lanjut ke step 2
                        
                        2. Cek: Kuota penuh?
                           - YA → Tampil "Kuota Penuh"
                           - TIDAK → Tampil Form Pendaftaran
                        ========================================
                        --}}

                        @if($event->open_registration == 1)
                        {{-- Event ini BUKA pendaftaran UMKM --}}
                        
                        <div class="card border-0 shadow-sm mt-4" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
                            <div class="card-body">
                                <h4 class="fw-bold text-success mb-3">
                                    <i class="ti ti-users"></i> Pendaftaran UMKM
                                </h4>
                                
                                {{-- Info Kuota --}}
                                <div class="row mb-3">
                                    @if($event->max_participants)
                                    {{-- Ada batas kuota --}}
                                    <div class="col-md-6">
                                        <div class="alert alert-info mb-0">
                                            <strong><i class="ti ti-users"></i> Total Kuota:</strong><br>
                                            {{ $event->max_participants }} peserta
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $registered = $event->umkmRegistrations->count();
                                            $remaining = $event->max_participants - $registered;
                                        @endphp
                                        <div class="alert {{ $remaining > 0 ? 'alert-success' : 'alert-danger' }} mb-0">
                                            <strong><i class="ti ti-ticket"></i> Sisa Kuota:</strong><br>
                                            {{ max(0, $remaining) }} dari {{ $event->max_participants }}
                                        </div>
                                    </div>
                                    @else
                                    {{-- Unlimited --}}
                                    <div class="col-12">
                                        <div class="alert alert-success mb-0">
                                            <strong><i class="ti ti-infinity"></i> Kuota Unlimited</strong><br>
                                            Tidak ada batasan peserta
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                {{-- Info Persyaratan --}}
                                @if($event->registration_info)
                                <div class="alert alert-warning">
                                    <h6 class="fw-bold mb-2"><i class="ti ti-info-circle"></i> Persyaratan Pendaftaran:</h6>
                                    <p class="mb-0" style="white-space: pre-line;">{{ $event->registration_info }}</p>
                                </div>
                                @endif

                                {{-- Cek: Kuota Penuh atau Belum? --}}
                                @php
                                    $isFull = false;
                                    if ($event->max_participants) {
                                        $registered = $event->umkmRegistrations->count();
                                        $isFull = ($registered >= $event->max_participants);
                                    }
                                @endphp

                                @if($isFull)
                                    {{-- KUOTA PENUH --}}
                                    <div class="alert alert-danger text-center py-4">
                                        <i class="ti ti-lock" style="font-size: 3rem;"></i>
                                        <h5 class="fw-bold mt-3 mb-2">Kuota Penuh!</h5>
                                        <p class="mb-0">Maaf, pendaftaran untuk event ini sudah penuh. Semua slot telah terisi.</p>
                                    </div>
                                @else
                                    {{-- MASIH ADA KUOTA - TAMPIL FORM --}}
                                    <p class="text-muted mb-3">
                                        <i class="ti ti-info-circle"></i> Event ini terbuka untuk pelaku UMKM. Daftarkan UMKM Anda sekarang!
                                    </p>

                                    {{-- Alert Success/Error --}}
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            <i class="ti ti-circle-check"></i> {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            <i class="ti ti-alert-circle"></i> {{ session('error') }}
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Terjadi kesalahan:</strong>
                                            <ul class="mb-0 mt-2">
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    {{-- FORM PENDAFTARAN UMKM --}}
                                    <form action="{{ route('user.event.daftar.umkm', $event->id) }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nama UMKM <span class="text-danger">*</span></label>
                                            <input type="text" name="nama_umkm" class="form-control" value="{{ old('nama_umkm') }}" placeholder="Contoh: Warung Sate Pak Bambang" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nama Pemilik <span class="text-danger">*</span></label>
                                            <input type="text" name="pemilik" class="form-control" value="{{ old('pemilik') }}" placeholder="Contoh: Bambang Sutejo" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="contoh@email.com">
                                            <small class="form-text text-muted">Opsional - untuk notifikasi</small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">No WhatsApp <span class="text-danger">*</span></label>
                                            <input type="text" name="no_wa" class="form-control" value="{{ old('no_wa') }}" placeholder="081234567890" required>
                                            <small class="form-text text-muted">Gunakan format: 08xxxxxxxxxx</small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kategori UMKM <span class="text-danger">*</span></label>
                                            <select name="kategori" class="form-select" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>Makanan & Minuman</option>
                                                <option value="fashion" {{ old('kategori') == 'fashion' ? 'selected' : '' }}>Fashion</option>
                                                <option value="kerajinan" {{ old('kategori') == 'kerajinan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                                <option value="jasa" {{ old('kategori') == 'jasa' ? 'selected' : '' }}>Jasa</option>
                                                <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Deskripsi Singkat Usaha</label>
                                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Ceritakan tentang usaha Anda... Misalnya: Kami menjual sate ayam dan sate kambing dengan bumbu khas Madura sejak 2010.">{{ old('deskripsi') }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-success w-100 fw-bold py-3">
                                            <i class="ti ti-send"></i> Daftar Sekarang
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        @endif
                        {{-- END: Pendaftaran UMKM --}}

                        <hr class="my-4">

                        <h5 class="fw-bold mb-3">Detail Event</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Kategori:</strong>
                                <p>{{ $event->kategori ?? 'Umum' }}</p>
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
                            @if($event->penyelenggara->no_telepon)
                            <i class="ti ti-phone"></i> {{ $event->penyelenggara->no_telepon }}
                            @endif
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
                    <img src="{{ route('poster.show', basename($relatedEvent->poster)) }}" class="card-img-top" alt="{{ $relatedEvent->nama_event }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top gradient-bg d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="ti ti-calendar-event text-white" style="font-size: 4rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $relatedEvent->kategori ?? 'Umum' }}</span>
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
```