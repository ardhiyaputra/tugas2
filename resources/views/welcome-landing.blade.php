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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            text-align: center;
            color: white;
        }
        .hero-icon {
            font-size: 120px;
            margin-bottom: 30px;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            opacity: 0.95;
        }
        .btn-huge {
            padding: 20px 50px;
            font-size: 1.3rem;
            border-radius: 50px;
            margin: 15px;
            min-width: 250px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .btn-huge:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }
        .btn-register {
            background: white;
            color: #667eea;
            border: none;
        }
        .btn-register:hover {
            background: #f8f9fa;
            color: #764ba2;
        }
        .btn-login {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
        }
        .btn-login:hover {
            background: white;
            color: #667eea;
        }
        .features {
            margin-top: 60px;
        }
        .feature-item {
            display: inline-block;
            margin: 0 30px;
            font-size: 1.1rem;
        }
        .feature-item i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-section">
            <div class="hero-icon">
                <i class="fas fa-tasks"></i>
            </div>
            
            <h1 class="hero-title">TodoListPutra</h1>
            <p class="hero-subtitle">
                Organize your tasks, boost your productivity
            </p>

            <div class="mt-5">
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

            <div class="mt-5">
                <p style="opacity: 0.8;">
                    <i class="fas fa-list-check"></i> Create lists • 
                    <i class="fas fa-star"></i> Set priorities • 
                    <i class="fas fa-calendar"></i> Add deadlines
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>