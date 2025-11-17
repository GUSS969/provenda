<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login – Premium Edition</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: radial-gradient(circle at 20% 20%, #24273a, #0f111a 70%);
            color: #fff;
        }

        /* Glow Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.45;
            animation: float 6s ease-in-out infinite alternate;
        }

        .orb1 {
            width: 450px;
            height: 450px;
            background: #5c3bff;
            top: -80px;
            left: -100px;
        }

        .orb2 {
            width: 350px;
            height: 350px;
            background: #00d4ff;
            bottom: -100px;
            right: -80px;
        }

        .orb3 {
            width: 250px;
            height: 250px;
            background: #ff3b6b;
            top: 55%;
            left: 55%;
        }

        @keyframes float {
            from { transform: translateY(0px); }
            to { transform: translateY(25px); }
        }

        /* Premium Glass Card */
        .login-card {
            width: 420px;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            text-align: center;
            border: 1px solid rgba(255,255,255,0.15);
            animation: fadeIn 1s ease;
            position: relative;
            z-index: 10;
        }

        .login-card img {
            width: 60px;
            margin-bottom: 15px;
            filter: drop-shadow(0px 0px 8px rgba(255,255,255,0.3));
        }

        .login-card h2 {
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .login-card input {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.12);
            margin-bottom: 18px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: 0.25s;
        }

        .login-card input:focus {
            border-color: #00d4ff;
            background: rgba(255,255,255,0.18);
        }

        .login-card button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #6f4dff, #2aa4ff);
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.25s;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .login-card button:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 15px 40px rgba(0,0,0,0.45);
        }

        .options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-size: 14px;
            color: #e0e0e0;
        }

        a {
            color: #00d4ff;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .bottom-link {
            margin-top: 15px;
            font-size: 14px;
            opacity: 0.85;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="orb orb1"></div>
    <div class="orb orb2"></div>
    <div class="orb orb3"></div>

    <div class="login-card">
        <img src="/admin/assets/images/logo.png" alt="Logo">

        <h2>Admin Login</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />

            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
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