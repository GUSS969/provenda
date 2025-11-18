@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="pc-content">

    <!-- =============== BREADCRUMB =============== -->
    <div class="page-header">
        <div class="page-block">
            <div class="page-header-title">
                <h5 class="mb-0 font-medium">Dashboard Promosi Event Daerah</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
            </ul>
        </div>
    </div>


    <div class="grid grid-cols-12 gap-x-6">

        <!-- TOTAL EVENT -->
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
            <div class="card">
                <div class="card-header !border-b-0">
                    <h5>Total Event Dipromosikan</h5>
                </div>
                <div class="card-body">
                    <h3 class="font-light flex items-center">
                        <i class="feather icon-arrow-up text-success-500 text-[30px] mr-2"></i>
                        {{ $total_event }} Event
                    </h3>
                </div>
            </div>
        </div>

        <!-- EVENT AKTIF -->
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
            <div class="card">
                <div class="card-header !border-b-0">
                    <h5>Event Aktif</h5>
                </div>
                <div class="card-body">
                    <h3 class="font-light flex items-center">
                        <i class="feather icon-check text-primary-500 text-[30px] mr-2"></i>
                        {{ $event_aktif }} Aktif
                    </h3>
                </div>
            </div>
        </div>

        <!-- EVENT SELESAI -->
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
            <div class="card">
                <div class="card-header !border-b-0">
                    <h5>Event Selesai / Nonaktif</h5>
                </div>
                <div class="card-body">
                    <h3 class="font-light flex items-center">
                        <i class="feather icon-x text-danger-500 text-[30px] mr-2"></i>
                        {{ $event_selesai }} Nonaktif
                    </h3>
                </div>
            </div>
        </div>

        <!-- EVENT TERBARU -->
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Event Daerah Terbaru</h5>
                </div>

                <div class="card-body">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        @foreach($event_terbaru as $ev)
                        <div class="relative overflow-hidden rounded-2xl shadow-xl bg-white border">

                            <!-- STATUS -->
                            <div class="absolute top-0 right-0 bg-theme-bg-1 text-white px-4 py-1 text-xs rounded-bl-xl">
                                {{ $ev->status === 'aktif' ? 'Aktif' : 'Selesai' }}
                            </div>

                            <!-- GAMBAR -->
                            <img src="{{ asset('storage/event/'.$ev->poster) }}"
                                 class="w-full h-44 object-cover">

                            <div class="p-4">
                                <h4 class="font-bold text-lg">{{ $ev->nama_event }}</h4>

                                <div class="flex items-center gap-2 text-muted text-sm mt-2">
                                    <i class="ti ti-calendar"></i>
                                    {{ date('d M Y', strtotime($ev->tanggal_mulai)) }}
                                </div>

                                <p class="text-sm mt-3 line-clamp-2">
                                    {{ $ev->deskripsi }}
                                </p>
                            </div>

                        </div>
                        @endforeach

                        @if($event_terbaru->count() == 0)
                            <p class="text-muted">Belum ada event.</p>
                        @endif

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
