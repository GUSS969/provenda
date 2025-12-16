<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVENDA - @yield('title', 'Promosi Event Daerah')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    @stack('styles')
</head>
<body>
    <!-- Navbar BIRU - Inline Style -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background: linear-gradient(135deg, #00BCD4 0%, #00ACC1 100%) !important; box-shadow: 0 4px 20px rgba(0, 188, 212, 0.3); padding: 15px 0;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('user.home') }}" style="color: white !important; display: flex; align-items: center; gap: 10px;">
                <i class="ti ti-calendar-event" style="color: white !important; font-size: 2rem;"></i>
                <span style="color: white !important; font-size: 1.6rem;">Event Promo</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: rgba(255,255,255,0.5);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}" style="color: white !important; padding: 10px 20px; border-radius: 10px; {{ request()->routeIs('user.home') ? 'background: rgba(255,255,255,0.25);' : '' }}">
                            <i class="ti ti-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.events*') ? 'active' : '' }}" href="{{ route('user.events') }}" style="color: white !important; padding: 10px 20px; border-radius: 10px; {{ request()->routeIs('user.events*') ? 'background: rgba(255,255,255,0.25);' : '' }}">
                            <i class="ti ti-calendar-event"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang" style="color: white !important; padding: 10px 20px; border-radius: 10px;">
                            <i class="ti ti-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak" style="color: white !important; padding: 10px 20px; border-radius: 10px;">
                            <i class="ti ti-phone"></i> Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer BIRU - Inline Style -->
    <footer style="background: linear-gradient(135deg, #00BCD4 0%, #00ACC1 100%) !important; color: white; padding: 60px 0 30px; margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 style="color: white !important; font-weight: 700;">
                        <i class="ti ti-calendar-event"></i> Event Promo
                    </h5>
                    <p style="color: rgba(255,255,255,0.9);">Platform terpercaya untuk mempromosikan berbagai event daerah di Indonesia.</p>
                    <div style="margin-top: 20px;">
                        <a href="#" style="color: white; margin-right: 15px;"><i class="ti ti-brand-facebook"></i></a>
                        <a href="#" style="color: white; margin-right: 15px;"><i class="ti ti-brand-instagram"></i></a>
                        <a href="#" style="color: white; margin-right: 15px;"><i class="ti ti-brand-twitter"></i></a>
                        <a href="#" style="color: white;"><i class="ti ti-brand-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 style="color: white !important; font-weight: 700;">Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li style="margin-bottom: 10px;"><a href="{{ route('user.home') }}" style="color: rgba(255,255,255,0.85); text-decoration: none;">Beranda</a></li>
                        <li style="margin-bottom: 10px;"><a href="{{ route('user.events') }}" style="color: rgba(255,255,255,0.85); text-decoration: none;">Event</a></li>
                        <li style="margin-bottom: 10px;"><a href="{{ route('user.tentang') }}" style="color: rgba(255,255,255,0.85); text-decoration: none;">Tentang Kami</a></li>
                        <li style="margin-bottom: 10px;"><a href="#kontak" style="color: rgba(255,255,255,0.85); text-decoration: none;">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4" id="kontak">
                    <h5 style="color: white !important; font-weight: 700;">Kontak</h5>
                    <ul class="list-unstyled">
                        <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);"><i class="ti ti-map-pin"></i> Jawa Timur, Indonesia</li>
                        <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);"><i class="ti ti-phone"></i> +62 123 4567 890</li>
                        <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);"><i class="ti ti-mail"></i> info@eventpromo.com</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.2); margin: 30px 0;">
            <div class="text-center">
                <p style="color: rgba(255,255,255,0.9); margin: 0;">&copy; {{ date('Y') }} Event Promo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>