@extends('layouts.main')

@section('content')
<div class="page-header">
    <h4 class="mb-3">Data Penyelenggara</h4>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header flex justify-between items-center">
        <h5 class="mb-0">Daftar Penyelenggara</h5>
        <a href="{{ route('penyelenggaras.create') }}" class="btn btn-primary">Tambah Penyelenggara</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($penyelenggaras as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->admin->nama ?? '-' }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('penyelenggaras.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('penyelenggaras.destroy', $p->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Hapus penyelenggara ini?')">
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
