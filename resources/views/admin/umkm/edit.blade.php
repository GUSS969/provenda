@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="card p-4">
    <h4>Edit UMKM</h4>

    <form action="{{ route('umkms.update', $umkm->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama UMKM</label>
            <input type="text" name="nama_umkm" class="form-control" value="{{ $umkm->nama_umkm }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" value="{{ $umkm->nama_pemilik }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $umkm->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $umkm->no_hp }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $umkm->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password (opsional)</label>
            <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengganti">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $umkm->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $umkm->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Admin Penanggung Jawab</label>
            <select name="admin_id" class="form-control">
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ $admin->id == $umkm->admin_id ? 'selected' : '' }}>
                        {{ $admin->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('umkms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
