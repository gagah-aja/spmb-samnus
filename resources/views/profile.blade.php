<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Profile - Mobile Version</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Mobile Topbar */
        .topbar-mobile {
            background: #0f172a;
            color: white;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-mobile h1 {
            font-size: 16px;
            font-weight: 600;
        }

        .topbar-mobile a {
            background: #185FA5;
            color: white;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 12px;
            text-decoration: none;
        }

        /* Main Container */
        .main-mobile {
            flex: 1;
            padding: 12px;
        }

        /* Card Mobile */
        .card-mobile {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        /* Profile Header */
        .profile-header {
            background: linear-gradient(135deg, #185FA5 0%, #0c447c 100%);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: white;
        }

        .avatar-mobile {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 20px;
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .profile-nisn {
            font-size: 11px;
            opacity: 0.8;
            margin-bottom: 6px;
        }

        .profile-school {
            font-size: 11px;
            opacity: 0.75;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status-badge-mobile {
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 500;
        }

        /* Form Title */
        .form-title {
            padding: 16px 20px 8px;
            font-weight: 700;
            font-size: 16px;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
            background: white;
        }

        .alert-success-mobile {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: 12px;
            padding: 10px 16px;
            margin: 12px 16px;
            border-radius: 10px;
        }

        /* Form Scroll */
        .form-scroll-mobile {
            max-height: calc(100vh - 380px);
            overflow-y: auto;
            padding: 16px;
        }

        /* Sections */
        .section-mobile {
            margin-bottom: 24px;
        }

        .section-title-mobile {
            font-size: 13px;
            font-weight: 700;
            color: #185FA5;
            margin-bottom: 12px;
            padding-left: 8px;
            border-left: 3px solid #185FA5;
        }

        /* Field Groups */
        .field-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .field-mobile {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .field-mobile label {
            font-size: 11px;
            font-weight: 600;
            color: #475569;
            letter-spacing: 0.3px;
        }

        .field-mobile input,
        .field-mobile select,
        .field-mobile textarea {
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            background: #fafbfc;
            transition: all 0.2s;
            font-family: inherit;
        }

        .field-mobile input:focus,
        .field-mobile select:focus,
        .field-mobile textarea:focus {
            outline: none;
            border-color: #185FA5;
            background: white;
        }

        .field-mobile textarea {
            resize: vertical;
            min-height: 70px;
        }

        /* Submit Button */
        .form-footer-mobile {
            padding: 14px 16px 20px;
            background: white;
            border-top: 1px solid #e2e8f0;
        }

        .btn-save-mobile {
            width: 100%;
            padding: 14px;
            background: #185FA5;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-save-mobile:active {
            background: #0e4680;
        }

        /* Helper */
        .full-width {
            grid-column: 1 / -1;
        }

        /* Smooth Scrolling */
        .form-scroll-mobile::-webkit-scrollbar {
            width: 4px;
        }

        .form-scroll-mobile::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .form-scroll-mobile::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* Untuk iOS */
        input,
        select,
        textarea {
            -webkit-appearance: none;
            appearance: none;
        }

        select {
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 32px;
        }
    </style>
</head>

<body>

    <div class="topbar-mobile">
        <h1>📋 Profil Saya</h1>
        <a href="/dashboard">← Dashboard</a>
    </div>

    <div class="main-mobile">
        <div class="card-mobile">

            <!-- Profile Header -->
            <div class="profile-header">
                <div class="avatar-mobile">{{ strtoupper(substr($user->nama_lengkap, 0, 2)) }}</div>
                <div class="profile-info">
                    <div class="profile-name">{{ $user->nama_lengkap }}</div>
                    <div class="profile-nisn">{{ $user->nisn }}</div>
                    <div class="profile-school">
                        <span>🏫 {{ $user->asal_sekolah }}</span>
                        <span>📱 {{ $user->no_hp }}</span>
                    </div>
                </div>
                <div class="status-badge-mobile">{{ $user->status }}</div>
            </div>

            <!-- Form Title -->
            <div class="form-title">
                ✏️ Lengkapi Data Diri
            </div>

            @if (session('success'))
                <div class="alert-success-mobile">✓ {{ session('success') }}</div>
            @endif

            <form method="POST" action="/profile">
                @csrf

                <div class="form-scroll-mobile">

                    <!-- ===== DATA DIRI ===== -->
                    <div class="section-mobile">
                        <div class="section-title-mobile">Data Diri</div>
                        <div class="field-group">
                            <div class="field-mobile">
                                <label>Nama Lengkap</label>
                                <input name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}">
                            </div>
                            <div class="field-mobile">
                                <label>No HP</label>
                                <input name="no_hp" value="{{ $user->no_hp ?? '' }}">
                            </div>
                            <div class="field-mobile">
                                <label>Asal Sekolah</label>
                                <input name="asal_sekolah" value="{{ $user->asal_sekolah ?? '' }}">
                            </div>
                            <div class="field-mobile">
                                <label>NISN</label>
                                <input name="nisn" value="{{ $user->nisn ?? '' }}">
                            </div>
                            <div class="field-mobile">
                                <label>Jalur Pendaftaran</label>
                                <select name="jalur_pendaftaran">
                                    @foreach (['Afirmasi', 'Prestasi', 'Reguler'] as $j)
                                        <option value="{{ $j }}"
                                            {{ ($lanjutan->jalur_pendaftaran ?? '') == $j ? 'selected' : '' }}>
                                            {{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin">
                                    @foreach (['Laki-laki', 'Perempuan'] as $jk)
                                        <option value="{{ $jk }}"
                                            {{ ($lanjutan->jenis_kelamin ?? '') == $jk ? 'selected' : '' }}>
                                            {{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir" value="{{ $lanjutan->tempat_lahir ?? '' }}"
                                    placeholder="Contoh: Jakarta">
                            </div>
                            <div class="field-mobile">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    value="{{ $lanjutan->tanggal_lahir ?? '' }}">
                            </div>
                            <div class="field-mobile">
                                <label>Agama</label>
                                <input name="agama" value="{{ $lanjutan->agama ?? '' }}" placeholder="Islam">
                            </div>
                            <div class="field-mobile">
                                <label>Cita-cita</label>
                                <input name="cita_cita" value="{{ $lanjutan->cita_cita ?? '' }}"
                                    placeholder="Contoh: Dokter">
                            </div>
                            <div class="field-mobile">
                                <label>Hobi</label>
                                <input name="hobi" value="{{ $lanjutan->hobi ?? '' }}"
                                    placeholder="Membaca, olahraga...">
                            </div>
                        </div>
                    </div>

                    <!-- ===== ORANG TUA ===== -->
                    <div class="section-mobile">
                        <div class="section-title-mobile">👨‍👩‍👧 Orang Tua & Wali</div>
                        <div class="field-group">
                            <div class="field-mobile">
                                <label>👨 Nama Ayah</label>
                                <input name="nama_ayah" value="{{ $lanjutan->nama_ayah ?? '' }}"
                                    placeholder="Budi Santoso">
                            </div>
                            <div class="field-mobile">
                                <label>Tahun Lahir Ayah</label>
                                <input name="tahun_lahir_ayah" value="{{ $lanjutan->tahun_lahir_ayah ?? '' }}"
                                    placeholder="1975">
                            </div>
                            <div class="field-mobile">
                                <label>Pekerjaan Ayah</label>
                                <input name="pekerjaan_ayah" value="{{ $lanjutan->pekerjaan_ayah ?? '' }}"
                                    placeholder="Wiraswasta">
                            </div>
                            <div class="field-mobile">
                                <label>Pendidikan Ayah</label>
                                <select name="pendidikan_ayah">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->pendidikan_ayah ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Penghasilan Ayah</label>
                                <select name="penghasilan_ayah">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->penghasilan_ayah ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="field-mobile">
                                <label>👩 Nama Ibu</label>
                                <input name="nama_ibu" value="{{ $lanjutan->nama_ibu ?? '' }}"
                                    placeholder="Siti Rahayu">
                            </div>
                            <div class="field-mobile">
                                <label>Tahun Lahir Ibu</label>
                                <input name="tahun_lahir_ibu" value="{{ $lanjutan->tahun_lahir_ibu ?? '' }}"
                                    placeholder="1978">
                            </div>
                            <div class="field-mobile">
                                <label>Pekerjaan Ibu</label>
                                <input name="pekerjaan_ibu" value="{{ $lanjutan->pekerjaan_ibu ?? '' }}"
                                    placeholder="Ibu Rumah Tangga">
                            </div>
                            <div class="field-mobile">
                                <label>Pendidikan Ibu</label>
                                <select name="pendidikan_ibu">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->pendidikan_ibu ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Penghasilan Ibu</label>
                                <select name="penghasilan_ibu">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->penghasilan_ibu ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="field-mobile">
                                <label>👤 Nama Wali (isi jika ada)</label>
                                <input name="nama_wali" value="{{ $lanjutan->nama_wali ?? '' }}"
                                    placeholder="Kosongkan jika tidak ada">
                            </div>
                            <div class="field-mobile">
                                <label>Pendidikan Wali</label>
                                <select name="pendidikan_wali">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->pendidikan_wali ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Penghasilan Wali</label>
                                <select name="penghasilan_wali">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}"
                                            {{ ($lanjutan->penghasilan_wali ?? '') == $p ? 'selected' : '' }}>
                                            {{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>🏠 Jenis Tinggal</label>
                                <select name="jenis_tinggal">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Bersama Orang Tua', 'Wali', 'Kost', 'Asrama/Pesantren', 'Panti Asuhan'] as $jt)
                                        <option value="{{ $jt }}"
                                            {{ ($lanjutan->jenis_tinggal ?? '') == $jt ? 'selected' : '' }}>
                                            {{ $jt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ALAMAT ===== -->
                    <div class="section-mobile">
                        <div class="section-title-mobile">📍 Alamat Tempat Tinggal</div>
                        <div class="field-group">
                            <div class="field-mobile">
                                <label>Provinsi</label>
                                <input name="provinsi" value="{{ $lanjutan->provinsi ?? '' }}"
                                    placeholder="Jawa Barat">
                            </div>
                            <div class="field-mobile">
                                <label>Kabupaten / Kota</label>
                                <input name="kabupaten" value="{{ $lanjutan->kabupaten ?? '' }}"
                                    placeholder="Bandung">
                            </div>
                            <div class="field-mobile">
                                <label>Kecamatan</label>
                                <input name="kecamatan" value="{{ $lanjutan->kecamatan ?? '' }}"
                                    placeholder="Cicendo">
                            </div>
                            <div class="field-mobile">
                                <label>Desa / Kelurahan</label>
                                <input name="desa" value="{{ $lanjutan->desa ?? '' }}" placeholder="Arjuna">
                            </div>
                            <div class="field-mobile">
                                <label>Kode Pos</label>
                                <input name="kode_pos" value="{{ $lanjutan->kode_pos ?? '' }}" placeholder="40172">
                            </div>
                            <div class="field-mobile">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" placeholder="Jl. Merdeka No. 12, RT 03/RW 04...">{{ $lanjutan->alamat_lengkap ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DATA FISIK & LAINNYA ===== -->
                    <div class="section-mobile">
                        <div class="section-title-mobile">📊 Data Fisik & Lainnya</div>
                        <div class="field-group">
                            <div class="field-mobile">
                                <label>Tinggi Badan (cm)</label>
                                <input name="tinggi_badan" value="{{ $lanjutan->tinggi_badan ?? '' }}"
                                    placeholder="165">
                            </div>
                            <div class="field-mobile">
                                <label>Berat Badan (kg)</label>
                                <input name="berat_badan" value="{{ $lanjutan->berat_badan ?? '' }}"
                                    placeholder="55">
                            </div>
                            <div class="field-mobile">
                                <label>Ukuran Pakaian</label>
                                <input name="ukuran_pakaian" value="{{ $lanjutan->ukuran_pakaian ?? '' }}"
                                    placeholder="M / L / XL">
                            </div>
                            <div class="field-mobile">
                                <label>Ukuran Sepatu</label>
                                <input name="ukuran_sepatu" value="{{ $lanjutan->ukuran_sepatu ?? '' }}"
                                    placeholder="40">
                            </div>
                            <div class="field-mobile">
                                <label>Berkebutuhan Khusus</label>
                                <input name="berkebutuhan_khusus" value="{{ $lanjutan->berkebutuhan_khusus ?? '' }}"
                                    placeholder="Tidak ada">
                            </div>
                            <div class="field-mobile">
                                <label>No. HP Orang Tua</label>
                                <input name="no_hp_ortu" value="{{ $lanjutan->no_hp_ortu ?? '' }}"
                                    placeholder="08xx">
                            </div>
                            <div class="field-mobile">
                                <label>Jarak ke Sekolah (km)</label>
                                <input name="jarak_ke_sekolah" value="{{ $lanjutan->jarak_ke_sekolah ?? '' }}"
                                    placeholder="5">
                            </div>
                            <div class="field-mobile">
                                <label>Alat Transportasi</label>
                                <select name="alat_transportasi">
                                    <option value="">-- Pilih --</option>
                                    @foreach (['Jalan Kaki', 'Kendaraan Pribadi', 'Kendaraan Umum', 'Jemputan', 'Ojek', 'Di Antarkan'] as $at)
                                        <option value="{{ $at }}"
                                            {{ ($lanjutan->alat_transportasi ?? '') == $at ? 'selected' : '' }}>
                                            {{ $at }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>Jumlah Saudara</label>
                                <input name="jumlah_saudara" value="{{ $lanjutan->jumlah_saudara ?? '' }}"
                                    placeholder="Anak ke 2 dari 3">
                            </div>
                            <div class="field-mobile">
                                <label>Memiliki KIP?</label>
                                <select name="memiliki_kip">
                                    <option value="0"
                                        {{ ($lanjutan->memiliki_kip ?? 0) == 0 ? 'selected' : '' }}>Tidak</option>
                                    <option value="1"
                                        {{ ($lanjutan->memiliki_kip ?? 0) == 1 ? 'selected' : '' }}>Ya</option>
                                </select>
                            </div>
                            <div class="field-mobile">
                                <label>No. KIP (jika ada)</label>
                                <input name="no_kip" value="{{ $lanjutan->no_kip ?? '' }}" placeholder="Nomor KIP">
                            </div>
                        </div>
                    </div>

                    <!-- ===== ASAL SEKOLAH ===== -->
                    <div class="section-mobile">
                        <div class="section-title-mobile">🏫 Asal Sekolah (SMP)</div>
                        <div class="field-group">
                            <div class="field-mobile">
                                <label>Nama SMP</label>
                                <input name="nama_smp" value="{{ $lanjutan->nama_smp ?? '' }}"
                                    placeholder="SMP Negeri 1 Semarang">
                            </div>
                            <div class="field-mobile">
                                <label>NPSN</label>
                                <input name="npsn_smp" value="{{ $lanjutan->npsn_smp ?? '' }}"
                                    placeholder="20230001">
                            </div>
                            <div class="field-mobile">
                                <label>Provinsi SMP</label>
                                <input name="provinsi_smp" value="{{ $lanjutan->provinsi_smp ?? '' }}"
                                    placeholder="Jawa Tengah">
                            </div>
                            <div class="field-mobile">
                                <label>Kabupaten / Kota SMP</label>
                                <input name="kabupaten_smp" value="{{ $lanjutan->kabupaten_smp ?? '' }}"
                                    placeholder="Semarang">
                            </div>
                            <div class="field-mobile">
                                <label>Kecamatan SMP</label>
                                <input name="kecamatan_smp" value="{{ $lanjutan->kecamatan_smp ?? '' }}"
                                    placeholder="Tembalang">
                            </div>
                            <div class="field-mobile">
                                <label>Desa / Kelurahan SMP</label>
                                <input name="desa_smp" value="{{ $lanjutan->desa_smp ?? '' }}"
                                    placeholder="Bulusan">
                            </div>
                            <div class="field-mobile">
                                <label>Kode Pos SMP</label>
                                <input name="kode_pos_smp" value="{{ $lanjutan->kode_pos_smp ?? '' }}"
                                    placeholder="50277">
                            </div>
                            <div class="field-mobile">
                                <label>Tahun Lulus</label>
                                <input name="tahun_lulus" value="{{ $lanjutan->tahun_lulus ?? '' }}"
                                    placeholder="2024">
                            </div>
                            <div class="field-mobile">
                                <label>Alamat SMP</label>
                                <textarea name="alamat_smp" placeholder="Jl. ...">{{ $lanjutan->alamat_smp ?? '' }}</textarea>
                            </div>
                            <div class="field-mobile">
                                <label>Dapat Info Dari Mana</label>
                                <input name="dari_mana_mengenal" value="{{ $lanjutan->dari_mana_mengenal ?? '' }}"
                                    placeholder="Media sosial, teman...">
                            </div>
                            <div class="field-mobile">
                                <label>Mengapa Memilih Sekolah Ini?</label>
                                <textarea name="mengapa_memilih_samnus" placeholder="Tulis alasanmu di sini...">{{ $lanjutan->mengapa_memilih_samnus ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-footer-mobile">
                    <button type="submit" class="btn-save-mobile">💾 Simpan Perubahan</button>
                </div>

            </form>

        </div>
    </div>

</body>

</html>
