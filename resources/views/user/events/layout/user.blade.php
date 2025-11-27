<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVENDA - @yield('title', 'Promosi Event Daerah')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/user-style.css') }}">
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('user.home') }}">
                <i class="ti ti-calendar-event text-purple"></i>
                <span class="text-purple">PROVENDA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.home') ? 'active text-purple fw-bold' : '' }}" href="{{ route('user.home') }}">
                            <i class="ti ti-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.events*') ? 'active text-purple fw-bold' : '' }}" href="{{ route('user.events') }}">
                            <i class="ti ti-calendar-event"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.about') ? 'active text-purple fw-bold' : '' }}" href="{{ route('user.about') }}">
                            <i class="ti ti-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.contact') ? 'active text-purple fw-bold' : '' }}" href="{{ route('user.contact') }}">
                            <i class="ti ti-phone"></i> Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="ti ti-calendar-event"></i> PROVENDA
                    </h5>
                    <p class="text-muted">Platform terpercaya untuk mempromosikan berbagai event daerah di Indonesia.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-twitter"></i></a>
                        <a href="#" class="text-white"><i class="ti ti-brand-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('user.home') }}" class="text-muted text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('user.events') }}" class="text-muted text-decoration-none">Event</a></li>
                        <li class="mb-2"><a href="{{ route('user.about') }}" class="text-muted text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('user.contact') }}" class="text-muted text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="ti ti-map-pin"></i> Jakarta, Indonesia</li>
                        <li class="mb-2"><i class="ti ti-phone"></i> +62 123 4567 890</li>
                        <li class="mb-2"><i class="ti ti-mail"></i> info@provenda.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="text-center text-muted">
                <p class="mb-0">&copy; {{ date('Y') }} PROVENDA. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>