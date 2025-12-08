@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')

    <div class="pc-content">

        <!-- =============== BREADCRUMB =============== -->
        <div class="page-header">
            <div class="page-block">
                <h5 class="mb-0 font-medium">Tambah Event</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Data Event</a></li>
                    <li class="breadcrumb-item">Tambah</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="ti ti-forms me-2"></i>Form Tambah Event Baru
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

                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">

                        <!-- NAMA EVENT -->
                        <div class="col-md-12">
                            <label class="form-label required">
                                <i class="ti ti-writing me-1"></i>Nama Event
                            </label>
                            <input type="text" name="nama_event"
                                class="form-control @error('nama_event') is-invalid @enderror"
                                placeholder="Masukkan nama event..." value="{{ old('nama_event') }}" required>
                            @error('nama_event')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- KATEGORI EVENT -->
                        <div class="col-md-6">
                            <label class="form-label required">
                                <i class="ti ti-category me-1"></i>Kategori Event
                            </label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Festival" {{ old('kategori') == 'Festival' ? 'selected' : '' }}>
                                    Festival</option>
                                <option value="Pameran" {{ old('kategori') == 'Pameran' ? 'selected' : '' }}>Pameran
                                </option>
                                <option value="Seminar" {{ old('kategori') == 'Seminar' ? 'selected' : '' }}>Seminar
                                </option>
                                <option value="Workshop" {{ old('kategori') == 'Workshop' ? 'selected' : '' }}>
                                    Workshop</option>
                                <option value="Konser" {{ old('kategori') == 'Konser' ? 'selected' : '' }}>Konser
                                </option>
                                <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>
                                    Olahraga</option>
                                <option value="Budaya" {{ old('kategori') == 'Budaya' ? 'selected' : '' }}>Budaya
                                </option>
                                <option value="Kuliner" {{ old('kategori') == 'Kuliner' ? 'selected' : '' }}>Kuliner
                                </option>
                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-6">
                            <label class="form-label required"><i class="ti ti-circle-dot me-1"></i>Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- TANGGAL -->
                        <div class="col-md-12">
                            <label class="form-label required">
                                <i class="ti ti-calendar-event me-1"></i>Tanggal Event
                            </label>
                            <input type="date" name="tanggal_event"
                                class="form-control @error('tanggal_event') is-invalid @enderror"
                                value="{{ old('tanggal_event') }}" required>
                        </div>


                        <!-- LOKASI -->
                        <div class="col-md-12">
                            <label class="form-label required"><i class="ti ti-map-pin me-1"></i>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                placeholder="Contoh: Gedung Serbaguna, Kota Batam" value="{{ old('lokasi') }}" required>
                        </div>

                        <!-- PENYELENGGARA -->
                        <div class="col-md-6">
                            <label class="ti ti-users me-1"></i>Penyelenggara</label>
                            <select name="penyelenggara_id" class="form-select">
                                <option value="">Pilih Penyelenggara</option>
                                @foreach ($penyelenggaras as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        

                        <!-- UPLOAD POSTER TANPA TOMBOL MERAH -->
                        <div class="mb-3">
                            <label class="form-label">
                                Poster Event <small class="text-muted">(Opsional - Max: 2MB, Format: JPG, PNG, JPEG)</small>
                            </label>

                            <div class="upload-area text-center p-4 rounded border border-2" style="border-style: dashed;">

                                <input type="file" name="poster" id="posterInput"
                                    class="form-control-file mb-2 custom-file-input"
                                    accept="image/jpeg,image/png,image/jpg">

                                <p class="text-muted mb-1">Klik atau pilih file untuk upload poster</p>
                                <small class="text-muted">JPG, PNG atau JPEG (Max: 2MB)</small>
                            </div>
                        </div>




                    </div>
            </div>

            <!-- DESKRIPSI -->
            <div class="col-md-12">
                <label class="form-label required"><i class="ti ti-file-text me-1"></i>Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi') }}</textarea>
                <small class="text-muted">
                    <i class="ti ti-info-circle me-1"></i>
                    Jelaskan detail event, agenda, dan informasi penting lainnya
                </small>
            </div>

        </div>

        <!-- BUTTONS -->
        <div class="row mt-4">
            <div class="col-12 text-end">
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left me-2"></i>Kembali
                </a>
                <button class="btn btn-primary">
                    <i class="ti ti-device-floppy me-2"></i>Simpan Event
                </button>
            </div>
        </div>

        </form>

    </div>
    </div>

    </div>

    <style>
        .form-label {
            font-weight: 600;
            margin-bottom: .5rem;
            color: #2c3e50;
            font-size: 14px;
        }

        .form-label.required::after {
            content: " *";
            color: #dc3545;
        }

        /* Upload Area */
        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 2rem;
            cursor: pointer;
            background: #f8f9fa;
            text-align: center;
            transition: .3s;
        }

        .upload-area:hover {
            border-color: #667eea;
            background: #f0f3ff;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
        }
    </style>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const posterInput = document.getElementById('posterInput');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        uploadArea.addEventListener('dragover', e => {
            e.preventDefault();
            uploadArea.style.borderColor = '#667eea';
            uploadArea.style.background = '#f0f3ff';
        });

        uploadArea.addEventListener('dragleave', e => {
            uploadArea.style.borderColor = '#dee2e6';
            uploadArea.style.background = '#f8f9fa';
        });

        uploadArea.addEventListener('drop', e => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                posterInput.files = files;
                previewImage();
            }
        });

        function previewImage() {
            const file = posterInput.files[0];
            if (!file) return;

            if (file.size > 2048000) {
                alert("Ukuran maksimal 2MB");
                posterInput.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                uploadPlaceholder.classList.add('d-none');
                imagePreview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    </script>

@endsection
