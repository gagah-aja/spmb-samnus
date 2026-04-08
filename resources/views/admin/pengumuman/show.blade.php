<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengumuman | Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        /* 1. RESET TOTAL & KUNCI LAYAR */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* Agar padding tidak menambah lebar/tinggi elemen */
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        html,
        body {
            height: 100vh;
            width: 100%;
            overflow: hidden;
            /* MEMBUAT HALAMAN ANTENG (TIDAK BISA SCROLL UTAMA) */
            background: #f1f5f9;
        }

        .container {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* 2. MAIN CONTENT AREA */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 20px;
            overflow: hidden;
            /* Main area tidak boleh scroll */
            align-items: center;
            /* Mengetengahkan Card */
        }

        /* 3. HEADER / TOMBOL KEMBALI */
        .header-area {
            width: 100%;
            max-width: 900px;
            margin-bottom: 15px;
            flex-shrink: 0;
            /* Header tidak boleh mengecil */
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
            transition: 0.2s;
        }

        .btn-back:hover {
            background: #475569;
        }

        /* 4. CARD DETAIL (BOX TENGAH) */
        .content-box {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: column;

            /* KUNCI AGAR CARD PAS DI LAYAR */
            flex: 1;
            min-height: 0;
            /* Penting agar flex-child bisa scroll */
            margin-bottom: 10px;
            overflow: hidden;
        }

        /* GAMBAR BANNER (UKURAN SEDANG) */
        .img-banner {
            width: 100%;
            height: 220px;
            /* Ukuran pas, tidak terlalu besar */
            object-fit: cover;
            flex-shrink: 0;
            /* Gambar tidak boleh gepeng/mengecil */
            border-bottom: 1px solid #e2e8f0;
        }

        .no-image-placeholder {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #cbd5e1;
            flex-shrink: 0;
        }

        /* 5. AREA YANG BISA DI-SCROLL (HANYA ISI TEKS) */
        .scroll-content {
            padding: 30px;
            overflow-y: auto;
            /* Hanya bagian ini yang bisa scroll jika teks panjang */
            flex: 1;
        }

        .announcement-title {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .meta-info {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f1f5f9;
        }

        .body-text {
            font-size: 15px;
            line-height: 1.7;
            color: #334155;
            white-space: pre-line;
            text-align: justify;
        }

        /* Scrollbar Halus untuk Area Teks */
        .scroll-content::-webkit-scrollbar {
            width: 6px;
        }

        .scroll-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .scroll-content::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header-area">
                <a href="{{ route('admin.pengumuman') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="content-box">

                @if ($pengumuman->gambar)
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" class="img-banner">
                @else
                    <div class="no-image-placeholder">
                        <i class="fas fa-image fa-3x"></i>
                    </div>
                @endif

                <div class="scroll-content">
                    <h1 class="announcement-title">{{ $pengumuman->judul }}</h1>

                    <div class="meta-info">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}
                        </span>
                        <span>
                            <i class="fas fa-user-circle"></i> Admin
                        </span>
                    </div>

                    <div class="body-text">
                        {!! nl2br(e($pengumuman->isi)) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
