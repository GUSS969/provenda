<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Penyelenggara</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #f3f6fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #fff;
            width: 430px;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            animation: fade 0.3s ease-in-out;
        }

        @keyframes fade {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h3 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
            color: #212529;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-top: 12px;
            display: block;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #cfd3da;
            font-size: 15px;
            margin-top: 4px;
            outline: none;
            transition: .2s;
        }

        input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 4px rgba(13,110,253,.4);
        }

        button {
            width: 100%;
            margin-top: 18px;
            padding: 10px 0;
            border: none;
            border-radius: 8px;
            background: #0d6efd;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            background: #0b5ed7;
        }

        .login-link {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        .login-link a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>

    <div class="card">
        <h3>Registrasi Penyelenggara</h3>

        <form action="{{ route('penyelenggara.register') }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar</button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('penyelenggara.login') }}">Login</a>
            </div>
        </form>
    </div>

</body>
</html>
