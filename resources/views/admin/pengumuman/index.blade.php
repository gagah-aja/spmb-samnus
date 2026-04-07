<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengumuman</title>

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif; }
        body { background:#f1f5f9; }
        .container { display:flex; }

        /* SIDEBAR */
        .sidebar {
            width:260px;
            min-height:100vh;
            background: linear-gradient(180deg,#0f172a,#1e293b);
            color:#e2e8f0;
            padding:20px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }
        .brand { display:flex; align-items:center; gap:10px; margin-bottom:20px; }
        .logo { width:40px; height:40px; border-radius:10px; background:linear-gradient(135deg,#3b82f6,#6366f1);
            display:flex; align-items:center; justify-content:center; color:white; font-weight:bold; }
        .menu-title { font-size:12px; color:#94a3b8; margin:15px 0; }
        .nav a { display:flex; align-items:center; gap:10px; padding:12px; border-radius:10px; text-decoration:none; color:#e2e8f0; transition:0.3s; }
        .nav a:hover { background: rgba(255,255,255,0.08); transform:translateX(5px); }
        .nav a.active { background:linear-gradient(135deg,#3b82f6,#6366f1); color:white; box-shadow:0 5px 15px rgba(59,130,246,0.4); }
        .profile { display:flex; gap:10px; align-items:center; }
        .avatar { width:35px; height:35px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:white; }
        .name { font-size:14px; } .status { font-size:12px; color:#94a3b8; }
        .logout { display:block; margin-top:10px; text-align:center; padding:10px; background:#ef4444; border-radius:8px; color:white; text-decoration:none; }

        /* MAIN */
        .main { flex:1; padding:30px; }
        .header { display:flex; justify-content:space-between; margin-bottom:20px; }
        .header h1 { font-size:26px; }

        .toolbar { display:flex; justify-content:space-between; margin-bottom:15px; }
        .search { padding:10px; width:250px; border-radius:8px; border:1px solid #ccc; }
        .btn { padding:10px 15px; border:none; border-radius:8px; color:white; cursor:pointer; }
        .btn-add { background:#22c55e; }
        .btn-edit { background:#3b82f6; }
        .btn-delete { background:#ef4444; }

        .table-box { background:white; padding:20px; border-radius:12px; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:12px; text-align:left; }
        th { background:#e2e8f0; }
        tr:hover { background:#f9fafb; }
        .action-btns { display:flex; gap:5px; }
    </style>
</head>

<body>

    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Pengumuman</h1>
            </div>

            <div class="toolbar">
                <input type="text" class="search" placeholder="Cari pengumuman...">
                <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-add">+ Tambah</a>
            </div>

            @php
                $pengumuman = [
                    ['judul' => 'Pendaftaran Dibuka', 'tanggal' => '01 Apr 2026'],
                    ['judul' => 'Pengumuman Lulus Seleksi', 'tanggal' => '15 Apr 2026'],
                    ['judul' => 'Jadwal Wawancara', 'tanggal' => '20 Apr 2026'],
                    ['judul' => 'Libur Nasional', 'tanggal' => '01 Mei 2026'],
                ];
            @endphp

            <div class="table-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach ($pengumuman as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p['judul'] }}</td>
                            <td>{{ $p['tanggal'] }}</td>
                            <td class="action-btns">
                                <a href="{{ route('admin.pengumuman.edit', ['id' => $i + 1]) }}" class="btn btn-edit">Edit</a>
                                <button onclick="hapusDummy(this)" class="btn btn-delete">Hapus</button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>

    <script>
        function hapusDummy(btn) {
            if (confirm('Apakah kamu yakin ingin menghapus pengumuman ini?')) {
                const row = btn.closest('tr');
                row.remove();
                alert('Pengumuman berhasil dihapus (dummy)');
            }
        }
    </script>

</body>
</html>