<div class="sidebar">
    <div>
        <div class="brand">
            <div class="logo">S</div>
            <h3>SPMB Admin</h3>
        </div>
        <div class="menu">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('admin.data-pendaftar') }}"
                class="{{ request()->routeIs('admin.data-pendaftar*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Data Pendaftar
            </a>
            <a href="{{ route('admin.verifikasi') }}"
                class="{{ request()->routeIs('admin.verifikasi*') ? 'active' : '' }}">
                <i class="fas fa-check-circle"></i> Verifikasi
            </a>
            <a href="{{ route('admin.pengumuman') }}"
                class="{{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">
                <i class="fas fa-bullhorn"></i> Pengumuman
            </a>
            <a href="{{ route('admin.pengaturan') }}"
                class="{{ request()->routeIs('admin.pengaturan*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="bottom">
        <p>Admin Mode</p>
        <a href="{{ route('logout') }}" class="logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>