<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pengumuman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-flex {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
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

        .nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
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

        .main {
            flex: 1;
            padding: 30px;
        }

        /* Card form */
        .card-form {
            max-width: 800px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .btn-back {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container-flex">

        @include('admin.sidebar')

        <div class="main">
            <h1 class="mb-4">Edit Pengumuman</h1>

            <div class="card-form">
                <a href="{{ route('admin.pengumuman') }}" class="btn btn-secondary btn-back">
                    ← Kembali
                </a>

                <form id="editPengumumanForm">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="judul" value="Pengumuman Penting">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="2026-04-01">
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="isi" rows="5">Ini adalah isi pengumuman dummy yang bisa diedit.</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('editPengumumanForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const judul = document.getElementById('judul').value;
            const tanggal = document.getElementById('tanggal').value;
            const isi = document.getElementById('isi').value;

            if (!judul || !tanggal || !isi) {
                alert('Harap lengkapi semua field!');
                return;
            }

            alert(`Pengumuman berhasil diperbarui (dummy)\nJudul: ${judul}\nTanggal: ${tanggal}`);
        });
    </script>

</body>
</html>