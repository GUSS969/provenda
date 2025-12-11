@extends('penyelenggara.layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">Daftar UMKM yang Mendaftar</h3>

    @if($registrations->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama UMKM</th>
                        <th>Pemilik</th>
                        <th>Kategori</th>
                        <th>WA</th>
                        <th>Event</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $reg)
                        <tr>
                            <td>{{ $reg->nama_umkm }}</td>
                            <td>{{ $reg->pemilik }}</td>
                            <td><span class="badge bg-primary">{{ $reg->kategori }}</span></td>
                            <td><a href="https://wa.me/{{ $reg->no_wa }}" target="_blank" class="btn btn-sm btn-success">Chat WA</a></td>
                            <td>{{ $reg->event->nama_event }}</td>
                            <td>
                                <a href="{{ route('penyelenggara.events.show', $reg->event_id) }}" class="btn btn-sm btn-info">Lihat Event</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Belum ada UMKM yang mendaftar ke event Anda.</div>
    @endif
</div>
@endsection