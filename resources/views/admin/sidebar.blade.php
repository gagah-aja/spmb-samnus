<div class="sidebar flex flex-col justify-between h-screen p-4">

    <!-- TOP -->
    <div>

        <!-- BRAND -->
        <div class="brand flex items-center gap-3 mb-6">
            <div class="logo w-10 h-10 flex items-center justify-center rounded-lg bg-gray-200 font-bold text-lg">
                S
            </div>
            <span class="text-lg font-semibold">SPMB Admin</span>
        </div>

        <!-- MENU -->
        <div class="menu-title text-xs uppercase text-gray-400 mb-2 tracking-wider">
            Menu Utama
        </div>

        <div class="nav space-y-2">

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 p-3 rounded-lg transition duration-200 hover:bg-gray-100 
                {{ request()->routeIs('admin.dashboard') ? 'active bg-gray-100 font-semibold' : '' }}">
                
                <div class="icon text-lg">🏠</div>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.data-pendaftar') }}"
                class="flex items-center gap-3 p-3 rounded-lg transition duration-200 hover:bg-gray-100 
                {{ request()->routeIs('admin.data-pendaftar*') ? 'active bg-gray-100 font-semibold' : '' }}">
                
                <div class="icon text-lg">👨‍🎓</div>
                <span>Data Pendaftar</span>
            </a>

            <a href="{{ route('admin.verifikasi') }}"
                class="flex items-center gap-3 p-3 rounded-lg transition duration-200 hover:bg-gray-100 
                {{ request()->routeIs('admin.verifikasi*') ? 'active bg-gray-100 font-semibold' : '' }}">
                
                <div class="icon text-lg">✅</div>
                <span>Verifikasi</span>
            </a>

            <a href="{{ route('admin.pengumuman') }}"
                class="flex items-center gap-3 p-3 rounded-lg transition duration-200 hover:bg-gray-100 
                {{ request()->routeIs('admin.pengumuman*') ? 'active bg-gray-100 font-semibold' : '' }}">
                
                <div class="icon text-lg">📢</div>
                <span>Pengumuman</span>
            </a>

            <a href="{{ route('admin.pengaturan') }}"
                class="flex items-center gap-3 p-3 rounded-lg transition duration-200 hover:bg-gray-100 
                {{ request()->routeIs('admin.pengaturan*') ? 'active bg-gray-100 font-semibold' : '' }}">
                
                <div class="icon text-lg">⚙️</div>
                <span>Pengaturan</span>
            </a>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="sidebar-footer pt-4 border-t mt-4">

        <div class="profile flex items-center gap-3 mb-3">
            <div class="avatar w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 font-bold">
                A
            </div>
            <div>
                <div class="name text-sm font-semibold">Admin</div>
                <div class="status text-xs text-green-500">● Online</div>
            </div>
        </div>

        <a href="{{ route('logout') }}"
            class="logout block text-center p-2 rounded-lg transition duration-200 hover:bg-red-100 hover:text-red-500">
            Logout
        </a>

    </div>

</div>