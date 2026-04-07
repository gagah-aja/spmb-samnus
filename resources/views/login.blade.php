<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <meta charset="UTF-8">
    <title>Login User</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi masuk */
        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Shadow premium */
        .shadow-3xl {
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }
    </style>

</head>

<body class="bg-blue-500 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-2xl hover:shadow-3xl transition duration-300 w-96 fade-in">

        <img src="{{ asset('img/samnus.png') }}" 
         alt="Logo" 
         class="w-20 mx-auto mb-3">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">
            Login User
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-600 p-2 mb-4 rounded text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-4" onsubmit="return validasiLogin()">
            @csrf

            <!-- Nama -->
            <div class="relative">
                <input id="nama" type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                    class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                <span class="absolute left-3 top-3 text-gray-400">👤</span>
            </div>

            <!-- NISN -->
            <div class="relative">
                <input id="nisn" type="text" name="nisn" placeholder="NISN"
                    class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                <span class="absolute left-3 top-3 text-gray-400">🔢</span>
            </div>

            <!-- Button -->
            <button
                class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition transform hover:scale-105 active:scale-95">
                Login
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Belum punya akun?
            <a href="/daftar" class="text-blue-500 font-semibold hover:underline">
                Daftar disini
            </a>
        </p>

    </div>

    <script>
        function validasiLogin() {
            let nama = document.getElementById("nama").value;
            let nisn = document.getElementById("nisn").value;

            if (nama === "" || nisn === "") {
                alert("Semua field wajib diisi!");
                return false;
            }

            if (isNaN(nisn)) {
                alert("NISN harus berupa angka!");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>