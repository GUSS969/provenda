@extends('layouts.admin')

@section('title', 'Data Event')

@section('content')

<div class="pc-content">

    <div class="page-header">
        <div class="page-block">
            <h5 class="mb-0 font-medium">Data Event</h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Event</li>
            </ul>
        </div>
    </div>

    <div class="card p-4">

        {{-- Header title + tombol sejajar --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="font-bold mb-0">Daftar Event</h5>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                + Tambah Event
            </a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Penyelenggara</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->nama_event }}</td>

                        <td>
                            {{ $event->tanggal_event ? \Carbon\Carbon::parse($event->tanggal_event)->format('d-m-Y') : '-' }}
                        </td>

                        <td>
                            <span class="badge bg-{{ $event->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>

                        <td>{{ $event->penyelenggara->nama ?? '-' }}</td>

                        <td>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus event ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
