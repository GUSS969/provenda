@extends('layouts.admin')

@section('title', 'Tambah Penyelenggara')

@section('content')
<div class="card p-4">
    <h4 class="mb-3">Tambah Penyelenggara</h4>

    <form action="{{ route('admin.penyelenggaras.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Penyelenggara</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Penyelenggara</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Admin Pengelola</label>
            <select name="admin_id" class="form-control" >
                @foreach($admins as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
