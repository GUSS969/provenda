@extends('layouts.user')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-0">
                        <!-- Header -->
                        <div class="text-center p-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="ti ti-circle-check text-white mb-3" style="font-size: 6rem;"></i>
                            <h2 class="text-white fw-bold mb-2">Pendaftaran Berhasil!</h2>
                            <p class="text-white-50 mb-0">Terima kasih telah mendaftar</p>
                        </div>

                        <!-- Content -->
                        <div class="p-4 p-md-5">
                            <!-- Event Info -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">{{ $registration->event->nama_event }}</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <i class="ti ti-calendar text-primary me-2"></i>
                                            <strong>Tanggal:</strong><br>
                                            <span class="ms-4">{{ \Carbon\Carbon::parse($registration->event->tanggal_event)->format('d F Y, H:i') }} WIB</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <i class="ti ti-map-pin text-primary me-2"></i>
                                            <strong>Lokasi:</strong><br>
                                            <span class="ms-4">{{ $registration->event->lokasi }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stand Number -->
                            <div class="card border-0 mb-4" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                <div class="card-body text-center text-white p-5">
                                    <h5 class="fw-bold mb-2">NOMOR STAND ANDA</h5>
                                    <div class="display-1 fw-bold mb-3" style="font-size: 6rem; text-shadow: 3px 3px 6px rgba(0,0,0,0.3);">
                                        {{ $registration->stand_number }}
                                    </div>
                                    <p class="mb-0 opacity-75">Catat atau screenshot nomor stand ini</p>
                                </div>
                            </div>

                            <!-- UMKM Info -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-header bg-white border-bottom">
                                    <h6 class="mb-0 fw-bold">Detail Pendaftaran Anda</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <small class="text-muted">Nama UMKM</small>
                                            <p class="mb-0 fw-bold">{{ $registration->nama_umkm }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <small class="text-muted">Nama Pemilik</small>
                                            <p class="mb-0 fw-bold">{{ $registration->pemilik }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <small class="text-muted">Kategori</small>
                                            <p class="mb-0">
                                                <span class="badge bg-primary">{{ ucfirst($registration->kategori) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <small class="text-muted">No WhatsApp</small>
                                            <p class="mb-0 fw-bold">{{ $registration->no_wa }}</p>
                                        </div>
                                        @if($registration->email)
                                        <div class="col-md-12 mb-3">
                                            <small class="text-muted">Email</small>
                                            <p class="mb-0">{{ $registration->email }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="d-grid gap-3">
                                <button onclick="window.print()" class="btn btn-success btn-lg shadow-sm">
                                    <i class="ti ti-printer me-2"></i>Print Halaman Ini
                                </button>
                                <a href="{{ route('user.events') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="ti ti-arrow-left me-2"></i>Kembali ke Daftar Event
                                </a>
                            </div>

                            <!-- Info Alert -->
                            <div class="alert alert-info mt-4 border-0 shadow-sm">
                                <div class="d-flex align-items-start">
                                    <i class="ti ti-info-circle me-3" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h6 class="fw-bold mb-2">Informasi Penting:</h6>
                                        <ul class="mb-0 small">
                                            <li><strong>Screenshot atau print halaman ini</strong></li>
                                            <li>Tunjukkan nomor stand saat check-in di lokasi event</li>
                                            <li>Datang 30 menit sebelum event dimulai</li>
                                            <li>Hubungi penyelenggara jika ada pertanyaan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media print {
    .btn, .alert, nav, footer {
        display: none !important;
    }
}
</style>
@endsection