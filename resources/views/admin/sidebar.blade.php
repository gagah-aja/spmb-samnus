<div class="sidebar">

    <div>
        <!-- BRAND -->
        <div class="brand">
            <div class="logo">S</div>
            <h3>SPMB Admin</h3>
        </div>

        <!-- MENU -->
        <div class="menu">

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>

            <a href="{{ route('admin.data-pendaftar') }}"
               class="{{ request()->routeIs('admin.data-pendaftar*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Data Pendaftar
            </a>

            <a href="{{ route('admin.daftar-lanjutan.index') }}"
               class="{{ request()->routeIs('admin.daftar-lanjutan*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i> Daftar Lanjutan
            </a>

            <a href="{{ route('admin.verifikasi') }}"
               class="{{ request()->routeIs('admin.verifikasi*') ? 'active' : '' }}">
                <i class="fas fa-check-circle"></i> Verifikasi
            </a>

            <a href="{{ route('admin.pengumuman') }}"
               class="{{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">
                <i class="fas fa-bullhorn"></i> Pengumuman
            </a>

            <!-- DROPDOWN BERITA -->
            <div class="menu-dropdown 
                {{ request()->routeIs('admin.berita*') || request()->routeIs('admin.kategori-berita*') ? 'open' : '' }}">

                <div class="menu-dropdown-toggle">
                    <span><i class="fas fa-newspaper"></i> Berita</span>
                    <i class="fas fa-chevron-down arrow"></i>
                </div>

                <div class="menu-dropdown-content">
                    <a href="{{ route('admin.berita.index') }}"
                       class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Daftar Berita
                    </a>

                    <a href="{{ route('admin.kategori-berita.index') }}"
                       class="{{ request()->routeIs('admin.kategori-berita*') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i> Kategori
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.pengaturan') }}"
               class="{{ request()->routeIs('admin.pengaturan*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Pengaturan
            </a>

        </div>
    </div>

    <!-- BOTTOM -->
    <div class="bottom">
        <p>Admin Mode</p>
        <a href="{{ route('logout') }}" class="logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

</div>