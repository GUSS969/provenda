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

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gradient-main);
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
            max-width: 450px;
            width: 100%;
            overflow: hidden;
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

        .login-body {
            padding: 40px 30px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--gradient-main);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-register {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            font-weight: 700;
            border: 2px solid var(--primary-teal);
            background: white;
            color: var(--primary-teal);
            transition: 0.2s;
        }

        .btn-register:hover {
            background: var(--primary-teal);
            color: white;
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
        }

        .back-link a {
            color: var(--primary-teal);
            font-weight: 600;
            text-decoration: none;
        }

        .back-link a:hover {
            color: var(--primary-orange);
        }
    </style>
</head>

<body>
    <div class="login-container">

        <!-- HEADER -->
        <div class="login-header">
            <div class="login-icon">
                <i class="ti ti-user-circle"></i>
            </div>
            <h4>Login Penyelenggara</h4>
            <p>Kelola event Anda dengan mudah</p>
        </div>

        <!-- BODY -->
        <div class="login-body">

            <!-- Info -->
            <div class="test-credentials">
                <h6><i class="ti ti-info-circle"></i> Info Login Test</h6>
                <p>Gunakan email & password dari database</p>
                <p><strong>Email:</strong> cek tabel penyelenggaras</p>
                <p><strong>Password:</strong> sesuai database</p>
            </div>

            <!-- Alert -->
            @if(session('error'))
            <div class="alert alert-danger">
                <i class="ti ti-alert-circle"></i> {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                <i class="ti ti-check"></i> {{ session('success') }}
            </div>
            @endif

            <!-- FORM LOGIN -->
            <form action="{{ route('penyelenggara.login.submit') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-icon">
                        <i class="ti ti-mail"></i>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" value="{{ old('email') }}" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="ti ti-lock"></i>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="ti ti-login"></i> Login Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="divider"><span>atau</span></div>

            <!-- REGISTER BUTTON (baru) -->
            <a href="{{ route('penyelenggara.register') }}">
                <button class="btn-register">
                    <i class="ti ti-user-plus"></i> Daftar Penyelenggara Baru
                </button>
            </a>

            <!-- Back -->
            <div class="back-link mt-3">
                <a href="{{ route('user.home') }}">
                    <i class="ti ti-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</body>
</html>
