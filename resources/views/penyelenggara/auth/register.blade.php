<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Penyelenggara - PROVENDA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(145deg, #e0f2fe, #dbeafe);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        /* ====== CONTAINER ====== */
        .container {
            width: 100%;
            max-width: 1100px;
            background: #fff;
            display: flex;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(14, 165, 233, 0.15);
            animation: fadeIn 0.5s ease;
        }

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

        /* ===== LEFT SIDE ===== */
        .left {
            flex: 0.9;
            padding: 60px 40px;
            background: linear-gradient(160deg, #bfdbfe, #93c5fd);
            color: #1e40af;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            top: -50px;
            right: -80px;
            filter: blur(40px);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(147, 197, 253, 0.4);
            border-radius: 50%;
            bottom: -30px;
            left: -50px;
            filter: blur(35px);
            animation: float 8s ease-in-out infinite;
        }

        .icon-box {
            position: relative;
            z-index: 2;
            margin-bottom: 25px;
        }

        .icon-box img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.15));
            animation: pulse 3s ease-in-out infinite;
        }

        .icon-box .fa-calendar-day {
            font-size: 85px;
            padding: 30px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .3);
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .left h1 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 8px rgba(30, 64, 175, 0.15);
        }

        .left p {
            font-size: 16px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .feature-list {
            margin-top: 35px;
            text-align: left;
            padding-left: 10px;
            font-size: 15px;
            position: relative;
            z-index: 2;
        }

        .feature-list li {
            margin: 14px 0;
            list-style: none;
            display: flex;
            align-items: center;
            gap: 12px;
            opacity: 0;
            animation: slideIn 0.5s ease forwards;
        }

        .feature-list li:nth-child(1) {
            animation-delay: 0.2s;
        }

        .feature-list li:nth-child(2) {
            animation-delay: 0.4s;
        }

        .feature-list li:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .feature-list li i {
            width: 22px;
            color: #3b82f6;
            font-size: 18px;
        }

        /* ===== RIGHT FORM ===== */
        .right {
            flex: 1.1;
            padding: 55px 60px;
            background: #ffffff;
            overflow-y: auto;
            max-height: 90vh;
        }

        /* Custom Scrollbar */
        .right::-webkit-scrollbar {
            width: 8px;
        }

        .right::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .right::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .right::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        h2 {
            font-size: 32px;
            font-weight: 900;
            color: #1e40af;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 25px;
            font-size: 15px;
        }

        /* Laravel Alert */
        .alert {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 14px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: #fef2f2;
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }

        .alert-success {
            background: #f0fdf4;
            color: #16a34a;
            border-left: 4px solid #16a34a;
        }

        label {
            margin-top: 18px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 6px;
        }

        label .required {
            color: #ef4444;
        }

        /* Input Wrapper with Icon */
        .input-wrapper {
            position: relative;
            margin-bottom: 8px;
        }

        .input-wrapper .left-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            transition: color 0.3s;
            pointer-events: none;
        }

        .input-wrapper input,
        .input-wrapper textarea {
            width: 100%;
            padding: 14px 14px 14px 48px;
            border-radius: 12px;
            font-size: 15px;
            border: 2px solid #e2e8f0;
            transition: all 0.25s;
            background: #f8fafc;
            font-family: "Poppins", sans-serif;
        }

        .input-wrapper textarea {
            padding: 14px;
            resize: vertical;
            min-height: 80px;
        }

        .input-wrapper input:focus,
        .input-wrapper textarea:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12);
            outline: none;
            background: #fff;
        }

        .input-wrapper input:focus ~ .left-icon {
            color: #0ea5e9;
        }

        /* Password Wrapper */
        .password-wrapper input {
            padding-right: 48px;
        }

        /* Password Toggle */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            font-size: 18px;
            transition: all 0.3s;
            z-index: 10;
            user-select: none;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:hover {
            color: #0ea5e9;
        }

        .toggle-password:active {
            transform: translateY(-50%) scale(0.9);
        }

        /* Laravel Error Message */
        .error-text {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: block;
            animation: shake 0.3s;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-5px);
            }
            75% {
                transform: translateX(5px);
            }
        }

        button {
            width: 100%;
            margin-top: 28px;
            padding: 16px;
            border-radius: 14px;
            border: none;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, #0ea5e9, #06b6d4);
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.3);
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        button:hover::before {
            left: 100%;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 32px rgba(14, 165, 233, 0.4);
            background: linear-gradient(135deg, #0284c7, #0891b2);
        }

        button:active {
            transform: translateY(-1px);
        }

        .login, .back {
            margin-top: 18px;
            font-size: 14px;
            color: #64748b;
            text-align: center;
        }

        .login a, .back a {
            color: #0ea5e9;
            text-decoration: none;
            font-weight: 600;
            transition: .2s;
        }

        .login a:hover, .back a:hover {
            color: #0284c7;
            text-decoration: underline;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width: 980px) {
            .container {
                flex-direction: column;
                max-width: 550px;
            }

            .left {
                padding: 40px 30px;
            }

            .left h1 {
                font-size: 32px;
            }

            .feature-list {
                margin-top: 25px;
            }

            .right {
                padding: 40px 30px;
                max-height: none;
            }

            h2 {
                font-size: 28px;
            }
        }

        @media(max-width: 600px) {
            body {
                padding: 20px;
            }

            .left {
                padding: 30px 20px;
            }

            .icon-box .fa-calendar-day {
                font-size: 70px;
                padding: 25px;
            }

            .right {
                padding: 30px 20px;
            }

            .input-wrapper input,
            .input-wrapper textarea {
                padding-left: 42px;
                font-size: 14px;
            }

            button {
                padding: 14px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- LEFT SIDE -->
        <div class="left">
            <div>
                <div class="icon-box">
                    <!-- Bisa diganti dengan logo image jika ada -->
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Provenda Logo">
                </div>

                <h1>PROVENDA</h1>
                <p>Platform Promosi Event Terbaik di Bengkalis</p>

                <ul class="feature-list">
                    <li><i class="fas fa-bullhorn"></i> Promosikan event ke ribuan audience</li>
                    <li><i class="fas fa-chart-line"></i> Dashboard modern dan lengkap</li>
                    <li><i class="fas fa-shield-alt"></i> Aman & terpercaya</li>
                </ul>
            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="right">

            <h2>Daftar Sekarang</h2>
            <p class="subtitle">Buat akun untuk mengelola event Anda</p>

            <!-- Laravel Alert Messages -->
            @if(session('error'))
                <div class="alert alert-danger">⚠️ {{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">🎉 {{ session('success') }}</div>
            @endif

            <!-- Laravel Form with CSRF -->
            <form action="{{ route('penyelenggara.register.submit') }}" method="POST">
                @csrf

                <!-- Nama Lengkap -->
                <label>Nama Lengkap / Organisasi <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-user left-icon"></i>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Event Organizer Bengkalis" required>
                </div>
                @error('name')
                <span class="error-text">{{ $message }}</span>
                @enderror

                <!-- Email -->
                <label>Email <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope left-icon"></i>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required>
                </div>
                @error('email')
                <span class="error-text">{{ $message }}</span>
                @enderror

                <!-- Nomor Telepon -->
                <label>Nomor Telepon <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-phone left-icon"></i>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" placeholder="08123456789" required>
                </div>
                @error('telepon')
                <span class="error-text">{{ $message }}</span>
                @enderror

                <!-- Alamat -->
                <label>Alamat <span class="required">*</span></label>
                <div class="input-wrapper">
                    <textarea name="alamat" placeholder="Jl. Contoh No. 1, Bengkalis, Riau" required>{{ old('alamat') }}</textarea>
                </div>
                @error('alamat')
                <span class="error-text">{{ $message }}</span>
                @enderror

                <!-- Password -->
                <label>Password <span class="required">*</span></label>
                <div class="input-wrapper password-wrapper">
                    <i class="fas fa-lock left-icon"></i>
                    <input type="password" name="password" id="password" placeholder="Minimal 6 karakter" required autocomplete="new-password">
                    <span class="toggle-password" onclick="togglePassword('password', this)">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @error('password')
                <span class="error-text">{{ $message }}</span>
                @enderror

                <!-- Konfirmasi Password -->
                <label>Konfirmasi Password <span class="required">*</span></label>
                <div class="input-wrapper password-wrapper">
                    <i class="fas fa-lock left-icon"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang password" required autocomplete="new-password">
                    <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <button type="submit">Daftar Sekarang</button>

                <div class="login">
                    Sudah punya akun? <a href="{{ route('penyelenggara.login') }}">Login di sini</a>
                </div>

                <div class="back">
                    <a href="{{ route('user.home') }}">← Kembali ke Beranda</a>
                </div>

            </form>
        </div>

    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword(inputId, toggleBtn) {
            const input = document.getElementById(inputId);
            const icon = toggleBtn.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>