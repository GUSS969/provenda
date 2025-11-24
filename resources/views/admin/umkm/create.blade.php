@extends('layouts.main')

@section('title', 'Tambah UMKM')

@section('content')
<div class="card p-4">
    <h4>Tambah UMKM</h4>

    <form action="{{ route('admin.umkms.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama UMKM</label>
            <input type="text" name="nama_umkm" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Admin Penanggung Jawab</label>
            <select name="admin_id" class="form-control" required>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->nama }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.umkms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
