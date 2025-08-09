<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Forgot Password - Login Portal</title>
    <meta name="description" content="Reset your password securely" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="icon" type="image/png" sizes="32x32" href="../frontend/assets/images/favicons/favicon-32x32.png">
    <link rel="stylesheet" href="../loginportal/assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="../loginportal/assets/css/main.min.css" />

    <style>
        body {
            background: url('../loginportal/image.png') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            height: 100vh;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        .auth-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .text-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body class="login-bg">
    <div class="auth-wrapper">
        <form action="{{ url('/customerportal/sendforgotPasswordMail') }}" method="POST">
            @csrf
            <div class="auth-box">
                <a href="{{ url('/customerportal') }}" class="auth-logo mb-4">
                    <img src="{{ asset('../frontend/assets/images/new_logo.png') }}" alt="Logo" />
                </a>
                <h4 class="mb-4">Forgot password?</h4>
                <h6 class="fw-light mb-3">
                    To reset your password, enter the email address you registered with.
                </h6>

                <!-- Session Messages -->
                @if (session('error'))
                <p class="text-danger text-center">
                    {{ session('error') }}
                </p>
                @endif

                @if (session('success'))
                <p class="text-danger text-center">
                    {{ session('success') }}
                </p>
                @endif

                <!-- Email Field -->
                <div class="mb-3">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" required>
                    @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>

                <!-- Back to Login -->
                <div class="text-link">
                    <p>Remember your password? <a href="{{ url('/customerportal/login') }}" class="text-decoration-underline">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
