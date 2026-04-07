<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#0f172a] text-white min-h-screen p-5">

        <h2 class="text-2xl font-bold mb-6">User Panel</h2>

        <ul class="space-y-4">

            <li><a href="/dashboard">🏠 Dashboard</a></li>
            <li><a href="#">👤 Profil</a></li>
            <li><a href="#">📄 Data Pendaftaran</a></li>

            <li class="pt-5 border-t border-gray-600">
                <a href="{{ route('logout') }}" class="text-red-400">🚪 Logout</a>
            </li>

        </ul>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">

        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h1 class="text-xl font-bold">
                Halo, {{ $user->nama_lengkap }} 👋
            </h1>
        </div>

        <div class="bg-white p-5 rounded-lg shadow">
            <p>Selamat datang di dashboard user 🎉</p>
        </div>

    </main>

</div>

</body>
</html>