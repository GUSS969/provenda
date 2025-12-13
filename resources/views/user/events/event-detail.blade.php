@extends('user.layouts.app')

@section('title', $event->nama_event)

@section('content')
<div class="event-detail-page">
    <!-- Event Header -->
    <div class="event-header">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('user.home') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('user.events') }}">Events</a>
                <span>/</span>
                <span>{{ $event->nama_event }}</span>
            </div>
        </div>
    </div>

    <!-- Event Content -->
    <div class="container">
        <div class="event-content">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Poster -->
                @if($event->poster)
                <div class="event-poster">
                    <img src="{{ route('poster.show', basename($event->poster)) }}" alt="{{ $event->nama_event }}">
                </div>
                @endif

                <!-- Event Info -->
                <div class="event-info-card">
                    <h1 class="event-title">{{ $event->nama_event }}</h1>
                    
                    @if($event->kategori)
                    <span class="event-category">{{ $event->kategori }}</span>
                    @endif

                    <div class="event-meta">
                        <div class="meta-item">
                            <i class="ti ti-calendar"></i>
                            <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="ti ti-map-pin"></i>
                            <span>{{ $event->lokasi }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="ti ti-building"></i>
                            <span>{{ $event->penyelenggara->nama_penyelenggara }}</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                @if($event->deskripsi)
                <div class="event-description">
                    <h2>Tentang Event</h2>
                    <p>{!! nl2br(e($event->deskripsi)) !!}</p>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Registration Box -->
                <div class="registration-box">
                    <h3>Pendaftaran UMKM</h3>
                    
                    @if($event->isRegistrationOpen())
                        <!-- Status Kuota -->
                        @if($event->max_participants)
                        <div class="quota-info">
                            <i class="ti ti-users"></i>
                            <div>
                                <strong>Sisa Kuota</strong>
                                <p>{{ $event->remainingSlots() }} dari {{ $event->max_participants }} peserta</p>
                            </div>
                        </div>
                        @else
                        <div class="quota-info unlimited">
                            <i class="ti ti-infinity"></i>
                            <div>
                                <strong>Kuota Unlimited</strong>
                                <p>Tidak ada batasan peserta</p>
                            </div>
                        </div>
                        @endif

                        <!-- Info Pendaftaran -->
                        @if($event->registration_info)
                        <div class="registration-info">
                            <h4><i class="ti ti-info-circle"></i> Persyaratan:</h4>
                            <p>{{ $event->registration_info }}</p>
                        </div>
                        @endif

                        <!-- Tombol Daftar -->
                        <button class="btn-register" onclick="showRegistrationModal()">
                            <i class="ti ti-user-plus"></i>
                            Daftar Sekarang
                        </button>
                    @else
                        <!-- Pendaftaran Ditutup -->
                        <div class="registration-closed">
                            <i class="ti ti-lock"></i>
                            <h4>Pendaftaran Ditutup</h4>
                            <p>Maaf, pendaftaran untuk event ini sudah ditutup.</p>
                        </div>
                    @endif
                </div>

                <!-- Penyelenggara Info -->
                <div class="organizer-box">
                    <h4>Diselenggarakan Oleh</h4>
                    <div class="organizer-info">
                        <div class="organizer-avatar">
                            {{ strtoupper(substr($event->penyelenggara->nama_penyelenggara, 0, 1)) }}
                        </div>
                        <div>
                            <strong>{{ $event->penyelenggara->nama_penyelenggara }}</strong>
                            <p>{{ $event->penyelenggara->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pendaftaran -->
<div id="registrationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Daftar ke {{ $event->nama_event }}</h3>
            <button class="modal-close" onclick="closeRegistrationModal()">
                <i class="ti ti-x"></i>
            </button>
        </div>
        
        <form action="{{ route('user.event.daftar.umkm', $event->id) }}" method="POST" class="registration-form">
            @csrf
            
            <div class="form-group">
                <label for="nama_umkm">Nama UMKM <span class="required">*</span></label>
                <input type="text" id="nama_umkm" name="nama_umkm" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik <span class="required">*</span></label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon <span class="required">*</span></label>
                <input type="tel" id="no_telepon" name="no_telepon" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_usaha">Jenis Usaha <span class="required">*</span></label>
                <select id="jenis_usaha" name="jenis_usaha" class="form-control" required>
                    <option value="">-- Pilih Jenis Usaha --</option>
                    <option value="Kuliner">Kuliner</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Kerajinan">Kerajinan</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Jasa">Jasa</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <i class="ti ti-send"></i>
                Kirim Pendaftaran
            </button>
        </form>
    </div>
</div>

<style>
    .event-detail-page {
        background: #f8f9fa;
        min-height: 100vh;
        padding-bottom: 50px;
    }

    .event-header {
        background: white;
        padding: 20px 0;
        border-bottom: 1px solid #e9ecef;
        margin-bottom: 30px;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .breadcrumb a {
        color: #0dcaf0;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .breadcrumb span {
        color: #6c757d;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .event-content {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 30px;
    }

    .main-content {
        background: white;
        border-radius: 12px;
        overflow: hidden;
    }

    .event-poster {
        width: 100%;
        max-height: 500px;
        overflow: hidden;
    }

    .event-poster img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .event-info-card {
        padding: 30px;
    }

    .event-title {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0 0 15px 0;
    }

    .event-category {
        display: inline-block;
        padding: 6px 16px;
        background: #cfe2ff;
        color: #084298;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .event-meta {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 20px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #495057;
    }

    .meta-item i {
        font-size: 20px;
        color: #0dcaf0;
    }

    .event-description {
        padding: 30px;
        border-top: 1px solid #e9ecef;
    }

    .event-description h2 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .event-description p {
        line-height: 1.8;
        color: #495057;
    }

    .sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .registration-box,
    .organizer-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .registration-box h3 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 20px 0;
    }

    .quota-info {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .quota-info i {
        font-size: 32px;
        color: #0dcaf0;
    }

    .quota-info strong {
        display: block;
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .quota-info p {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #1a1a1a;
    }

    .registration-info {
        background: #fff3cd;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .registration-info h4 {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 10px 0;
        color: #997404;
    }

    .registration-info p {
        margin: 0;
        color: #664d03;
        line-height: 1.6;
    }

    .btn-register {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #0dcaf0 0%, #0bb5d6 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 202, 240, 0.4);
    }

    .registration-closed {
        text-align: center;
        padding: 30px 20px;
        background: #f8d7da;
        border-radius: 10px;
    }

    .registration-closed i {
        font-size: 48px;
        color: #dc3545;
        margin-bottom: 15px;
    }

    .registration-closed h4 {
        margin: 0 0 10px 0;
        color: #58151c;
    }

    .registration-closed p {
        margin: 0;
        color: #842029;
    }

    .organizer-box h4 {
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 15px 0;
        color: #6c757d;
    }

    .organizer-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .organizer-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #0dcaf0 0%, #0bb5d6 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
    }

    .organizer-info strong {
        display: block;
        color: #1a1a1a;
        margin-bottom: 5px;
    }

    .organizer-info p {
        margin: 0;
        color: #6c757d;
        font-size: 14px;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid #e9ecef;
    }

    .modal-header h3 {
        margin: 0;
        font-size: 20px;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        border: none;
        background: #f8f9fa;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .modal-close:hover {
        background: #e9ecef;
    }

    .registration-form {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .required {
        color: #dc3545;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #0dcaf0;
        box-shadow: 0 0 0 4px rgba(13, 202, 240, 0.1);
    }

    select.form-control {
        cursor: pointer;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #0dcaf0 0%, #0bb5d6 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #0bb5d6 0%, #099bb8 100%);
    }

    @media (max-width: 768px) {
        .event-content {
            grid-template-columns: 1fr;
        }

        .event-title {
            font-size: 24px;
        }
    }
</style>

<script>
    function showRegistrationModal() {
        document.getElementById('registrationModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRegistrationModal() {
        document.getElementById('registrationModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('registrationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRegistrationModal();
        }
    });
</script>
@endsection