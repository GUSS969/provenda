@extends('layouts.main')

@section('title', 'Edit Event')

@section('content')

<div class="pc-content">

    <!-- =============== BREADCRUMB =============== -->
    <div class="page-header">
        <div class="page-block">
            <h5 class="mb-0 font-medium">Edit Event</h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Data Event</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="ti ti-edit me-2"></i>Form Edit Event
            </h5>
        </div>

        <div class="card-body p-4">
            
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="ti ti-alert-circle me-2"></i>Terjadi Kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- NAMA EVENT -->
                    <div class="col-md-12">
                        <label class="form-label required">
                            <i class="ti ti-writing me-1"></i>Nama Event
                        </label>
                        <input type="text" 
                               name="nama_event" 
                               class="form-control @error('nama_event') is-invalid @enderror" 
                               value="{{ old('nama_event', $event->nama_event) }}"
                               required>
                        @error('nama_event')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- KATEGORI EVENT -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-category me-1"></i>Kategori Event
                        </label>
                        <select name="kategori_event" 
                                class="form-select @error('kategori_event') is-invalid @enderror"
                                required>
                            <option value="">Pilih Kategori</option>
                            <option value="Festival" {{ old('kategori_event', $event->kategori_event) == 'Festival' ? 'selected' : '' }}>Festival</option>
                            <option value="Pameran" {{ old('kategori_event', $event->kategori_event) == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                            <option value="Seminar" {{ old('kategori_event', $event->kategori_event) == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="Workshop" {{ old('kategori_event', $event->kategori_event) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="Konser" {{ old('kategori_event', $event->kategori_event) == 'Konser' ? 'selected' : '' }}>Konser</option>
                            <option value="Olahraga" {{ old('kategori_event', $event->kategori_event) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Budaya" {{ old('kategori_event', $event->kategori_event) == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                            <option value="Kuliner" {{ old('kategori_event', $event->kategori_event) == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                            <option value="Lainnya" {{ old('kategori_event', $event->kategori_event) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('kategori_event')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-circle-dot me-1"></i>Status
                        </label>
                        <select name="status" 
                                class="form-select @error('status') is-invalid @enderror"
                                required>
                            <option value="aktif" {{ old('status', $event->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $event->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- TANGGAL MULAI -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-calendar-event me-1"></i>Tanggal Mulai
                        </label>
                        <input type="date" 
                               name="tanggal_mulai" 
                               class="form-control @error('tanggal_mulai') is-invalid @enderror"
                               value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}"
                               required>
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- TANGGAL SELESAI -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-calendar-check me-1"></i>Tanggal Selesai
                        </label>
                        <input type="date" 
                               name="tanggal_selesai" 
                               class="form-control @error('tanggal_selesai') is-invalid @enderror"
                               value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}"
                               required>
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- LOKASI -->
                    <div class="col-md-12">
                        <label class="form-label required">
                            <i class="ti ti-map-pin me-1"></i>Lokasi
                        </label>
                        <input type="text" 
                               name="lokasi" 
                               class="form-control @error('lokasi') is-invalid @enderror"
                               value="{{ old('lokasi', $event->lokasi) }}"
                               required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PENYELENGGARA -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-users me-1"></i>Penyelenggara
                        </label>
                        <select name="penyelenggara_id" 
                                class="form-select @error('penyelenggara_id') is-invalid @enderror"
                                required>
                            <option value="">Pilih Penyelenggara</option>
                            @foreach($penyelenggaras as $p)
                                <option value="{{ $p->id }}" 
                                    {{ old('penyelenggara_id', $event->penyelenggara_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('penyelenggara_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ADMIN -->
                    <div class="col-md-6">
                        <label class="form-label required">
                            <i class="ti ti-user-shield me-1"></i>Admin
                        </label>
                        <select name="id_admin" 
                                class="form-select @error('id_admin') is-invalid @enderror"
                                required>
                            <option value="">Pilih Admin</option>
                            @foreach($admins as $a)
                                <option value="{{ $a->id }}" 
                                    {{ old('id_admin', $event->id_admin) == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_admin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- UPLOAD POSTER -->
                    <div class="col-md-12">
                        <label class="form-label">
                            <i class="ti ti-photo me-1"></i>Poster Event
                            <small class="text-muted">(Opsional - Max: 2MB, Format: JPG, PNG, JPEG)</small>
                        </label>

                        <!-- Current Image -->
                        @if($event->poster)
                        <div class="current-image mb-3">
                            <p class="mb-2 text-muted small">
                                <i class="ti ti-photo me-1"></i>Poster saat ini:
                            </p>
                            <img src="{{ asset('storage/event/'.$event->poster) }}" 
                                 alt="Current Poster" 
                                 class="img-thumbnail"
                                 style="max-height: 200px;">
                        </div>
                        @endif
                        
                        <div class="upload-area" id="uploadArea">
                            <input type="file" 
                                   name="poster" 
                                   id="posterInput" 
                                   class="d-none @error('poster') is-invalid @enderror"
                                   accept="image/jpeg,image/png,image/jpg"
                                   onchange="previewImage(this)">
                            
                            <div id="uploadPlaceholder" class="upload-placeholder">
                                <i class="ti ti-cloud-upload"></i>
                                <p class="mb-1">Klik atau drag & drop untuk upload poster baru</p>
                                <small class="text-muted">JPG, PNG atau JPEG (Max: 2MB)</small>
                            </div>

                            <div id="imagePreview" class="image-preview d-none">
                                <img id="previewImg" src="" alt="Preview">
                                <button type="button" class="btn-remove" onclick="removeImage()">
                                    <i class="ti ti-x"></i>
                                </button>
                            </div>
                        </div>

                        @error('poster')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-md-12">
                        <label class="form-label required">
                            <i class="ti ti-file-text me-1"></i>Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  rows="5" 
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-2"></i>Update Event
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

<style>
.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #2c3e50;
    font-size: 14px;
}

.form-label.required::after {
    content: " *";
    color: #dc3545;
}

.form-label i {
    color: #667eea;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #dee2e6;
    padding: 0.625rem 0.875rem;
    font-size: 14px;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
}

.current-image img {
    border-radius: 8px;
}

.upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.upload-area:hover {
    border-color: #667eea;
    background: #f0f3ff;
}

.upload-placeholder i {
    font-size: 48px;
    color: #667eea;
}

.image-preview {
    position: relative;
    display: inline-block;
}

.image-preview img {
    max-width: 100%;
    max-height: 300px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.btn-remove {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #dc3545;
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
}

.btn-remove:hover {
    background: #c82333;
    transform: scale(1.1);
}
</style>

<script>
const uploadArea = document.getElementById('uploadArea');
const posterInput = document.getElementById('posterInput');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');
const imagePreview = document.getElementById('imagePreview');
const previewImg = document.getElementById('previewImg');

uploadArea.addEventListener('click', function() {
    posterInput.click();
});

uploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.style.borderColor = '#667eea';
    this.style.background = '#f0f3ff';
});

uploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.style.borderColor = '#dee2e6';
    this.style.background = '#f8f9fa';
});

uploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    this.style.borderColor = '#dee2e6';
    this.style.background = '#f8f9fa';
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        posterInput.files = files;
        previewImage(posterInput);
    }
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        if (file.size > 2048000) {
            alert('Ukuran file terlalu besar! Maksimal 2MB');
            input.value = '';
            return;
        }
        
        if (!file.type.match('image/(jpeg|jpg|png)')) {
            alert('Format file harus JPG, JPEG, atau PNG!');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            uploadPlaceholder.classList.add('d-none');
            imagePreview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    posterInput.value = '';
    previewImg.src = '';
    uploadPlaceholder.classList.remove('d-none');
    imagePreview.classList.add('d-none');
}
</script>

@endsection