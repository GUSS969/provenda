<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Jasa Promosi Event Daerah' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <style>
        :root {
            --primary-purple: #7C3AED;
            --secondary-purple: #A78BFA;
            --dark-purple: #5B21B6;
            --light-purple: #EDE9FE;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--dark-purple) 100%);
            box-shadow: 0 2px 10px rgba(124, 58, 237, 0.3);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: white !important;
            border-bottom: 2px solid white;
        }

        .footer {
            background: linear-gradient(135deg, var(--dark-purple) 0%, var(--primary-purple) 100%);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }

        .footer h5 {
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 2rem;
            padding-top: 1.5rem;
            text-align: center;
        }

        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--dark-purple) 100%);
        }

        .text-purple {
            color: var(--primary-purple);
        }

        .btn-purple {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--dark-purple) 100%);
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.4);
            color: white;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}">
                <i class="ti ti-speakerphone"></i> Event Promo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}">
                            <i class="ti ti-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.events*') ? 'active' : '' }}" href="{{ route('user.events') }}">
                            <i class="ti ti-calendar-event"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">
                            <i class="ti ti-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">
                            <i class="ti ti-mail"></i> Kontak
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
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="ti ti-speakerphone"></i> Event Promo</h5>
                    <p>Platform terpercaya untuk promosi event daerah Anda. Jangkau lebih banyak peserta dengan layanan promosi profesional kami.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('user.home') }}"><i class="ti ti-chevron-right"></i> Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('user.events') }}"><i class="ti ti-chevron-right"></i> Daftar Event</a></li>
                        <li class="mb-2"><a href="#tentang"><i class="ti ti-chevron-right"></i> Tentang Kami</a></li>
                        <li class="mb-2"><a href="#kontak"><i class="ti ti-chevron-right"></i> Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4" id="kontak">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="ti ti-phone"></i> +62 812-3456-7890</li>
                        <li class="mb-2"><i class="ti ti-mail"></i> info@eventpromo.com</li>
                        <li class="mb-2"><i class="ti ti-map-pin"></i> Jawa Timur, Indonesia</li>
                    </ul>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-facebook fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-instagram fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="ti ti-brand-twitter fs-4"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2024 Jasa Promosi Event Daerah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>