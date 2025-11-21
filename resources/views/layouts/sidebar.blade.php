<div class="pc-sidebar">
    <div class="navbar-wrapper">

        <!-- ============================================ -->
        <!-- BRAND / LOGO SECTION -->
        <!-- ============================================ -->
        <div class="m-header">
            <a href="{{ route('dashboard') }}" class="b-brand">
                <div class="logo-container">
                    <div class="logo-icon">
                        <i class="ti ti-calendar-event"></i>
                    </div>
                    <div class="logo-text">
                        <span class="brand-name">Event Promo</span>
                        <span class="brand-tagline">Daerah</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- ============================================ -->
        <!-- NAVIGATION MENU -->
        <!-- ============================================ -->
        <div class="navbar-content">
            <ul class="pc-navbar">

                <!-- DASHBOARD -->
                <li class="pc-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- DIVIDER -->
                <li class="pc-divider"></li>

                <!-- MANAJEMEN EVENT SECTION -->
                <li class="pc-caption">
                    <i class="ti ti-calendar"></i>
                    <span>Manajemen Event</span>
                </li>

                <li class="pc-item pc-hasmenu {{ request()->routeIs('events.*') ? 'active pc-trigger' : '' }}">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-calendar-event"></i>
                        </span>
                        <span class="pc-mtext">Event</span>
                        <span class="pc-arrow">
                            <i class="ti ti-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ request()->routeIs('events.index') ? 'active' : '' }}">
                            <a class="pc-link" href="{{ route('events.index') }}">
                                <i class="ti ti-list"></i> Semua Event
                            </a>
                        </li>
                        <li class="pc-item {{ request()->routeIs('events.create') ? 'active' : '' }}">
                            <a class="pc-link" href="{{ route('events.create') }}">
                                <i class="ti ti-plus"></i> Tambah Event
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- DIVIDER -->
                <li class="pc-divider"></li>

                <!-- PENGATURAN AKUN SECTION -->
                <li class="pc-caption">
                    <i class="ti ti-settings"></i>
                    <span>Pengaturan Akun</span>
                </li>

                <li class="pc-item {{ request()->routeIs('penyelenggaras.*') ? 'active' : '' }}">
                    <a href="{{ route('penyelenggaras.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="pc-mtext">Penyelenggara</span>
                        @php
                            $count_penyelenggara = \App\Models\Penyelenggara::count();
                        @endphp
                        @if($count_penyelenggara > 0)
                            <span class="badge bg-primary rounded-pill">{{ $count_penyelenggara }}</span>
                        @endif
                    </a>
                </li>

                <li class="pc-item {{ request()->routeIs('umkms.*') ? 'active' : '' }}">
                    <a href="{{ route('umkms.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-building-store"></i>
                        </span>
                        <span class="pc-mtext">UMKM</span>
                        @php
                            $count_umkm = \App\Models\UMKM::count();
                        @endphp
                        @if($count_umkm > 0)
                            <span class="badge bg-success rounded-pill">{{ $count_umkm }}</span>
                        @endif
                    </a>
                </li>

                <!-- DIVIDER -->
                <li class="pc-divider"></li>

                <!-- USER PROFILE SECTION -->
                <li class="pc-item pc-user-card">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <i class="ti ti-user-circle"></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <span class="user-role">Administrator</span>
                        </div>
                    </div>
                </li>

                <!-- LOGOUT -->
                <li class="pc-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" class="pc-link logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="pc-micon">
                                <i class="ti ti-logout"></i>
                            </span>
                            <span class="pc-mtext">Logout</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>

        <!-- ============================================ -->
        <!-- SIDEBAR FOOTER -->
        <!-- ============================================ -->
        <div class="sidebar-footer">
            <div class="footer-content">
                <i class="ti ti-info-circle"></i>
                <span>v1.0.0</span>
            </div>
        </div>

    </div>
</div>

<!-- ============================================ -->
<!-- CUSTOM SIDEBAR STYLES -->
<!-- ============================================ -->
<style>
/* ============================================ */
/* SIDEBAR CONTAINER */
/* ============================================ */
.pc-sidebar {
    background: linear-gradient(180deg, #1a2035 0%, #151b2e 100%);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.navbar-wrapper {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.navbar-content {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
}

/* Custom Scrollbar */
.navbar-content::-webkit-scrollbar {
    width: 6px;
}

.navbar-content::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
}

.navbar-content::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
}

.navbar-content::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* ============================================ */
/* LOGO / BRAND SECTION */
/* ============================================ */
.m-header {
    padding: 1.5rem 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
}

.b-brand {
    display: block;
    text-decoration: none;
    transition: all 0.3s ease;
}

.b-brand:hover {
    transform: translateX(5px);
}

.logo-container {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.logo-icon i {
    font-size: 24px;
    color: white;
}

.logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.brand-name {
    font-size: 18px;
    font-weight: 700;
    color: white;
    letter-spacing: -0.5px;
}

.brand-tagline {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.6);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* ============================================ */
/* MENU ITEMS */
/* ============================================ */
.pc-navbar {
    padding: 1rem 0;
}

.pc-item {
    margin: 0.25rem 0.75rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.pc-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    gap: 12px;
}

.pc-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: #667eea;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.pc-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(5px);
}

.pc-link:hover::before {
    transform: scaleY(1);
}

/* Active State */
.pc-item.active .pc-link {
    background: linear-gradient(90deg, rgba(102, 126, 234, 0.2) 0%, rgba(102, 126, 234, 0.05) 100%);
    color: white;
    font-weight: 600;
}

.pc-item.active .pc-link::before {
    transform: scaleY(1);
}

.pc-item.active .pc-micon i {
    color: #667eea;
    transform: scale(1.1);
}

/* Menu Icon */
.pc-micon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.pc-micon i {
    font-size: 20px;
    transition: all 0.3s ease;
}

/* Menu Text */
.pc-mtext {
    flex: 1;
    font-size: 14px;
    font-weight: 500;
}

/* Arrow for Submenu */
.pc-arrow {
    margin-left: auto;
    transition: transform 0.3s ease;
}

.pc-item.pc-trigger .pc-arrow {
    transform: rotate(90deg);
}

/* Badge */
.badge {
    font-size: 10px;
    padding: 3px 8px;
    font-weight: 600;
}

/* ============================================ */
/* SUBMENU */
/* ============================================ */
.pc-submenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding-left: 2rem;
    margin-top: 0.25rem;
}

.pc-item.pc-trigger .pc-submenu {
    max-height: 200px;
}

.pc-submenu .pc-item {
    margin: 0.25rem 0;
}

.pc-submenu .pc-link {
    padding: 0.6rem 0.75rem;
    font-size: 13px;
    gap: 8px;
}

.pc-submenu .pc-link i {
    font-size: 16px;
}

/* ============================================ */
/* CAPTION / SECTION HEADER */
/* ============================================ */
.pc-caption {
    padding: 1.25rem 1rem 0.5rem;
    color: rgba(255, 255, 255, 0.5);
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.pc-caption i {
    font-size: 14px;
}

/* ============================================ */
/* DIVIDER */
/* ============================================ */
.pc-divider {
    height: 1px;
    background: rgba(255, 255, 255, 0.1);
    margin: 1rem 1rem;
}

/* ============================================ */
/* USER PROFILE CARD */
/* ============================================ */
.pc-user-card {
    margin: 1rem 0.75rem;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.user-avatar i {
    font-size: 24px;
    color: white;
}

.user-info {
    display: flex;
    flex-direction: column;
    line-height: 1.3;
}

.user-name {
    font-size: 13px;
    font-weight: 600;
    color: white;
}

.user-role {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.6);
}

/* ============================================ */
/* LOGOUT LINK */
/* ============================================ */
.logout-link {
    color: rgba(255, 107, 107, 0.9) !important;
}

.logout-link:hover {
    background: rgba(255, 107, 107, 0.1) !important;
    color: #ff6b6b !important;
}

.logout-link:hover .pc-micon i {
    color: #ff6b6b;
}

/* ============================================ */
/* SIDEBAR FOOTER */
/* ============================================ */
.sidebar-footer {
    padding: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
}

.footer-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.4);
    font-size: 12px;
}

.footer-content i {
    font-size: 16px;
}

/* ============================================ */
/* RESPONSIVE */
/* ============================================ */
@media (max-width: 1024px) {
    .pc-sidebar {
        transform: translateX(-100%);
    }
    
    .pc-sidebar.mob-sidebar-active {
        transform: translateX(0);
    }
}

/* ============================================ */
/* ANIMATIONS */
/* ============================================ */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.pc-item {
    animation: slideIn 0.3s ease forwards;
}

.pc-item:nth-child(1) { animation-delay: 0.05s; }
.pc-item:nth-child(2) { animation-delay: 0.1s; }
.pc-item:nth-child(3) { animation-delay: 0.15s; }
.pc-item:nth-child(4) { animation-delay: 0.2s; }
.pc-item:nth-child(5) { animation-delay: 0.25s; }

/* ============================================ */
/* HOVER GLOW EFFECT */
/* ============================================ */
.pc-link:hover .pc-micon {
    filter: drop-shadow(0 0 8px rgba(102, 126, 234, 0.5));
}
</style>

<!-- ============================================ -->
<!-- JAVASCRIPT FOR SUBMENU TOGGLE -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Submenu Toggle
    document.querySelectorAll('.pc-hasmenu > .pc-link').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.closest('.pc-hasmenu');
            parent.classList.toggle('pc-trigger');
        });
    });
});
</script>