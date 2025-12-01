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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-teal: #0D9488;
            --primary-orange: #F97316;
            --gradient-main: linear-gradient(135deg, #0D9488 0%, #14B8A6 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0D9488 0%, #14B8A6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: var(--gradient-main);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            backdrop-filter: blur(10px);
        }

        .login-icon i {
            font-size: 2.5rem;
        }

        .login-header h4 {
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .login-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-label {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.2rem;
        }

        .input-icon .form-control {
            padding-left: 45px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--gradient-main);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.3);
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: var(--primary-teal);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: var(--primary-orange);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            color: #9ca3af;
            font-size: 0.85rem;
        }

        .test-credentials {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }

        .test-credentials h6 {
            font-weight: 700;
            margin-bottom: 10px;
            color: #1f2937;
        }

        .test-credentials p {
            margin: 5px 0;
            color: #6b7280;
        }

        .test-credentials strong {
            color: var(--primary-teal);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-icon">
                <i class="ti ti-user-circle"></i>
            </div>
            <h4>Login Penyelenggara</h4>
            <p>Kelola event Anda dengan mudah</p>
        </div>

        <div class="login-body">
            <!-- Test Credentials Info -->
            <div class="test-credentials">
                <h6><i class="ti ti-info-circle"></i> Info Login Test</h6>
                <p>Gunakan email & password dari database</p>
                <p><strong>Email:</strong> Cek tabel penyelenggaras</p>
                <p><strong>Password:</strong> Sesuai database</p>
            </div>

            <!-- Alert Messages -->
            @if(session('error'))
            <div class="alert alert-danger">
                <i class="ti ti-alert-circle"></i>
                {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                <i class="ti ti-check"></i>
                {{ session('success') }}
            </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('penyelenggara.login.submit') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-icon">
                        <i class="ti ti-mail"></i>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="email@example.com"
                               value="{{ old('email') }}"
                               required
                               autocomplete="email">
                    </div>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="ti ti-lock"></i>
                        <input type="password" 
                               name="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Masukkan password"
                               required
                               autocomplete="current-password">
                    </div>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <i class="ti ti-login"></i> Login Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                <span>atau</span>
            </div>

            <!-- Back to Home -->
            <div class="back-link">
                <a href="{{ route('user.home') }}">
                    <i class="ti ti-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>