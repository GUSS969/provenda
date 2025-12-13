@extends('penyelenggara.layouts.app')

@section('page-title', 'Pengaturan')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="ti ti-settings"></i>
        Pengaturan Akun
    </h1>
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
    <form action="{{ route('penyelenggara.pengaturan.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-section">
            <h3><i class="ti ti-user"></i> Informasi Akun</h3>
            
            <div class="form-group">
                <label for="nama_penyelenggara">Nama Penyelenggara <span class="required">*</span></label>
                <input type="text" id="nama_penyelenggara" name="nama_penyelenggara" class="form-control" 
                       value="{{ old('nama_penyelenggara', $penyelenggara->nama_penyelenggara) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="{{ old('email', $penyelenggara->email) }}" required>
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" class="form-control" 
                       value="{{ old('no_telepon', $penyelenggara->no_telepon) }}" placeholder="Contoh: 08123456789">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="3" 
                          placeholder="Masukkan alamat lengkap">{{ old('alamat', $penyelenggara->alamat) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <h3><i class="ti ti-lock"></i> Ubah Password</h3>
            <p class="form-text" style="margin-bottom: 20px;">Biarkan kosong jika tidak ingin mengubah password</p>
            
            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" class="form-control" 
                       placeholder="Minimal 6 karakter">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" 
                       placeholder="Ketik ulang password baru">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="ti ti-device-floppy"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<style>
    .content-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 30px;
        max-width: 800px;
    }

    .form-section {
        margin-bottom: 35px;
        padding-bottom: 35px;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .form-section h3 {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .required {
        color: #dc3545;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #0dcaf0;
        box-shadow: 0 0 0 4px rgba(13, 202, 240, 0.1);
    }

    textarea.form-control {
        resize: vertical;
    }

    .form-text {
        font-size: 13px;
        color: #6c757d;
    }

    .form-actions {
        padding-top: 20px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        background: linear-gradient(135deg, #0dcaf0 0%, #0bb5d6 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 202, 240, 0.3);
    }

    .alert {
        padding: 16px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
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
</style>
@endsection