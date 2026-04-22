<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <div class="bg-[#0f172a] px-4 md:px-6 py-3 flex justify-between items-center text-white">

            <!-- KIRI -->
            <h1 class="text-sm sm:text-lg font-bold">
                Dashboard
            </h1>

            <!-- KANAN -->
            <div class="flex items-center gap-2 sm:gap-4">

                <!-- Nama (disembunyikan di HP kecil) -->
                <span class="hidden sm:block text-sm">
                    {{ $user->nama_lengkap }}
                </span>

                <!-- DROPDOWN -->
                <div class="relative">

                    <button id="profileButton"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">

                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-600 font-bold text-sm">
                                {{ strtoupper(substr($user->nama_lengkap, 0, 1)) }}
                            </span>
                        @endif
                    </button>

                    <!-- MENU -->
                    <div id="dropdownProfile"
                        class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg text-black overflow-hidden z-50 text-sm">

                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                            👤 Profil
                        </a>

                        <a href="{{ route('logout') }}" class="block px-4 py-2 bg-red-500 text-white hover:bg-red-600">
                            Logout
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- MAIN -->
        <main class="p-4 md:p-6 flex-1">

            <!-- GREETING -->
            <div class="bg-white p-4 md:p-5 rounded-lg shadow mb-6">
                <h1 class="text-lg md:text-xl font-bold">
                    Halo, {{ $user->nama_lengkap }} 👋
                </h1>
                <p class="text-gray-600 text-sm md:text-base mt-1">
                    Selamat datang di dashboard 🎉
                </p>
            </div>

            <!-- BERITA -->
            <div class="bg-white p-4 md:p-6 rounded-lg shadow">

                <div class="flex items-center justify-center mb-6 md:mb-8">
                    <div class="w-6 md:w-10 h-[2px] bg-orange-500 mr-2 md:mr-3"></div>
                    <h2 class="text-lg md:text-2xl font-bold">Berita Terbaru</h2>
                    <div class="w-6 md:w-10 h-[2px] bg-orange-500 ml-2 md:ml-3"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">

                    @forelse ($pengumuman as $p)
                        <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition duration-300">

                            @if ($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}"
                                    class="w-full h-40 md:h-48 object-cover">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="w-full h-40 md:h-48 object-cover">
                            @endif

                            <div class="mt-3 px-2 pb-3">
                                <div class="text-xs text-orange-500 font-semibold mb-1">
                                    UMUM
                                </div>

                                <h3 class="font-semibold text-sm md:text-lg leading-snug">
                                    <a href="{{ route('berita.detail', $p->id) }}"
                                        class="hover:text-blue-500 hover:underline">
                                        {{ $p->judul }}
                                    </a>
                                </h3>

                                <p class="text-xs md:text-sm text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                                </p>
                            </div>

                        </div>
                    @empty
                        <p class="text-center col-span-3 text-gray-500 text-sm">
                            Belum ada berita
                        </p>
                    @endforelse

                </div>

            </div>

        </main>

    </div>

    <!-- SCRIPT -->
    <script>
        const button = document.getElementById("profileButton");
        const dropdown = document.getElementById("dropdownProfile");

        button.addEventListener("click", function(e) {
            e.stopPropagation();
            dropdown.classList.toggle("hidden");
        });

        window.addEventListener("click", function() {
            dropdown.classList.add("hidden");
        });
    </script>

</body>

</html>
