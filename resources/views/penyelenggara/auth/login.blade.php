<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penyelenggara - PROVENDA</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-teal: #0D9488;
            --primary-cyan: #06b6d4;
            --primary-blue: #0ea5e9;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-main: linear-gradient(135deg, #0D9488 0%, #06b6d4 50%, #0ea5e9 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Shapes */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            animation: float 20s ease-in-out infinite;
        }

        body::before {
            width: 500px;
            height: 500px;
            background: rgba(6, 182, 212, 0.4);
            top: -250px;
            right: -250px;
            animation-delay: 0s;
        }

        body::after {
            width: 400px;
            height: 400px;
            background: rgba(249, 115, 22, 0.3);
            bottom: -200px;
            left: -200px;
            animation-delay: 5s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(50px, -50px) scale(1.1); }
            66% { transform: translate(-50px, 50px) scale(0.9); }
        }

        /* Main Container */
        .login-wrapper {
            max-width: 1000px;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            box-shadow: 
                0 30px 90px rgba(0, 0, 0, 0.3),
                0 10px 40px rgba(0, 0, 0, 0.2),
                inset 0 0 0 1px rgba(255, 255, 255, 0.5);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
            animation: slideUp 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(60px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Left Side - Branding */
        .login-brand {
            background: linear-gradient(135deg, #0D9488 0%, #06b6d4 50%, #0ea5e9 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.6;
        }

        .brand-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .brand-icon {
            width: 140px;
            height: 140px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 35px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            animation: pulse 3s ease-in-out infinite;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.3),
                inset 0 0 30px rgba(255, 255, 255, 0.1);
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4); }
        }

        .brand-icon i {
            font-size: 5rem;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.2));
        }

        .brand-content h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -1px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .brand-content p {
            font-size: 1.1rem;
            opacity: 0.95;
            line-height: 1.6;
            font-weight: 500;
        }

        .brand-features {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px 20px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-item i {
            font-size: 1.8rem;
            flex-shrink: 0;
        }

        .feature-item span {
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Right Side - Form */
        .login-form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Alert Messages */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 16px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            animation: slideDown 0.5s ease;
            font-weight: 500;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert i {
            font-size: 1.4rem;
        }

        .alert-danger {
            background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
            color: #991B1B;
            border-left: 4px solid #DC2626;
        }

        .alert-success {
            background: linear-gradient(135deg, #D1FAE5 0%, #A7F3D0 100%);
            color: #065F46;
            border-left: 4px solid #10B981;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 10px;
            display: block;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 16px 20px 16px 58px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
            background: #f9fafb;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 5px rgba(13, 148, 136, 0.1);
            outline: none;
            background: white;
        }

        .form-control:focus ~ .input-icon {
            color: var(--primary-teal);
        }

        .form-control::placeholder {
            color: #9ca3af;
            font-weight: 400;
        }

        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #0D9488 0%, #06b6d4 50%, #0ea5e9 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.4);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(13, 148, 136, 0.5);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .btn-login i {
            font-size: 1.3rem;
        }

        /* Divider */
        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
        }

        .divider span {
            background: white;
            padding: 0 20px;
            position: relative;
            color: #9ca3af;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Action Links */
        .action-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .action-btn {
            padding: 15px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .action-btn.register {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            color: var(--primary-teal);
            border-color: var(--primary-teal);
        }

        .action-btn.register:hover {
            background: var(--primary-teal);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.3);
        }

        .action-btn.home {
            background: white;
            color: #6b7280;
            border-color: #d1d5db;
        }

        .action-btn.home:hover {
            background: #f9fafb;
            color: var(--primary-teal);
            border-color: var(--primary-teal);
            transform: translateY(-2px);
        }

        .action-btn i {
            font-size: 1.2rem;
        }

        /* Error Text */
        .error-text {
            color: #DC2626;
            font-size: 0.85rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .error-text i {
            font-size: 1rem;
        }

        /* Loading State */
        .btn-login.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-login.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin-left: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .login-brand {
                padding: 50px 40px;
                min-height: auto;
            }

            .brand-features {
                display: none;
            }

            .brand-icon {
                width: 100px;
                height: 100px;
                margin-bottom: 25px;
            }

            .brand-icon i {
                font-size: 3.5rem;
            }

            .brand-content h1 {
                font-size: 2rem;
                margin-bottom: 15px;
            }

            .brand-content p {
                font-size: 1rem;
            }

            .login-form-section {
                padding: 45px 40px;
            }

            .form-header h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .login-container {
                border-radius: 20px;
            }

            .login-brand {
                padding: 40px 30px;
            }

            .login-form-section {
                padding: 35px 30px;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .brand-icon {
                width: 80px;
                height: 80px;
            }

            .brand-icon i {
                font-size: 3rem;
            }

            .brand-content h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <!-- Left Side - Branding -->
            <div class="login-brand">
                <div class="brand-content">
                    <div class="brand-icon">
                        <i class="ti ti-calendar-event"></i>
                    </div>
                    <h1>PROVENDA</h1>
                    <p>Platform Promosi Event Terbaik di Bengkalis</p>
                    
                    <div class="brand-features">
                        <div class="feature-item">
                            <i class="ti ti-rocket"></i>
                            <span>Promosikan event Anda ke ribuan audience</span>
                        </div>
                        <div class="feature-item">
                            <i class="ti ti-chart-line"></i>
                            <span>Kelola event dengan dashboard modern</span>
                        </div>
                        <div class="feature-item">
                            <i class="ti ti-shield-check"></i>
                            <span>Platform terpercaya & aman</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="login-form-section">
                <div class="form-header">
                    <h2>Selamat Datang! 👋</h2>
                    <p>Login untuk mengelola event Anda</p>
                </div>

                <!-- Alert Messages -->
                @if(session('error'))
                <div class="alert alert-danger">
                    <i class="ti ti-alert-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    <i class="ti ti-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('penyelenggara.login.submit') }}" method="POST" id="loginForm">
                    @csrf

                    <!-- Email Field -->
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-wrapper">
                            <input type="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="organizer@provenda.com"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email">
                            <i class="input-icon ti ti-mail"></i>
                        </div>
                        @error('email')
                        <div class="error-text">
                            <i class="ti ti-alert-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input type="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Masukkan password Anda"
                                   required
                                   autocomplete="current-password">
                            <i class="input-icon ti ti-lock"></i>
                        </div>
                        @error('password')
                        <div class="error-text">
                            <i class="ti ti-alert-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login" id="btnLogin">
                        <i class="ti ti-login"></i>
                        <span>Login Sekarang</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>atau</span>
                </div>

                <!-- Action Links -->
                <a href="{{ route('penyelenggara.register') }}" class="btn-daftar">
    <i class="ti ti-user-plus"></i>
    Daftar Penyelenggara Baru
</a>

<style>
    .btn-daftar {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 14px 20px;
        background: linear-gradient(90deg, #008FD7, #00D4B4);
        color: #fff;
        font-weight: 600;
        border-radius: 14px;
        text-decoration: none;
        font-size: 16px;
        box-shadow: 0 4px 12px rgba(0, 150, 200, 0.25);
        transition: 0.25s ease;
    }

    .btn-daftar:hover {
        filter: brightness(1.06);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 150, 200, 0.35);
    }

    .btn-daftar i {
        font-size: 18px;
    }
</style>


                    <a href="{{ route('user.home') }}" class="action-btn home">
                        <i class="ti ti-arrow-left"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Loading state on form submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('btnLogin');
            btn.classList.add('loading');
            btn.querySelector('span').textContent = 'Memproses...';
        });

        // Remove alert after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.animation = 'fadeOut 0.5s ease';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);

        // Fade out animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: translateY(0); }
                to { opacity: 0; transform: translateY(-20px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
