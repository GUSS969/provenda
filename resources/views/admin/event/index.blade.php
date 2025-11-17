@extends('admin.layouts.master')

@section('title', 'Data Event')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Data Event</h4>
    </div>

    <div class="card-body">

        <a href="{{ route('admin.event.create') }}" class="btn btn-primary mb-3">
            Tambah Event
        </a>

        @if($events->count() == 0)
            <p class="text-muted">Belum ada event.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->judul ?? '-' }}</td>
                            <td>{{ $event->tanggal ?? '-' }}</td>
                            <td>{{ $event->status ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@endsection
