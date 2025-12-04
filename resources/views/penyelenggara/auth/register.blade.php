<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Penyelenggara - PROVENDA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background: #fff;
            width: 100%;
            max-width: 460px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fade 0.5s ease-in-out;
        }

        @keyframes fade {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h3 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
            color: #212529;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-top: 16px;
            display: block;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            font-size: 15px;
            margin-top: 6px;
            outline: none;
            transition: .2s;
            font-family: "Poppins", sans-serif;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102,126,234,.15);
        }

        .error-text {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
            display: block;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 14px 0;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            box-shadow: 0 8px 20px rgba(102,126,234,.4);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(102,126,234,.5);
        }

        button:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .back-link a {
            color: #6c757d;
            text-decoration: none;
        }

        .back-link a:hover {
            color: #667eea;
        }
    </style>

</head>
<body>

    <div class="card">
        <h3>Registrasi Penyelenggara 🎉</h3>
        <p class="subtitle">Bergabunglah dengan PROVENDA sekarang</p>

        @if(session('error'))
        <div class="alert alert-danger">
            ⚠️ {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('penyelenggara.register.submit') }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
            @error('name')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
            @error('email')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 karakter" required>
            @error('password')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ketik ulang password" required>

            <button type="submit">Daftar Sekarang</button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('penyelenggara.login') }}">Login di sini</a>
            </div>

            <div class="back-link">
                <a href="{{ route('user.home') }}">← Kembali ke Beranda</a>
            </div>
        </form>
    </div>

</body>
</html>