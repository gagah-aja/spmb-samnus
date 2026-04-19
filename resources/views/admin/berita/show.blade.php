<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html,
        body {
            height: 100%;
            background: #f1f5f9;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            align-items: center;
            overflow: hidden;
        }

        .header-area {
            width: 100%;
            max-width: 900px;
            margin-bottom: 15px;
        }

        .btn-back {
            padding: 10px 18px;
            background: #64748b;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #475569;
        }

        .content-box {
            background: white;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* 🔥 IMAGE FIX (tidak kepotong) */
        .img-wrapper {
            width: 100%;
            height: 220px;
            /* kecil & konsisten */
            background: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }

        .img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .no-image {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e1;
            font-size: 40px;
        }

        .scroll-content {
            padding: 30px;
            overflow-y: auto;
        }

        .berita-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .meta-info {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 15px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .badge-published {
            background: #22c55e;
        }

        .badge-draft {
            background: #94a3b8;
        }

        .badge-kategori {
            background: #3b82f6;
        }

        .body-text {
            font-size: 15px;
            line-height: 1.8;
            color: #334155;
            white-space: pre-line;
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')

        <div class="main">
            <div class="header-area">
                <a href="{{ route('admin.berita.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="content-box">

                {{-- IMAGE --}}
                @if ($berita->gambar)
                    <div class="img-wrapper">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
                    </div>
                @else
                    <div class="no-image">
                        <i class="fas fa-image"></i>
                    </div>
                @endif

                {{-- CONTENT --}}
                <div class="scroll-content">
                    <h1 class="berita-title">{{ $berita->judul }}</h1>

                    <div class="meta-info">
                        <span><i class="fas fa-calendar"></i>
                            {{ $berita->created_at->translatedFormat('d F Y') }}</span>

                        <span><i class="fas fa-user"></i> Admin</span>

                        <span class="badge badge-kategori">
                            <i class="fas fa-tag"></i>
                            {{ $berita->kategori->nama ?? '-' }}
                        </span>

                        <span class="badge badge-{{ $berita->status }}">
                            {{ ucfirst($berita->status) }}
                        </span>
                    </div>

                    <div class="body-text">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
