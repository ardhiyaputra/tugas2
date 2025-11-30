<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoListPutra - Manage Your Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #222;
        }

        .hero-section {
            text-align: center;
            max-width: 900px;
            padding: 50px 30px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .hero-icon {
            font-size: 90px;
            margin-bottom: 25px;
            display: inline-block;
            color: #555;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 40px;
            color: #555;
        }

        .btn-huge {
            padding: 16px 40px;
            font-size: 1.2rem;
            border-radius: 50px;
            margin: 10px;
            min-width: 220px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-huge:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .btn-register {
            background: #222;
            color: #fff;
            border: none;
        }

        .btn-register:hover {
            background: #444;
        }

        .btn-login {
            background: transparent;
            color: #222;
            border: 2px solid #222;
        }

        .btn-login:hover {
            background: #222;
            color: #fff;
        }

        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            background: #f0f0f0;
            padding: 10px 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
            color: #333;
        }

        .feature-item i {
            font-size: 1.3rem;
        }

        .feature-item:hover {
            background: #e0e0e0;
        }

        .info-row {
            margin-top: 40px;
            font-size: 0.95rem;
            color: #666;
        }

        @media (max-width: 576px) {
            .hero-title { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.1rem; }
            .btn-huge { font-size: 1rem; min-width: 180px; padding: 14px 30px; }
            .features { gap: 15px; }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-icon">
            <i class="fas fa-tasks"></i>
        </div>

        <h1 class="hero-title">TodoListPutra</h1>
        <p class="hero-subtitle">Organize your tasks, boost your productivity</p>

        <div class="mb-4">
            <a href="{{ route('register') }}" class="btn btn-huge btn-register">
                <i class="fas fa-user-plus"></i> Create Account
            </a>
            <a href="{{ route('login') }}" class="btn btn-huge btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>

        <div class="features">
            <div class="feature-item">
                <i class="fas fa-check-circle"></i> Easy to Use
            </div>
            <div class="feature-item">
                <i class="fas fa-lock"></i> Secure & Private
            </div>
            <div class="feature-item">
                <i class="fas fa-mobile-alt"></i> Mobile Friendly
            </div>
        </div>

        <div class="info-row text-center mt-4">
            <p>
                <i class="fas fa-list-check"></i> Create lists &bull;
                <i class="fas fa-star"></i> Set priorities &bull;
                <i class="fas fa-calendar"></i> Add deadlines
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
