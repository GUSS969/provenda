@extends('layouts.main')

@section('title', 'Edit Event')

@section('content')

<div class="pc-content">

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

    <div class="card p-4">

        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label>Nama Event</label>
                    <input type="text" name="nama_event" class="form-control"
                           value="{{ $event->nama_event }}" required>
                </div>

                <div>
                    <label>Kategori Event</label>
                    <input type="text" class="form-control"
                           name="kategori_event" value="{{ $event->kategori_event }}" required>
                </div>

                <div>
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai"
                           value="{{ $event->tanggal_mulai }}" class="form-control">
                </div>

                <div>
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai"
                           value="{{ $event->tanggal_selesai }}" class="form-control">
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                           value="{{ $event->lokasi }}" required>
                </div>

                <div>
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="aktif" {{ $event->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $event->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div>
                    <label>Penyelenggara</label>
                    <select name="penyelenggara_id" class="form-control">
                        @foreach($penyelenggaras as $p)
                        <option value="{{ $p->id }}"
                            {{ $event->penyelenggara_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Admin</label>
                    <select name="id_admin" class="form-control">
                        @foreach($admins as $a)
                        <option value="{{ $a->id }}"
                            {{ $event->id_admin == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="mt-4">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="4">{{ $event->deskripsi }}</textarea>
            </div>

            <div class="mt-4 flex justify-end">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Update
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
