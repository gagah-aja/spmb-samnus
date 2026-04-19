<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #f1f5f9;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .main {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: block;
        }

        .input-box {
            position: relative;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .error {
            font-size: 12px;
            color: #ef4444;
            margin-top: 4px;
        }

        .footer {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-back {
            background: #64748b;
            color: white;
        }

        .btn-save {
            background: #22c55e;
            color: white;
        }

        .btn-back:hover {
            background: #475569;
        }

        .btn-save:hover {
            background: #16a34a;
        }
    </style>
</head>

<body>

    <div class="container">
        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>
                    {{ isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' }}
                </h1>
            </div>

            <div class="card">

                <form method="POST"
                    action="{{ isset($kategori) 
                        ? route('admin.kategori-berita.update', $kategori->id) 
                        : route('admin.kategori-berita.store') }}">

                    @csrf
                    @if(isset($kategori))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label>Nama Kategori</label>

                        <div class="input-box">
                            <i class="fas fa-tag"></i>
                            <input type="text" name="nama"
                                value="{{ old('nama', $kategori->nama ?? '') }}"
                                placeholder="Contoh: Sekolah, Pengumuman..."
                                required>
                        </div>

                        @error('nama')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="footer">
                        <a href="{{ route('admin.kategori-berita.index') }}" class="btn btn-back">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" class="btn btn-save">
                            <i class="fas fa-save"></i>
                            {{ isset($kategori) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>