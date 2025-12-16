@extends('layouts.admin')

@section('content')
<h4 class="mb-3">Edit Penyelenggara</h4>

<div class="card p-4">

    <form action="{{ route('admin.penyelenggaras.update', $penyelenggara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $penyelenggara->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $penyelenggara->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $penyelenggara->no_hp }}" >
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $penyelenggara->alamat }}</textarea>
        </div>

        <a href="{{ route('admin.penyelenggaras.index') }}" class="btn btn-primary">Update</a>
        <a href="{{ route('admin.penyelenggaras.index') }}" class="btn btn-secondary">Batal</a>

    </form>
</div>
@endsection
