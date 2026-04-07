<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftar</title>

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

        /* ===== SIDEBAR ===== */
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

        .logout:hover {
            background: #dc2626;
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
            color: #0f172a;
            margin-bottom: 5px;
        }

        /* Breadcrumb */
        .breadcrumb {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: #3b82f6;
            text-decoration: none;
        }

        .breadcrumb span {
            margin: 0 5px;
        }

        /* ===== FORM CARD ===== */
        .form-card {
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: none;
        }

        .form-card label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 600;
            color: #0f172a;
        }

        .form-card input,
        .form-card select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-card input:focus,
        .form-card select:focus {
            border-color: #3b82f6;
            outline: none;
        }

        /* Buttons */
        .btn-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn-submit {
            flex: 1;
            padding: 12px;
            background: #22c55e;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #16a34a;
        }

        .btn-back {
            flex: 1;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #1d4ed8;
        }

        .relative {
            position: relative;
        }

        /* HOVER BUKA DROPDOWN */
        .relative:hover>.dropdownMenu {
            display: block !important;
        }
    </style>
</head>

<body>
    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Edit Pendaftar</h1>
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a> <span>/</span>
                    <a href="{{ route('admin.data-pendaftar') }}">Data Pendaftar</a> <span>/</span>
                    <span>Edit</span>
                </div>
            </div>

            <div class="form-card">
                <form action="{{ route('admin.data-pendaftar.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>

                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="{{ $data->asal_sekolah }}" required>

                    <label>NISN</label>
                    <input type="text" name="nisn" value="{{ $data->nisn }}" required>

                    <label>No HP</label>
                    <input type="text" name="no_hp" value="{{ $data->no_hp }}" required>

                    <label>Jurusan</label>
                    <div class="relative">
                        <input type="text" id="jurusanInput" name="jurusan" value="{{ $data->jurusan }}" readonly
                            required style="cursor:pointer;">

                        <div class="dropdownMenu"
                            style="display:none; position:absolute; width:100%; background:white; border:1px solid #cbd5e1; border-radius:8px; margin-top:5px; z-index:10; max-height:150px; overflow-y:auto;">
                            <div onclick="setJurusan('Teknik Otomasi Industri')" style="padding:10px; cursor:pointer;">
                                Teknik Otomasi Industri</div>
                            <div onclick="setJurusan('Teknik Mesin')" style="padding:10px; cursor:pointer;">Teknik Mesin
                            </div>
                            <div onclick="setJurusan('Teknik Kelistrikan')" style="padding:10px; cursor:pointer;">Teknik
                                Kelistrikan</div>
                            <div onclick="setJurusan('Teknik Jaringan Komputer & Telekomunikasi')"
                                style="padding:10px; cursor:pointer;">TJKT</div>
                            <div onclick="setJurusan('Teknik Bisnis Sepeda Motor')"
                                style="padding:10px; cursor:pointer;">TBSM</div>
                        </div>
                    </div>

                    <label>Status</label>
                    <div class="relative">
                        <input type="text" id="statusInput" name="status" value="{{ $data->status }}" readonly
                            required style="cursor:pointer;">

                        <div class="dropdownMenu"
                            style="display:none; position:absolute; width:100%; background:white; border:1px solid #cbd5e1; border-radius:8px; margin-top:5px; z-index:10; max-height:150px; overflow-y:auto;">
                            <div onclick="setStatus('proses')" style="padding:10px; cursor:pointer;">Proses</div>
                            <div onclick="setStatus('disetujui')" style="padding:10px; cursor:pointer;">Disetujui</div>
                            <div onclick="setStatus('ditolak')" style="padding:10px; cursor:pointer;">Ditolak</div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn-submit">Simpan</button>
                        <a href="{{ route('admin.data-pendaftar') }}" class="btn-back">Kembali</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
<script id="7skd92">
    function setJurusan(value) {
        document.getElementById('jurusanInput').value = value;
    }

    function setStatus(value) {
        document.getElementById('statusInput').value = value;
    }
</script>

</html>
