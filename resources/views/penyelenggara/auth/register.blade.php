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
            background: #eef4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1250px;
            background: #fff;
            display: flex;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 94, 255, 0.12);
        }

        /* ===== LEFT SECTION ===== */
        .left {
            flex: 1;
            background: linear-gradient(160deg, #028eff, #005bef);
            color: #fff;
            padding: 70px 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .left .icon-box {
            font-size: 85px;
            padding: 30px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .18);
            margin-bottom: 25px;
        }

        .left h1 {
            font-size: 38px;
            font-weight: 900;
        }

        .left p {
            font-size: 16px;
            margin-top: 8px;
        }

        .feature-list {
            margin-top: 28px;
            text-align: left;
            font-size: 15px;
        }

        .feature-list li {
            margin: 12px 0;
            list-style: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* ===== RIGHT SECTION ===== */
        .right {
            flex: 1.1;
            padding: 60px 55px;
        }

        h2 {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #1d1d1d;
        }

        .subtitle {
            font-size: 15px;
            color: #6c757d;
            margin-bottom: 25px;
        }

        label {
            margin-top: 18px;
            font-size: 14px;
            font-weight: 600;
            color: #2d2d2d;
            display: block;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-top: 6px;
            border-radius: 12px;
            font-size: 15px;
            border: 1.8px solid #ced6e0;
            transition: .25s;
        }

        input:focus {
            border-color: #006dff;
            box-shadow: 0 0 0 5px rgba(0, 110, 255, .15);
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
            background: linear-gradient(135deg, #007bff, #00c6ff);
            cursor: pointer;
            transition: .25s ease;
            box-shadow: 0 8px 25px rgba(0, 120, 255, .32);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 120, 255, .4);
        }

        .alert {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
        }

        .alert-danger {
            background: #ffe0e4;
            color: #a30d1e;
        }

        .alert-success {
            background: #d6f5df;
            color: #146b3a;
        }

        .login {
            margin-top: 20px;
            font-size: 14px;
        }

        .login a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        .back {
            margin-top: 12px;
            font-size: 14px;
        }

        .back a {
            color: #6c757d;
            text-decoration: none;
        }

        .back a:hover {
            color: #007bff;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width: 950px) {
            .container {
                flex-direction: column;
                max-width: 500px;
            }

            .left {
                display: none;
            }

            body {
                padding: 0;
            }

            .right {
                padding: 40px 30px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="left">
            <div>
                <div class="icon-box"><i class="fas fa-calendar-day"></i></div>
                <h1>PROVENDA</h1>
                <p>Platform Promosi Event Terbaik di Bengkalis</p>

                <ul class="feature-list">
                    <li><i class="fas fa-bullhorn"></i> Promosikan event ke ribuan audience</li>
                    <li><i class="fas fa-chart-line"></i> Dashboard modern dan lengkap</li>
                    <li><i class="fas fa-shield-alt"></i> Aman & terpercaya</li>
                </ul>
            </div>
        </div>

        <div class="right">

            <h2>Daftar Sekarang ✨</h2>
            <p class="subtitle">Buat akun untuk mengelola event Anda</p>

            @if(session('error'))
                <div class="alert alert-danger">⚠️ {{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">🎉 {{ session('success') }}</div>
            @endif

            <form action="{{ route('penyelenggara.register.submit') }}" method="POST">
                @csrf

                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@gmail.com" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter" required>

                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ketik ulang password" required>

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

</body>
</html>
