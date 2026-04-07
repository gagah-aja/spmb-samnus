<header class="bg-[#0f172a] text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">

        <!-- LOGO -->
        <div class="flex items-center">
            <img src="{{ asset('img/samnus.png') }}" alt="Logo SMK" class="w-12 mr-3">
            <h1 class="text-xl md:text-2xl font-bold">SMK Samudra Nusantara</h1>
        </div>

        <nav>
            <!-- DESKTOP MENU -->
            <ul class="hidden md:flex gap-8 text-lg font-semibold items-center">

                <li><a href="#beranda" class="hover:text-blue-400 transition">Beranda</a></li>
                <li><a href="#jurusan" class="hover:text-blue-400 transition">Jurusan</a></li>

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

            <li><a href="#beranda" class="hover:text-blue-400 transition">Beranda</a></li>
            <li><a href="#jurusan" class="hover:text-blue-400 transition">Jurusan</a></li>

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
    // DROPDOWN PROFILE
    const profileBtn = document.getElementById('profile-btn');
    const dropdown = document.getElementById('dropdown-menu');

    if (profileBtn) {
        profileBtn.addEventListener('click', function() {
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    }

    // MOBILE MENU
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
</script>
