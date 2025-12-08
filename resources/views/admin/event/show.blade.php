@extends('layouts.admin')

@section('title', 'Detail Event')

@section('content')
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <h5 class="mb-0 font-medium">Detail Event</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Data Event</a></li>
                    <li class="breadcrumb-item">Detail</li>
                </ul>
            </div>
        </div>

        <div class="card shadow-sm p-4">
            <div class="row">

                <!-- POSTER -->
                <div class="col-md-4">
                    @if ($event->poster)
                        <img src="{{ route('poster.show', $event->poster) }}" alt="{{ $event->nama_event }}"
                            class="img-fluid rounded border" style="width:100%;max-height:350px;object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/400x300?text=No+Image" class="img-fluid rounded border"
                            style="width:100%;max-height:350px;object-fit:cover;">
                    @endif
                </div>


                <div class="col-md-8">

                    <h4 class="fw-bold">{{ $event->nama_event }}</h4>

                    <table class="table">
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $event->kategori }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-{{ $event->status == 'aktif' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Event</th>
                            <td>{{ $event->tanggal_event }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $event->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Penyelenggara</th>
                            <td>{{ $event->penyelenggara->nama ?? '-' }}</td>
                        </tr>
                    </table>

                    <h6 class="fw-semibold mt-3">Deskripsi:</h6>
                    <p>{{ $event->deskripsi }}</p>

                    <div class="mt-3">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i>Kembali
                        </a>

                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">
                            <i class="ti ti-edit me-1"></i>Edit
                        </a>

                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus event?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i>Hapus
                            </button>
                        </form>

                        @if ($event->kategori == 'UMKM')
                            <a href="{{ route('umkm.event.daftar', $event->id) }}" class="btn btn-success ms-2">
                                <i class="ti ti-user-plus me-1"></i>Daftar UMKM
                            </a>
                        @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
