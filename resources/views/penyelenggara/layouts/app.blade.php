<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penyelenggara - @yield('title', 'PROVENDA')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-teal: #0D9488;
            --primary-orange: #F97316;
            --primary-light: #14B8A6;
            --secondary-coral: #FB923C;
            --gradient-main: linear-gradient(135deg, #0D9488 0%, #14B8A6 100%);
            --shadow-sm: 0 2px 8px rgba(13, 148, 136, 0.1);
            --shadow-md: 0 4px 16px rgba(13, 148, 136, 0.15);
            --shadow-lg: 0 8px 32px rgba(13, 148, 136, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: var(--gradient-main);
            color: white;
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
        }

        .sidebar-brand i {
            font-size: 2rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background: #f1f5f9;
            color: var(--primary-teal);
            border-left-color: var(--primary-teal);
        }

        .menu-item.active {
            background: rgba(13, 148, 136, 0.1);
            color: var(--primary-teal);
            border-left-color: var(--primary-teal);
        }

        .menu-item i {
            font-size: 1.3rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            padding: 30px;
        }

        /* Topbar */
        .topbar {
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1f2937;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: var(--gradient-main);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .user-info h6 {
            margin: 0;
            font-weight: 600;
            color: #1f2937;
        }

        .user-info p {
            margin: 0;
            font-size: 0.85rem;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('penyelenggara.dashboard') }}" class="sidebar-brand">
                <i class="ti ti-calendar-event"></i>
                <span>PROVENDA</span>
            </a>
            <p style="margin: 5px 0 0 0; font-size: 0.85rem; opacity: 0.9;">Dashboard Penyelenggara</p>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('penyelenggara.dashboard') }}"
                class="menu-item {{ request()->routeIs('penyelenggara.dashboard') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('penyelenggara.event_saya') }}"
                class="menu-item {{ request()->routeIs('penyelenggara.event_saya') ? 'active' : '' }}">
                <i class="ti ti-calendar-event"></i>
                <span>Event Saya</span>
            </a>
            <a href="#" class="menu-item">
                <i class="ti ti-plus-circle"></i>
                <span>Buat Event Baru</span>
            </a>
            <a href="#" class="menu-item">
                <i class="ti ti-chart-line"></i>
                <span>Statistik</span>
            </a>
            <a href="{{ route('penyelenggara.umkm.registrations') }}"
                class="menu-item {{ request()->routeIs('penyelenggara.umkm.registrations') ? 'active' : '' }}">
                <i class="ti ti-users"></i>
                <span>Peserta UMKM</span>
            </a>
            <a href="#" class="menu-item">
                <i class="ti ti-settings"></i>
                <span>Pengaturan</span>
            </a>
            <a href="#" class="menu-item">
                <i class="ti ti-logout"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h1 class="topbar-title">@yield('page-title', 'Dashboard')</h1>
            <div class="topbar-user">
                <div class="user-info text-end">
                    <h6>{{ $penyelenggara->nama ?? 'Penyelenggara' }}</h6>
                    <p>{{ $penyelenggara->email ?? 'email@example.com' }}</p>
                </div>
                <div class="user-avatar">
                    {{ strtoupper(substr($penyelenggara->nama ?? 'P', 0, 1)) }}
                </div>
            </div>
        </div>

        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
