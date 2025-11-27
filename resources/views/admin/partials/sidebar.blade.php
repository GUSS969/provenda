<div class="sidebar d-flex flex-column p-3">
    <div class="mb-4 text-center">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
            <div class="brand-logo">EventPromo</div>
            <span class="sidebar-subtitle">Promosi Event Daerah</span>

        </a>
    </div>

    <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}"
                href="{{ route('admin.events.index') }}">
                <i class="bi bi-calendar-event me-2"></i> Event
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.penyelenggaras.*') ? 'active' : '' }}"
                href="{{ route('admin.penyelenggaras.index') }}">
                <i class="bi bi-people me-2"></i> Penyelenggara
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.umkms.*') ? 'active' : '' }}"
                href="{{ route('admin.umkms.index') }}">
                <i class="bi bi-shop me-2"></i> UMKM
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-danger w-100 mt-3"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
        </form>
    </div>
</div>
