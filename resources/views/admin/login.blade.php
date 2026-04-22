<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ===== FONT ===== */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
        }

        /* ===== ANIMASI ===== */
        .fade-in {
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== BACKGROUND PATTERN ===== */
        body {
            min-height: 100dvh; /* dvh untuk mobile agar tidak tercover keyboard */
        }

        .bg-pattern {
            background-color: #e63946;
            background-image:
                radial-gradient(ellipse at top left, #e63946 0%, transparent 60%),
                radial-gradient(ellipse at bottom right, #4338ca 0%, transparent 60%);
        }

        /* ===== INPUT MOBILE-FRIENDLY ===== */
        .input-field {
            width: 100%;
            padding: 14px 16px 14px 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px; /* minimal 16px agar iOS tidak zoom otomatis */
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            -webkit-appearance: none;
            appearance: none;
        }

        .input-field:focus {
            border-color: #4f46e5;
            background: #fff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .input-field::placeholder {
            color: #94a3b8;
        }

        /* ===== INPUT WRAPPER (ICON) ===== */
        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            width: 18px;
            height: 18px;
        }

        /* ===== TOGGLE PASSWORD ===== */
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 4px;
            cursor: pointer;
            color: #94a3b8;
            min-width: 36px;
            min-height: 36px; /* area tap cukup besar di mobile */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== BUTTON ===== */
        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 0.3px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
            -webkit-tap-highlight-color: transparent;
        }

        .btn-login:active {
            transform: scale(0.97);
            opacity: 0.9;
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
        }

        @media (hover: hover) {
            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(79, 70, 229, 0.45);
            }
        }

        /* ===== CARD ===== */
        .login-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
        }

        /* ===== MOBILE OVERRIDES ===== */
        @media (max-width: 480px) {
            .login-card {
                border-radius: 20px 20px 0 0;
                box-shadow: 0 -8px 40px rgba(0, 0, 0, 0.12);
                /* card naik dari bawah di mobile */
                animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(40px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            body {
                align-items: flex-end !important;
                padding-bottom: 0 !important;
            }

            .card-padding {
                padding: 28px 24px 36px; /* lebih besar padding bawah untuk safe area */
                padding-bottom: max(36px, env(safe-area-inset-bottom, 36px));
            }
        }

        @media (min-width: 481px) {
            .card-padding {
                padding: 36px 40px;
            }
        }

        /* ===== DIVIDER ===== */
        .divider-line {
            height: 1px;
            background: #f1f5f9;
        }

        /* ===== ERROR ALERT ===== */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>

<body class="bg-pattern flex items-center justify-center min-h-dvh p-4">

    <div class="login-card fade-in w-full max-w-sm card-padding">

        <!-- LOGO & HEADER -->
        <div class="text-center mb-7">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-50 to-purple-50 mb-4 shadow-sm">
                <img src="{{ asset('img/samnus.png') }}" alt="Logo" class="w-11 h-11 object-contain">
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
                Login Admin
            </h2>
            <p class="text-sm text-gray-400 mt-1">Masuk ke panel administrasi</p>
        </div>

        <!-- ERROR SESSION -->
        @if (session('error'))
            <div class="alert-error mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="/login/admin" class="space-y-4" autocomplete="on">
            @csrf

            <!-- EMAIL -->
            <div class="input-wrapper">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input
                    type="email"
                    name="email"
                    placeholder="Email admin"
                    class="input-field"
                    autocomplete="email"
                    inputmode="email"
                    required
                >
            </div>

            <!-- PASSWORD -->
            <div class="input-wrapper">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input
                    type="password"
                    id="passwordInput"
                    name="password"
                    placeholder="Password"
                    class="input-field"
                    autocomplete="current-password"
                    style="padding-right: 48px;"
                    required
                >
                <button type="button" class="toggle-password" onclick="togglePassword()" aria-label="Tampilkan password">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>

            <!-- BUTTON LOGIN -->
            <button type="submit" class="btn-login mt-2">
                Masuk
            </button>
        </form>

        <!-- DIVIDER -->
        <div class="divider-line my-5"></div>

        <!-- LINK USER -->
        <p class="text-sm text-center text-gray-400">
            Login sebagai user?
            <a href="/login" class="text-indigo-500 font-semibold hover:text-indigo-700 transition-colors">
                Klik disini
            </a>
        </p>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';

            icon.innerHTML = isHidden
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        }
    </script>

</body>

</html>