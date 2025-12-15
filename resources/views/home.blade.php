@extends('layouts.user')

@section('content')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        :root {
            /* Warna Biru Cyan */
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

        /* ============================================
           SWIPER HERO SLIDER STYLES - FULL WIDTH
           ============================================ */
        
        .hero-swiper-container {
            width: 100vw;
            height: 700px;
            position: relative;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hero Section - Base Styles FULL WIDTH */
        .hero-section {
            background: linear-gradient(135deg, #0891b2 0%, #06b6d4 50%, #22d3ee 100%);
            width: 100vw;
            min-height: 700px;
            height: 700px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        /* Layer 1: Animated Mesh Gradient */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse at 10% 20%, rgba(255, 255, 255, 0.25) 0%, transparent 45%),
                radial-gradient(ellipse at 90% 80%, rgba(6, 182, 212, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(34, 211, 238, 0.3) 0%, transparent 60%),
                radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 70% 30%, rgba(8, 145, 178, 0.35) 0%, transparent 45%);
            animation: meshGradient 20s ease-in-out infinite alternate;
            filter: blur(60px);
        }

        /* Layer 2: Geometric Pattern */
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255, 255, 255, 0.08) 35px, rgba(255, 255, 255, 0.08) 37px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(255, 255, 255, 0.05) 35px, rgba(255, 255, 255, 0.05) 37px),
                linear-gradient(rgba(255, 255, 255, 0.08) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1.5px, transparent 1.5px);
            background-size: 
                100% 100%,
                100% 100%,
                120px 120px,
                120px 120px;
            animation: patternSlide 50s linear infinite;
            opacity: 0.8;
        }

        @keyframes meshGradient {
            0% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }
            50% {
                transform: translate(30px, -20px) scale(1.1) rotate(2deg);
            }
            100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }
        }

        @keyframes patternSlide {
            0% {
                background-position: 0 0, 0 0, 0 0, 0 0;
            }
            100% {
                background-position: 100% 100%, 100% 100%, 120px 120px, 120px 120px;
            }
        }

        /* Floating Shapes */
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 8px 32px rgba(255, 255, 255, 0.1),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .shape-1 {
            width: 200px;
            height: 200px;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 8%;
            left: 5%;
            animation: float1 20s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(34, 211, 238, 0.15));
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            top: 60%;
            right: 8%;
            animation: float2 15s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2), rgba(255, 255, 255, 0.15));
        }

        .shape-3 {
            width: 120px;
            height: 120px;
            border-radius: 30px;
            transform: rotate(45deg);
            bottom: 12%;
            left: 12%;
            animation: float3 18s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(8, 145, 178, 0.15));
        }

        .shape-4 {
            width: 180px;
            height: 180px;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            top: 25%;
            right: 15%;
            animation: float4 22s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(34, 211, 238, 0.2), rgba(255, 255, 255, 0.1));
        }

        @keyframes float1 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(30px, -30px) rotate(90deg);
            }
            50% {
                transform: translate(0, -60px) rotate(180deg);
            }
            75% {
                transform: translate(-30px, -30px) rotate(270deg);
            }
        }

        @keyframes float2 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(-40px, 40px) scale(1.2);
            }
            66% {
                transform: translate(20px, -20px) scale(0.9);
            }
        }

        @keyframes float3 {
            0%, 100% {
                transform: translate(0, 0) rotate(45deg);
            }
            50% {
                transform: translate(50px, -50px) rotate(225deg);
            }
        }

        @keyframes float4 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(-40px, 30px) rotate(180deg);
            }
        }

        /* Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            opacity: 0;
            animation: twinkle 3s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; top: 40%; animation-delay: 0.5s; }
        .particle:nth-child(3) { left: 30%; top: 60%; animation-delay: 1s; }
        .particle:nth-child(4) { left: 40%; top: 30%; animation-delay: 1.5s; }
        .particle:nth-child(5) { left: 50%; top: 70%; animation-delay: 2s; }
        .particle:nth-child(6) { left: 60%; top: 50%; animation-delay: 2.5s; }
        .particle:nth-child(7) { left: 70%; top: 25%; animation-delay: 0.8s; }
        .particle:nth-child(8) { left: 80%; top: 65%; animation-delay: 1.3s; }
        .particle:nth-child(9) { left: 90%; top: 45%; animation-delay: 1.8s; }
        .particle:nth-child(10) { left: 15%; top: 80%; animation-delay: 2.3s; }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.5);
            }
        }

        /* Hero Content Container - dengan padding untuk konten */
        .hero-content-wrapper {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 3rem;
        }

        /* Content */
        .hero-content {
            position: relative;
            z-index: 10;
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

        /* Slide Image Container */
        .slide-image-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 600px;
            height: 450px;
            margin: 0 auto;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .slide-image-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 
                0 30px 70px rgba(0, 0, 0, 0.4),
                0 0 0 15px rgba(255, 255, 255, 0.1),
                inset 0 0 50px rgba(255, 255, 255, 0.1);
            border: 5px solid rgba(255, 255, 255, 0.3);
        }

        .slide-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Decorative Frame */
        .image-frame {
            position: absolute;
            top: -25px;
            left: -25px;
            right: -25px;
            bottom: -25px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 40px;
            pointer-events: none;
            animation: frameFloat 6s ease-in-out infinite;
        }

        @keyframes frameFloat {
            0%, 100% {
                transform: rotate(0deg) scale(1);
            }
            50% {
                transform: rotate(2deg) scale(1.02);
            }
        }

        /* 3D Floating Elements (Slide 1) */
        .floating-elements-container {
            width: 500px;
            height: 500px;
            margin: 0 auto;
            position: relative;
            perspective: 1200px;
            transform-style: preserve-3d;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 3px solid rgba(255, 255, 255, 0.4);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 25px 60px rgba(0, 0, 0, 0.3),
                inset 0 0 30px rgba(255, 255, 255, 0.2);
            transform-style: preserve-3d;
            transition: all 0.3s ease;
        }

        .floating-element:hover {
            transform: translateZ(30px) scale(1.1) !important;
        }

        .floating-element i {
            font-size: 3.5rem;
            color: white;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .element-megaphone {
            width: 140px;
            height: 140px;
            top: 10%;
            left: 50%;
            transform: translate(-50%, 0) rotateX(10deg) rotateY(-10deg);
            animation: float3d-1 6s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(34, 211, 238, 0.2));
        }

        .element-megaphone i {
            font-size: 4.5rem;
        }

        .element-ticket {
            width: 130px;
            height: 100px;
            top: 35%;
            left: 5%;
            transform: rotateX(-15deg) rotateY(20deg) rotateZ(-10deg);
            animation: float3d-2 7s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.25), rgba(255, 255, 255, 0.2));
        }

        .element-calendar {
            width: 120px;
            height: 120px;
            top: 32%;
            right: 8%;
            transform: rotateX(15deg) rotateY(-20deg);
            animation: float3d-3 8s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(8, 145, 178, 0.2));
        }

        .element-sparkle {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotateX(5deg);
            animation: float3d-4 5s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(34, 211, 238, 0.3), rgba(255, 255, 255, 0.15));
            border-radius: 50%;
        }

        .element-sparkle i {
            font-size: 5.5rem;
        }

        .element-location {
            width: 110px;
            height: 110px;
            bottom: 15%;
            left: 15%;
            transform: rotateX(-10deg) rotateY(15deg);
            animation: float3d-5 6.5s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.22), rgba(6, 182, 212, 0.25));
        }

        .element-users {
            width: 125px;
            height: 125px;
            bottom: 12%;
            right: 12%;
            transform: rotateX(12deg) rotateY(-18deg);
            animation: float3d-6 7.5s ease-in-out infinite;
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.25), rgba(255, 255, 255, 0.2));
        }

        @keyframes float3d-1 {
            0%, 100% {
                transform: translate(-50%, 0) rotateX(10deg) rotateY(-10deg) translateZ(0);
            }
            50% {
                transform: translate(-50%, -20px) rotateX(15deg) rotateY(-15deg) translateZ(30px);
            }
        }

        @keyframes float3d-2 {
            0%, 100% {
                transform: rotateX(-15deg) rotateY(20deg) rotateZ(-10deg) translateZ(0);
            }
            50% {
                transform: rotateX(-20deg) rotateY(25deg) rotateZ(-12deg) translateZ(25px);
            }
        }

        @keyframes float3d-3 {
            0%, 100% {
                transform: rotateX(15deg) rotateY(-20deg) translateZ(0);
            }
            50% {
                transform: rotateX(20deg) rotateY(-25deg) translateZ(30px);
            }
        }

        @keyframes float3d-4 {
            0%, 100% {
                transform: translate(-50%, -50%) rotateX(5deg) translateZ(0) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) rotateX(10deg) translateZ(40px) scale(1.05);
            }
        }

        @keyframes float3d-5 {
            0%, 100% {
                transform: rotateX(-10deg) rotateY(15deg) translateZ(0);
            }
            50% {
                transform: rotateX(-15deg) rotateY(20deg) translateZ(20px);
            }
        }

        @keyframes float3d-6 {
            0%, 100% {
                transform: rotateX(12deg) rotateY(-18deg) translateZ(0);
            }
            50% {
                transform: rotateX(16deg) rotateY(-22deg) translateZ(28px);
            }
        }

        /* Button */
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

        /* Swiper Navigation */
        .swiper-button-next,
        .swiper-button-prev {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            width: 55px !important;
            height: 55px !important;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 22px !important;
            font-weight: bold;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Swiper Pagination */
        .swiper-pagination {
            bottom: 30px !important;
        }

        .swiper-pagination-bullet {
            width: 12px !important;
            height: 12px !important;
            background: white !important;
            opacity: 0.5 !important;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            opacity: 1 !important;
            width: 35px !important;
            border-radius: 6px !important;
            background: white !important;
        }

        /* Stats Section */
        .stats-section {
            padding: 100px 0;
            background: linear-gradient(to bottom, #E0F7FA 0%, white 100%);
            position: relative;
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

        .stat-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
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
        }

        .stat-icon i {
            font-size: 3.2rem;
            color: white;
        }

        .stat-number {
            font-size: 3.2rem;
            font-weight: 800;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.8rem;
        }

        .stat-label {
            color: #6b7280;
            font-size: 1.1rem;
            font-weight: 600;
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
            transition: all 0.5s ease;
            position: relative;
            z-index: 1;
        }

        .service-card:hover .service-icon {
            transform: scale(1.15) rotate(10deg);
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

        /* Team Section */
        .team-section {
            padding: 100px 0;
            background: white;
        }

        .team-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid #f3f4f6;
            height: 100%;
        }

        .team-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .team-image-wrapper {
            padding: 2rem 2rem 0 2rem;
        }

        .team-image {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            background: var(--gradient-main);
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .team-card:hover .team-image img {
            transform: scale(1.1);
        }

        .team-info {
            padding: 2rem;
            text-align: center;
        }

        .team-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .team-position {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .team-description {
            color: #6b7280;
            line-height: 1.7;
            font-size: 0.95rem;
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
            transform: scale(1.15);
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
            align-self: flex-start;
            border: 2px solid rgba(0, 188, 212, 0.2);
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
            transition: all 0.4s ease;
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

        /* CTA Section */
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
                radial-gradient(circle at 70% 80%, rgba(0, 188, 212, 0.3) 0%, transparent 50%);
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .cta-subtitle {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 3rem;
            color: white;
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
            transition: all 0.4s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .btn-cta:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
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
        @media (max-width: 992px) {
            .hero-content-wrapper {
                padding: 0 2rem;
            }

            .floating-elements-container {
                width: 400px;
                height: 400px;
            }

            .slide-image-container {
                max-width: 500px;
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .hero-swiper-container,
            .hero-section {
                height: 650px;
                min-height: 650px;
            }

            .hero-content-wrapper {
                padding: 0 1.5rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.05rem;
            }

            .floating-elements-container {
                width: 320px;
                height: 320px;
            }

            .slide-image-container {
                max-width: 100%;
                height: 350px;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .cta-title {
                font-size: 2.5rem;
            }

            .btn-hero,
            .btn-cta,
            .btn-view-all {
                width: 100%;
                justify-content: center;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 45px !important;
                height: 45px !important;
            }

            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 18px !important;
            }

            /* Hide floating shapes on mobile */
            .shape-3, .shape-4 {
                display: none;
            }

            .shape-1, .shape-2 {
                width: 100px;
                height: 100px;
            }
        }

        /* Fade Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Hero Slider Section - FULL WIDTH -->
    <div class="hero-swiper-container">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                
                <!-- Slide 1: 3D Floating Elements -->
                <div class="swiper-slide">
                    <section class="hero-section">
                        <div class="floating-shapes">
                            <div class="floating-shape shape-1"></div>
                            <div class="floating-shape shape-2"></div>
                            <div class="floating-shape shape-3"></div>
                            <div class="floating-shape shape-4"></div>
                        </div>

                        <div class="particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>

                        <div class="hero-content-wrapper">
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
                                <div class="col-lg-6">
                                    <div class="floating-elements-container">
                                        <div class="floating-element element-megaphone">
                                            <i class="ti ti-speakerphone"></i>
                                        </div>
                                        <div class="floating-element element-ticket">
                                            <i class="ti ti-ticket"></i>
                                        </div>
                                        <div class="floating-element element-calendar">
                                            <i class="ti ti-calendar-event"></i>
                                        </div>
                                        <div class="floating-element element-sparkle">
                                            <i class="ti ti-stars"></i>
                                        </div>
                                        <div class="floating-element element-location">
                                            <i class="ti ti-map-pin"></i>
                                        </div>
                                        <div class="floating-element element-users">
                                            <i class="ti ti-users-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Slide 2: Event Promotion -->
                <div class="swiper-slide">
                    <section class="hero-section">
                        <div class="floating-shapes">
                            <div class="floating-shape shape-1"></div>
                            <div class="floating-shape shape-2"></div>
                            <div class="floating-shape shape-3"></div>
                        </div>

                        <div class="particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>

                        <div class="hero-content-wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-6 hero-content mb-4 mb-lg-0">
                                    <h1 class="hero-title">Jangkau Ribuan Peserta</h1>
                                    <p class="hero-subtitle">
                                        Promosikan event Anda ke audiens yang lebih luas. Tingkatkan partisipasi
                                        dengan strategi marketing yang efektif dan terukur.
                                    </p>
                                    <a href="{{ route('user.events') }}" class="btn-hero">
                                        <i class="ti ti-rocket"></i>
                                        Mulai Promosi
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <div class="slide-image-container">
                                        <div class="image-frame"></div>
                                        <div class="slide-image-wrapper">
                                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80" 
                                                 alt="Event Promotion">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Slide 3: Community Networking -->
                <div class="swiper-slide">
                    <section class="hero-section">
                        <div class="floating-shapes">
                            <div class="floating-shape shape-1"></div>
                            <div class="floating-shape shape-2"></div>
                            <div class="floating-shape shape-4"></div>
                        </div>

                        <div class="particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>

                        <div class="hero-content-wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-6 hero-content mb-4 mb-lg-0">
                                    <h1 class="hero-title">Bangun Komunitas Lokal</h1>
                                    <p class="hero-subtitle">
                                        Hubungkan penyelenggara event dengan komunitas lokal. Ciptakan pengalaman
                                        berkesan dan bangun jaringan yang kuat di daerah Anda.
                                    </p>
                                    <a href="{{ route('user.events') }}" class="btn-hero">
                                        <i class="ti ti-users"></i>
                                        Bergabung Sekarang
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <div class="slide-image-container">
                                        <div class="image-frame"></div>
                                        <div class="slide-image-wrapper">
                                            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80" 
                                                 alt="Community Networking">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Slide 4: Analytics Success -->
                <div class="swiper-slide">
                    <section class="hero-section">
                        <div class="floating-shapes">
                            <div class="floating-shape shape-2"></div>
                            <div class="floating-shape shape-3"></div>
                            <div class="floating-shape shape-4"></div>
                        </div>

                        <div class="particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>

                        <div class="hero-content-wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-6 hero-content mb-4 mb-lg-0">
                                    <h1 class="hero-title">Pantau Kesuksesan Event</h1>
                                    <p class="hero-subtitle">
                                        Dapatkan insight lengkap tentang performa event Anda. Analytics real-time
                                        untuk keputusan yang lebih baik dan event yang lebih sukses.
                                    </p>
                                    <a href="{{ route('penyelenggara.dashboard') }}" class="btn-hero">
                                        <i class="ti ti-chart-line"></i>
                                        Lihat Dashboard
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <div class="slide-image-container">
                                        <div class="image-frame"></div>
                                        <div class="slide-image-wrapper">
                                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80" 
                                                 alt="Analytics Dashboard">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

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

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Tim Kami</h2>
                <p class="section-subtitle">Kenali tim profesional di balik kesuksesan platform kami</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <div class="team-image">
                                <img src="{{ asset('images/team/ropriana.jpg') }}" 
                                     alt="Ropriana Manurung"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Ropriana+Manurung&size=400&background=00BCD4&color=fff&bold=true'">
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Ropriana Manurung</h3>
                            <p class="team-position">Koordinator</p>
                            <p class="team-description">
                                Bertanggung jawab dalam mengkoordinir seluruh kegiatan tim
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <div class="team-image">
                                <img src="{{ asset('images/team/agus.jpg') }}" 
                                     alt="Agus Raj Pranata"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Agus+Raj+Pranata&size=400&background=00BCD4&color=fff&bold=true'">
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Agus Raj Pranata</h3>
                            <p class="team-position">Anggota</p>
                            <p class="team-description">
                                Fokus dalam pengembangan fitur platform
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fade-in">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <div class="team-image">
                                <img src="{{ asset('images/team/khusnul.jpg') }}" 
                                     alt="Khusnul Aniah"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Khusnul+Aniah&size=400&background=00BCD4&color=fff&bold=true'">
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Khusnul Aniah</h3>
                            <p class="team-position">Anggota</p>
                            <p class="team-description">
                                Mengelola konten dan strategi komunikasi
                            </p>
                        </div>
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

            @if ($featuredEvents->count() > 0)
                <div class="row g-4">
                    @foreach ($featuredEvents as $event)
                        <div class="col-lg-4 col-md-6 fade-in">
                            <div class="event-card">
                                <div class="event-image">
                                    @if ($event->poster)
                                        <img src="{{ route('poster.show', basename($event->poster)) }}">
                                    @else
                                        <div style="width:100%;height:300px;background:var(--gradient-main);display:flex;align-items:center;justify-content:center;">
                                            <i class="ti ti-calendar-event" style="font-size:100px;color:white;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="event-body">
                                    <span class="event-badge">{{ $event->kategori ?? 'Umum' }}</span>
                                    <h3 class="event-title">{{ $event->nama_event }}</h3>
                                    <p class="event-organizer">
                                        {{ optional($event->penyelenggara)->nama ?? 'Penyelenggara' }}
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialize Swiper
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1000,
            effect: 'slide',
        });

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