<header class="bg-[#0f172a] text-white sticky top-0 z-50 shadow-md">
    <div class="w-full flex justify-between items-center px-6 py-4">

        <!-- LOGO -->
        <div class="flex items-center">
            <img src="{{ asset('img/samnus.png') }}" class="w-12 mr-3">
            <h1 class="text-xl md:text-2xl font-bold">SMK Samudra Nusantara</h1>
        </div>

        <nav>
            <!-- DESKTOP -->
            <ul class="hidden md:flex gap-4 text-lg font-semibold items-center">

                <li><a href="/" class="hover:text-blue-400">Beranda</a></li>
                <li><a href="{{ route('jurusan') }}" class="hover:text-blue-400">Jurusan</a></li>
                <li><a href="{{ route('berita.index') }}" class="hover:text-blue-400">Berita</a></li>

                <!-- DROPDOWN GALERI -->
                <li class="relative group">
                    <button class="flex items-center gap-1 hover:text-blue-400">
                        Galeri
                        <svg class="w-4 h-4 ml-1 transition group-hover:rotate-180" fill="none"
                            stroke="currentColor">
                            <path stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        class="absolute left-0 mt-3 w-48 bg-white text-black rounded-xl shadow-xl
                                opacity-0 scale-95 invisible
                                group-hover:opacity-100 group-hover:scale-100 group-hover:visible
                                transition-all duration-200">

                        <a href="{{ route('galeri.foto') }}" class="block px-4 py-3 hover:bg-gray-100">
                            📷 Galeri Foto
                        </a>

                        <a href="{{ route('galeri.video') }}" class="block px-4 py-3 hover:bg-gray-100">
                            🎥 Galeri Video
                        </a>
                    </div>
                </li>

                <li><a href="{{ route('tentang') }}" class="hover:text-blue-400">Tentang</a></li>

                @if (session('user'))
                    <li class="relative">
                        <button id="profile-btn">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                                {{ strtoupper(substr(session('user.nama'), 0, 1)) }}
                            </div>
                        </button>

                        <div id="dropdown-menu"
                            class="hidden absolute right-0 mt-3 w-48 bg-white text-black rounded-xl shadow-xl">

                            <div class="px-4 py-2 border-b font-semibold">
                                {{ session('user.nama') }}
                            </div>

                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif

            </ul>

            <!-- HAMBURGER -->
            <div class="md:hidden">
                <button id="menu-btn">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </nav>
    </div>

    <!-- MOBILE MENU FULLSCREEN -->
    <div id="mobile-menu" class="hidden fixed inset-0 bg-[#0f172a] z-40 overflow-y-auto md:hidden">

        <ul class="flex flex-col gap-6 p-6 text-white text-lg font-semibold">

            <li><a href="/">Beranda</a></li>
            <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
            <li><a href="{{ route('berita.index') }}">Berita</a></li>

            <!-- DROPDOWN GALERI -->
            <li>
                <button id="galeri-mobile-btn" class="flex justify-between w-full">
                    Galeri
                    <span id="arrow-mobile">▼</span>
                </button>

                <ul id="galeri-mobile-menu" class="hidden flex flex-col ml-4 mt-2 gap-2 text-sm">
                    <li><a href="{{ route('galeri.foto') }}">📷 Foto</a></li>
                    <li><a href="{{ route('galeri.video') }}">🎥 Video</a></li>
                </ul>
            </li>

            <li><a href="{{ route('tentang') }}">Tentang</a></li>

            @if (session('user'))
                <li class="border-t pt-3">👤 {{ session('user.nama') }}</li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif

        </ul>
    </div>
</header>

<!-- STYLE -->
<style>
    .no-scroll {
        overflow: hidden;
        height: 100vh;
    }
</style>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        const galeriBtn = document.getElementById('galeri-mobile-btn');
        const galeriMenu = document.getElementById('galeri-mobile-menu');
        const arrow = document.getElementById('arrow-mobile');

        const profileBtn = document.getElementById('profile-btn');
        const dropdown = document.getElementById('dropdown-menu');

        // 🔥 TOGGLE MOBILE MENU + LOCK SCROLL
        menuBtn.addEventListener('click', function(e) {
            e.stopPropagation();

            mobileMenu.classList.toggle('hidden');

            if (!mobileMenu.classList.contains('hidden')) {
                document.body.classList.add('no-scroll');
            } else {
                document.body.classList.remove('no-scroll');
            }
        });

        // 🔥 DROPDOWN GALERI MOBILE
        if (galeriBtn) {
            galeriBtn.addEventListener('click', function() {
                galeriMenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        }

        // 🔥 PROFILE DROPDOWN
        if (profileBtn) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
            });
        }

        // 🔥 CLICK OUTSIDE
        document.addEventListener('click', function(e) {

            if (mobileMenu && !mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                document.body.classList.remove('no-scroll');
            }

            if (dropdown && !profileBtn?.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

    });
</script>
