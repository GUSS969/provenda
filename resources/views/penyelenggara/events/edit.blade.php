@extends('penyelenggara.layouts.app')

@section('page-title', 'Edit Event')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="ti ti-edit"></i>
        Edit Event
    </h1>
    <a href="{{ route('penyelenggara.event_saya') }}" class="btn-secondary">
        <i class="ti ti-arrow-left"></i>
        Kembali
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    <i class="ti ti-circle-check"></i>
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <i class="ti ti-alert-circle"></i>
    <strong>Terjadi kesalahan:</strong>
    <ul style="margin: 10px 0 0 20px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="content-card">
    <form action="{{ route('penyelenggara.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="event-form">
        @csrf
        @method('PUT')
        
        <div class="form-section">
            <h3><i class="ti ti-info-circle"></i> Informasi Event</h3>
            
            <div class="form-group">
                <label for="nama_event">Nama Event <span class="required">*</span></label>
                <input type="text" id="nama_event" name="nama_event" class="form-control" 
                       value="{{ old('nama_event', $event->nama_event) }}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_event">Tanggal Event <span class="required">*</span></label>
                    <input type="date" id="tanggal_event" name="tanggal_event" class="form-control" 
                           value="{{ old('tanggal_event', $event->tanggal_event) }}" required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" class="form-control">
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

            <div class="form-group">
                <label for="lokasi">Lokasi <span class="required">*</span></label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" 
                       value="{{ old('lokasi', $event->lokasi) }}" placeholder="Contoh: Hotel Kartika Sari, Bengkalis" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Event</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="6" 
                          placeholder="Tulis deskripsi lengkap tentang event Anda..." spellcheck="false">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                <small class="form-text">Jelaskan detail acara, materi, pembicara, dan informasi penting lainnya</small>
            </div>
        </div>

        <div class="form-section">
            <h3><i class="ti ti-photo"></i> Poster Event</h3>
            
            @if($event->poster)
            <div class="current-poster">
                <label>Poster Saat Ini:</label>
                <div class="poster-wrapper">
                    <img src="{{ route('poster.show', basename($event->poster)) }}" alt="Current Poster" class="poster-preview">
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="poster">Upload Poster Baru (Opsional)</label>
                <input type="file" id="poster" name="poster" class="form-control" accept="image/*">
                <small class="form-text">Format: JPG, PNG, atau JPEG. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah poster.</small>
            </div>
        </div>

        <div class="form-section">
            <h3><i class="ti ti-users"></i> Pengaturan Pendaftaran UMKM</h3>
            
            <div class="form-group">
                <label class="switch-label">
                    <input type="checkbox" name="open_registration" id="open_registration" value="1" 
                           {{ old('open_registration', $event->open_registration ?? true) ? 'checked' : '' }}>
                    <span class="switch-text">Buka Pendaftaran UMKM</span>
                </label>
                <small class="form-text">Aktifkan untuk mengizinkan UMKM mendaftar ke event ini</small>
            </div>

            <div class="form-group">
                <label for="max_participants">Maksimal Peserta (Opsional)</label>
                <input type="number" id="max_participants" name="max_participants" class="form-control" 
                       value="{{ old('max_participants', $event->max_participants ?? '') }}" min="1" placeholder="Kosongkan jika tidak ada batas">
                <small class="form-text">Biarkan kosong untuk kapasitas unlimited. 
                    @if(isset($event->umkmRegistrations))
                    Saat ini: <strong>{{ $event->umkmRegistrations->count() }} peserta</strong> terdaftar
                    @endif
                </small>
            </div>

            <div class="form-group">
                <label for="registration_info">Informasi Pendaftaran (Opsional)</label>
                <textarea id="registration_info" name="registration_info" class="form-control" rows="4" 
                          placeholder="Contoh: Peserta wajib membawa KTP, NPWP UMKM, dan foto produk...">{{ old('registration_info', $event->registration_info ?? '') }}</textarea>
                <small class="form-text">Info tambahan yang akan dilihat UMKM saat mendaftar</small>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="ti ti-device-floppy"></i>
                Simpan Perubahan
            </button>
            <a href="{{ route('penyelenggara.event_saya') }}" class="btn-secondary">
                <i class="ti ti-x"></i>
                Batal
            </a>
        </div>
    </form>
</div>

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .page-title {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 28px;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
    }

    .content-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 30px;
    }

    .event-form {
        max-width: 100%;
    }

    .form-section {
        margin-bottom: 35px;
        padding-bottom: 35px;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-section:last-of-type {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .form-section h3 {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #0dcaf0;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .required {
        color: #dc3545;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        font-family: inherit;
        transition: all 0.3s;
        background: #fafafa;
    }

    .form-control:focus {
        outline: none;
        border-color: #0dcaf0;
        background: white;
        box-shadow: 0 0 0 4px rgba(13, 202, 240, 0.1);
    }

    .form-control:hover {
        border-color: #0dcaf0;
        background: white;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
        line-height: 1.6;
    }

    select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23333' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 16px 12px;
        padding-right: 40px;
    }

    .form-text {
        display: block;
        margin-top: 8px;
        font-size: 13px;
        color: #6c757d;
        line-height: 1.5;
    }

    .current-poster {
        margin-bottom: 25px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px dashed #dee2e6;
    }

    .current-poster label {
        display: block;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
        font-size: 14px;
    }

    .poster-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .poster-preview {
        max-width: 400px;
        max-height: 400px;
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        object-fit: contain;
    }

    .switch-label {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        user-select: none;
    }

    .switch-label input[type="checkbox"] {
        width: 50px;
        height: 26px;
        appearance: none;
        background: #ccc;
        border-radius: 13px;
        position: relative;
        cursor: pointer;
        transition: all 0.3s;
    }

    .switch-label input[type="checkbox"]:checked {
        background: #0dcaf0;
    }

    .switch-label input[type="checkbox"]::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: white;
        top: 3px;
        left: 3px;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .switch-label input[type="checkbox"]:checked::before {
        left: 27px;
    }

    .switch-text {
        font-weight: 600;
        color: #333;
        font-size: 15px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        padding-top: 30px;
        margin-top: 30px;
        border-top: 2px solid #f0f0f0;
    }

    .btn-primary,
    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 28px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-primary {
        background: linear-gradient(135deg, #0dcaf0 0%, #0bb5d6 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(13, 202, 240, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0bb5d6 0%, #099bb8 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 202, 240, 0.4);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(108, 117, 125, 0.3);
    }

    .alert {
        padding: 16px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        line-height: 1.6;
    }

    .alert-success {
        background-color: #d1e7dd;
        color: #0a3622;
        border: 2px solid #a3cfbb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #58151c;
        border: 2px solid #f1aeb5;
    }

    .alert i {
        font-size: 20px;
        flex-shrink: 0;
    }

    .alert ul {
        margin: 5px 0 0 0;
        padding-left: 20px;
    }

    .alert li {
        margin: 3px 0;
    }

    @media (max-width: 768px) {
        .content-card {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
        }

        .poster-preview {
            max-width: 100%;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection