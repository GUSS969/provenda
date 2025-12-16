@extends('penyelenggara.layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">👥</div>
                        <p class="mb-1 opacity-75 small">Total Pendaftar</p>
                        <h2 class="mb-0 fw-bold">{{ $registrations->count() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">✅</div>
                        <p class="mb-1 opacity-75 small">Approved</p>
                        <h2 class="mb-0 fw-bold">{{ $registrations->where('status', 'approved')->count() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">⏳</div>
                        <p class="mb-1 opacity-75 small">Pending</p>
                        <h2 class="mb-0 fw-bold">{{ $registrations->where('status', 'pending')->count() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">❌</div>
                        <p class="mb-1 opacity-75 small">Rejected</p>
                        <h2 class="mb-0 fw-bold">{{ $registrations->where('status', 'rejected')->count() }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-bold">
                            👥 Daftar UMKM yang Mendaftar
                        </h4>
                        <p class="text-muted small mb-0 mt-1">Kelola pendaftar UMKM dari semua event Anda</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-outline-secondary btn-sm me-2" onclick="window.print()">
                            🖨️ Print
                        </button>
                        <button class="btn btn-primary btn-sm">
                            📥 Export
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <!-- Search Bar -->
                <div class="p-3 bg-light border-bottom">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            🔍
                        </span>
                        <input type="text" class="form-control border-start-0" id="searchInput"
                            placeholder="Cari nama UMKM, pemilik, atau event...">
                    </div>
                </div>

                @if ($registrations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4" style="width: 100px;">Stand</th>
                                    <th style="min-width: 250px;">Nama UMKM</th>
                                    <th style="min-width: 150px;">Pemilik</th>
                                    <th style="width: 120px;">Kategori</th>
                                    <th style="width: 150px;">Kontak</th>
                                    <th style="min-width: 200px;">Event</th>
                                    <th style="width: 120px;">Status</th>
                                    <th class="text-center" style="width: 280px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $reg)
                                    <tr class="registration-row">
                                        <td class="px-4">
                                            @if ($reg->stand_number)
                                                <span class="badge bg-primary" style="font-size: 13px; padding: 6px 12px;">
                                                    {{ $reg->stand_number }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    {{ strtoupper(substr($reg->nama_umkm, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <strong class="d-block">{{ $reg->nama_umkm }}</strong>
                                                    @if ($reg->deskripsi)
                                                        <small
                                                            class="text-muted">{{ Str::limit($reg->deskripsi, 40) }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>{{ $reg->pemilik }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($reg->kategori) }}</span>
                                        </td>
                                        <td>
                                            <a href="https://wa.me/{{ $reg->no_wa }}" target="_blank"
                                                class="btn btn-sm btn-success">
                                                💬 WA
                                            </a>
                                            @if ($reg->email)
                                                <div class="small text-muted mt-1" style="font-size: 11px;">
                                                    {{ Str::limit($reg->email, 20) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ Str::limit($reg->event->nama_event, 35) }}</small>
                                        </td>
                                        <td>
                                            @if ($reg->status === 'pending')
                                                <span class="badge bg-warning">
                                                    Pending
                                                </span>
                                            @elseif($reg->status === 'approved')
                                                <span class="badge bg-success">
                                                    Approved
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    Rejected
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="{{ route('penyelenggara.events.show', $reg->event_id) }}"
                                                    class="btn btn-sm btn-info" title="Lihat Event">
                                                    Lihat
                                                </a>

                                                @if ($reg->status === 'pending')
                                                    <form action="{{ route('penyelenggara.umkm.approve', $reg->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            title="Approve">
                                                            ✓
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('penyelenggara.umkm.reject', $reg->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Reject"
                                                            onclick="return confirm('Yakin tolak pendaftar ini?')">
                                                            ✕
                                                        </button>
                                                    </form>
                                                @endif

                                                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $reg->id }}" title="Detail">
                                                    Info
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="detailModal{{ $reg->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header"
                                                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                                    <h5 class="modal-title text-white">
                                                        ℹ️ Detail UMKM
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">🎫 Nomor
                                                                Stand:</strong>
                                                            @if ($reg->stand_number)
                                                                <span class="badge bg-primary"
                                                                    style="font-size: 18px; padding: 10px 20px;">
                                                                    {{ $reg->stand_number }}
                                                                </span>
                                                            @else
                                                                <span class="text-muted">Belum ditentukan</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📅 Event:</strong>
                                                            <p class="mb-0">{{ $reg->event->nama_event }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">🏪 Nama UMKM:</strong>
                                                            <p class="mb-0 fw-bold">{{ $reg->nama_umkm }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">👤 Nama
                                                                Pemilik:</strong>
                                                            <p class="mb-0">{{ $reg->pemilik }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📦 Kategori:</strong>
                                                            <p class="mb-0"><span
                                                                    class="badge bg-info">{{ ucfirst($reg->kategori) }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📱 No
                                                                WhatsApp:</strong>
                                                            <p class="mb-0">{{ $reg->no_wa }}</p>
                                                        </div>
                                                        @if ($reg->email)
                                                            <div class="col-md-12 mb-3">
                                                                <strong class="text-muted d-block mb-2">📧 Email:</strong>
                                                                <p class="mb-0">{{ $reg->email }}</p>
                                                            </div>
                                                        @endif
                                                        @if ($reg->deskripsi)
                                                            <div class="col-md-12 mb-3">
                                                                <strong class="text-muted d-block mb-2">📝 Deskripsi
                                                                    Usaha:</strong>
                                                                <p class="mb-0">{{ $reg->deskripsi }}</p>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-12">
                                                            <strong class="text-muted d-block mb-2">🕒 Tanggal
                                                                Daftar:</strong>
                                                            <p class="mb-0">{{ $reg->created_at->format('d F Y, H:i') }}
                                                                WIB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="https://wa.me/{{ $reg->no_wa }}" target="_blank"
                                                        class="btn btn-success">
                                                        💬 Chat WhatsApp
                                                    </a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state text-center py-5">
                        <div class="empty-icon">🚫</div>
                        <h5 class="mt-3 text-muted">Belum ada UMKM yang mendaftar</h5>
                        <p class="text-muted">Pendaftar UMKM akan muncul di sini setelah ada yang mendaftar di event Anda
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* ============================================
       FIXED STATS CARD - NO ANIMATION
       ============================================ */
        .stats-card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .stats-icon {
            font-size: 2.5rem;
            line-height: 1;
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            opacity: 0.5;
        }

        /* ============================================
       AVATAR CIRCLE - FIXED SIZE
       ============================================ */
        .avatar-circle {
            width: 40px;
            height: 40px;
            min-width: 40px;
            min-height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 13px;
            flex-shrink: 0;
        }

        /* ============================================
       TABLE STYLING - SIMPLE & CLEAN
       ============================================ */
        .table th {
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
        }

        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* ============================================
       BUTTON STYLING - NO TRANSFORM
       ============================================ */
        .btn {
            font-size: 13px;
            font-weight: 500;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 12px;
        }

        /* ============================================
       BADGE STYLING
       ============================================ */
        .badge {
            font-weight: 500;
            padding: 5px 10px;
            font-size: 12px;
        }

        /* ============================================
       SEARCH INPUT
       ============================================ */
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .input-group-text {
            font-size: 16px;
        }

        /* ============================================
       EMPTY STATE
       ============================================ */
        .empty-state {
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 5rem;
            line-height: 1;
            opacity: 0.3;
        }

        /* ============================================
       MODAL STYLING
       ============================================ */
        .modal-body strong {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ============================================
       CARD STYLING
       ============================================ */
        .card {
            border-radius: 8px;
        }

        .card-header {
            border-radius: 8px 8px 0 0 !important;
        }

        /* ============================================
       PRINT STYLE
       ============================================ */
        @media print {

            .btn,
            .card-header .col-md-6:last-child,
            .bg-light.border-bottom,
            .stats-card {
                display: none !important;
            }

            .card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }

            .table {
                font-size: 11px;
            }
        }

        /* ============================================
       RESPONSIVE
       ============================================ */
        @media (max-width: 768px) {
            .table {
                font-size: 12px;
            }

            .btn-sm {
                padding: 3px 8px;
                font-size: 11px;
            }

            .avatar-circle {
                width: 35px;
                height: 35px;
                min-width: 35px;
                min-height: 35px;
                font-size: 12px;
            }
        }
    </style>

    <script>
        // Real-time Search
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toUpperCase();
            let rows = document.querySelectorAll('.registration-row');

            rows.forEach(row => {
                let text = row.textContent || row.innerText;
                if (text.toUpperCase().indexOf(filter) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
