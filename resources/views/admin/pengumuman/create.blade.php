<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pengumuman</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f1f5f9;
        }

        .container {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: #e2e8f0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .menu-title {
            font-size: 12px;
            color: #94a3b8;
            margin: 15px 0;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #e2e8f0;
            transition: 0.3s;
        }

        .nav a:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .nav a.active {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .profile {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .name {
            font-size: 14px;
        }

        .status {
            font-size: 12px;
            color: #94a3b8;
        }

        .logout {
            display: block;
            margin-top: 10px;
            text-align: center;
            padding: 10px;
            background: #ef4444;
            border-radius: 8px;
            color: white;
            text-decoration: none;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
        }

        /* FORM */
        /* FORM */
        .form-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 100%;
            /* penuh lebar konten */
            width: 800px;
            /* lebar default lebih besar */
            margin: auto;
            /* center secara horizontal */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #22c55e;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #16a34a;
        }
    </style>
</head>

<body>

    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Tambah Pengumuman</h1>
            </div>

            <div class="form-box">
                <a href="{{ route('admin.pengumuman') }}"
                    style="display:inline-block; margin-bottom:15px; padding:8px 12px; background:#64748b; color:white; border-radius:8px; text-decoration:none;">
                    ← Kembali
                </a>

                <form onsubmit="simpanDummy(event)">
                    <div class="form-group">
                        <label>Judul Pengumuman</label>
                        <input type="text" placeholder="Masukkan judul">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date">
                    </div>
                    <div class="form-group">
                        <label>Isi Pengumuman</label>
                        <textarea rows="5" placeholder="Masukkan isi pengumuman"></textarea>
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </div>

        </div>

    </div>

    <script>
        function simpanDummy(e) {
            e.preventDefault();
            alert('Pengumuman berhasil disimpan (dummy)');
        }
    </script>

</body>

</html>
