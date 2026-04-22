<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Daftar Lanjutan</title>
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
            overflow: hidden;
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 30px;
            overflow: hidden;
        }

        .header {
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 24px;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 16px;
        }

        .breadcrumb a {
            color: #3b82f6;
            text-decoration: none;
        }

        .breadcrumb span {
            margin: 0 5px;
        }

        .form-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            flex: 1;
            overflow-y: auto;
            padding: 28px 32px;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .form-card::-webkit-scrollbar {
            width: 5px;
        }

        .form-card::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            text-transform: uppercase;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
            margin: 24px 0 14px;
        }

        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .grid3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .field label {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .field input,
        .field select,
        .field textarea {
            font-size: 13px;
            color: #0f172a;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 9px 12px;
            outline: none;
        }

        .field textarea {
            resize: none;
            min-height: 80px;
        }

        .btn-group {
            margin-top: 24px;
            display: flex;
            gap: 10px;
        }

        .btn-back {
            flex: 1;
            padding: 11px;
            background: #3b82f6;
            color: white;
            border-radius: 9px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Detail Daftar Lanjutan</h1>
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
                    <a href="{{ route('admin.daftar-lanjutan.index') }}">Daftar Lanjutan</a> /
                    <span>Detail</span>
                </div>
            </div>

            <div class="form-card">

                {{-- ================= DATA PENDAFTAR ================= --}}
                <div class="section-title">Data Pendaftar</div>
                <div class="grid2">

                    <div class="field">
                        <label>Nama Lengkap</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->nama_lengkap }}" readonly>
                    </div>

                    <div class="field">
                        <label>NISN</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->nisn }}" readonly>
                    </div>

                    <div class="field">
                        <label>No HP</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->no_hp }}" readonly>
                    </div>

                    <div class="field">
                        <label>Asal Sekolah</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->asal_sekolah }}" readonly>
                    </div>

                    <div class="field">
                        <label>Jurusan</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->jurusan }}" readonly>
                    </div>

                    <div class="field">
                        <label>Status</label>
                        <input value="{{ optional($daftarLanjutan->pendaftar)->status }}" readonly>
                    </div>

                </div>

                {{-- ================= DATA DIRI ================= --}}
                <div class="section-title">Data Diri</div>
                <div class="grid2">

                    <div class="field">
                        <label>Jalur Pendaftaran</label>
                        <input value="{{ $daftarLanjutan->jalur_pendaftaran }}" readonly>
                    </div>

                    <div class="field">
                        <label>Jenis Kelamin</label>
                        <input value="{{ $daftarLanjutan->jenis_kelamin }}" readonly>
                    </div>

                    <div class="field">
                        <label>Tempat Lahir</label>
                        <input value="{{ $daftarLanjutan->tempat_lahir }}" readonly>
                    </div>

                    <div class="field">
                        <label>Tanggal Lahir</label>
                        <input value="{{ $daftarLanjutan->tanggal_lahir }}" readonly>
                    </div>

                    <div class="field">
                        <label>Agama</label>
                        <input value="{{ $daftarLanjutan->agama }}" readonly>
                    </div>

                    <div class="field">
                        <label>Cita-cita</label>
                        <input value="{{ $daftarLanjutan->cita_cita }}" readonly>
                    </div>

                    <div class="field full">
                        <label>Hobi</label>
                        <input value="{{ $daftarLanjutan->hobi }}" readonly>
                    </div>

                </div>

                {{-- ================= ORANG TUA ================= --}}
                <div class="section-title">Orang Tua</div>
                <div class="grid3">

                    <div class="field">
                        <label>Nama Ayah</label>
                        <input value="{{ $daftarLanjutan->nama_ayah }}" readonly>
                    </div>

                    <div class="field">
                        <label>Tahun Lahir Ayah</label>
                        <input value="{{ $daftarLanjutan->tahun_lahir_ayah }}" readonly>
                    </div>

                    <div class="field">
                        <label>Pekerjaan Ayah</label>
                        <input value="{{ $daftarLanjutan->pekerjaan_ayah }}" readonly>
                    </div>

                    <div class="field">
                        <label>Nama Ibu</label>
                        <input value="{{ $daftarLanjutan->nama_ibu }}" readonly>
                    </div>

                    <div class="field">
                        <label>Tahun Lahir Ibu</label>
                        <input value="{{ $daftarLanjutan->tahun_lahir_ibu }}" readonly>
                    </div>

                    <div class="field">
                        <label>Pekerjaan Ibu</label>
                        <input value="{{ $daftarLanjutan->pekerjaan_ibu }}" readonly>
                    </div>

                </div>

                {{-- ================= ALAMAT ================= --}}
                <div class="section-title">Alamat</div>
                <div class="grid2">

                    <div class="field">
                        <label>Provinsi</label>
                        <input value="{{ $daftarLanjutan->provinsi }}" readonly>
                    </div>

                    <div class="field">
                        <label>Kabupaten</label>
                        <input value="{{ $daftarLanjutan->kabupaten }}" readonly>
                    </div>

                    <div class="field">
                        <label>Kecamatan</label>
                        <input value="{{ $daftarLanjutan->kecamatan }}" readonly>
                    </div>

                    <div class="field full">
                        <label>Alamat Lengkap</label>
                        <textarea readonly>{{ $daftarLanjutan->alamat_lengkap }}</textarea>
                    </div>

                </div>

                {{-- ================= BUTTON ================= --}}
                <div class="btn-group">
                    <a href="{{ route('admin.daftar-lanjutan.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
