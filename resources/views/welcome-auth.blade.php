<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoListPutra - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .auth-container {
            max-width: 1000px;
            margin: 50px auto;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <div class="text-center mb-4">
                <h1 class="text-white mb-2">
                    <i class="fas fa-tasks fa-3x"></i>
                </h1>
                <h2 class="text-white">TodoListPutra</h2>
                <p class="text-white">Manage your tasks efficiently</p>
            </div>

            <div class="row">
                <!-- REGISTER FORM -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0"><i class="fas fa-user-plus"></i> Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-user-plus"></i> Register Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- LOGIN FORM -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0"><i class="fas fa-sign-in-alt"></i> Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-sign-in-alt"></i> Login Now
                                </button>

                                @if (Route::has('password.request'))
                                    <div class="text-center mt-3">
                                        <a href="{{ route('password.request') }}" class="text-muted small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-white">
                    <i class="fas fa-check-circle"></i> Free to use • 
                    <i class="fas fa-lock"></i> Secure • 
                    <i class="fas fa-mobile-alt"></i> Responsive
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>