<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: "Poppins", sans-serif;
            background: #f3f6fa;
            color: #333;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 30px;
            font-size: 16px;
            color: #555;
        }

        .btn-login {
            padding: 12px 28px;
            background: #1e88e5;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.25s;
        }

        .btn-login:hover {
            background: #166fbe;
        }
    </style>
</head>
<body>

    <h1>Welcome</h1>
    <p>Selamat datang di website kami</p>

    <a href="{{ route('login') }}" class="btn-login">Login</a>

</body>
</html>
