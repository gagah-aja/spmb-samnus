<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <div class="bg-[#0f172a] shadow px-6 py-3 flex justify-between items-center text-white">

            <!-- KIRI -->
            <h1 class="text-lg font-bold">
                Dashboard User
            </h1>

            <!-- KANAN -->
            <div class="flex items-center gap-4">

                <!-- Nama -->
                <span class="font-medium">
                    {{ $user->nama_lengkap }}
                </span>

                <!-- DROPDOWN -->
                <div class="relative">

                    <!-- FOTO -->
                    <button id="profileButton"
                        class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden focus:outline-none">

                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-600 font-bold">
                                {{ strtoupper(substr($user->nama_lengkap, 0, 1)) }}
                            </span>
                        @endif
                    </button>

                    <!-- MENU -->
                    <div id="dropdownProfile"
                        class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg text-black overflow-hidden z-50">

                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                            👤 Lihat Profil
                        </a>

                        <a href="{{ route('logout') }}" class="block px-4 py-2 bg-red-500 text-white hover:bg-red-600">
                            Logout
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- MAIN CONTENT -->
        <main class="p-6 flex-1">

            <!-- GREETING -->
            <div class="bg-white p-5 rounded-lg shadow mb-6">
                <h1 class="text-xl font-bold">
                    Halo, {{ $user->nama_lengkap }} 👋
                </h1>
                <p class="text-gray-600 mt-1">
                    Selamat datang di dashboard user 🎉
                </p>
            </div>

            <!-- BERITA -->
            <div class="bg-white p-6 rounded-lg shadow">

                <div class="flex items-center justify-center mb-8">
                    <div class="w-10 h-[2px] bg-orange-500 mr-3"></div>
                    <h2 class="text-2xl font-bold">Berita Terbaru</h2>
                    <div class="w-10 h-[2px] bg-orange-500 ml-3"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($pengumuman as $p)
                        <div class="bg-white rounded-xl overflow-hidden hover:shadow-xl transition">

                            @if ($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}" class="w-full h-48 object-cover">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="w-full h-48 object-cover">
                            @endif

                            <div class="mt-3 px-1 pb-3">
                                <div class="text-sm text-orange-500 font-semibold mb-1">
                                    UMUM
                                </div>

                                <h3 class="font-semibold text-lg">
                                    <a href="{{ route('berita.detail', $p->id) }}"
                                        class="hover:text-blue-500 hover:underline transition duration-200">
                                        {{ $p->judul }}
                                    </a>
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                                </p>
                            </div>

                        </div>
                    @empty
                        <p class="text-center col-span-3 text-gray-500">
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
