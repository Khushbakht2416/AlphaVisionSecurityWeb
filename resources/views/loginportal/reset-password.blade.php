<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Password - User Portal</title>
    <meta name="description" content="Reset your password securely" />
    <meta name="author" content="Bootstrap Gallery" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../../frontend/assets/images/favicons/favicon-32x32.png">

    <!-- Styles -->
    <link rel="stylesheet" href="../../loginportal/assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="../../loginportal/assets/css/main.min.css" />

    <style>
        body {
            background: url('../../loginportal/image.png') no-repeat center center fixed;
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

<body>
    <div class="auth-wrapper">
        <form action="{{ url('/customerportal/resetpassword') }}" method="POST">
            @csrf
            <div class="auth-box">
                <a href="/customerportal" class="auth-logo mb-4">
                    <img src="{{ asset('frontend/assets/images/new_logo.png') }}" alt="Logo" />
                </a>
                <h4 class="mb-4">Set New Password</h4>
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

                <!-- New Password Field -->
                <div class="mb-3">
                    <label class="form-label" for="newPwd">New Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="newPwd" name="password"
                            class="form-control" value="{{ old('password') }}" placeholder="Enter new password" required>
                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="newPwd">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label class="form-label" for="confNewPwd">Confirm New Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="confNewPwd" name="password_confirmation"
                            class="form-control" value="{{ old('passworrd_confirm') }}" placeholder="Confirm new password" required/>
                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="confNewPwd">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password_confirm')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="token" value="{{ $token }}" />


                <div class="form-text mb-2">Your password must be 8-20 characters long.</div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const targetInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (targetInput.type === "password") {
                    targetInput.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    targetInput.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
            });
        });
    </script>
</body>

</html>
