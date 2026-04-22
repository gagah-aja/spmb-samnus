<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Galeri Video - Admin</title>
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

        .container>*:first-child,
        .sidebar,
        [class*="sidebar"],
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

        /* HEADER */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .page-header-left h1 {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-header-left p {
            color: #64748b;
            margin-top: 4px;
            font-size: 14px;
        }

        /* STATS */
        .stats {
            display: flex;
            gap: 14px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .stat {
            background: white;
            border-radius: 12px;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06);
            flex: 1;
            min-width: 140px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .stat-icon.purple {
            background: #f5f3ff;
            color: #8b5cf6;
        }

        .stat-icon.green {
            background: #f0fdf4;
            color: #22c55e;
        }

        .stat-text small {
            font-size: 11px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .stat-text strong {
            font-size: 22px;
            font-weight: 800;
            color: #1e293b;
            display: block;
            line-height: 1.2;
        }

        /* TOOLBAR */
        .toolbar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .toolbar-search {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .toolbar-search input {
            width: 100%;
            padding: 9px 14px 9px 38px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            font-size: 14px;
            outline: none;
            transition: border .2s;
        }

        .toolbar-search input:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px #ede9fe;
        }

        .toolbar-search i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .toolbar select {
            padding: 9px 14px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            font-size: 14px;
            outline: none;
            cursor: pointer;
            background: white;
            color: #374151;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-purple {
            background: #8b5cf6;
            color: white;
        }

        .btn-purple:hover {
            background: #7c3aed;
        }

        .btn-blue {
            background: #3b82f6;
            color: white;
        }

        .btn-blue:hover {
            background: #2563eb;
        }

        .btn-yellow {
            background: #f59e0b;
            color: white;
        }

        .btn-yellow:hover {
            background: #d97706;
        }

        .btn-red {
            background: #ef4444;
            color: white;
        }

        .btn-red:hover {
            background: #dc2626;
        }

        .btn-green {
            background: #22c55e;
            color: white;
        }

        .btn-green:hover {
            background: #16a34a;
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

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
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

        /* GRID VIDEO */
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 16px;
        }

        .video-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .07);
            transition: all .25s;
        }

        .video-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
        }

        .video-thumb {
            position: relative;
            aspect-ratio: 16/9;
            overflow: hidden;
            cursor: pointer;
            background: #0f172a;
        }

        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
            opacity: .85;
        }

        .video-card:hover .video-thumb img {
            transform: scale(1.04);
            opacity: 1;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, .2);
            transition: background .2s;
        }

        .video-thumb:hover .play-overlay {
            background: rgba(0, 0, 0, .4);
        }

        .play-btn {
            width: 52px;
            height: 52px;
            background: rgba(255, 255, 255, .92);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #ef4444;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .3);
            transition: transform .2s;
        }

        .video-thumb:hover .play-btn {
            transform: scale(1.1);
        }

        .badge-status {
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-status.aktif {
            background: rgba(34, 197, 94, .85);
            color: white;
        }

        .badge-status.nonaktif {
            background: rgba(239, 68, 68, .85);
            color: white;
        }

        .badge-yt {
            position: absolute;
            top: 8px;
            left: 8px;
            background: #ef4444;
            color: white;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .video-body {
            padding: 12px 14px;
        }

        .video-judul {
            font-weight: 700;
            font-size: 14px;
            color: #1e293b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 4px;
        }

        .video-kategori {
            display: inline-block;
            background: #f5f3ff;
            color: #8b5cf6;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .video-desc {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .video-actions {
            display: flex;
            gap: 6px;
            padding: 0 14px 12px;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty i {
            font-size: 52px;
            opacity: .25;
            display: block;
            margin-bottom: 16px;
        }

        .empty p {
            font-size: 15px;
            margin-bottom: 14px;
        }

        /* PAGINATION */
        .pg-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pg-info {
            font-size: 13px;
            color: #64748b;
        }

        .pg-links {
            display: flex;
            gap: 4px;
        }

        .pg-links a,
        .pg-links span {
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            background: white;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all .2s;
        }

        .pg-links a:hover {
            border-color: #8b5cf6;
            color: #8b5cf6;
        }

        .pg-links span.active {
            background: #8b5cf6;
            border-color: #8b5cf6;
            color: white;
        }

        .pg-links span.disabled {
            opacity: .4;
            pointer-events: none;
        }

        /* MODAL */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .5);
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
            max-width: 520px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
            animation: mIn .25s ease;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes mIn {
            from {
                opacity: 0;
                transform: translateY(-16px) scale(.97);
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
            padding: 18px 22px 14px;
            border-bottom: 2px solid #f1f5f9;
            position: sticky;
            top: 0;
            background: white;
            z-index: 1;
        }

        .modal-header h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            background: #f1f5f9;
            color: #64748b;
            font-size: 15px;
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
            padding: 22px;
        }

        .modal-footer {
            padding: 14px 22px 18px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 2px solid #f1f5f9;
        }

        /* FORM */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 14px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 13px;
            color: #374151;
        }

        .form-group input[type="text"],
        .form-group input[type="url"],
        .form-group textarea,
        .form-group select,
        .form-group input[type="number"] {
            padding: 9px 13px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            font-size: 14px;
            outline: none;
            transition: border .2s;
            width: 100%;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px #ede9fe;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        /* URL PREVIEW */
        .yt-preview-box {
            background: #0f172a;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
            aspect-ratio: 16/9;
            display: none;
        }

        .yt-preview-box iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .yt-thumb-preview {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
            display: none;
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        /* UPLOAD ZONE */
        .upload-zone {
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            padding: 18px 16px;
            text-align: center;
            cursor: pointer;
            transition: all .2s;
            background: #f8fafc;
            position: relative;
        }

        .upload-zone:hover {
            border-color: #8b5cf6;
            background: #f5f3ff;
        }

        .upload-zone i {
            font-size: 22px;
            color: #94a3b8;
            margin-bottom: 6px;
            display: block;
        }

        .upload-zone p {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }

        .upload-zone small {
            font-size: 11px;
            color: #94a3b8;
        }

        .upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        /* TOGGLE */
        .toggle-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toggle-wrap input[type="checkbox"] {
            width: 36px;
            height: 20px;
            appearance: none;
            background: #cbd5e1;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            transition: .3s;
        }

        .toggle-wrap input[type="checkbox"]:checked {
            background: #22c55e;
        }

        .toggle-wrap input[type="checkbox"]::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            background: white;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: .3s;
        }

        .toggle-wrap input[type="checkbox"]:checked::after {
            left: 19px;
        }

        /* VIDEO LIGHTBOX */
        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .93);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .lightbox.show {
            display: flex;
        }

        .lightbox-inner {
            position: relative;
            max-width: 900px;
            width: 100%;
        }

        .lightbox-close {
            position: absolute;
            top: -42px;
            right: 0;
            background: none;
            border: none;
            color: white;
            font-size: 26px;
            cursor: pointer;
            opacity: .8;
            transition: opacity .2s;
        }

        .lightbox-close:hover {
            opacity: 1;
        }

        .lightbox-frame {
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 12px;
            border: none;
        }

        .lightbox-caption {
            color: #cbd5e1;
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')

        <div class="main">

            <div class="page-header">
                <div class="page-header-left">
                    <h1><i class="fas fa-video" style="color:#8b5cf6"></i> Galeri Video</h1>
                    <p>Kelola koleksi video YouTube yang ditampilkan di halaman publik</p>
                </div>
                <button class="btn btn-purple" onclick="openAddModal()">
                    <i class="fas fa-plus"></i> Tambah Video
                </button>
            </div>

            @if (session('success'))
                <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif

            <!-- STATS -->
            <div class="stats">
                <div class="stat">
                    <div class="stat-icon purple"><i class="fas fa-film"></i></div>
                    <div class="stat-text"><small>Total Video</small><strong>{{ $totalSemua }}</strong></div>
                </div>
                <div class="stat">
                    <div class="stat-icon green"><i class="fas fa-eye"></i></div>
                    <div class="stat-text"><small>Ditampilkan</small><strong>{{ $totalAktif }}</strong></div>
                </div>
            </div>

            <!-- TOOLBAR -->
            <form method="GET" action="{{ route('admin.galeri.video.index') }}">
                <div class="toolbar">
                    <div class="toolbar-search">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" value="{{ $search }}"
                            placeholder="Cari judul video...">
                    </div>
                    <select name="kategori" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $k)
                            <option value="{{ $k }}" {{ $kategori == $k ? 'selected' : '' }}>
                                {{ $k }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-blue btn-sm"><i class="fas fa-search"></i> Cari</button>
                    @if ($search || $kategori)
                        <a href="{{ route('admin.galeri.video.index') }}" class="btn btn-outline btn-sm"><i
                                class="fas fa-times"></i> Reset</a>
                    @endif
                </div>
            </form>

            <!-- GRID VIDEO -->
            @if ($videos->count())
                <div class="video-grid">
                    @foreach ($videos as $video)
                        <div class="video-card">
                            <div class="video-thumb"
                                onclick="openLightbox('{{ $video->embed_url }}', '{{ $video->judul }}')">
                                <img src="{{ $video->thumbnail_url }}" alt="{{ $video->judul }}" loading="lazy">
                                <div class="play-overlay">
                                    <div class="play-btn"><i class="fas fa-play" style="margin-left:3px"></i></div>
                                </div>
                                <span class="badge-yt"><i class="fab fa-youtube"></i> YouTube</span>
                                <span class="badge-status {{ $video->is_aktif ? 'aktif' : 'nonaktif' }}">
                                    {{ $video->is_aktif ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>
                            <div class="video-body">
                                <div class="video-judul" title="{{ $video->judul }}">{{ $video->judul }}</div>
                                @if ($video->kategori)
                                    <span class="video-kategori">{{ $video->kategori }}</span>
                                @endif
                                @if ($video->deskripsi)
                                    <div class="video-desc">{{ $video->deskripsi }}</div>
                                @endif
                            </div>
                            <div class="video-actions">
                                <button class="btn btn-yellow btn-sm"
                                    onclick='openEditModal(@json($video))'>
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <form action="{{ route('admin.galeri.video.toggle', $video->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm {{ $video->is_aktif ? 'btn-outline' : 'btn-green' }}">
                                        <i class="fas {{ $video->is_aktif ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.galeri.video.destroy', $video->id) }}" method="POST"
                                    class="form-del" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn btn-red btn-sm btn-hapus"
                                        data-nama="{{ $video->judul }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="pg-wrap">
                    <div class="pg-info">
                        Menampilkan {{ $videos->firstItem() }}–{{ $videos->lastItem() }} dari {{ $videos->total() }}
                        video
                    </div>
                    <div class="pg-links">
                        @if ($videos->onFirstPage())
                            <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                        @else
                            <a href="{{ $videos->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        @endif

                        @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                            @if ($page == $videos->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($videos->hasMorePages())
                            <a href="{{ $videos->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                        @else
                            <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                        @endif
                    </div>
                </div>
            @else
                <div class="empty">
                    <i class="fas fa-video"></i>
                    <p>Belum ada video. Klik <strong>Tambah Video</strong> untuk mulai.</p>
                </div>
            @endif

        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal-overlay" id="modalAdd" onclick="closeIfOutside(event,'modalAdd')">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fas fa-plus-circle" style="color:#8b5cf6"></i> Tambah Video</h3>
                <button class="modal-close" onclick="closeModal('modalAdd')"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('admin.galeri.video.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Video <span style="color:#ef4444">*</span></label>
                        <input type="text" name="judul" placeholder="cth: Upacara Hari Kemerdekaan 2024"
                            required>
                    </div>
                    <div class="form-group">
                        <label>URL YouTube <span style="color:#ef4444">*</span></label>
                        <input type="url" name="video_url" id="addVideoUrl"
                            placeholder="https://youtube.com/watch?v=..." required
                            oninput="previewYoutube(this.value, 'addYtThumb', 'addYtPreview')">
                        <img id="addYtThumb" src="" alt="Thumbnail" class="yt-thumb-preview">
                        <small style="color:#94a3b8">Mendukung format youtube.com/watch?v= dan youtu.be/</small>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="kategori" placeholder="cth: Kegiatan Sekolah"
                                list="kategori-list">
                            <datalist id="kategori-list">
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="urutan" value="0" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Keterangan video (opsional)..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Custom Thumbnail <small style="color:#94a3b8;font-weight:400">(opsional, default dari
                                YouTube)</small></label>
                        <div class="upload-zone">
                            <i class="fas fa-image"></i>
                            <p>Upload thumbnail kustom</p>
                            <small>JPG, PNG — Maks. 2MB</small>
                            <input type="file" name="thumbnail" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="toggle-wrap">
                            <input type="checkbox" name="is_aktif" value="1" checked id="addAktif">
                            <label for="addAktif" style="font-weight:500;font-size:14px;color:#374151">Tampilkan di
                                halaman publik</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeModal('modalAdd')"><i
                            class="fas fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-purple"><i class="fas fa-save"></i> Simpan Video</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal-overlay" id="modalEdit" onclick="closeIfOutside(event,'modalEdit')">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fas fa-pen" style="color:#f59e0b"></i> Edit Video</h3>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Video <span style="color:#ef4444">*</span></label>
                        <input type="text" name="judul" id="editJudul" required>
                    </div>
                    <div class="form-group">
                        <label>URL YouTube <span style="color:#ef4444">*</span></label>
                        <input type="url" name="video_url" id="editVideoUrl" required
                            oninput="previewYoutube(this.value, 'editYtThumb', null)">
                        <img id="editYtThumb" src="" alt="Thumbnail" class="yt-thumb-preview">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="kategori" id="editKategori" list="kategori-list">
                        </div>
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="urutan" id="editUrutan" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="editDeskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ganti Thumbnail <small style="color:#94a3b8;font-weight:400">(opsional)</small></label>
                        <div class="upload-zone">
                            <i class="fas fa-image"></i>
                            <p>Upload thumbnail baru</p>
                            <input type="file" name="thumbnail" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="toggle-wrap">
                            <input type="checkbox" name="is_aktif" value="1" id="editAktif">
                            <label for="editAktif" style="font-weight:500;font-size:14px;color:#374151">Tampilkan di
                                halaman publik</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeModal('modalEdit')"><i
                            class="fas fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-yellow"><i class="fas fa-save"></i> Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- VIDEO LIGHTBOX -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <div class="lightbox-inner" onclick="event.stopPropagation()">
            <button class="lightbox-close" onclick="closeLightbox()"><i class="fas fa-times"></i></button>
            <iframe class="lightbox-frame" id="lightboxFrame" src="" allowfullscreen
                allow="autoplay"></iframe>
            <p class="lightbox-caption" id="lightboxCaption"></p>
        </div>
    </div>

    <script>
        // MODAL
        function openAddModal() {
            document.getElementById('modalAdd').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function openEditModal(v) {
            const f = document.getElementById('editForm');
            f.action = `/admin/galeri/video/${v.id}`;

            document.getElementById('editJudul').value = v.judul;
            document.getElementById('editVideoUrl').value = v.video_url;
            document.getElementById('editKategori').value = v.kategori ?? '';
            document.getElementById('editUrutan').value = v.urutan;
            document.getElementById('editDeskripsi').value = v.deskripsi ?? '';
            document.getElementById('editAktif').checked = v.is_aktif == 1;

            // Show thumbnail dari YouTube
            previewYoutube(v.video_url, 'editYtThumb', null);

            document.getElementById('modalEdit').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
            document.body.style.overflow = '';
            // Stop video jika ada
            if (id === 'lightbox') {
                document.getElementById('lightboxFrame').src = '';
            }
        }

        function closeIfOutside(e, id) {
            if (e.target === document.getElementById(id)) closeModal(id);
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                closeModal('modalAdd');
                closeModal('modalEdit');
                closeLightbox();
            }
        });

        // YOUTUBE PREVIEW — ekstrak ID dan tampilkan thumbnail
        function getYoutubeId(url) {
            const m = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
            return m ? m[1] : null;
        }

        function previewYoutube(url, thumbId) {
            const id = getYoutubeId(url);
            const thumb = document.getElementById(thumbId);
            if (id && thumb) {
                thumb.src = `https://img.youtube.com/vi/${id}/hqdefault.jpg`;
                thumb.style.display = 'block';
            } else if (thumb) {
                thumb.style.display = 'none';
            }
        }

        // LIGHTBOX
        function openLightbox(embedUrl, caption) {
            if (!embedUrl) return;
            document.getElementById('lightboxFrame').src = embedUrl;
            document.getElementById('lightboxCaption').textContent = caption;
            document.getElementById('lightbox').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightboxFrame').src = ''; // stop video
            document.getElementById('lightbox').classList.remove('show');
            document.body.style.overflow = '';
        }

        // DELETE SWEETALERT
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function() {
                const nama = this.dataset.nama;
                const form = this.closest('.form-del');
                Swal.fire({
                    title: 'Hapus video ini?',
                    text: `"${nama}" akan dihapus permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then(r => {
                    if (r.isConfirmed) form.submit();
                });
            });
        });
    </script>
</body>

</html>
