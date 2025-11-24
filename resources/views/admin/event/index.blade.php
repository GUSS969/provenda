@extends('layouts.main')

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

        <div class="flex justify-between items-center mb-4">
            <h5 class="font-bold">Daftar Event</h5>

            <a href="{{ route('admin.events.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
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
                        {{ $event->tanggal_mulai }} -
                        {{ $event->tanggal_selesai }}
                    </td>

                    <td>
                        <span class="badge bg-{{ $event->status == 'aktif' ? 'success' : 'danger' }}">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>

                    <td>{{ $event->penyelenggara->nama ?? '-' }}</td>

                    <td>
                        <a href="{{ route('events.edit', $event->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('events.destroy', $event->id) }}"
                              method="POST" class="inline-block"
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
