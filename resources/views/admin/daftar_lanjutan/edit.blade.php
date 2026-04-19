{{-- {{ dd($daftarLanjutan, $daftarLanjutan->id) }} --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Daftar Lanjutan</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        html, body { height: 100%; overflow: hidden; background: #f1f5f9; }
        .container { display: flex; height: 100vh; overflow: hidden; }
        .main { flex: 1; display: flex; flex-direction: column; height: 100vh; padding: 30px; overflow: hidden; }
        .header { margin-bottom: 10px; }
        .header h1 { font-size: 24px; color: #0f172a; margin-bottom: 5px; }
        .breadcrumb { font-size: 13px; color: #64748b; margin-bottom: 16px; }
        .breadcrumb a { color: #3b82f6; text-decoration: none; }
        .breadcrumb span { margin: 0 5px; }

        .form-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            flex: 1;
            overflow-y: auto;
            padding: 28px 32px;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }
        .form-card::-webkit-scrollbar { width: 5px; }
        .form-card::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
            margin: 24px 0 14px;
        }
        .section-title:first-child { margin-top: 0; }

        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .grid3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
        .full { grid-column: 1 / -1; }

        .field { display: flex; flex-direction: column; gap: 5px; }
        .field label { font-size: 12px; font-weight: 600; color: #475569; }
        .field input,
        .field select,
        .field textarea {
            font-family: inherit;
            font-size: 13px;
            color: #0f172a;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 9px 12px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
            background: #fff;
        }
        .field input[readonly] {
            background: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
        }
        .field textarea { resize: none; min-height: 76px; line-height: 1.5; }

        .btn-group { margin-top: 24px; display: flex; gap: 10px; }
        .btn-submit {
            flex: 1; padding: 11px; background: #22c55e; color: white;
            border: none; border-radius: 9px; font-weight: 600; font-size: 13px;
            cursor: pointer; transition: background 0.15s;
        }
        .btn-submit:hover { background: #16a34a; }
        .btn-back {
            flex: 1; padding: 11px; background: #3b82f6; color: white;
            border: none; border-radius: 9px; font-weight: 600; font-size: 13px;
            text-align: center; text-decoration: none; display: flex;
            align-items: center; justify-content: center; transition: background 0.15s;
        }
        .btn-back:hover { background: #1d4ed8; }
    </style>
</head>
<body>
<div class="container">
    @include('admin.sidebar')

    <div class="main">
        <div class="header">
            <h1>Edit Daftar Lanjutan</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a> <span>/</span>
                <a href="{{ route('admin.daftar-lanjutan.index') }}">Daftar Lanjutan</a> <span>/</span>
                <span>Edit</span>
            </div>
        </div>

        <div class="form-card">
            {{-- ✅ PERBAIKAN: tambahkan $daftarLanjutan->id di sini --}}
           <form action="{{ route('admin.daftar-lanjutan.update', $daftarLanjutan->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- ===== DATA PENDAFTAR (readonly) ===== --}}
                <div class="section-title">Data Pendaftar</div>
                <div class="grid2">
                    <div class="field">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->nama_lengkap }}" readonly>
                    </div>
                    <div class="field">
                        <label>NISN</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->nisn }}" readonly>
                    </div>
                    <div class="field">
                        <label>No. HP</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->no_hp }}" readonly>
                    </div>
                    <div class="field">
                        <label>Asal Sekolah</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->asal_sekolah }}" readonly>
                    </div>
                    <div class="field">
                        <label>Jurusan</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->jurusan }}" readonly>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <input type="text" value="{{ optional($daftarLanjutan->pendaftar)->status }}" readonly>
                    </div>
                </div>

                {{-- ===== DATA DIRI ===== --}}
                <div class="section-title">Data Diri</div>
                <div class="grid2">
                    <div class="field">
                        <label>Jalur Pendaftaran</label>
                        <select name="jalur_pendaftaran">
                            @foreach(['Afirmasi','Prestasi','Reguler'] as $j)
                                <option value="{{ $j }}" {{ $daftarLanjutan->jalur_pendaftaran == $j ? 'selected' : '' }}>{{ $j }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            @foreach(['Laki-laki','Perempuan'] as $jk)
                                <option value="{{ $jk }}" {{ $daftarLanjutan->jenis_kelamin == $jk ? 'selected' : '' }}>{{ $jk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $daftarLanjutan->tempat_lahir }}">
                    </div>
                    <div class="field">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $daftarLanjutan->tanggal_lahir ? \Carbon\Carbon::parse($daftarLanjutan->tanggal_lahir)->format('Y-m-d') : '' }}">
                    </div>
                    <div class="field">
                        <label>Agama</label>
                        <input type="text" name="agama" value="{{ $daftarLanjutan->agama }}">
                    </div>
                    <div class="field">
                        <label>Cita-cita</label>
                        <input type="text" name="cita_cita" value="{{ $daftarLanjutan->cita_cita }}">
                    </div>
                    <div class="field full">
                        <label>Hobi</label>
                        <input type="text" name="hobi" value="{{ $daftarLanjutan->hobi }}">
                    </div>
                </div>

                {{-- ===== ORANG TUA ===== --}}
                <div class="section-title">Orang Tua</div>
                <div class="grid3">
                    <div class="field">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ $daftarLanjutan->nama_ayah }}">
                    </div>
                    <div class="field">
                        <label>Tahun Lahir Ayah</label>
                        <input type="text" name="tahun_lahir_ayah" value="{{ $daftarLanjutan->tahun_lahir_ayah }}">
                    </div>
                    <div class="field">
                        <label>Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" value="{{ $daftarLanjutan->pekerjaan_ayah }}">
                    </div>
                    <div class="field">
                        <label>Pendidikan Ayah</label>
                        <select name="pendidikan_ayah">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->pendidikan_ayah == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Penghasilan Ayah</label>
                        <select name="penghasilan_ayah">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->penghasilan_ayah == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field"></div>

                    <div class="field">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ $daftarLanjutan->nama_ibu }}">
                    </div>
                    <div class="field">
                        <label>Tahun Lahir Ibu</label>
                        <input type="text" name="tahun_lahir_ibu" value="{{ $daftarLanjutan->tahun_lahir_ibu }}">
                    </div>
                    <div class="field">
                        <label>Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" value="{{ $daftarLanjutan->pekerjaan_ibu }}">
                    </div>
                    <div class="field">
                        <label>Pendidikan Ibu</label>
                        <select name="pendidikan_ibu">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->pendidikan_ibu == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Penghasilan Ibu</label>
                        <select name="penghasilan_ibu">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->penghasilan_ibu == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field"></div>

                    <div class="field full">
                        <label>Nama Wali (jika ada)</label>
                        <input type="text" name="nama_wali" value="{{ $daftarLanjutan->nama_wali }}">
                    </div>
                    <div class="field">
                        <label>Pendidikan Wali</label>
                        <select name="pendidikan_wali">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->pendidikan_wali == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Penghasilan Wali</label>
                        <select name="penghasilan_wali">
                            <option value="">-- Pilih --</option>
                            @foreach(['Tidak Berpenghasilan','Kurang Dari 1.000.000','1.000.000-2.000.000','Lebih Dari 3.000.000'] as $p)
                                <option value="{{ $p }}" {{ $daftarLanjutan->penghasilan_wali == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Jenis Tinggal</label>
                        <select name="jenis_tinggal">
                            <option value="">-- Pilih --</option>
                            @foreach(['Bersama Orang Tua','Wali','Kost','Asrama/Pesantren','Panti Asuhan'] as $jt)
                                <option value="{{ $jt }}" {{ $daftarLanjutan->jenis_tinggal == $jt ? 'selected' : '' }}>{{ $jt }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- ===== ALAMAT ===== --}}
                <div class="section-title">Alamat Tempat Tinggal</div>
                <div class="grid2">
                    <div class="field">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="{{ $daftarLanjutan->provinsi }}">
                    </div>
                    <div class="field">
                        <label>Kabupaten / Kota</label>
                        <input type="text" name="kabupaten" value="{{ $daftarLanjutan->kabupaten }}">
                    </div>
                    <div class="field">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ $daftarLanjutan->kecamatan }}">
                    </div>
                    <div class="field">
                        <label>Desa / Kelurahan</label>
                        <input type="text" name="desa" value="{{ $daftarLanjutan->desa }}">
                    </div>
                    <div class="field">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ $daftarLanjutan->kode_pos }}">
                    </div>
                    <div class="field full">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat_lengkap">{{ $daftarLanjutan->alamat_lengkap }}</textarea>
                    </div>
                </div>

                {{-- ===== FISIK & LAINNYA ===== --}}
                <div class="section-title">Data Fisik & Lainnya</div>
                <div class="grid3">
                    <div class="field">
                        <label>Tinggi Badan (cm)</label>
                        <input type="text" name="tinggi_badan" value="{{ $daftarLanjutan->tinggi_badan }}">
                    </div>
                    <div class="field">
                        <label>Berat Badan (kg)</label>
                        <input type="text" name="berat_badan" value="{{ $daftarLanjutan->berat_badan }}">
                    </div>
                    <div class="field">
                        <label>Ukuran Pakaian</label>
                        <input type="text" name="ukuran_pakaian" value="{{ $daftarLanjutan->ukuran_pakaian }}">
                    </div>
                    <div class="field">
                        <label>Ukuran Sepatu</label>
                        <input type="text" name="ukuran_sepatu" value="{{ $daftarLanjutan->ukuran_sepatu }}">
                    </div>
                    <div class="field">
                        <label>Berkebutuhan Khusus</label>
                        <input type="text" name="berkebutuhan_khusus" value="{{ $daftarLanjutan->berkebutuhan_khusus }}">
                    </div>
                    <div class="field">
                        <label>No. HP Orang Tua</label>
                        <input type="text" name="no_hp_ortu" value="{{ $daftarLanjutan->no_hp_ortu }}">
                    </div>
                    <div class="field">
                        <label>Jarak ke Sekolah (km)</label>
                        <input type="text" name="jarak_ke_sekolah" value="{{ $daftarLanjutan->jarak_ke_sekolah }}">
                    </div>
                    <div class="field">
                        <label>Alat Transportasi</label>
                        <select name="alat_transportasi">
                            <option value="">-- Pilih --</option>
                            @foreach(['Jalan Kaki','Kendaraan Pribadi','Kendaraan Umum','Jemputan','Ojek','Di Antarkan'] as $at)
                                <option value="{{ $at }}" {{ $daftarLanjutan->alat_transportasi == $at ? 'selected' : '' }}>{{ $at }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Jumlah Saudara</label>
                        <input type="text" name="jumlah_saudara" value="{{ $daftarLanjutan->jumlah_saudara }}">
                    </div>
                    <div class="field">
                        <label>Memiliki KIP?</label>
                        <select name="memiliki_kip">
                            <option value="0" {{ $daftarLanjutan->memiliki_kip == 0 ? 'selected' : '' }}>Tidak</option>
                            <option value="1" {{ $daftarLanjutan->memiliki_kip == 1 ? 'selected' : '' }}>Ya</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>No. KIP</label>
                        <input type="text" name="no_kip" value="{{ $daftarLanjutan->no_kip }}">
                    </div>
                </div>

                {{-- ===== ASAL SEKOLAH SMP ===== --}}
                <div class="section-title">Asal Sekolah (SMP)</div>
                <div class="grid2">
                    <div class="field">
                        <label>Nama SMP</label>
                        <input type="text" name="nama_smp" value="{{ $daftarLanjutan->nama_smp }}">
                    </div>
                    <div class="field">
                        <label>NPSN</label>
                        <input type="text" name="npsn_smp" value="{{ $daftarLanjutan->npsn_smp }}">
                    </div>
                    <div class="field">
                        <label>Provinsi SMP</label>
                        <input type="text" name="provinsi_smp" value="{{ $daftarLanjutan->provinsi_smp }}">
                    </div>
                    <div class="field">
                        <label>Kabupaten SMP</label>
                        <input type="text" name="kabupaten_smp" value="{{ $daftarLanjutan->kabupaten_smp }}">
                    </div>
                    <div class="field">
                        <label>Kecamatan SMP</label>
                        <input type="text" name="kecamatan_smp" value="{{ $daftarLanjutan->kecamatan_smp }}">
                    </div>
                    <div class="field">
                        <label>Desa SMP</label>
                        <input type="text" name="desa_smp" value="{{ $daftarLanjutan->desa_smp }}">
                    </div>
                    <div class="field">
                        <label>Kode Pos SMP</label>
                        <input type="text" name="kode_pos_smp" value="{{ $daftarLanjutan->kode_pos_smp }}">
                    </div>
                    <div class="field">
                        <label>Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" value="{{ $daftarLanjutan->tahun_lulus }}">
                    </div>
                    <div class="field full">
                        <label>Alamat SMP</label>
                        <textarea name="alamat_smp">{{ $daftarLanjutan->alamat_smp }}</textarea>
                    </div>
                    <div class="field">
                        <label>Dapat Info Dari Mana</label>
                        <input type="text" name="dari_mana_mengenal" value="{{ $daftarLanjutan->dari_mana_mengenal }}">
                    </div>
                    <div class="field full">
                        <label>Mengapa Memilih Sekolah Ini?</label>
                        <textarea name="mengapa_memilih_samnus">{{ $daftarLanjutan->mengapa_memilih_samnus }}</textarea>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.daftar-lanjutan.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>