<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            overflow: hidden;
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
            padding: 30px;
            overflow: hidden;
        }

        .header {
            flex-shrink: 0;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
            color: #0f172a;
        }

        .card-form {
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            flex-grow: 1;
        }

        .card-body-content {
            padding: 25px;
            overflow-y: auto;
            flex-grow: 1;
        }

        .card-body-content::-webkit-scrollbar {
            width: 6px;
        }

        .card-body-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
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
        select,
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
        textarea:focus,
        select:focus {
            border-color: #3b82f6;
        }

        .card-footer-custom {
            padding: 15px 25px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            border: none;
            color: white;
        }

        .btn-save {
            background: #22c55e;
        }

        .btn-back {
            background: #64748b;
        }

        .btn-save:hover {
            background: #16a34a;
        }

        .btn-back:hover {
            background: #475569;
        }

        .error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')
        <div class="main">
            <div class="header">
                <h1>Tambah Berita</h1>
            </div>

            <div class="card-form">
                <div class="card-body-content">
                    <form id="createBeritaForm" action="{{ route('admin.berita.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @include('admin.berita._form')
                    </form>
                </div>
                <div class="card-footer-custom">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left" style="margin-right:8px;"></i> Kembali
                    </a>
                    <button type="submit" form="createBeritaForm" class="btn btn-save">
                        <i class="fas fa-save" style="margin-right:8px;"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
