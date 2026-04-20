<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Bootstrap Icons-->
    <!--begin::AdminLTE CSS-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css" />
    <!--end::AdminLTE CSS-->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a1d23 0%, #2b2f3a 50%, #1a1d23 100%);
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 50%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 70% 50%, rgba(139, 92, 246, 0.06) 0%, transparent 50%);
            animation: bgShift 15s ease-in-out infinite alternate;
        }

        @keyframes bgShift {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-5%, 3%);
            }
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 1rem;
        }

        .login-card {
            background: rgba(33, 37, 46, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .login-card .card-body {
            padding: 2.5rem;
        }

        .login-logo {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.3);
        }

        .login-logo i {
            font-size: 1.5rem;
            color: #fff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.625rem;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            color: #e2e8f0;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
            color: #f1f5f9;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .input-group-text {
            background: transparent;
            border: none;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 5;
            display: flex;
            align-items: center;
            padding-left: 0.875rem;
            color: #64748b;
        }

        .input-wrapper {
            position: relative;
        }

        .btn-login {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 0.625rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #fff;
            width: 100%;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.3);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
            color: #fff;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .form-check-input:checked {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #475569;
            font-size: 0.8rem;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.08);
        }

        .invalid-feedback {
            font-size: 0.8rem;
        }

        .floating-shapes .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.03;
            background: #6366f1;
        }

        .floating-shapes .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
        }

        .floating-shapes .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -80px;
        }

        .floating-shapes .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            top: 40%;
            left: 60%;
        }
    </style>
</head>

<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-card card">
            <div class="card-body">
                {{-- Logo --}}
                <div class="login-logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <h4 class="text-center fw-bold mb-1" style="color: #f1f5f9;">Selamat Datang!</h4>
                <p class="text-center mb-4" style="color: #64748b; font-size: 0.9rem;">
                    Masuk ke {{ config('app.name', 'Laravel') }}
                </p>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                        style="border-radius: 0.625rem; font-size: 0.875rem;">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold" style="color: #94a3b8;">Email</label>
                        <div class="input-wrapper">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autofocus autocomplete="username"
                                placeholder="nama@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label small fw-semibold"
                            style="color: #94a3b8;">Password</label>
                        <div class="input-wrapper">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Remember & Forgot --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label small" for="remember_me" style="color: #94a3b8;">
                                Ingat saya
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="small text-decoration-none"
                                style="color: #818cf8;">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                </form>

                @if (Route::has('register'))
                    <div class="divider">atau</div>
                    <p class="text-center mb-0" style="color: #64748b; font-size: 0.875rem;">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold"
                            style="color: #818cf8;">Daftar sekarang</a>
                    </p>
                @endif
            </div>
        </div>

        <p class="text-center mt-4" style="color: #475569; font-size: 0.75rem;">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </p>
    </div>

    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(Bootstrap 5)-->
</body>

</html>
