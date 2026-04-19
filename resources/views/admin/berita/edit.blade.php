<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            font-weight: 700;
            color: #0f172a;
        }

        .card-form {
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
            font-weight: 600;
            color: #1e293b;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
        }

        .card-footer-custom {
            padding: 15px 25px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
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

        .btn-back {
            background: #64748b;
        }

        .btn-save {
            background: #22c55e;
        }

        .btn-back:hover {
            background: #475569;
        }

        .btn-save:hover {
            background: #16a34a;
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
                <h1>Edit Berita</h1>
            </div>

            <div class="card-form">
                <div class="card-body-content">
                    <form id="editBeritaForm" action="{{ route('admin.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        @include('admin.berita._form')
                    </form>
                </div>
                <div class="card-footer-custom">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left" style="margin-right:8px;"></i> Batal
                    </a>
                    <button type="submit" form="editBeritaForm" class="btn btn-save">
                        <i class="fas fa-save" style="margin-right:8px;"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
