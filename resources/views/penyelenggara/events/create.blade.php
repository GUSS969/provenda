@extends('penyelenggara.layouts.app')

@section('page-title', 'Buat Event Baru')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="ti ti-plus-circle"></i>
        Buat Event Baru
    </h1>
</div>

<div class="content-card">
    <div class="coming-soon">
        <i class="ti ti-clock"></i>
        <h2>Coming Soon</h2>
        <p>Fitur buat event baru sedang dalam pengembangan</p>
        <a href="{{ route('penyelenggara.dashboard') }}" class="btn-primary">
            <i class="ti ti-arrow-left"></i>
            Kembali ke Dashboard
        </a>
    </div>
</div>

<style>
.coming-soon {
    text-align: center;
    padding: 100px 20px;
}

.coming-soon i {
    font-size: 80px;
    color: #0D9488;
    margin-bottom: 20px;
}

.coming-soon h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 10px;
}

.coming-soon p {
    color: #6b7280;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 30px;
    background: linear-gradient(135deg, #0D9488 0%, #14B8A6 100%);
    color: white;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(13, 148, 136, 0.3);
}
</style>
@endsection