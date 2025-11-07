<div id="sidebar" class="d-flex flex-column p-3">
    <h4 class="text-center mb-4 fw-bold">EventDaerah</h4>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
        </li>

        <li><hr></li>

        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-calendar-event me-2"></i> Daftar Event
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-megaphone me-2"></i> Promosi Aktif
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-graph-up me-2"></i> Statistik
            </a>
        </li>

        <li><hr></li>

        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-person-circle me-2"></i> Profil
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>
