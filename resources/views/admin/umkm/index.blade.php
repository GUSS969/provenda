@extends('layouts.main')

@section('title', 'Data UMKM')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Data UMKM</h4>
        <a href="{{ route('umkms.create') }}" class="btn btn-primary">+ Tambah UMKM</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama UMKM</th>
                <th>Pemilik</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Status</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_umkm }}</td>
                <td>{{ $item->nama_pemilik }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <span class="badge bg-{{ $item->status == 'aktif' ? 'success' : 'secondary' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>{{ $item->admin->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('umkms.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('umkms.destroy', $item->id) }}" method="POST"
                          style="display: inline-block"
                          onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
