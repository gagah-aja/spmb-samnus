<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Portal</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f1f5f9;
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
            align-items: stretch;
        }

        /* Sidebar tidak tenggelam — override apapun class yang dipakai sidebar */
        .container>*:first-child,
        .sidebar,
        [class*="sidebar"],
        nav.sidebar,
        aside {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            flex-shrink: 0;
        }

        .main {
            flex: 1;
            padding: 30px;
            min-width: 0;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }

        .page-header p {
            color: #64748b;
            margin-top: 4px;
        }

        /* TABS */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 9px 20px;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            background: white;
            cursor: pointer;
            font-weight: 600;
            color: #64748b;
            transition: all .2s;
            font-size: 14px;
        }

        .tab-btn.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .tab-btn:hover:not(.active) {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .07);
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* FORM */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full {
            grid-column: 1/-1;
        }

        label {
            font-weight: 600;
            font-size: 13px;
            color: #374151;
        }

        input[type="text"],
        textarea,
        select {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            font-size: 14px;
            transition: border .2s;
            outline: none;
            width: 100%;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        /* TABLE */
        .tbl {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .tbl th {
            background: #f8fafc;
            padding: 10px 14px;
            text-align: left;
            font-weight: 700;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }

        .tbl td {
            padding: 10px 14px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .tbl tr:hover td {
            background: #fafafa;
        }

        /* BADGE ICON */
        .icon-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #3b82f6;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all .2s;
        }

        .btn-blue {
            background: #3b82f6;
            color: white;
        }

        .btn-blue:hover {
            background: #2563eb;
        }

        .btn-green {
            background: #22c55e;
            color: white;
        }

        .btn-green:hover {
            background: #16a34a;
        }

        .btn-red {
            background: #ef4444;
            color: white;
        }

        .btn-red:hover {
            background: #dc2626;
        }

        .btn-yellow {
            background: #f59e0b;
            color: white;
        }

        .btn-yellow:hover {
            background: #d97706;
        }

        .btn-save {
            padding: 11px 28px;
            font-size: 15px;
        }

        /* INLINE EDIT */
        .inline-edit {
            display: none;
            background: #eff6ff;
            border-radius: 10px;
            padding: 16px;
            margin-top: 8px;
        }

        .inline-edit.show {
            display: block;
        }

        /* ALERT */
        .alert-success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 12px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        /* ===== MODAL ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            background: white;
            border-radius: 16px;
            width: 100%;
            max-width: 560px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
            animation: modalIn .25s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px 16px;
            border-bottom: 2px solid #f1f5f9;
        }

        .modal-header h3 {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-close {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: none;
            background: #f1f5f9;
            color: #64748b;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
        }

        .modal-close:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 16px 24px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 2px solid #f1f5f9;
        }

        .btn-outline {
            background: white;
            color: #64748b;
            border: 2px solid #e2e8f0;
        }

        .btn-outline:hover {
            border-color: #94a3b8;
            color: #374151;
        }

        /* Toolbar di atas tabel */
        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .table-toolbar .card-title {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        /* ===== PAGINATION ===== */
        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0 0;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pagination-info {
            font-size: 13px;
            color: #64748b;
        }

        .pagination {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .page-btn {
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            background: white;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
        }

        .page-btn:hover:not(:disabled):not(.active) {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .page-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .page-btn:disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* Dynamic list (menu/info footer) */
        .dynamic-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .dynamic-section-header label {
            margin: 0;
        }

        .dynamic-list-header {
            display: grid;
            grid-template-columns: 36px 1fr 1fr 36px;
            gap: 8px;
            padding: 6px 10px;
            background: #f8fafc;
            border-radius: 8px 8px 0 0;
            border: 1.5px solid #e2e8f0;
            border-bottom: none;
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .dynamic-list-header .col-no {
            text-align: center;
        }

        .dynamic-row {
            display: grid;
            grid-template-columns: 36px 1fr 1fr 36px;
            gap: 8px;
            align-items: center;
            padding: 8px 10px;
            border: 1.5px solid #e2e8f0;
            border-top: none;
            background: white;
            transition: background .15s;
        }

        .dynamic-row:last-child {
            border-radius: 0 0 8px 8px;
        }

        .dynamic-row:hover {
            background: #f8fafc;
        }

        .dynamic-row input {
            border-radius: 6px;
            padding: 7px 10px;
            font-size: 13px;
        }

        .row-no {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            background: #eff6ff;
            color: #3b82f6;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .btn-del-row {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            border: none;
            background: #fee2e2;
            color: #ef4444;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            flex-shrink: 0;
        }

        .btn-del-row:hover {
            background: #ef4444;
            color: white;
        }

        .dynamic-empty {
            padding: 18px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            border: 1.5px dashed #cbd5e1;
            border-radius: 8px;
            background: #f8fafc;
        }

        .dynamic-empty i {
            margin-right: 6px;
        }

        /* hide row by pagination */
        .tbl tbody tr.hidden-row {
            display: none;
        }

        @media(max-width:640px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')

        <div class="main">
            <div class="page-header">
                <h1><i class="fas fa-globe" style="color:#3b82f6"></i> Pengaturan Portal</h1>
                <p>Kelola tampilan dan konten halaman landing sekolah</p>
            </div>

            @if (session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- TABS -->
            <div class="tabs">
                <button class="tab-btn active" onclick="switchTab('hero',this)">
                    <i class="fas fa-image"></i> Hero
                </button>
                <button class="tab-btn" onclick="switchTab('navbar',this)">
                    <i class="fas fa-bars"></i> Navbar
                </button>
                <button class="tab-btn" onclick="switchTab('jurusan',this)">
                    <i class="fas fa-graduation-cap"></i> Jurusan
                </button>
                <button class="tab-btn" onclick="switchTab('footer',this)">
                    <i class="fas fa-shoe-prints"></i> Footer
                </button>
                <button class="tab-btn" onclick="switchTab('tentang',this)">
                    <i class="fas fa-school"></i> Tentang
                </button>
            </div>

            {{-- ===== HERO ===== --}}
            <div class="tab-panel active" id="tab-hero">
                <form action="{{ route('admin.pengaturan.hero') }}" method="POST">
                    @csrf @method('PUT')
                    <div class="card">
                        <div class="card-title">
                            <i class="fas fa-image" style="color:#3b82f6"></i> Teks Hero / Banner
                        </div>
                        <div class="form-grid">
                            <div class="form-group full">
                                <label>Judul Hero</label>
                                <input type="text" name="hero_judul"
                                    value="{{ $data['hero_judul'] ?? 'Selamat Datang di SPMB' }}">
                            </div>
                            <div class="form-group full">
                                <label>Sub Judul Hero</label>
                                <input type="text" name="hero_subjudul"
                                    value="{{ $data['hero_subjudul'] ?? 'Pendaftaran Siswa Baru SMK Samudra Nusantara' }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-blue btn-save">
                        <i class="fas fa-save"></i> Simpan Hero
                    </button>
                </form>
            </div>

            {{-- ===== NAVBAR ===== --}}
            <div class="tab-panel" id="tab-navbar">
                <form action="{{ route('admin.pengaturan.navbar') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-title">
                            <i class="fas fa-bars" style="color:#3b82f6"></i>
                            Nama Menu Navbar
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>Menu Beranda</label>
                                <input type="text" name="nav_beranda"
                                    value="{{ $data['nav_beranda'] ?? 'Beranda' }}">
                            </div>

                            <div class="form-group">
                                <label>Menu Jurusan</label>
                                <input type="text" name="nav_jurusan"
                                    value="{{ $data['nav_jurusan'] ?? 'Jurusan' }}">
                            </div>

                            <div class="form-group">
                                <label>Menu Berita</label>
                                <input type="text" name="nav_berita" value="{{ $data['nav_berita'] ?? 'Berita' }}">
                            </div>

                            <div class="form-group">
                                <label>Menu Galeri</label>
                                <input type="text" name="nav_galeri" value="{{ $data['nav_galeri'] ?? 'Galeri' }}">
                            </div>

                            <div class="form-group">
                                <label>Menu Tentang</label>
                                <input type="text" name="nav_tentang"
                                    value="{{ $data['nav_tentang'] ?? 'Tentang Sekolah' }}">
                            </div>
                        </div>
                    </div>

                    <!-- ✅ TOMBOL SIMPAN -->
                    <button type="submit" class="btn btn-blue btn-save">
                        <i class="fas fa-save"></i> Simpan Navbar
                    </button>
                </form>
            </div>

            {{-- ===== JURUSAN ===== --}}
            <div class="tab-panel" id="tab-jurusan">

                <!-- Daftar Jurusan -->
                <div class="card">
                    <div class="table-toolbar">
                        <div class="card-title" style="margin:0;border:none;padding:0">
                            <i class="fas fa-list" style="color:#3b82f6"></i>
                            Daftar Jurusan ({{ $jurusans->count() }} jurusan)
                        </div>
                        <button class="btn btn-green" onclick="openModal()">
                            <i class="fas fa-plus"></i> Tambah Jurusan
                        </button>
                    </div>

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Nama Jurusan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jurusans as $jurusan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="icon-badge">
                                            <i class="fas {{ $jurusan->icon }}"></i>
                                            {{ $jurusan->icon }}
                                        </span>
                                    </td>
                                    <td><strong>{{ $jurusan->nama }}</strong></td>
                                    <td style="color:#64748b;max-width:250px">
                                        {{ Str::limit($jurusan->deskripsi, 60) }}
                                    </td>
                                    <td style="display:flex;gap:6px">
                                        <button class="btn btn-yellow"
                                            onclick="toggleEdit('jurusan-{{ $jurusan->id }}')">
                                            <i class="fas fa-pen"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.pengaturan.jurusan.destroy', $jurusan->id) }}"
                                            method="POST" class="form-delete-jurusan"
                                            data-nama="{{ $jurusan->nama }}">
                                            @csrf @method('DELETE')

                                            <button type="button" class="btn btn-red btn-hapus-jurusan">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding:0 14px">
                                        <div id="jurusan-{{ $jurusan->id }}" class="inline-edit">
                                            <form
                                                action="{{ route('admin.pengaturan.jurusan.update', $jurusan->id) }}"
                                                method="POST">
                                                @csrf @method('PUT')
                                                <div class="form-grid">
                                                    <div class="form-group">
                                                        <label>Nama Jurusan</label>
                                                        <input type="text" name="nama"
                                                            value="{{ $jurusan->nama }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon FontAwesome</label>
                                                        <div style="display:flex;gap:8px;align-items:center">
                                                            <input type="text" name="icon"
                                                                value="{{ $jurusan->icon }}"
                                                                id="iconEdit{{ $jurusan->id }}"
                                                                oninput="updateIconPreviewEdit({{ $jurusan->id }}, this.value)">
                                                            <span id="iconPreviewEdit{{ $jurusan->id }}"
                                                                style="font-size:22px;color:#3b82f6;min-width:28px">
                                                                <i class="fas {{ $jurusan->icon }}"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group full">
                                                        <label>Deskripsi</label>
                                                        <textarea name="deskripsi">{{ $jurusan->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-blue" style="margin-top:12px">
                                                    <i class="fas fa-save"></i> Simpan
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;color:#94a3b8;padding:40px 20px">
                                        <i class="fas fa-graduation-cap"
                                            style="font-size:32px;margin-bottom:10px;display:block;opacity:.3"></i>
                                        Belum ada jurusan. Klik <strong>Tambah Jurusan</strong> untuk menambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination Jurusan -->
                    <div class="pagination-wrap" id="paginationWrap">
                        <div class="pagination-info" id="paginationInfo"></div>
                        <div class="pagination" id="paginationBtns"></div>
                    </div>
                </div>
            </div>

            {{-- ===== FOOTER ===== --}}
            @php
                $menus = json_decode($data['footer_menu'] ?? '[]', true);
                $infos = json_decode($data['footer_info'] ?? '[]', true);
            @endphp

            <div class="tab-panel" id="tab-footer">
                <form action="{{ route('admin.pengaturan.footer') }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="card">
                        <div class="card-title">Pengaturan Footer</div>

                        <div class="form-grid">

                            <div class="form-group full">
                                <label>Nama Sekolah</label>
                                <input type="text" name="footer_nama" value="{{ $data['footer_nama'] ?? '' }}">
                            </div>

                            <div class="form-group full">
                                <label>Deskripsi</label>
                                <textarea name="footer_deskripsi">{{ $data['footer_deskripsi'] ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="footer_alamat"
                                    value="{{ $data['footer_alamat'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="footer_email" value="{{ $data['footer_email'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="footer_telepon"
                                    value="{{ $data['footer_telepon'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>YouTube</label>
                                <input type="text" name="footer_youtube"
                                    value="{{ $data['footer_youtube'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="footer_instagram"
                                    value="{{ $data['footer_instagram'] ?? '' }}">
                            </div>

                            <div class="form-group full">
                                <label>Logo Footer</label>
                                <input type="file" name="footer_logo">
                            </div>

                            <!-- MENU DINAMIS -->
                            <div class="form-group full">
                                <div class="dynamic-section-header">
                                    <label><i class="fas fa-list-ul" style="color:#3b82f6"></i> Menu Footer</label>
                                    <button type="button" onclick="addMenu()" class="btn btn-green btn-sm">
                                        <i class="fas fa-plus"></i> Tambah Menu
                                    </button>
                                </div>

                                <div class="dynamic-list-header">
                                    <span class="col-no">#</span>
                                    <span class="col-label">Nama Menu</span>
                                    <span class="col-link">Link / URL</span>
                                    <span class="col-act"></span>
                                </div>

                                <div id="menu-wrapper">
                                    @forelse ($menus as $i => $menu)
                                        <div class="dynamic-row" data-type="menu">
                                            <span class="row-no">{{ $i + 1 }}</span>
                                            <input type="text" name="menu[{{ $i }}][label]"
                                                value="{{ $menu['label'] }}" placeholder="cth: Beranda">
                                            <input type="text" name="menu[{{ $i }}][link]"
                                                value="{{ $menu['link'] }}" placeholder="cth: /#beranda">
                                            <button type="button" class="btn-del-row"
                                                onclick="removeRow(this, 'menu')" title="Hapus">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @empty
                                        <div class="dynamic-empty" id="menu-empty">
                                            <i class="fas fa-inbox"></i> Belum ada menu. Klik tombol di atas untuk
                                            menambahkan.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <!-- INFO DINAMIS -->
                            <div class="form-group full">
                                <div class="dynamic-section-header">
                                    <label><i class="fas fa-info-circle" style="color:#3b82f6"></i> Informasi
                                        Footer</label>
                                    <button type="button" onclick="addInfo()" class="btn btn-green btn-sm">
                                        <i class="fas fa-plus"></i> Tambah Informasi
                                    </button>
                                </div>

                                <div class="dynamic-list-header">
                                    <span class="col-no">#</span>
                                    <span class="col-label">Keterangan</span>
                                    <span class="col-link">Link / URL</span>
                                    <span class="col-act"></span>
                                </div>

                                <div id="info-wrapper">
                                    @forelse ($infos as $i => $info)
                                        <div class="dynamic-row" data-type="info">
                                            <span class="row-no">{{ $i + 1 }}</span>
                                            <input type="text" name="info[{{ $i }}][label]"
                                                value="{{ $info['label'] }}" placeholder="cth: Alamat">
                                            <input type="text" name="info[{{ $i }}][link]"
                                                value="{{ $info['link'] }}" placeholder="cth: https://...">
                                            <button type="button" class="btn-del-row"
                                                onclick="removeRow(this, 'info')" title="Hapus">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @empty
                                        <div class="dynamic-empty" id="info-empty">
                                            <i class="fas fa-inbox"></i> Belum ada informasi. Klik tombol di atas untuk
                                            menambahkan.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="form-group full">
                                <label>Google Maps Embed</label>
                                <textarea name="footer_maps">{{ $data['footer_maps'] ?? '' }}</textarea>
                            </div>

                            <div class="form-group full">
                                <label>Copyright</label>
                                <input type="text" name="footer_copyright"
                                    value="{{ $data['footer_copyright'] ?? '' }}">
                            </div>

                        </div>
                    </div>

                    <button class="btn btn-blue btn-save">Simpan Footer</button>
                </form>
            </div>

            {{-- ===== TENTANG ===== --}}
            <div class="tab-panel" id="tab-tentang">
                <form action="{{ route('admin.pengaturan.tentang') }}" method="POST">
                    @csrf @method('PUT')
                    <div class="card">
                        <div class="card-title">
                            <i class="fas fa-school" style="color:#3b82f6"></i> Halaman Tentang Sekolah
                        </div>
                        <div class="form-grid">
                            <div class="form-group full">
                                <label>Judul Halaman</label>
                                <input type="text" name="tentang_judul"
                                    value="{{ $data['tentang_judul'] ?? 'Tentang SMK Samudra Nusantara' }}">
                            </div>
                            <div class="form-group full">
                                <label>Deskripsi / Sejarah Singkat</label>
                                <textarea name="tentang_isi">{{ $data['tentang_isi'] ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea name="tentang_visi">{{ $data['tentang_visi'] ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Misi</label>
                                <textarea name="tentang_misi">{{ $data['tentang_misi'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-blue btn-save">
                        <i class="fas fa-save"></i> Simpan Tentang
                    </button>
                </form>
            </div>

        </div>
    </div>

    <!-- ===== MODAL TAMBAH JURUSAN ===== -->
    <div class="modal-overlay" id="modalTambahJurusan" onclick="closeModalOutside(event)">
        <div class="modal">
            <div class="modal-header">
                <h3>
                    <i class="fas fa-plus-circle" style="color:#22c55e"></i>
                    Tambah Jurusan Baru
                </h3>
                <button class="modal-close" onclick="closeModal()" title="Tutup">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{ route('admin.pengaturan.jurusan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input type="text" name="nama" placeholder="cth: Teknik Komputer" required>
                        </div>
                        <div class="form-group">
                            <label>Icon FontAwesome</label>
                            <div style="display:flex;gap:8px;align-items:center">
                                <input type="text" name="icon" id="iconInput" placeholder="fa-graduation-cap"
                                    oninput="updateIconPreview(this.value)">
                                <span id="iconPreview" style="font-size:22px;color:#3b82f6;min-width:28px">
                                    <i class="fas fa-graduation-cap"></i>
                                </span>
                            </div>
                            <small style="color:#94a3b8">
                                Cari icon di
                                <a href="https://fontawesome.com/icons" target="_blank"
                                    style="color:#3b82f6">fontawesome.com</a>
                            </small>
                        </div>
                        <div class="form-group full">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" placeholder="Deskripsi jurusan..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeModal()">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-green">
                        <i class="fas fa-plus"></i> Tambah Jurusan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // TABS
        function switchTab(name, btn) {
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('tab-' + name).classList.add('active');
            btn.classList.add('active');
        }

        // Buka tab dari sidebar
        const savedTab = localStorage.getItem('pgTab');
        if (savedTab) {
            const btn = document.querySelector(`.tab-btn[onclick*="${savedTab}"]`);
            if (btn) switchTab(savedTab, btn);
            localStorage.removeItem('pgTab');
        }

        // TOGGLE INLINE EDIT
        function toggleEdit(id) {
            const el = document.getElementById(id);
            el.classList.toggle('show');
        }

        // ICON PREVIEW (tambah baru)
        function updateIconPreview(val) {
            const icon = val.startsWith('fa-') ? val : 'fa-graduation-cap';
            document.getElementById('iconPreview').innerHTML = `<i class="fas ${icon}"></i>`;
        }

        // ICON PREVIEW (edit)
        function updateIconPreviewEdit(id, val) {
            const icon = val.startsWith('fa-') ? val : 'fa-graduation-cap';
            document.getElementById('iconPreviewEdit' + id).innerHTML = `<i class="fas ${icon}"></i>`;
        }

        // ===== MODAL =====
        function openModal() {
            document.getElementById('modalTambahJurusan').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modalTambahJurusan').classList.remove('show');
            document.body.style.overflow = '';
        }

        function closeModalOutside(e) {
            if (e.target === document.getElementById('modalTambahJurusan')) closeModal();
        }

        // ===== PAGINATION JURUSAN =====
        // Setiap jurusan punya 2 row: row data + row inline-edit
        // Pagination hanya menyembunyikan pasangan row data + edit
        const PER_PAGE = 5;
        let currentPage = 1;

        function initPagination() {
            const tbody = document.querySelector('.tbl tbody');
            if (!tbody) return;

            // Kumpulkan pasangan row (data + inline-edit)
            const allRows = Array.from(tbody.querySelectorAll('tr'));
            const pairs = [];
            for (let i = 0; i < allRows.length; i += 2) {
                if (allRows[i] && allRows[i + 1]) {
                    pairs.push([allRows[i], allRows[i + 1]]);
                } else if (allRows[i]) {
                    // baris empty state
                    pairs.push([allRows[i]]);
                }
            }

            // Jika hanya 1 row (empty state), sembunyikan pagination
            if (pairs.length <= 1 && pairs[0]?.length === 1) {
                document.getElementById('paginationWrap').style.display = 'none';
                return;
            }

            const totalPages = Math.ceil(pairs.length / PER_PAGE);

            function render(page) {
                currentPage = page;
                const start = (page - 1) * PER_PAGE;
                const end = start + PER_PAGE;

                pairs.forEach((pair, idx) => {
                    const show = idx >= start && idx < end;
                    pair.forEach(row => {
                        if (show) row.classList.remove('hidden-row');
                        else row.classList.add('hidden-row');
                    });
                });

                // Info
                const from = start + 1;
                const to = Math.min(end, pairs.length);
                document.getElementById('paginationInfo').textContent =
                    `Menampilkan ${from}–${to} dari ${pairs.length} jurusan`;

                // Tombol
                const btnWrap = document.getElementById('paginationBtns');
                btnWrap.innerHTML = '';

                // Prev
                const prev = document.createElement('button');
                prev.className = 'page-btn';
                prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
                prev.disabled = page === 1;
                prev.onclick = () => render(page - 1);
                btnWrap.appendChild(prev);

                // Angka halaman
                for (let p = 1; p <= totalPages; p++) {
                    // Tampilkan: hal pertama, terakhir, dan sekitar current
                    if (p === 1 || p === totalPages || (p >= page - 1 && p <= page + 1)) {
                        const btn = document.createElement('button');
                        btn.className = 'page-btn' + (p === page ? ' active' : '');
                        btn.textContent = p;
                        btn.onclick = ((_p) => () => render(_p))(p);
                        btnWrap.appendChild(btn);
                    } else if (p === page - 2 || p === page + 2) {
                        const dots = document.createElement('span');
                        dots.textContent = '…';
                        dots.style.cssText = 'padding:0 4px;color:#94a3b8;font-size:14px';
                        btnWrap.appendChild(dots);
                    }
                }

                // Next
                const next = document.createElement('button');
                next.className = 'page-btn';
                next.innerHTML = '<i class="fas fa-chevron-right"></i>';
                next.disabled = page === totalPages;
                next.onclick = () => render(page + 1);
                btnWrap.appendChild(next);
            }

            // Sembunyikan wrap kalau data <= PER_PAGE
            if (pairs.length <= PER_PAGE) {
                document.getElementById('paginationWrap').style.display = 'none';
            } else {
                render(1);
            }
        }

        // Tutup modal dengan tombol Escape
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeModal();
        });

        document.addEventListener('DOMContentLoaded', initPagination);

        // ===== DYNAMIC MENU / INFO FOOTER =====

        function renumber(wrapperId) {
            const rows = document.querySelectorAll(`#${wrapperId} .dynamic-row`);
            rows.forEach((row, idx) => {
                // Update nomor tampilan
                const noEl = row.querySelector('.row-no');
                if (noEl) noEl.textContent = idx + 1;

                // Update name attribute input agar index berurutan
                const type = row.dataset.type;
                row.querySelectorAll('input').forEach(inp => {
                    inp.name = inp.name.replace(/\[\d+\]/, `[${idx}]`);
                });
            });
        }

        function removeEmpty(wrapperId, emptyId) {
            const empty = document.getElementById(emptyId);
            if (empty) empty.remove();
        }

        function checkEmpty(wrapperId, emptyMsg, type) {
            const wrapper = document.getElementById(wrapperId);
            if (wrapper.querySelectorAll('.dynamic-row').length === 0) {
                if (!document.getElementById(`${wrapperId}-empty-msg`)) {
                    const div = document.createElement('div');
                    div.className = 'dynamic-empty';
                    div.id = `${wrapperId}-empty-msg`;
                    div.innerHTML = `<i class="fas fa-inbox"></i> ${emptyMsg}`;
                    wrapper.appendChild(div);
                }
            }
        }

        function addMenu() {
            const wrapper = document.getElementById('menu-wrapper');
            removeEmpty('menu-wrapper', 'menu-empty');
            const emptyMsg = wrapper.querySelector('.dynamic-empty');
            if (emptyMsg) emptyMsg.remove();

            const idx = wrapper.querySelectorAll('.dynamic-row').length;
            const row = document.createElement('div');
            row.className = 'dynamic-row';
            row.dataset.type = 'menu';
            row.innerHTML = `
                <span class="row-no">${idx + 1}</span>
                <input type="text" name="menu[${idx}][label]" placeholder="cth: Beranda">
                <input type="text" name="menu[${idx}][link]" placeholder="cth: /#beranda">
                <button type="button" class="btn-del-row" onclick="removeRow(this,'menu')" title="Hapus">
                    <i class="fas fa-times"></i>
                </button>`;
            wrapper.appendChild(row);
            row.querySelector('input').focus();
        }

        function addInfo() {
            const wrapper = document.getElementById('info-wrapper');
            const emptyMsg = wrapper.querySelector('.dynamic-empty');
            if (emptyMsg) emptyMsg.remove();

            const idx = wrapper.querySelectorAll('.dynamic-row').length;
            const row = document.createElement('div');
            row.className = 'dynamic-row';
            row.dataset.type = 'info';
            row.innerHTML = `
                <span class="row-no">${idx + 1}</span>
                <input type="text" name="info[${idx}][label]" placeholder="cth: Alamat">
                <input type="text" name="info[${idx}][link]" placeholder="cth: https://...">
                <button type="button" class="btn-del-row" onclick="removeRow(this,'info')" title="Hapus">
                    <i class="fas fa-times"></i>
                </button>`;
            wrapper.appendChild(row);
            row.querySelector('input').focus();
        }

        function removeRow(btn, type) {
            const row = btn.closest('.dynamic-row');
            const wrapperId = type === 'menu' ? 'menu-wrapper' : 'info-wrapper';
            row.remove();
            renumber(wrapperId);
            checkEmpty(wrapperId,
                type === 'menu' ?
                'Belum ada menu. Klik tombol di atas untuk menambahkan.' :
                'Belum ada informasi. Klik tombol di atas untuk menambahkan.',
                type
            );
        }
        document.querySelectorAll('.btn-hapus-jurusan').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('.form-delete-jurusan');
                const nama = form.getAttribute('data-nama');

                Swal.fire({
                    title: 'Yakin hapus?',
                    text: `Data tidak bisa dikembalikan!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>

</html>
