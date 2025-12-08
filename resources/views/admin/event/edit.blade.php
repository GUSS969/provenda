@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')

    <div class="pc-content">

        <!-- =============== BREADCRUMB =============== -->
        <div class="page-header">
            <div class="page-block">
                <h5 class="mb-0 font-medium">Edit Event</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Data Event</a></li>
                    <li class="breadcrumb-item">Edit</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="ti ti-forms me-2"></i>Form Edit Event
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

                <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- NAMA EVENT -->
                        <div class="col-md-12">
                            <label class="form-label required"><i class="ti ti-writing me-1"></i>Nama Event</label>
                            <input type="text" name="nama_event" class="form-control" value="{{ $event->nama_event }}"
                                required>
                        </div>

                        <!-- KATEGORI -->
                        <select name="kategori" class="form-control" required>
                            <option value="" disabled>Pilih Kategori</option>
                            <option value="Olahraga"
                                {{ old('kategori', $event->kategori) == 'Olahraga' ? 'selected' : '' }}>
                                Olahraga
                            </option>
                            <option value="Festival"
                                {{ old('kategori', $event->kategori) == 'Festival' ? 'selected' : '' }}>
                                Festival
                            </option>
                            <option value="Budaya" {{ old('kategori', $event->kategori) == 'Budaya' ? 'selected' : '' }}>
                                Budaya
                            </option>
                            <option value="UMKM" {{ old('kategori', $event->kategori) == 'UMKM' ? 'selected' : '' }}>
                                UMKM
                            </option>
                        </select>


                        <!-- STATUS -->
                        <div class="col-md-6">
                            <label class="form-label required"><i class="ti ti-circle-dot me-1"></i>Status</label>
                            <select name="status" class="form-select" required>
                                <option value="aktif" {{ $event->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ $event->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                </option>
                            </select>
                        </div>

                        <!-- TANGGAL -->
                        <div class="col-md-12">
                            <label class="form-label required">
                                <i class="ti ti-calendar-event me-1"></i>Tanggal Event
                            </label>
                            <input type="date" name="tanggal_event"
                                class="form-control @error('tanggal_event') is-invalid @enderror"
                                value="{{ $event->tanggal_event }}" required>
                        </div>


                        <!-- LOKASI -->
                        <div class="col-md-12">
                            <label class="form-label required"><i class="ti ti-map-pin me-1"></i>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}"
                                required>
                        </div>

                        <!-- PENYELENGGARA -->
                        <div class="col-md-6">
                            <label class="ti ti-users me-1"></i>Penyelenggara</label>
                            <select name="penyelenggara_id" class="form-select">
                                <option value="">Pilih Penyelenggara</option>
                                @foreach ($penyelenggaras as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $event->penyelenggara_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <!-- POSTER EVENT -->
                        <div class="mb-3">
                            <label class="form-label">Poster Event (Opsional)</label>

                            <div class="border rounded p-3 text-center w-100" id="poster-preview">
                                @if ($event->poster)
                                    <img src="{{ asset('storage/' . $event->poster) }}" alt="Poster Event"
                                        class="img-fluid" style="max-height: 200px; object-fit: contain;">
                                    <p class="mt-2">Klik untuk pilih poster baru</p>
                                @else
                                    <p>Klik untuk pilih poster</p>
                                @endif
                                <p class="text-muted small">JPG, PNG atau JPEG (Max: 2MB)</p>
                            </div>

                            <input type="file" name="poster" id="poster" class="d-none" accept="image/*"
                                onchange="document.getElementById('poster-preview').innerHTML = this.files[0]?.name ?? '';">
                        </div>

                        <script>
                            document.getElementById('poster-preview')
                                .addEventListener('click', () => document.getElementById('poster').click());
                        </script>


                        <!-- DESKRIPSI -->
                        <div class="col-md-12">
                            <label class="form-label required"><i class="ti ti-file-text me-1"></i>Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control" required>{{ $event->deskripsi }}</textarea>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-end">
                            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary"><i
                                    class="ti ti-arrow-left me-2"></i>Kembali</a>
                            <button class="btn btn-primary"><i class="ti ti-device-floppy me-2"></i>Update Event</button>
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

        .upload-area {
            border: 2px dashed #cfd4da;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: .2s;
            background: #fdfdfd;
            width: 260px;
            margin: auto;
        }

        .upload-area:hover {
            border-color: #667eea;
            background: #f7f9ff;
        }

        .upload-placeholder i {
            font-size: 38px;
            color: #667eea;
        }

        .image-preview {
            position: relative;
            width: 260px;
            margin: auto;
        }

        .image-preview img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
        }

        .btn-remove {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #dc3545;
            color: white;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
    </style>

    <script>
        const uploadArea = document.getElementById("uploadArea");
        const posterInput = document.getElementById("posterInput");
        const uploadPlaceholder = document.getElementById("uploadPlaceholder");
        const imagePreview = document.getElementById("imagePreview");
        const previewImg = document.getElementById("previewImg");

        uploadArea.addEventListener("click", () => posterInput.click());

        function previewImage() {
            if (posterInput.files && posterInput.files[0]) {
                const file = posterInput.files[0];
                if (file.size > 2048000) {
                    alert("Ukuran file terlalu besar! Maksimal 2MB");
                    posterInput.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = e => {
                    previewImg.src = e.target.result;
                    uploadPlaceholder.classList.add("d-none");
                    imagePreview.classList.remove("d-none");
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            posterInput.value = "";
            previewImg.src = "";
            uploadPlaceholder.classList.remove("d-none");
            imagePreview.classList.add("d-none");
        }
    </script>

@endsection
