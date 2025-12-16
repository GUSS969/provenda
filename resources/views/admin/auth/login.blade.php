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
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e8ba3 100%);
            position: relative;
        }

        /* Animated Background Pattern */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 85% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(30, 60, 114, 0.1) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.4;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 0.8; }
        }

        /* Premium Glass Card */
        .login-card {
            width: 420px;
            padding: 40px 45px 45px;
            border-radius: 30px;
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 30px 90px rgba(0,0,0,0.2), 0 0 0 1px rgba(255,255,255,0.6) inset;
            text-align: center;
            animation: fadeInUp 0.8s ease;
            position: relative;
            z-index: 10;
        }

        .login-card img {
            width: 70px;
            margin-bottom: 15px;
            filter: drop-shadow(0px 4px 12px rgba(30, 60, 114, 0.3));
        }

        .login-card h2 {
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 700;
            color: #1e3c72;
            letter-spacing: 0.5px;
        }

        .login-card .subtitle {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 25px;
            font-weight: 400;
        }

        .login-card input[type="email"],
        .login-card input[type="password"] {
            width: 100%;
            padding: 15px 20px;
            border-radius: 16px;
            border: 2px solid #e8ecf1;
            background: #f8f9fb;
            margin-bottom: 16px;
            color: #333;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
            font-family: "Poppins", sans-serif;
        }

        .login-card input[type="email"]:focus,
        .login-card input[type="password"]:focus {
            border-color: #2a5298;
            background: white;
            box-shadow: 0 0 0 4px rgba(42, 82, 152, 0.08);
        }

        .login-card input::placeholder {
            color: #adb5bd;
        }

        .options {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .options label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #495057;
            cursor: pointer;
            font-weight: 400;
        }

        .options input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #2a5298;
        }

        .options a {
            color: #2a5298;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .options a:hover {
            color: #1e3c72;
            text-decoration: underline;
        }

        .login-card button {
            width: 100%;
            padding: 17px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(30, 60, 114, 0.35);
            letter-spacing: 0.5px;
            font-family: "Poppins", sans-serif;
        }

        .login-card button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(30, 60, 114, 0.4);
        }

        .login-card button:active {
            transform: translateY(0);
        }

        .bottom-link {
            margin-top: 24px;
            font-size: 14px;
            color: #6c757d;
            font-weight: 400;
        }

        .bottom-link a {
            color: #2a5298;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .bottom-link a:hover {
            color: #1e3c72;
            text-decoration: underline;
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(30px);
            }
            to { 
                opacity: 1; 
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 500px) {
            .login-card {
                width: 90%;
                padding: 35px 30px;
            }

            .login-card h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <img src="/assets/img/logo.png" alt="Logo">

        <h2>Admin Login</h2>
        <p class="subtitle">Silakan login untuk mengakses dashboard</p>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />

            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> 
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>