<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Event Promo - Jasa Promosi Event Daerah' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-purple: #7C3AED;
            --primary-dark: #6D28D9;
            --primary-light: #A78BFA;
            --secondary-pink: #EC4899;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
            --shadow-sm: 0 2px 8px rgba(124, 58, 237, 0.1);
            --shadow-md: 0 4px 16px rgba(124, 58, 237, 0.15);
            --shadow-lg: 0 8px 32px rgba(124, 58, 237, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #1f2937;
            overflow-x: hidden;
            background: #ffffff;
        }

        /* Navbar Styling */
        .navbar {
            background: var(--gradient-2);
            padding: 1.2rem 0;
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.8rem 0;
            box-shadow: var(--shadow-lg);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 800;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            transition: transform 0.3s ease;
            letter-spacing: -0.5px;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand i {
            font-size: 2rem;
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.5);
            padding: 0.5rem 0.75rem;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            margin: 0 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 1rem !important;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 80%;
            height: 3px;
            background: white;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav-link.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 400px);
        }

        /* Footer Styling */
        .footer {
            background: var(--gradient-2);
            color: white;
            padding: 4rem 0 0;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer h5 i {
            font-size: 1.8rem;
        }

        .footer p {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .footer-links a i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-links a:hover i {
            transform: translateX(3px);
        }

        .contact-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-info li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .contact-info li i {
            font-size: 1.3rem;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .social-links a i {
            font-size: 1.5rem;
        }

        .social-links a:hover {
            background: white;
            color: var(--primary-purple);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin-top: 3rem;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .footer-bottom p {
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        /* Utility Classes */
        .gradient-bg {
            background: var(--gradient-2);
        }

        .text-purple {
            color: var(--primary-purple);
        }

        .btn-purple {
            background: var(--gradient-2);
            border: none;
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-md);
        }

        .btn-purple:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--gradient-2);
            color: white;
            border: none;
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
        }

        .back-to-top.show {
            display: flex;
        }

        .back-to-top i {
            font-size: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(124, 58, 237, 0.95);
                backdrop-filter: blur(10px);
                margin-top: 1rem;
                padding: 1rem;
                border-radius: 15px;
            }

            .nav-link {
                margin: 0.3rem 0;
                border-radius: 8px;
            }

            .nav-link:hover {
                background: rgba(255, 255, 255, 0.1);
            }
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.3rem;
            }

            .footer {
                padding: 3rem 0 0;
            }

            .footer h5 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }

            .social-links {
                justify-content: center;
            }
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Loading Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-element {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}">
                <i class="ti ti-calendar-event"></i>
                <span>Event Promo</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('user.home') }}">
                            <i class="ti ti-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('events*') ? 'active' : '' }}" href="{{ route('user.events') }}">
                            <i class="ti ti-calendar"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">
                            <i class="ti ti-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">
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

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="ti ti-arrow-up"></i>
    </button>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5>
                            <i class="ti ti-calendar-event"></i>
                            Event Promo
                        </h5>
                        <p>
                            Platform terpercaya untuk promosi event daerah Anda. Jangkau lebih banyak peserta 
                            dengan layanan promosi profesional kami yang telah dipercaya oleh ratusan penyelenggara.
                        </p>
                        <div class="social-links">
                            <a href="#" title="Facebook">
                                <i class="ti ti-brand-facebook"></i>
                            </a>
                            <a href="#" title="Instagram">
                                <i class="ti ti-brand-instagram"></i>
                            </a>
                            <a href="#" title="Twitter">
                                <i class="ti ti-brand-twitter"></i>
                            </a>
                            <a href="#" title="LinkedIn">
                                <i class="ti ti-brand-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5>Link Cepat</h5>
                        <ul class="footer-links">
                            <li>
                                <a href="{{ route('user.home') }}">
                                    <i class="ti ti-chevron-right"></i> Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.events') }}">
                                    <i class="ti ti-chevron-right"></i> Daftar Event
                                </a>
                            </li>
                            <li>
                                <a href="#tentang">
                                    <i class="ti ti-chevron-right"></i> Tentang Kami
                                </a>
                            </li>
                            <li>
                                <a href="#kontak">
                                    <i class="ti ti-chevron-right"></i> Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5>Layanan</h5>
                        <ul class="footer-links">
                            <li>
                                <a href="#">
                                    <i class="ti ti-chevron-right"></i> Promosi Digital
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ti ti-chevron-right"></i> Analisa Event
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ti ti-chevron-right"></i> Konsultasi Gratis
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ti ti-chevron-right"></i> Support 24/7
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4" id="kontak">
                        <h5>Hubungi Kami</h5>
                        <ul class="contact-info">
                            <li>
                                <i class="ti ti-phone"></i>
                                <span>+62 812-3456-7890</span>
                            </li>
                            <li>
                                <i class="ti ti-mail"></i>
                                <span>info@eventpromo.com</span>
                            </li>
                            <li>
                                <i class="ti ti-map-pin"></i>
                                <span>Jawa Timur, Indonesia</span>
                            </li>
                            <li>
                                <i class="ti ti-clock"></i>
                                <span>Senin - Jumat, 08:00 - 17:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2024 Event Promo - Jasa Promosi Event Daerah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Back to Top Button
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Close navbar on link click (mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>