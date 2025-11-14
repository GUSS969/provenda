<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Datta Able</title>

    <!-- CSS original Datta Able -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">

    <style>
        body {
            background: #eef1f5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        /* Background circle */
        .bg-circle1 {
            position: absolute;
            width: 350px;
            height: 350px;
            background: linear-gradient(45deg, #27f1c1, #1ad0fc);
            border-radius: 50%;
            top: -80px;
            right: -120px;
            opacity: 0.95;
        }

        .bg-circle2 {
            position: absolute;
            width: 420px;
            height: 420px;
            background: linear-gradient(45deg, #9b74e7, #7b61d5);
            border-radius: 50%;
            bottom: -120px;
            left: -120px;
            opacity: 0.85;
        }

        .bg-dot {
            width: 18px;
            height: 18px;
            background: #14b9ff;
            border-radius: 50%;
            position: absolute;
            top: 38%;
            right: 20%;
        }

        .login-card {
            width: 400px;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .login-card img {
            width: 50px;
            margin-bottom: 10px;
        }

        .login-card h2 {
            font-size: 26px;
            margin-bottom: 25px;
        }

        .login-card input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            margin-bottom: 16px;
        }

        .login-card button {
            width: 100%;
            padding: 12px;
            background: #1e88e5;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-card button:hover {
            background: #166fbe;
        }

        .options {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 18px;
        }

        a {
            color: #1e88e5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .bottom-link {
            margin-top: 18px;
            font-size: 14px;
        }
    </style>

</head>
<body>

    <!-- Background elements -->
    <div class="bg-circle1"></div>
    <div class="bg-circle2"></div>
    <div class="bg-dot"></div>

    <div class="login-card">
        <img src="/admin/assets/images/logo.png" alt="Logo">

        <h2>Login</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <input type="email" name="email" placeholder="Email Address" required>

            <input type="password" name="password" placeholder="Password" required>

            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me?</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit">Login</button>

            <div class="bottom-link">
                Don't have an account? <a href="#">Create Account</a>
            </div>
        </form>
    </div>

</body>
</html>
