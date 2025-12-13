@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-warning">
                    <h3 class="text-white mb-0">Edit Event</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="ti ti-alert-circle"></i> <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- PILIH PENYELENGGARA --}}
                        <div class="mb-4 p-3 bg-light rounded">
                            <h5 class="mb-3"><i class="ti ti-building"></i> Pilih Penyelenggara</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Penyelenggara <span class="text-danger">*</span></label>
                                <select name="penyelenggara_id" class="form-select form-select-lg" required>
                                    <option value="">-- Pilih Penyelenggara --</option>
                                    @foreach($penyelenggaras as $penyelenggara)
                                    <option value="{{ $penyelenggara->id }}" {{ old('penyelenggara_id', $event->penyelenggara_id) == $penyelenggara->id ? 'selected' : '' }}>
                                        {{ $penyelenggara->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- INFORMASI EVENT --}}
                        <h5 class="mb-3"><i class="ti ti-info-circle"></i> Informasi Event</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Event <span class="text-danger">*</span></label>
                            <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event', $event->nama_event) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tanggal Event <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_event" class="form-control" value="{{ old('tanggal_event', $event->tanggal_event) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Seminar" {{ old('kategori', $event->kategori) == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                                    <option value="Workshop" {{ old('kategori', $event->kategori) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                                    <option value="Pameran" {{ old('kategori', $event->kategori) == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                                    <option value="Festival" {{ old('kategori', $event->kategori) == 'Festival' ? 'selected' : '' }}>Festival</option>
                                    <option value="Pelatihan" {{ old('kategori', $event->kategori) == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                                    <option value="Lainnya" {{ old('kategori', $event->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $event->lokasi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Event</label>
                            <textarea name="deskripsi" class="form-control" rows="6">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                        </div>

                        @if($event->poster)
                        <div class="mb-3">
                            <label class="form-label fw-bold">Poster Saat Ini:</label><br>
                            <img src="{{ route('poster.show', basename($event->poster)) }}" alt="Poster" style="max-width: 300px; border-radius: 10px;">
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload Poster Baru (Opsional)</label>
                            <input type="file" name="poster" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah poster</small>
                        </div>

                        <hr class="my-4">

                        {{-- PENGATURAN UMKM --}}
                        <h5 class="mb-3"><i class="ti ti-users"></i> Pengaturan Pendaftaran UMKM</h5>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="open_registration" id="open_registration" value="1" {{ old('open_registration', $event->open_registration) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="open_registration">
                                    Buka Pendaftaran UMKM
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Maksimal Peserta</label>
                            <input type="number" name="max_participants" class="form-control" value="{{ old('max_participants', $event->max_participants) }}" min="1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Informasi Pendaftaran</label>
                            <textarea name="registration_info" class="form-control" rows="3">{{ old('registration_info', $event->registration_info) }}</textarea>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="ti ti-device-floppy"></i> Update Event
                            </button>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-lg">
                                <i class="ti ti-x"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection