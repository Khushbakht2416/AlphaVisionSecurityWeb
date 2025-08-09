<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - User Portal</title>
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="apple-touch-icon" sizes="57x57" href="../frontend/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../frontend/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../frontend/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../frontend/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../frontend/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../frontend/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../frontend/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../frontend/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../frontend/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="../frontend/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../frontend/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../frontend/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../frontend/assets/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../frontend/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Home - Login Portal">
    <meta property="og:type" content="Website">
    <link rel="stylesheet" href="../loginportal/assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="../loginportal/assets/css/main.min.css" />
    <link rel="stylesheet" href="../loginportal/assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />

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
            backdrop-filter: blur(7px);
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
    </style>
</head>

<body>
    <div class="auth-wrapper">
        <form action="{{ url('/customerportal/onlogin') }}" method="POST">
            @csrf
            <div class="auth-box">
                <a href="/customerportal" class="auth-logo mb-4">
                    <img src="{{ asset(path: '../frontend/assets/images/new_logo.png') }}" alt="Logo" />
                </a>
                <h4 class="mb-4">Welcome to User Login Portal</h4>
                @if (session('session_expired'))
                <p class="text-center text-danger">
                    {{ session('session_expired') }}
                </p>
                @endif
                @if (session('error'))
                <p class="text-center text-danger">
                    {{ session('error') }}
                </p>
                @endif
                @if (session('success'))
                <p class="text-center text-danger">
                    {{ session('success') }}
                </p>
                @endif
                <div class="mb-2">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter email"
                        value="{{ old('email') }}" required>

                    @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"
                            required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye" id="password-icon"></i>
                        </button>
                    </div>
                    @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" {{
                            old('remember_me') ? 'checked' : '' }}>
                        <label class="form-check-label small" for="remember_me">Remember</label>
                    </div>
                    <div class="text-end">
                        <a href={{ url('customerportal/forgotpassword') }}
                            class="text-decoration-underline small">Forgot password?</a>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Login</button>
                </div>
            </div>
        </form>

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('password-icon');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            passwordIcon.classList.toggle('bi-eye');
            passwordIcon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>

</html>
