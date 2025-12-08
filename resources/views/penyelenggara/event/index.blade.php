@extends('penyelenggara.layouts.app')

@section('page-title', 'Event Saya')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Event Saya</h4>
        <a href="{{ route('penyelenggara.event.create') }}" class="btn btn-primary btn-sm">
            + Tambah Event
        </a>
    </div>

    <div class="card-body">
        @if($events->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->nama_event }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</td>
                        <td>{{ $event->lokasi }}</td>
                        <td>
                            <a href="#" class="btn btn-sm">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $events->links() }}
        @else
            <p class="text-center">⚠️ Belum ada event</p>
        @endif
    </div>
</div>

@endsection
