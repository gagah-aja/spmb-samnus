<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pengumuman</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        /* CSS Sidebar internal dihapus karena sudah menggunakan admin.css */

        /* ===== MAIN ===== */
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
            color: #0f172a;
        }

        /* ===== FORM BOX - Sesuai Kode Asli ===== */
        .form-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 100%;
            width: 800px;
            margin: auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #1e293b;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #3b82f6;
        }

        button.btn-save {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            background: #22c55e;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button.btn-save:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background: #64748b;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #475569;
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
                <a href="{{ route('admin.pengumuman') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul Pengumuman</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Sampul</label>
                        <input type="file" name="gambar" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Pengumuman</label>
                        <textarea name="isi" rows="5" required>{{ old('isi') }}</textarea>
                    </div>
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>

        </div>

    </div>
</body>

</html>
