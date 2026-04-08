<header class="bg-[#0f172a] text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">

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
                <li class="relative group">

                    <!-- DROPDOWN -->
                <li class="relative">
                    <button id="galeri-btn"
                        class="flex items-center gap-2 hover:text-blue-400 transition focus:outline-none">

                        Galeri

                        <!-- PANAH -->
                        <span id="arrow-desktop" class="transition-transform duration-300">▶</span>
                    </button>

                    <!-- DROPDOWN -->
                    <div id="galeri-dropdown"
                        class="hidden absolute left-0 mt-3 w-44 bg-white text-black rounded-xl shadow-xl overflow-hidden">

                        <a href="{{ route('galeri.foto') }}"
                            class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 transition">
                            📷 <span>Galeri Foto</span>
                        </a>

                        <a href="{{ route('galeri.video') }}"
                            class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 transition">
                            🎥 <span>Galeri Video</span>
                        </a>
                    </div>
                </li>
                <li><a href="{{ route('tentang') }}" class="hover:text-blue-400 transition">Tentang Sekolah</a></li>

                @if (session('user'))
                    <!-- PROFILE -->
                    <li class="relative">
                        <button id="profile-btn" class="focus:outline-none">
                            <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                        </button>
                        <!-- DROPDOWN -->
                        <div id="dropdown-menu"
                            class="hidden absolute right-0 mt-3 w-48 bg-white text-black rounded-lg shadow-lg overflow-hidden">

                            <div class="px-4 py-2 font-semibold border-b">
                                {{ session('user.nama') }}
                            </div>

                            <!-- PROFIL -->
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
            <!-- DROPDOWN -->
            <li>
                <button id="galeri-mobile-btn"
                    class="w-full flex justify-between items-center hover:text-blue-400 transition">

                    Galeri

                    <!-- PANAH -->
                    <span id="arrow-mobile" class="transition-transform duration-300">▶</span>
                </button>

                <!-- DROPDOWN MOBILE -->
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

        // ===== ELEMENT =====
        const profileBtn = document.getElementById('profile-btn');
        const dropdown = document.getElementById('dropdown-menu');

        const galeriBtn = document.getElementById('galeri-btn');
        const galeriDropdown = document.getElementById('galeri-dropdown');
        const arrowDesktop = document.getElementById('arrow-desktop');

        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        // ===== MOBILE GALERI =====
        const galeriMobileBtn = document.getElementById('galeri-mobile-btn');
        const galeriMobileMenu = document.getElementById('galeri-mobile-menu');
        const arrowMobile = document.getElementById('arrow-mobile');

        // ===== PROFILE DROPDOWN =====
        if (profileBtn && dropdown) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');

                // tutup galeri desktop
                if (galeriDropdown) galeriDropdown.classList.add('hidden');
                if (arrowDesktop) arrowDesktop.classList.remove('rotate-90');
            });
        }

        // ===== GALERI DESKTOP =====
        if (galeriBtn && galeriDropdown) {
            galeriBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                galeriDropdown.classList.toggle('hidden');

                // animasi panah desktop
                if (arrowDesktop) {
                    arrowDesktop.classList.toggle('rotate-90');
                }

                // tutup profile
                if (dropdown) dropdown.classList.add('hidden');
            });
        }

        // ===== GALERI MOBILE =====
        if (galeriMobileBtn && galeriMobileMenu) {
            galeriMobileBtn.addEventListener('click', function() {
                galeriMobileMenu.classList.toggle('hidden');

                // animasi panah mobile
                if (arrowMobile) {
                    arrowMobile.classList.toggle('rotate-90');
                }
            });
        }

        // ===== KLIK DI LUAR =====
        document.addEventListener('click', function(e) {

            // profile
            if (dropdown && !profileBtn?.contains(e.target)) {
                dropdown.classList.add('hidden');
            }

            // galeri desktop
            if (galeriDropdown && !galeriBtn?.contains(e.target)) {
                galeriDropdown.classList.add('hidden');
                if (arrowDesktop) arrowDesktop.classList.remove('rotate-90');
            }

        });

        // ===== MOBILE MENU =====
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
            });
        }

    });
</script>
