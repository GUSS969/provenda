<div class="pc-sidebar">
    <div class="navbar-wrapper">

        <div class="m-header py-4 px-3">
            <a href="{{ route('dashboard') }}" class="b-brand d-flex align-items-center gap-2">
                <img src="/admin/assets/images/logo-white.svg" class="img-fluid" alt="Logo" style="max-height: 38px;">
                <span class="text-white fw-bold fs-5">Datta Able</span>
            </a>
        </div>

        <ul class="pc-navbar">

            {{-- DASHBOARD --}}
            <li class="pc-item">
                <a href="{{ route('dashboard') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-home"></i></span>
                    <span class="pc-mtext">Dashboard</span>
                </a>
            </li>

            {{-- EVENT --}}
            <li class="pc-caption">MANAJEMEN EVENT</li>

            <li class="pc-item">
                <a href="{{ route('events.index') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-calendar"></i></span>
                    <span class="pc-mtext">Data Event</span>
                </a>
            </li>

            <li class="pc-item">
                <a href="{{ route('events.create') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-plus"></i></span>
                    <span class="pc-mtext">Tambah Event</span>
                </a>
            </li>

            {{-- AKUN --}}
            <li class="pc-caption">PENGATURAN AKUN</li>

            <li class="pc-item">
                <a href="{{ route('penyelenggaras.index') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-users"></i></span>
                    <span class="pc-mtext">Akun Penyelenggara</span>
                </a>
            </li>

            <li class="pc-item">
                <a href="{{ route('umkms.index') }}" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-building-store"></i></span>
                    <span class="pc-mtext">Akun UMKM</span>
                </a>
            </li>

            {{-- LOGOUT --}}
            <li class="pc-caption">AKUN</li>

            <li class="pc-item">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="pc-link border-0 bg-transparent">
                        <span class="pc-micon"><i class="ti ti-logout"></i></span>
                        <span class="pc-mtext">Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</div>
