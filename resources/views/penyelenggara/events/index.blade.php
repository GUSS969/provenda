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
                    <th style="width: 50px;">No</th>
                    <th style="width: 35%;">Nama Event</th>
                    <th style="width: 150px;">Tanggal</th>
                    <th style="width: 25%;">Lokasi</th>
                    <th style="width: 120px; text-align: center;">Status</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
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
                        {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                    </td>
                    <td>{{ $event->lokasi }}</td>
                    <td style="text-align: center;">
                        @php
                            $tanggal = \Carbon\Carbon::parse($event->tanggal_event);
                            $today = \Carbon\Carbon::today();
                        @endphp
                        
                        @if($tanggal->isFuture())
                            <span class="badge badge-info">Akan Datang</span>
                        @elseif($tanggal->isToday())
                            <span class="badge badge-warning">Hari Ini</span>
                        @else
                            <span class="badge badge-success">Selesai</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div class="action-buttons" style="display: flex; gap: 8px; justify-content: center;">
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
    
    <div class="pagination-wrapper" style="margin-top: 20px;">
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

<style>
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    .data-table thead th {
        background-color: #f8f9fa;
        padding: 12px 16px;
        text-align: left;
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
        white-space: nowrap;
    }
    
    .data-table tbody td {
        padding: 12px 16px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: middle;
    }
    
    .data-table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
        white-space: nowrap;
    }
    
    .badge-info {
        background-color: #cfe2ff;
        color: #084298;
    }
    
    .badge-warning {
        background-color: #fff3cd;
        color: #997404;
    }
    
    .badge-success {
        background-color: #d1e7dd;
        color: #0a3622;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }
    
    .btn-sm {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s;
    }
    
    .btn-info {
        background-color: #0dcaf0;
        color: white;
    }
    
    .btn-info:hover {
        background-color: #0bb5d6;
    }
    
    .btn-warning {
        background-color: #ffc107;
        color: #000;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
    }
    
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    @media (max-width: 768px) {
        .data-table {
            font-size: 14px;
        }
        
        .data-table thead th,
        .data-table tbody td {
            padding: 8px;
        }
        
        .btn-sm {
            padding: 4px 8px;
            font-size: 12px;
        }
    }
</style>
@endsection