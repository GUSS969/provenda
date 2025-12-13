@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-info d-flex justify-content-between align-items-center">
                    <h3 class="text-white mb-0">Detail Event</h3>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-light">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($event->poster)
                                <img src="{{ route('poster.show', basename($event->poster)) }}" alt="{{ $event->nama_event }}" class="img-fluid rounded shadow">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                                    <i class="ti ti-calendar-event" style="font-size: 5rem; color: #ccc;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h2 class="mb-3">{{ $event->nama_event }}</h2>
                            
                            <table class="table">
                                <tr>
                                    <th width="200">Penyelenggara:</th>
                                    <td>{{ $event->penyelenggara->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Event:</th>
                                    <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi:</th>
                                    <td>{{ $event->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori:</th>
                                    <td>
                                        @if($event->kategori)
                                            <span class="badge bg-info">{{ $event->kategori }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Pendaftaran UMKM:</th>
                                    <td>
                                        @if($event->open_registration)
                                            <span class="badge bg-success">Dibuka</span>
                                        @else
                                            <span class="badge bg-secondary">Ditutup</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kuota Peserta:</th>
                                    <td>
                                        @if($event->max_participants)
                                            {{ $event->max_participants }} peserta
                                        @else
                                            Unlimited
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pendaftar:</th>
                                    <td><strong>{{ $event->umkmRegistrations->count() }}</strong> UMKM</td>
                                </tr>
                            </table>

                            @if($event->deskripsi)
                            <div class="mt-3">
                                <h5>Deskripsi:</h5>
                                <p style="white-space: pre-line;">{{ $event->deskripsi }}</p>
                            </div>
                            @endif

                            @if($event->registration_info)
                            <div class="mt-3">
                                <h5>Info Pendaftaran:</h5>
                                <p style="white-space: pre-line;">{{ $event->registration_info }}</p>
                            </div>
                            @endif

                            <div class="mt-4">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">
                                    <i class="ti ti-edit"></i> Edit Event
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection