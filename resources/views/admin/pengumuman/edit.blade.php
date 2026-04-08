<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman | Admin SPMB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        /* RESET & ANTI-SCROLL */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Mencegah scroll pada level body */
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .container-flex {
            display: flex;
            height: 100vh;
            /* Pastikan container tepat seukuran layar */
            width: 100vw;
        }

        /* MAIN SECTION */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 30px;
            overflow: hidden;
            /* Konten utama tidak boleh meluap */
        }

        .header {
            flex-shrink: 0;
            /* Header tetap di atas */
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
        }

        /* CARD ADJUSTMENT (Mirip Table-Box di Index) */
        .card-form {
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            /* Card mengisi sisa ruang layar */
        }

        /* Bagian isi form yang bisa discroll jika input terlalu banyak */
        .card-body-content {
            padding: 25px;
            overflow-y: auto;
            /* Hanya bagian ini yang discroll jika layar kecil */
            flex-grow: 1;
        }

        /* FORM STYLING */
        .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
        }

        /* FOOTER CARD */
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

        /* Scrollbar Styling */
        .card-body-content::-webkit-scrollbar {
            width: 6px;
        }

        .card-body-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container-flex">

        @include('admin.sidebar')

        <div class="main">
            <div class="header">
                <h1>Edit Pengumuman</h1>
            </div>

            <div class="card-form">
                <div class="card-body-content">
                    <form id="editPengumumanForm" action="{{ route('admin.pengumuman.update', $pengumuman->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control"
                                value="{{ old('judul', $pengumuman->judul) }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Ganti Gambar (Biarkan kosong jika tidak ingin ganti)</label>
                           <input type="file" name="gambar" class="form-control" accept="image/*">  
                            @if ($pengumuman->gambar)
                                <img src="{{ asset('storage/' . $pengumuman->gambar) }}" class="mt-2" width="150">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control"
                                value="{{ old('tanggal', $pengumuman->tanggal) }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Isi</label>
                            <textarea name="isi" class="form-control" rows="10">{{ old('isi', $pengumuman->isi) }}</textarea>
                        </div>
                    </form>
                </div>

                <div class="card-footer-custom">
                    <a href="{{ route('admin.pengumuman') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Batal
                    </a>
                    <button type="submit" form="editPengumumanForm" class="btn btn-save">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
