@extends('penyelenggara.layouts.app')

@section('page-title', 'Event Saya')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="ti ti-calendar-event"></i>
        Event Saya
    </h1>
    <a href="{{ route('penyelenggara.events.create') }}" class="btn-primary">
        <i class="ti ti-plus"></i>
        Buat Event Baru
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    <i class="ti ti-circle-check"></i>
    {{ session('success') }}
</div>
@endif

<div class="content-card">
    @if($events->count() > 0)
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $index => $event)
                <tr>
                    <td>{{ $events->firstItem() + $index }}</td>
                    <td>
                        <strong>{{ $event->nama_event }}</strong>
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                        @if($event->tanggal_selesai)
                        - {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                        @endif
                    </td>
                    <td>{{ $event->lokasi }}</td>
                    <td>
                        @if(\Carbon\Carbon::parse($event->tanggal_mulai)->isFuture())
                        <span class="badge badge-info">Akan Datang</span>
                        @elseif(\Carbon\Carbon::parse($event->tanggal_selesai)->isPast())
                        <span class="badge badge-success">Selesai</span>
                        @else
                        <span class="badge badge-warning">Berlangsung</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('penyelenggara.events.show', $event->id) }}" class="btn-sm btn-info" title="Detail">
                                <i class="ti ti-eye"></i>
                            </a>
                            <a href="{{ route('penyelenggara.events.edit', $event->id) }}" class="btn-sm btn-warning" title="Edit">
                                <i class="ti ti-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="pagination-wrapper">
        {{ $events->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="ti ti-calendar-off"></i>
        <h3>Belum Ada Event</h3>
        <p>Anda belum membuat event apapun. Mulai buat event pertama Anda!</p>
        <a href="{{ route('penyelenggara.events.create') }}" class="btn-primary">
            <i class="ti ti-plus"></i>
            Buat Event Baru
        </a>
    </div>
    @endif
</div>
@endsection