<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Penyelenggara - PROVENDA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        label {
            margin-top: 18px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 6px;
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
        }

        .input-wrapper textarea {
            padding: 14px;
            resize: vertical;
            min-height: 80px;
        }

        /* Hide browser's default password reveal button */
        .input-wrapper input[type="password"]::-ms-reveal,
        .input-wrapper input[type="password"]::-ms-clear {
            display: none;
        }

        .input-wrapper input[type="password"]::-webkit-credentials-auto-fill-button,
        .input-wrapper input[type="password"]::-webkit-contacts-auto-fill-button {
            visibility: hidden;
            display: none !important;
            pointer-events: none;
            height: 0;
            width: 0;
            margin: 0;
        }

        .input-wrapper input[type="text"]::-ms-reveal,
        .input-wrapper input[type="text"]::-ms-clear {
            display: none;
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

        /* Password Wrapper - KHUSUS */
        .password-wrapper input {
            padding-right: 48px;
        }

        /* Password Toggle - ICON MATA DI KANAN */
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

        /* Error Message */
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: none;
            animation: shake 0.3s;
        }

        .error-message.show {
            display: block;
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

        .input-wrapper.error input,
        .input-wrapper.error textarea {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .input-wrapper.success input,
        .input-wrapper.success textarea {
            border-color: #10b981;
            background: #f0fdf4;
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

        button:disabled {
            background: #cbd5e1;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Loading Spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        button.loading .spinner {
            display: block;
        }

        button.loading .btn-text {
            display: none;
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

            .icon-box img {
                width: 90px;
                height: 90px;
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

            <form action="#" method="POST" id="registerForm">

                <label>Nama Lengkap / Organisasi <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-user left-icon"></i>
                    <input type="text" name="name" id="name" placeholder="Contoh: Event Organizer Bengkalis" required>
                </div>
                <div class="error-message" id="name-error"></div>

                <label>Email <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope left-icon"></i>
                    <input type="email" name="email" id="email" placeholder="email@example.com" required>
                </div>
                <div class="error-message" id="email-error"></div>

                <label>Nomor Telepon <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-phone left-icon"></i>
                    <input type="text" name="telepon" id="telepon" placeholder="08123456789" required>
                </div>
                <div class="error-message" id="telepon-error"></div>

                <label>Alamat <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper">
                    <textarea name="alamat" id="alamat" placeholder="Jl. Contoh No. 1, Bengkalis, Riau" required></textarea>
                </div>
                <div class="error-message" id="alamat-error"></div>

                <label>Password <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper password-wrapper">
                    <i class="fas fa-lock left-icon"></i>
                    <input type="password" name="password" id="password" placeholder="Minimal 6 karakter" required autocomplete="new-password">
                    <span class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="error-message" id="password-error"></div>

                <label>Konfirmasi Password <span style="color:#ef4444;">*</span></label>
                <div class="input-wrapper password-wrapper">
                    <i class="fas fa-lock left-icon"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang password" required autocomplete="new-password">
                    <span class="toggle-password" id="togglePasswordConfirm">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="error-message" id="password-confirm-error"></div>

                <button type="submit" id="submitBtn">
                    <span class="btn-text">Daftar Sekarang</span>
                    <div class="spinner"></div>
                </button>

                <div class="login">
                    Sudah punya akun? <a href="#">Login di sini</a>
                </div>

                <div class="back">
                    <a href="#">← Kembali ke Beranda</a>
                </div>

            </form>
        </div>

    </div>

    <script>
        // Toggle Password Visibility - UNTUK PASSWORD
        const togglePasswordBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePasswordBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Toggle Password Visibility - UNTUK KONFIRMASI PASSWORD
        const togglePasswordConfirmBtn = document.getElementById('togglePasswordConfirm');
        const passwordConfirmInput = document.getElementById('password_confirmation');

        togglePasswordConfirmBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const icon = this.querySelector('i');
            
            if (passwordConfirmInput.type === 'password') {
                passwordConfirmInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordConfirmInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Prevent password inputs from triggering anything
        passwordInput.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        passwordConfirmInput.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Form Validation
        const form = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');

        const inputs = {
            name: {
                element: document.getElementById('name'),
                error: document.getElementById('name-error'),
                validate: (value) => {
                    if (!value) return 'Nama tidak boleh kosong';
                    if (value.length < 3) return 'Nama minimal 3 karakter';
                    return null;
                }
            },
            email: {
                element: document.getElementById('email'),
                error: document.getElementById('email-error'),
                validate: (value) => {
                    if (!value) return 'Email tidak boleh kosong';
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) return 'Format email tidak valid';
                    return null;
                }
            },
            telepon: {
                element: document.getElementById('telepon'),
                error: document.getElementById('telepon-error'),
                validate: (value) => {
                    if (!value) return 'Nomor telepon tidak boleh kosong';
                    if (!/^[0-9]{10,13}$/.test(value)) return 'Nomor telepon harus 10-13 digit';
                    return null;
                }
            },
            alamat: {
                element: document.getElementById('alamat'),
                error: document.getElementById('alamat-error'),
                validate: (value) => {
                    if (!value) return 'Alamat tidak boleh kosong';
                    if (value.length < 10) return 'Alamat minimal 10 karakter';
                    return null;
                }
            },
            password: {
                element: document.getElementById('password'),
                error: document.getElementById('password-error'),
                validate: (value) => {
                    if (!value) return 'Password tidak boleh kosong';
                    if (value.length < 6) return 'Password minimal 6 karakter';
                    return null;
                }
            },
            password_confirmation: {
                element: document.getElementById('password_confirmation'),
                error: document.getElementById('password-confirm-error'),
                validate: (value) => {
                    const password = document.getElementById('password').value;
                    if (!value) return 'Konfirmasi password tidak boleh kosong';
                    if (value !== password) return 'Password tidak sama';
                    return null;
                }
            }
        };

        // Add blur event listeners
        Object.keys(inputs).forEach(key => {
            const input = inputs[key];
            input.element.addEventListener('blur', () => {
                validateField(key);
            });

            input.element.addEventListener('input', () => {
                if (input.error.classList.contains('show')) {
                    validateField(key);
                }
            });
        });

        function validateField(fieldName) {
            const field = inputs[fieldName];
            const value = field.element.value.trim();
            const errorMsg = field.validate(value);
            
            const wrapper = field.element.closest('.input-wrapper');
            
            if (errorMsg) {
                field.error.textContent = errorMsg;
                field.error.classList.add('show');
                wrapper.classList.add('error');
                wrapper.classList.remove('success');
                return false;
            } else {
                field.error.classList.remove('show');
                wrapper.classList.remove('error');
                wrapper.classList.add('success');
                return true;
            }
        }

        // Form Submit
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            Object.keys(inputs).forEach(key => {
                if (!validateField(key)) {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert('Mohon periksa kembali form Anda!');
                return;
            }

            // Show loading
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                alert('Registrasi berhasil!');
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            }, 1500);
        });
    </script>
</body>
</html>