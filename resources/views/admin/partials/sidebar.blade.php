<div class="sidebar-wrapper" style="width: 280px; min-height: 100vh; background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%); position: fixed; left: 0; top: 0; overflow-y: auto;">
    
    <!-- Logo / Brand -->
    <div class="brand-section text-center py-4 px-3" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
        <div style="background: rgba(255,255,255,0.1); width: 70px; height: 70px; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Provenda Logo"
                    style="height: 60px; max-height: 60px; object-fit: contain; margin-right: 6px;">
        </div>
        <h4 class="text-white fw-bold mb-1">PROVENDA</h4>
        <p class="text-white-50 small mb-0">Admin Panel</p>
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav py-4">
        <ul class="nav flex-column px-3" style="list-style: none;">
            
            <!-- Dashboard -->
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" style="color: #fff; padding: 12px 16px; border-radius: 10px; display: flex; align-items: center; text-decoration: none; transition: all 0.3s; background: {{ request()->routeIs('admin.dashboard') ? 'rgba(255,255,255,0.2)' : 'transparent' }};">
                    <i class="ti ti-layout-dashboard me-3" style="font-size: 1.3rem;"></i>
                    <span class="fw-semibold">Dashboard</span>
                </a>
            </li>

            <!-- Event -->
            <li class="nav-item mb-2">
                <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}" style="color: #fff; padding: 12px 16px; border-radius: 10px; display: flex; align-items: center; text-decoration: none; transition: all 0.3s; background: {{ request()->routeIs('admin.events.*') ? 'rgba(255,255,255,0.2)' : 'transparent' }};">
                    <i class="ti ti-calendar-event me-3" style="font-size: 1.3rem;"></i>
                    <span class="fw-semibold">Event</span>
                </a>
            </li>

            <!-- Penyelenggara -->
            <li class="nav-item mb-2">
                <a href="{{ route('admin.penyelenggaras.index') }}" class="nav-link {{ request()->routeIs('admin.penyelenggaras.*') ? 'active' : '' }}" style="color: #fff; padding: 12px 16px; border-radius: 10px; display: flex; align-items: center; text-decoration: none; transition: all 0.3s; background: {{ request()->routeIs('admin.penyelenggaras.*') ? 'rgba(255,255,255,0.2)' : 'transparent' }};">
                    <i class="ti ti-building me-3" style="font-size: 1.3rem;"></i>
                    <span class="fw-semibold">Penyelenggara</span>
                </a>
            </li>

            <!-- UMKM -->
            <li class="nav-item mb-2">
                <a href="{{ route('admin.umkms.index') }}" class="nav-link {{ request()->routeIs('admin.umkms.*') ? 'active' : '' }}" style="color: #fff; padding: 12px 16px; border-radius: 10px; display: flex; align-items: center; text-decoration: none; transition: all 0.3s; background: {{ request()->routeIs('admin.umkms.*') ? 'rgba(255,255,255,0.2)' : 'transparent' }};">
                    <i class="ti ti-users me-3" style="font-size: 1.3rem;"></i>
                    <span class="fw-semibold">UMKM</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="px-3 pb-4" style="position: absolute; bottom: 0; left: 0; right: 0;">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn w-100" style="background: rgba(220, 53, 69, 0.9); color: #fff; padding: 12px; border-radius: 10px; border: none; font-weight: 600; transition: all 0.3s;">
                <i class="ti ti-logout me-2"></i> Logout
            </button>
        </form>
    </div>

</div>

<style>
.sidebar-wrapper .nav-link:hover {
    background: rgba(255,255,255,0.15) !important;
    transform: translateX(5px);
}

.sidebar-wrapper .nav-link.active {
    background: rgba(255,255,255,0.2) !important;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.sidebar-wrapper::-webkit-scrollbar {
    width: 6px;
}

.sidebar-wrapper::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.05);
}

.sidebar-wrapper::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
}

.sidebar-wrapper::-webkit-scrollbar-thumb:hover {
    background: rgba(255,255,255,0.3);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
</style>