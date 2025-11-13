@extends('layouts.main')

@section('content')
    <h3 class="fw-bold mb-4">Dashboard Jasa Promosi Event Daerah</h3>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 border-0">
                <h6 class="fw-bold text-secondary">Total Event</h6>
                <h3 class="text-primary">12</h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 border-0">
                <h6 class="fw-bold text-secondary">Event Aktif</h6>
                <h3 class="text-success">8</h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 border-0">
                <h6 class="fw-bold text-secondary">Event Selesai</h6>
                <h3 class="text-muted">4</h3>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Selamat Datang di Sistem Promosi Event Daerah</h5>
            <p class="text-secondary mb-0">
                Melalui dashboard ini, Anda dapat mengelola promosi event daerah, menambahkan event baru,
                memantau statistik pengunjung, serta memperluas jangkauan promosi Anda di seluruh wilayah.
            </p>
        </div>
    </div>
@endsection
