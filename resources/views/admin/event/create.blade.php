@extends('layouts.main')

@section('title', 'Tambah Event')

@section('content')

<div class="pc-content">

    <div class="page-header">
        <div class="page-block">
            <h5 class="mb-0 font-medium">Tambah Event</h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Data Event</a></li>
                <li class="breadcrumb-item">Tambah</li>
            </ul>
        </div>
    </div>

    <div class="card p-4">

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label>Nama Event</label>
                    <input type="text" name="nama_event" class="form-control" required>
                </div>

                <div>
                    <label>Kategori Event</label>
                    <input type="text" name="kategori_event" class="form-control" required>
                </div>

                <div>
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" required> 
                </div>

                <div>
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" required>
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div>
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div>
                    <label>Penyelenggara</label>
                    <select name="penyelenggara_id" class="form-control" required>
                        @foreach($penyelenggaras as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Admin</label>
                    <select name="id_admin" class="form-control" required>
                        @foreach($admins as $a)
                        <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="mt-4">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            {{-- TOMBOL SIMPAN --}}
            <div class="mt-4 flex justify-end">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
