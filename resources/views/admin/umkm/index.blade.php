@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">🏪</div>
                        <p class="mb-1 opacity-75 small">Total UMKM</p>
                        <h2 class="mb-0 fw-bold">{{ $umkms->total() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">✅</div>
                        <p class="mb-1 opacity-75 small">Approved</p>
                        <h2 class="mb-0 fw-bold">{{ \App\Models\UmkmRegistration::where('status', 'approved')->count() }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">⏳</div>
                        <p class="mb-1 opacity-75 small">Pending</p>
                        <h2 class="mb-0 fw-bold">{{ \App\Models\UmkmRegistration::where('status', 'pending')->count() }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card card border-0 shadow-sm h-100"
                    style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <div class="card-body text-white text-center py-4">
                        <div class="stats-icon mb-2">❌</div>
                        <p class="mb-1 opacity-75 small">Rejected</p>
                        <h2 class="mb-0 fw-bold">{{ \App\Models\UmkmRegistration::where('status', 'rejected')->count() }}
                        </h2>
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
                            🏪 Daftar UMKM Terdaftar Event
                        </h4>
                        <p class="text-muted small mb-0 mt-1">Kelola semua UMKM yang terdaftar di sistem</p>
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

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3 mb-0">
                    <i class="ti ti-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card-body p-0">
                <!-- Search Bar -->
                <div class="p-3 bg-light border-bottom">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            🔍
                        </span>
                        <input type="text" class="form-control border-start-0" id="searchInput"
                            placeholder="Cari nama UMKM, event, atau penyelenggara...">
                    </div>
                </div>

                @if ($umkms->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4" style="width: 60px;">No</th>
                                    <th style="width: 100px;">Stand</th>
                                    <th style="min-width: 200px;">Nama UMKM</th>
                                    <th style="min-width: 200px;">Event</th>
                                    <th style="min-width: 150px;">Penyelenggara</th>
                                    <th style="width: 120px;">Status</th>
                                    <th class="text-center" style="width: 250px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($umkms as $index => $umkm)
                                    <tr class="umkm-row">
                                        <td class="px-4 text-center">{{ $umkms->firstItem() + $index }}</td>
                                        <td>
                                            @if ($umkm->stand_number)
                                                <span class="badge bg-primary" style="font-size: 13px; padding: 6px 12px;">
                                                    {{ $umkm->stand_number }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    {{ strtoupper(substr($umkm->nama_umkm ?? 'U', 0, 2)) }}
                                                </div>
                                                <div>
                                                    <strong class="d-block">{{ $umkm->nama_umkm ?? '-' }}</strong>
                                                    @if ($umkm->pemilik)
                                                        <small class="text-muted">{{ $umkm->pemilik }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <small>{{ $umkm->event->nama_event ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $umkm->event->penyelenggara->nama ?? '-' }}</small>
                                        </td>
                                        <td>
                                            @if ($umkm->status == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($umkm->status == 'rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                @if ($umkm->status !== 'approved')
                                                    <form action="{{ route('admin.umkms.approve', $umkm->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            title="Approve" onclick="return confirm('Approve UMKM ini?')">
                                                            ✓
                                                        </button>
                                                    </form>
                                                @endif

                                                @if ($umkm->status !== 'rejected')
                                                    <form action="{{ route('admin.umkms.reject', $umkm->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Reject"
                                                            onclick="return confirm('Reject UMKM ini?')">
                                                            ✕
                                                        </button>
                                                    </form>
                                                @endif

                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $umkm->id }}" title="Detail">
                                                    Info
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="detailModal{{ $umkm->id }}" tabindex="-1">
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
                                                            @if ($umkm->stand_number)
                                                                <span class="badge bg-primary"
                                                                    style="font-size: 18px; padding: 10px 20px;">
                                                                    {{ $umkm->stand_number }}
                                                                </span>
                                                            @else
                                                                <span class="text-muted">Belum ditentukan</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📊 Status:</strong>
                                                            @if ($umkm->status == 'approved')
                                                                <span class="badge bg-success"
                                                                    style="font-size: 14px; padding: 8px 16px;">✅
                                                                    Approved</span>
                                                            @elseif($umkm->status == 'rejected')
                                                                <span class="badge bg-danger"
                                                                    style="font-size: 14px; padding: 8px 16px;">❌
                                                                    Rejected</span>
                                                            @else
                                                                <span class="badge bg-warning"
                                                                    style="font-size: 14px; padding: 8px 16px;">⏳
                                                                    Pending</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📅 Event:</strong>
                                                            <p class="mb-0">{{ $umkm->event->nama_event ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">🏢
                                                                Penyelenggara:</strong>
                                                            <p class="mb-0">
                                                                {{ $umkm->event->penyelenggara->nama ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">🏪 Nama UMKM:</strong>
                                                            <p class="mb-0 fw-bold">{{ $umkm->nama_umkm ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">👤 Nama
                                                                Pemilik:</strong>
                                                            <p class="mb-0">{{ $umkm->pemilik ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📦 Kategori:</strong>
                                                            <p class="mb-0">
                                                                @if ($umkm->kategori)
                                                                    <span
                                                                        class="badge bg-info">{{ ucfirst($umkm->kategori) }}</span>
                                                                @else
                                                                    <span class="text-muted">-</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <strong class="text-muted d-block mb-2">📱 No
                                                                WhatsApp:</strong>
                                                            <p class="mb-0">{{ $umkm->no_wa ?? '-' }}</p>
                                                        </div>
                                                        @if ($umkm->email)
                                                            <div class="col-md-12 mb-3">
                                                                <strong class="text-muted d-block mb-2">📧 Email:</strong>
                                                                <p class="mb-0">{{ $umkm->email }}</p>
                                                            </div>
                                                        @endif
                                                        @if ($umkm->deskripsi)
                                                            <div class="col-md-12 mb-3">
                                                                <strong class="text-muted d-block mb-2">📝 Deskripsi
                                                                    Usaha:</strong>
                                                                <p class="mb-0">{{ $umkm->deskripsi }}</p>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-12">
                                                            <strong class="text-muted d-block mb-2">🕒 Tanggal
                                                                Daftar:</strong>
                                                            <p class="mb-0">
                                                                {{ $umkm->created_at->format('d F Y, H:i') }} WIB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    @if ($umkm->no_wa)
                                                        <a href="https://wa.me/{{ $umkm->no_wa }}" target="_blank"
                                                            class="btn btn-success">
                                                            💬 Chat WhatsApp
                                                        </a>
                                                    @endif
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

                    <!-- Pagination -->
                    <div class="card-footer bg-white border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $umkms->firstItem() }} - {{ $umkms->lastItem() }} dari
                                {{ $umkms->total() }} UMKM
                            </div>
                            <div>
                                {{ $umkms->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="empty-state text-center py-5">
                        <div class="empty-icon">🚫</div>
                        <h5 class="mt-3 text-muted">Belum ada UMKM yang mendaftar</h5>
                        <p class="text-muted">Data UMKM akan muncul di sini setelah ada yang mendaftar di event</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Stats Card */
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

        /* Avatar Circle */
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

        /* Table */
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

        /* Button */
        .btn {
            font-size: 13px;
            font-weight: 500;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 12px;
        }

        /* Badge */
        .badge {
            font-weight: 500;
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Search */
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        /* Empty State */
        .empty-state {
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 5rem;
            line-height: 1;
            opacity: 0.3;
        }

        /* Card */
        .card {
            border-radius: 8px;
        }

        /* Print */
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
        }

        /* Responsive */
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
                font-size: 12px;
            }
        }
    </style>

    <script>
        // Real-time Search
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toUpperCase();
            let rows = document.querySelectorAll('.umkm-row');

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
