<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f1f5f9; min-height: 100vh; display: flex; flex-direction: column; }
        .topbar { background: #0f172a; color: white; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0; }
        .topbar h1 { font-size: 15px; font-weight: 600; }
        .topbar a { background: #185FA5; color: white; padding: 6px 16px; border-radius: 8px; font-size: 13px; text-decoration: none; font-weight: 500; }
        .main { flex: 1; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .card { width: 100%; max-width: 960px; height: calc(100vh - 120px); background: white; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); display: flex; overflow: hidden; }
        .left-panel { width: 220px; flex-shrink: 0; background: linear-gradient(160deg, #185FA5 0%, #0c447c 100%); padding: 28px 20px; display: flex; flex-direction: column; color: white; }
        .avatar { width: 56px; height: 56px; border-radius: 50%; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 600; margin-bottom: 14px; }
        .left-name { font-size: 15px; font-weight: 600; line-height: 1.3; margin-bottom: 4px; }
        .left-nisn { font-size: 12px; opacity: 0.7; margin-bottom: 20px; }
        .divider { height: 0.5px; background: rgba(255,255,255,0.2); margin-bottom: 16px; }
        .info-label { font-size: 10px; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.55; margin-bottom: 2px; }
        .info-val { font-size: 12px; font-weight: 500; margin-bottom: 14px; opacity: 0.92; }
        .status-badge { display: inline-block; margin-top: auto; padding: 5px 12px; background: rgba(255,255,255,0.18); border-radius: 20px; font-size: 11px; font-weight: 500; align-self: flex-start; }
        .right-panel { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .right-topbar { padding: 16px 24px; border-bottom: 0.5px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
        .right-topbar-title { font-size: 14px; font-weight: 600; color: #0f172a; }
        .alert-success { background: #f0fdf4; border: 0.5px solid #bbf7d0; color: #166534; font-size: 13px; padding: 10px 16px; margin: 12px 24px 0; border-radius: 8px; }
        .form-scroll { flex: 1; overflow-y: auto; padding: 24px; }
        .form-scroll::-webkit-scrollbar { width: 4px; }
        .form-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .section { margin-bottom: 28px; }
        .section-title { font-size: 11px; text-transform: uppercase; letter-spacing: 0.09em; color: #64748b; font-weight: 600; margin-bottom: 14px; display: flex; align-items: center; gap: 8px; }
        .section-title::after { content: ''; flex: 1; height: 0.5px; background: #e2e8f0; }
        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .grid3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }
        .full { grid-column: 1 / -1; }
        .field { display: flex; flex-direction: column; gap: 5px; }
        .field label { font-size: 11px; color: #64748b; font-weight: 500; }
        .field input, .field select, .field textarea { font-family: inherit; font-size: 13px; color: #0f172a; background: #f8fafc; border: 0.5px solid #e2e8f0; border-radius: 8px; padding: 9px 11px; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
        .field input:focus, .field select:focus, .field textarea:focus { border-color: #185FA5; box-shadow: 0 0 0 3px rgba(24,95,165,0.1); background: #fff; }
        .field textarea { resize: none; min-height: 76px; line-height: 1.5; }
        .form-footer { padding: 14px 24px; border-top: 0.5px solid #e2e8f0; flex-shrink: 0; }
        .btn-save { width: 100%; padding: 11px; background: #185FA5; color: white; font-family: inherit; font-size: 13px; font-weight: 600; border: none; border-radius: 8px; cursor: pointer; transition: background 0.15s; }
        .btn-save:hover { background: #0c447c; }
        .btn-save:active { transform: scale(0.99); }
    </style>
</head>
<body>

<div class="topbar">
    <h1>Profile User</h1>
    <a href="/dashboard">← Dashboard</a>
</div>

<div class="main">
    <div class="card">

        <!-- LEFT PANEL -->
        <div class="left-panel">
            <div class="avatar">{{ strtoupper(substr($user->nama_lengkap, 0, 2)) }}</div>
            <div class="left-name">{{ $user->nama_lengkap }}</div>
            <div class="left-nisn">{{ $user->nisn }}</div>
            <div class="divider"></div>
            <div class="info-label">Sekolah</div>
            <div class="info-val">{{ $user->asal_sekolah }}</div>
            <div class="info-label">No. HP</div>
            <div class="info-val">{{ $user->no_hp }}</div>
            <div class="info-label">Jurusan</div>
            <div class="info-val">{{ $user->jurusan }}</div>
            <span class="status-badge">{{ $user->status }}</span>
        </div>

        <!-- RIGHT PANEL -->
        <div class="right-panel">
            <div class="right-topbar">
                <span class="right-topbar-title">Lengkapi Profil</span>
            </div>

            @if(session('success'))
                <div class="alert-success">✓ {{ session('success') }}</div>
            @endif

            <form method="POST" action="/profile" style="display:flex;flex-direction:column;flex:1;min-height:0;">
                @csrf

                <div class="form-scroll">

                    <!-- ===== DATA DIRI ===== -->
                    <div class="section">
                        <div class="section-title">Data Diri</div>
                        <div class="grid2">
                            <div class="field">
                                <label>Jalur Pendaftaran</label>
                                <select name="jalur_pendaftaran">
                                    @foreach(['Afirmasi','Prestasi','Reguler'] as $j)
                                        <option value="{{ $j }}" {{ ($lanjutan->jalur_pendaftaran ?? '') == $j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin">
                                    @foreach(['Laki-laki','Perempuan'] as $jk)
                                        <option value="{{ $jk }}" {{ ($lanjutan->jenis_kelamin ?? '') == $jk ? 'selected' : '' }}>{{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir" value="{{ $lanjutan->tempat_lahir ?? '' }}" placeholder="Jakarta">
                            </div>
                            <div class="field">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ $lanjutan->tanggal_lahir ?? '' }}">
                            </div>
                            <div class="field">
                                <label>Agama</label>
                                <input name="agama" value="{{ $lanjutan->agama ?? '' }}" placeholder="Islam">
                            </div>
                            <div class="field">
                                <label>Cita-cita</label>
                                <input name="cita_cita" value="{{ $lanjutan->cita_cita ?? '' }}" placeholder="Dokter">
                            </div>
                            <div class="field full">
                                <label>Hobi</label>
                                <input name="hobi" value="{{ $lanjutan->hobi ?? '' }}" placeholder="Membaca, olahraga...">
                            </div>
                        </div>
                    </div>

                    <!-- ===== ORANG TUA ===== -->
                    <div class="section">
                        <div class="section-title">Orang Tua</div>
                        <div class="grid3">
                            {{-- AYAH --}}
                            <div class="field">
                                <label>Nama Ayah</label>
                                <input name="nama_ayah" value="{{ $lanjutan->nama_ayah ?? '' }}" placeholder="Budi Santoso">
                            </div>
                            <div class="field">
                                <label>Tahun Lahir Ayah</label>
                                <input name="tahun_lahir_ayah" value="{{ $lanjutan->tahun_lahir_ayah ?? '' }}" placeholder="1975">
                            </div>
                            <div class="field">
                                <label>Pekerjaan Ayah</label>
                                <input name="pekerjaan_ayah" value="{{ $lanjutan->pekerjaan_ayah ?? '' }}" placeholder="Wiraswasta">
                            </div>
                            <div class="field">
                                <label>Pendidikan Ayah</label>
                                <select name="pendidikan_ayah">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->pendidikan_ayah ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Penghasilan Ayah</label>
                                <select name="penghasilan_ayah">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->penghasilan_ayah ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field"></div>{{-- spacer --}}

                            {{-- IBU --}}
                            <div class="field">
                                <label>Nama Ibu</label>
                                <input name="nama_ibu" value="{{ $lanjutan->nama_ibu ?? '' }}" placeholder="Siti Rahayu">
                            </div>
                            <div class="field">
                                <label>Tahun Lahir Ibu</label>
                                <input name="tahun_lahir_ibu" value="{{ $lanjutan->tahun_lahir_ibu ?? '' }}" placeholder="1978">
                            </div>
                            <div class="field">
                                <label>Pekerjaan Ibu</label>
                                <input name="pekerjaan_ibu" value="{{ $lanjutan->pekerjaan_ibu ?? '' }}" placeholder="Ibu Rumah Tangga">
                            </div>
                            <div class="field">
                                <label>Pendidikan Ibu</label>
                                <select name="pendidikan_ibu">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->pendidikan_ibu ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Penghasilan Ibu</label>
                                <select name="penghasilan_ibu">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->penghasilan_ibu ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field"></div>{{-- spacer --}}

                            {{-- WALI --}}
                            <div class="field full">
                                <label>Nama Wali (isi jika ada)</label>
                                <input name="nama_wali" value="{{ $lanjutan->nama_wali ?? '' }}" placeholder="Kosongkan jika tidak ada wali">
                            </div>
                            <div class="field">
                                <label>Pendidikan Wali</label>
                                <select name="pendidikan_wali">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->pendidikan_wali ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Penghasilan Wali</label>
                                <select name="penghasilan_wali">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                        <option value="{{ $p }}" {{ ($lanjutan->penghasilan_wali ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Jenis Tinggal</label>
                                <select name="jenis_tinggal">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Bersama Orang Tua','Wali','Kost','Asrama/Pesantren','Panti Asuhan'] as $jt)
                                        <option value="{{ $jt }}" {{ ($lanjutan->jenis_tinggal ?? '') == $jt ? 'selected' : '' }}>{{ $jt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ALAMAT ===== -->
                    <div class="section">
                        <div class="section-title">Alamat Tempat Tinggal</div>
                        <div class="grid2">
                            <div class="field">
                                <label>Provinsi</label>
                                <input name="provinsi" value="{{ $lanjutan->provinsi ?? '' }}" placeholder="Jawa Barat">
                            </div>
                            <div class="field">
                                <label>Kabupaten / Kota</label>
                                <input name="kabupaten" value="{{ $lanjutan->kabupaten ?? '' }}" placeholder="Bandung">
                            </div>
                            <div class="field">
                                <label>Kecamatan</label>
                                <input name="kecamatan" value="{{ $lanjutan->kecamatan ?? '' }}" placeholder="Cicendo">
                            </div>
                            <div class="field">
                                <label>Desa / Kelurahan</label>
                                <input name="desa" value="{{ $lanjutan->desa ?? '' }}" placeholder="Arjuna">
                            </div>
                            <div class="field">
                                <label>Kode Pos</label>
                                <input name="kode_pos" value="{{ $lanjutan->kode_pos ?? '' }}" placeholder="40172">
                            </div>
                            <div class="field full">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" placeholder="Jl. Merdeka No. 12, RT 03/RW 04...">{{ $lanjutan->alamat_lengkap ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DATA FISIK & LAINNYA ===== -->
                    <div class="section">
                        <div class="section-title">Data Fisik & Lainnya</div>
                        <div class="grid3">
                            <div class="field">
                                <label>Tinggi Badan (cm)</label>
                                <input name="tinggi_badan" value="{{ $lanjutan->tinggi_badan ?? '' }}" placeholder="165">
                            </div>
                            <div class="field">
                                <label>Berat Badan (kg)</label>
                                <input name="berat_badan" value="{{ $lanjutan->berat_badan ?? '' }}" placeholder="55">
                            </div>
                            <div class="field">
                                <label>Ukuran Pakaian</label>
                                <input name="ukuran_pakaian" value="{{ $lanjutan->ukuran_pakaian ?? '' }}" placeholder="M">
                            </div>
                            <div class="field">
                                <label>Ukuran Sepatu</label>
                                <input name="ukuran_sepatu" value="{{ $lanjutan->ukuran_sepatu ?? '' }}" placeholder="40">
                            </div>
                            <div class="field">
                                <label>Berkebutuhan Khusus</label>
                                <input name="berkebutuhan_khusus" value="{{ $lanjutan->berkebutuhan_khusus ?? '' }}" placeholder="Tidak ada">
                            </div>
                            <div class="field">
                                <label>No. HP Orang Tua</label>
                                <input name="no_hp_ortu" value="{{ $lanjutan->no_hp_ortu ?? '' }}" placeholder="08xx">
                            </div>
                            <div class="field">
                                <label>Jarak ke Sekolah (km)</label>
                                <input name="jarak_ke_sekolah" value="{{ $lanjutan->jarak_ke_sekolah ?? '' }}" placeholder="5">
                            </div>
                            <div class="field">
                                <label>Alat Transportasi</label>
                                <select name="alat_transportasi">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Jalan Kaki','Kendaraan Pribadi','Kendaraan Umum','Jemputan','Ojek','Di Antarkan'] as $at)
                                        <option value="{{ $at }}" {{ ($lanjutan->alat_transportasi ?? '') == $at ? 'selected' : '' }}>{{ $at }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Jumlah Saudara</label>
                                <input name="jumlah_saudara" value="{{ $lanjutan->jumlah_saudara ?? '' }}" placeholder="Anak ke 2 dari 3 bersaudara">
                            </div>
                            <div class="field">
                                <label>Memiliki KIP?</label>
                                <select name="memiliki_kip">
                                    <option value="0" {{ ($lanjutan->memiliki_kip ?? 0) == 0 ? 'selected' : '' }}>Tidak</option>
                                    <option value="1" {{ ($lanjutan->memiliki_kip ?? 0) == 1 ? 'selected' : '' }}>Ya</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>No. KIP (jika ada)</label>
                                <input name="no_kip" value="{{ $lanjutan->no_kip ?? '' }}" placeholder="Nomor KIP">
                            </div>
                        </div>
                    </div>

                    <!-- ===== ASAL SEKOLAH SMP ===== -->
                    <div class="section">
                        <div class="section-title">Asal Sekolah (SMP)</div>
                        <div class="grid2">
                            <div class="field">
                                <label>Nama SMP</label>
                                <input name="nama_smp" value="{{ $lanjutan->nama_smp ?? '' }}" placeholder="SMP Negeri 1 Semarang">
                            </div>
                            <div class="field">
                                <label>NPSN</label>
                                <input name="npsn_smp" value="{{ $lanjutan->npsn_smp ?? '' }}" placeholder="20230001">
                            </div>
                            <div class="field">
                                <label>Provinsi SMP</label>
                                <input name="provinsi_smp" value="{{ $lanjutan->provinsi_smp ?? '' }}" placeholder="Jawa Tengah">
                            </div>
                            <div class="field">
                                <label>Kabupaten / Kota SMP</label>
                                <input name="kabupaten_smp" value="{{ $lanjutan->kabupaten_smp ?? '' }}" placeholder="Semarang">
                            </div>
                            <div class="field">
                                <label>Kecamatan SMP</label>
                                <input name="kecamatan_smp" value="{{ $lanjutan->kecamatan_smp ?? '' }}" placeholder="Tembalang">
                            </div>
                            <div class="field">
                                <label>Desa / Kelurahan SMP</label>
                                <input name="desa_smp" value="{{ $lanjutan->desa_smp ?? '' }}" placeholder="Bulusan">
                            </div>
                            <div class="field">
                                <label>Kode Pos SMP</label>
                                <input name="kode_pos_smp" value="{{ $lanjutan->kode_pos_smp ?? '' }}" placeholder="50277">
                            </div>
                            <div class="field">
                                <label>Tahun Lulus</label>
                                <input name="tahun_lulus" value="{{ $lanjutan->tahun_lulus ?? '' }}" placeholder="2024">
                            </div>
                            <div class="field full">
                                <label>Alamat SMP</label>
                                <textarea name="alamat_smp" placeholder="Jl. ...">{{ $lanjutan->alamat_smp ?? '' }}</textarea>
                            </div>
                            <div class="field">
                                <label>Dapat Info Dari Mana</label>
                                <input name="dari_mana_mengenal" value="{{ $lanjutan->dari_mana_mengenal ?? '' }}" placeholder="Media sosial, teman...">
                            </div>
                            <div class="field full">
                                <label>Mengapa Memilih Sekolah Ini?</label>
                                <textarea name="mengapa_memilih_samnus" placeholder="Tulis alasanmu di sini...">{{ $lanjutan->mengapa_memilih_samnus ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-footer">
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>