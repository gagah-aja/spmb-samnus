<style>
    .menu-dropdown .menu-dropdown-content {
        display: none;
    }

    /* OPEN SAAT HOVER */
    .menu-dropdown:hover .menu-dropdown-content {
        display: block;
    }

    .menu-dropdown .arrow {
        transition: 0.3s;
    }

    .menu-dropdown:hover .arrow {
        transform: rotate(180deg);
    }

    .menu-dropdown-toggle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        color: #94a3b8;
        font-weight: 500;
        transition: all 0.2s;
        user-select: none;
    }

    .menu-dropdown-toggle:hover {
        background: rgba(255, 255, 255, 0.08);
        color: white;
    }

    .menu-dropdown:hover .menu-dropdown-toggle {
        color: white;
        background: rgba(255, 255, 255, 0.06);
    }

    /* ACTIVE (kalau dari route Laravel) */
    .menu-dropdown.open .menu-dropdown-content {
        display: block;
    }

    .menu-dropdown.open .arrow {
        transform: rotate(180deg);
    }

    .menu-dropdown.open .menu-dropdown-toggle {
        color: white;
        background: rgba(255, 255, 255, 0.06);
    }

    .menu-dropdown-content {
        padding-left: 12px;
        margin-top: 2px;
    }

    .menu-dropdown-content a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 8px;
        color: #94a3b8;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s;
        margin-bottom: 2px;
        border-left: 2px solid transparent;
    }

    .menu-dropdown-content a:hover {
        background: rgba(255, 255, 255, 0.07);
        color: white;
    }

    .menu-dropdown-content a.active {
        background: rgba(59, 130, 246, 0.15);
        color: #60a5fa;
        border-left-color: #3b82f6;
    }
</style>

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
            <div class="menu-dropdown {{ request()->routeIs('admin.berita*') || request()->routeIs('admin.kategori-berita*') ? 'open' : '' }}">
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

            <!-- DROPDOWN GALERI -->
            <div class="menu-dropdown {{ request()->routeIs('admin.galeri*') ? 'open' : '' }}">
                <div class="menu-dropdown-toggle">
                    <span><i class="fas fa-images"></i> Galeri</span>
                    <i class="fas fa-chevron-down arrow"></i>
                </div>
                <div class="menu-dropdown-content">
                    <a href="{{ route('admin.galeri.foto.index') }}"
                        class="{{ request()->routeIs('admin.galeri.foto*') ? 'active' : '' }}">
                        <i class="fas fa-camera"></i> Foto
                    </a>
                    <a href="{{ route('admin.galeri.video.index') }}"
                        class="{{ request()->routeIs('admin.galeri.video*') ? 'active' : '' }}">
                        <i class="fas fa-video"></i> Video
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