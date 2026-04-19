<header class="bg-[#0f172a] text-white sticky top-0 z-50 shadow-md">
    <div class="w-full flex justify-between items-center px-6 py-4">

        <!-- LOGO -->
        <div class="flex items-center">
            <img src="{{ asset('img/samnus.png') }}" alt="Logo SMK" class="w-12 mr-3">
            <h1 class="text-xl md:text-2xl font-bold">SMK Samudra Nusantara</h1>
        </div>

        <nav>
            <!-- DESKTOP MENU -->
            <ul class="hidden md:flex gap-4 text-lg font-semibold items-center">

                <li><a href="/#beranda" class="hover:text-blue-400 transition">Beranda</a></li>
                <li><a href="/#jurusan" class="hover:text-blue-400 transition">Jurusan</a></li>

                <!-- DROPDOWN GALERI -->
                <li class="relative group">
                    <button class="flex items-center gap-1 hover:text-blue-400 transition">
                        Galeri

                        <!-- PANAH SVG -->
                        <svg class="w-4 h-4 ml-1 opacity-70 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-180"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- DROPDOWN -->
                    <div
                        class="absolute left-0 mt-3 w-48 bg-white text-black rounded-xl shadow-2xl overflow-hidden
                               opacity-0 scale-95 invisible
                               group-hover:opacity-100 group-hover:scale-100 group-hover:visible
                               transition-all duration-200">

                        <a href="{{ route('galeri.foto') }}"
                            class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 hover:pl-6 transition-all">
                            📷 <span>Galeri Foto</span>
                        </a>

                        <a href="{{ route('galeri.video') }}"
                            class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 hover:pl-6 transition-all">
                            🎥 <span>Galeri Video</span>
                        </a>
                    </div>
                </li>

                <li><a href="{{ route('tentang') }}" class="hover:text-blue-400 transition">Tentang Sekolah</a></li>

                @if (session('user'))
                    <!-- PROFILE -->
                    <li class="relative">
                        <button id="profile-btn" class="focus:outline-none">
                            <div
                                class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(session('user.nama'), 0, 1)) }}
                            </div>
                        </button>

                        <!-- DROPDOWN PROFILE -->
                        <div id="dropdown-menu"
                            class="hidden absolute right-0 mt-3 w-48 bg-white text-black rounded-xl shadow-xl overflow-hidden">

                            <div class="px-4 py-2 font-semibold border-b">
                                {{ session('user.nama') }}
                            </div>

                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                                👤 Profil
                            </a>

                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                                🔔 Notifikasi
                            </a>

                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100">
                                🚪 Logout
                            </a>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-blue-400 transition">Login</a>
                    </li>
                @endif

            </ul>

            <!-- HAMBURGER -->
            <div class="md:hidden">
                <button id="menu-btn" class="focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </nav>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="hidden bg-[#0f172a] md:hidden">
        <ul class="flex flex-col gap-4 p-4 text-white font-semibold">

            <li><a href="/#beranda" class="hover:text-blue-400 transition">Beranda</a></li>
            <li><a href="/#jurusan" class="hover:text-blue-400 transition">Jurusan</a></li>

            <!-- DROPDOWN MOBILE -->
            <li>
                <button id="galeri-mobile-btn"
                    class="w-full flex justify-between items-center hover:text-blue-400 transition">

                    Galeri

                    <!-- PANAH SVG MOBILE -->
                    <svg id="arrow-mobile"
                        class="w-4 h-4 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul id="galeri-mobile-menu" class="hidden flex flex-col ml-4 mt-2 gap-2 text-sm">

                    <li>
                        <a href="{{ route('galeri.foto') }}" class="hover:text-blue-400">
                            📷 Galeri Foto
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('galeri.video') }}" class="hover:text-blue-400">
                            🎥 Galeri Video
                        </a>
                    </li>

                </ul>
            </li>

            <li><a href="{{ route('tentang') }}">Tentang Sekolah</a></li>

            @if (session('user'))
                <li class="border-t border-gray-600 pt-3">
                    👤 {{ session('user.nama') }}
                </li>

                <li>
                    <a href="#" class="hover:text-blue-400 transition">🔔 Notifikasi</a>
                </li>

                <li>
                    <a href="{{ route('logout') }}" class="hover:text-red-400 transition">🚪 Logout</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="hover:text-blue-400 transition">Login</a>
                </li>
            @endif

        </ul>
    </div>
</header>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const profileBtn = document.getElementById('profile-btn');
        const dropdown = document.getElementById('dropdown-menu');

        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        const galeriMobileBtn = document.getElementById('galeri-mobile-btn');
        const galeriMobileMenu = document.getElementById('galeri-mobile-menu');
        const arrowMobile = document.getElementById('arrow-mobile');

        // PROFILE
        if (profileBtn && dropdown) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
            });
        }

        // MOBILE MENU
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
            });
        }

        // MOBILE GALERI
        if (galeriMobileBtn && galeriMobileMenu) {
            galeriMobileBtn.addEventListener('click', function() {
                galeriMobileMenu.classList.toggle('hidden');

                if (arrowMobile) {
                    arrowMobile.classList.toggle('rotate-180');
                }
            });
        }

        // KLIK LUAR
        document.addEventListener('click', function(e) {
            if (dropdown && !profileBtn?.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

    });
</script>