@extends('layouts.user')

@section('content')
<style>
    :root {
        /* Warna Biru Cyan - Kembali ke Awal */
        --primary-blue: #00BCD4;
        --primary-dark: #0097A7;
        --primary-light: #4DD0E1;
        --secondary-blue: #00ACC1;
        --accent-cyan: #26C6DA;
        
        /* Gradients Biru */
        --gradient-main: linear-gradient(135deg, #00BCD4 0%, #4DD0E1 50%, #26C6DA 100%);
        --gradient-hero: linear-gradient(135deg, #00BCD4 0%, #00ACC1 100%);
        --gradient-button: linear-gradient(135deg, #00BCD4 0%, #0097A7 100%);
        
        /* Shadows dengan warna biru */
        --shadow-sm: 0 2px 8px rgba(0, 188, 212, 0.15);
        --shadow-md: 0 4px 16px rgba(0, 188, 212, 0.2);
        --shadow-lg: 0 8px 32px rgba(0, 188, 212, 0.25);
        --shadow-xl: 0 15px 40px rgba(0, 188, 212, 0.3);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: #2c3e50;
        overflow-x: hidden;
    }

    /* Hero Section - Biru Cyan */
    .hero-section {
        background: var(--gradient-hero);
        min-height: 700px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(38, 198, 218, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(0, 188, 212, 0.2) 0%, transparent 50%),
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: backgroundMove 20s ease infinite;
    }

    @keyframes backgroundMove {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 1; }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        animation: fadeInUp 1s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-title {
        font-size: 3.8rem;
        font-weight: 800;
        line-height: 1.15;
        color: white;
        text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.15);
        margin-bottom: 1.5rem;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 2.5rem;
        font-weight: 400;
    }

    .hero-illustration {
        position: relative;
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-15px) rotate(2deg); }
        75% { transform: translateY(-15px) rotate(-2deg); }
    }

    .calendar-icon-large {
        width: 380px;
        height: 380px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
        backdrop-filter: blur(15px);
        border-radius: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 25px 70px rgba(0, 0, 0, 0.25),
            inset 0 0 0 3px rgba(255, 255, 255, 0.3);
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }

    .calendar-icon-large::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .calendar-icon-large i {
        font-size: 190px;
        color: white;
        z-index: 1;
        text-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-hero {
        padding: 18px 50px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 60px;
        background: white;
        color: var(--primary-blue);
        border: none;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .btn-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 188, 212, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-hero:hover::before {
        left: 100%;
    }

    .btn-hero:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
        background: linear-gradient(135deg, #fff 0%, #E0F7FA 100%);
        color: var(--primary-dark);
    }

    /* Stats Section - Background Biru Muda */
    .stats-section {
        padding: 100px 0;
        background: linear-gradient(to bottom, #E0F7FA 0%, white 100%);
    }

    .stat-card {
        background: white;
        padding: 3rem 2rem;
        border-radius: 25px;
        box-shadow: var(--shadow-sm);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--gradient-main);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.5s ease;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0, 188, 212, 0.1), transparent);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .stat-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-light);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-card:hover::after {
        width: 400px;
        height: 400px;
    }

    .stat-icon {
        width: 100px;
        height: 100px;
        background: var(--gradient-main);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        box-shadow: var(--shadow-lg);
        position: relative;
        transition: all 0.4s ease;
    }

    .stat-card:hover .stat-icon {
        transform: rotateY(360deg) scale(1.1);
        box-shadow: 0 15px 50px rgba(0, 188, 212, 0.4);
    }

    .stat-icon i {
        font-size: 3.2rem;
        color: white;
        position: relative;
        z-index: 1;
    }

    .stat-number {
        font-size: 3.2rem;
        font-weight: 800;
        background: var(--gradient-main);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.8rem;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        color: #6b7280;
        font-size: 1.1rem;
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    /* Services Section */
    .services-section {
        padding: 100px 0;
        background: white;
    }

    .section-title {
        font-size: 3.2rem;
        font-weight: 800;
        background: var(--gradient-main);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: #6b7280;
        margin-bottom: 4rem;
    }

    .service-card {
        background: white;
        padding: 3.5rem 2.5rem;
        border-radius: 30px;
        box-shadow: var(--shadow-sm);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-align: center;
        border: 2px solid #f3f4f6;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-main);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }

    .service-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-blue);
    }

    .service-card:hover::before {
        opacity: 0.05;
    }

    .service-icon {
        width: 110px;
        height: 110px;
        background: var(--gradient-main);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2.5rem;
        box-shadow: var(--shadow-lg);
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        z-index: 1;
    }

    .service-card:hover .service-icon {
        transform: scale(1.15) rotate(10deg);
        box-shadow: 0 20px 60px rgba(0, 188, 212, 0.4);
    }

    .service-icon i {
        font-size: 3.5rem;
        color: white;
    }

    .service-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1.2rem;
        position: relative;
        z-index: 1;
    }

    .service-description {
        color: #6b7280;
        line-height: 1.8;
        font-size: 1.05rem;
        position: relative;
        z-index: 1;
    }

    /* Events Section */
    .events-section {
        padding: 100px 0;
        background: linear-gradient(to bottom, white 0%, #E0F7FA 100%);
    }

    .event-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 2px solid #f3f4f6;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-15px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-light);
    }

    .event-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .event-card:hover .event-image img {
        transform: scale(1.15) rotate(2deg);
    }

    .event-gradient-placeholder {
        width: 100%;
        height: 300px;
        background: var(--gradient-main);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .event-gradient-placeholder::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: patternMove 30s linear infinite;
    }

    @keyframes patternMove {
        0% { background-position: 0 0; }
        100% { background-position: 60px 60px; }
    }

    .event-gradient-placeholder i {
        font-size: 130px;
        color: white;
        z-index: 1;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.8; }
        50% { transform: scale(1.1); opacity: 1; }
    }

    .event-body {
        padding: 2.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .event-badge {
        display: inline-block;
        padding: 0.6rem 1.5rem;
        background: linear-gradient(135deg, rgba(0, 188, 212, 0.15), rgba(38, 198, 218, 0.15));
        color: var(--primary-blue);
        border-radius: 60px;
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        border: 2px solid rgba(0, 188, 212, 0.2);
        align-self: flex-start;
    }

    .event-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-organizer {
        color: #9ca3af;
        font-size: 0.95rem;
        margin-bottom: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .event-organizer::before {
        content: '👤';
        font-size: 1.1rem;
    }

    .event-meta {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .event-meta span {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-weight: 500;
    }

    .event-meta i {
        color: var(--primary-blue);
        font-size: 1.2rem;
    }

    .event-description {
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 2rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-view-event {
        width: 100%;
        padding: 1rem;
        background: var(--gradient-button);
        color: white;
        border: none;
        border-radius: 15px;
        font-weight: 700;
        font-size: 1.05rem;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .btn-view-event::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s;
    }

    .btn-view-event:hover::before {
        left: 100%;
    }

    .btn-view-event:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-view-all {
        padding: 18px 50px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 60px;
        background: var(--gradient-button);
        color: white;
        border: none;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .btn-view-all:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    /* CTA Section - Biru Cyan */
    .cta-section {
        padding: 110px 0;
        background: var(--gradient-hero);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 20%, rgba(38, 198, 218, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(0, 188, 212, 0.3) 0%, transparent 50%),
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .cta-content {
        position: relative;
        z-index: 2;
    }

    .cta-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.15);
    }

    .cta-subtitle {
        font-size: 1.3rem;
        opacity: 0.95;
        margin-bottom: 3rem;
        font-weight: 400;
    }

    .btn-cta {
        padding: 18px 50px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 60px;
        background: white;
        color: var(--primary-blue);
        border: none;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .btn-cta:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
        background: linear-gradient(135deg, #fff 0%, #E0F7FA 100%);
        color: var(--primary-dark);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 6rem 2rem;
    }

    .empty-state i {
        font-size: 140px;
        background: linear-gradient(135deg, #e5e7eb, #d1d5db);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 2rem;
    }

    .empty-state-title {
        font-size: 2rem;
        font-weight: 700;
        color: #6b7280;
        margin-bottom: 1rem;
    }

    .empty-state-text {
        color: #9ca3af;
        font-size: 1.15rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.05rem;
        }

        .calendar-icon-large {
            width: 280px;
            height: 280px;
        }

        .calendar-icon-large i {
            font-size: 140px;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .cta-title {
            font-size: 2.5rem;
        }

        .cta-subtitle {
            font-size: 1.1rem;
        }

        .btn-hero, .btn-cta, .btn-view-all {
            width: 100%;
            justify-content: center;
        }
    }

    /* Scroll Animation */
    .fade-in {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content mb-4 mb-lg-0">
                <h1 class="hero-title">Promosikan Event Daerah Anda!</h1>
                <p class="hero-subtitle">
                    Platform terpercaya untuk mempromosikan berbagai event daerah. Jangkau 
                    lebih banyak peserta dengan layanan promosi profesional kami.
                </p>
                <a href="{{ route('user.events') }}" class="btn-hero">
                    <i class="ti ti-calendar-plus"></i>
                    Lihat Event
                </a>
            </div>
            <div class="col-lg-6 hero-illustration">
                <div class="calendar-icon-large">
                    <i class="ti ti-calendar-event"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="ti ti-calendar"></i>
                    </div>
                    <div class="stat-number">{{ $totalEvents }}</div>
                    <div class="stat-label">Total Event</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="ti ti-users"></i>
                    </div>
                    <div class="stat-number">{{ $totalOrganizers }}</div>
                    <div class="stat-label">Penyelenggara</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="ti ti-clock"></i>
                    </div>
                    <div class="stat-number">{{ $upcomingEvents }}</div>
                    <div class="stat-label">Event Mendatang</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="ti ti-map-pin"></i>
                    </div>
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Kota</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="tentang">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle">Berbagai layanan promosi untuk kesuksesan event Anda</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="ti ti-share"></i>
                    </div>
                    <h3 class="service-title">Promosi Digital</h3>
                    <p class="service-description">
                        Jangkau audiens lebih luas melalui platform digital 
                        dan media sosial dengan strategi promosi yang efektif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="ti ti-chart-line"></i>
                    </div>
                    <h3 class="service-title">Analisa Event</h3>
                    <p class="service-description">
                        Dapatkan laporan dan analisis lengkap performa 
                        event Anda untuk evaluasi mendalam
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="ti ti-headset"></i>
                    </div>
                    <h3 class="service-title">Support 24/7</h3>
                    <p class="service-description">
                        Tim support kami siap membantu Anda kapan saja 
                        untuk kesuksesan event Anda
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Events Section -->
<section class="events-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Event Unggulan</h2>
            <p class="section-subtitle">Event populer yang sedang trending saat ini</p>
        </div>

        @if($featuredEvents->count() > 0)
            <div class="row g-4">
                @foreach($featuredEvents as $event)
                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="event-card">
                        <div class="event-image">
                            @if($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->nama_event }}">
                            @else
                                <div class="event-gradient-placeholder">
                                    <i class="ti ti-calendar-event"></i>
                                </div>
                            @endif
                        </div>
                        <div class="event-body">
                            <span class="event-badge">{{ $event->kategori ?? 'Umum' }}</span>
                            <h3 class="event-title">{{ $event->nama_event }}</h3>
                            <p class="event-organizer">
                                {{ optional($event->penyelenggara)->nama ?? 'Penyelenggara tidak tersedia' }}
                            </p>
                            <div class="event-meta">
                                <span>
                                    <i class="ti ti-calendar"></i> 
                                    {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                                </span>
                                <span>
                                    <i class="ti ti-map-pin"></i> 
                                    {{ $event->lokasi }}
                                </span>
                            </div>
                            <p class="event-description">
                                {{ Str::limit($event->deskripsi, 100) }}
                            </p>
                            <a href="{{ route('user.event.show', $event->id) }}" class="btn-view-event">
                                <i class="ti ti-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('user.events') }}" class="btn-view-all">
                    <i class="ti ti-list"></i>
                    Lihat Semua Event
                </a>
            </div>
        @else
            <div class="empty-state fade-in">
                <i class="ti ti-calendar-off"></i>
                <h3 class="empty-state-title">Belum ada event unggulan</h3>
                <p class="empty-state-text">Event populer akan ditampilkan di sini</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center text-white">
            <h2 class="cta-title">Siap Mempromosikan Event Anda?</h2>
            <p class="cta-subtitle">
                Bergabunglah dengan ribuan penyelenggara event yang telah mempercayai kami
            </p>
            <a href="{{ route('penyelenggara.dashboard') }}" class="btn-cta">
                <i class="ti ti-rocket"></i>
                Mulai Sekarang
            </a>
        </div>
    </div>
</section>

<script>
    // Scroll animation observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -80px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });
</script>
@endsection 