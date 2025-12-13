@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="text-white mb-0">Buat Event Baru</h3>
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

                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- PILIH PENYELENGGARA --}}
                        <div class="mb-4 p-3 bg-light rounded">
                            <h5 class="mb-3"><i class="ti ti-building"></i> Pilih Penyelenggara</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Penyelenggara <span class="text-danger">*</span></label>
                                <select name="penyelenggara_id" class="form-select form-select-lg" required>
                                    <option value="">-- Pilih Penyelenggara --</option>
                                    @foreach($penyelenggaras as $penyelenggara)
                                    <option value="{{ $penyelenggara->id }}" {{ old('penyelenggara_id') == $penyelenggara->id ? 'selected' : '' }}>
                                        {{ $penyelenggara->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Event ini akan ditampilkan atas nama penyelenggara yang dipilih</small>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- INFORMASI EVENT --}}
                        <h5 class="mb-3"><i class="ti ti-info-circle"></i> Informasi Event</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Event <span class="text-danger">*</span></label>
                            <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event') }}" placeholder="Contoh: Workshop Digital Marketing untuk UMKM" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tanggal Event <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_event" class="form-control" value="{{ old('tanggal_event') }}" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Seminar" {{ old('kategori') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                                    <option value="Workshop" {{ old('kategori') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                                    <option value="Pameran" {{ old('kategori') == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                                    <option value="Festival" {{ old('kategori') == 'Festival' ? 'selected' : '' }}>Festival</option>
                                    <option value="Pelatihan" {{ old('kategori') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" placeholder="Contoh: Hotel Kartika Sari, Bengkalis" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Event</label>
                            <textarea name="deskripsi" class="form-control" rows="6" placeholder="Jelaskan detail acara, materi, pembicara, dan informasi penting lainnya...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload Poster Event</label>
                            <input type="file" name="poster" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                        </div>

                        <hr class="my-4">

                        {{-- PENGATURAN UMKM --}}
                        <h5 class="mb-3"><i class="ti ti-users"></i> Pengaturan Pendaftaran UMKM</h5>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="open_registration" id="open_registration" value="1" {{ old('open_registration') ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="open_registration">
                                    Buka Pendaftaran UMKM
                                </label>
                            </div>
                            <small class="form-text text-muted">Aktifkan jika event ini membutuhkan pendaftaran UMKM</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Maksimal Peserta</label>
                            <input type="number" name="max_participants" class="form-control" value="{{ old('max_participants') }}" min="1" placeholder="Kosongkan jika unlimited">
                            <small class="form-text text-muted">Biarkan kosong untuk kapasitas unlimited</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Informasi Pendaftaran</label>
                            <textarea name="registration_info" class="form-control" rows="3" placeholder="Contoh: Peserta wajib membawa KTP, NPWP UMKM, dan foto produk...">{{ old('registration_info') }}</textarea>
                            <small class="form-text text-muted">Info tambahan untuk peserta UMKM</small>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="ti ti-device-floppy"></i> Simpan Event
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