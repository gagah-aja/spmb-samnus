<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI';
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

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
        }

        /* TOOLBAR */
        .toolbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .search {
            padding: 10px;
            width: 250px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-add {
            background: #22c55e;
        }

        .btn-edit {
            background: #3b82f6;
        }

        .btn-delete {
            background: #ef4444;
        }

        /* TABLE */
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background: #e2e8f0;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
        }

        .disetujui {
            background: #22c55e;
        }

        .proses {
            background: #f59e0b;
        }

        .ditolak {
            background: #ef4444;
        }

        .action-btns {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>

    <div class="container">

        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Data Pendaftar</h1>
            </div>

            <!-- TOOLBAR -->
            <div class="toolbar">
                <input type="text" class="search" placeholder="Cari nama...">
                <a href="{{ route('admin.data-pendaftar.create') }}" class="btn btn-add">+ Tambah</a>
            </div>

            @if (session('success'))
                <div style="background:#22c55e; color:white; padding:10px; border-radius:8px; margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif
            <!-- TABLE -->
            <div class="table-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Asal Sekolah</th>
                        <th>NISN</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach ($data as $i => $d)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $d->nama_lengkap }}</td>
                            <td>{{ $d->asal_sekolah }}</td>
                            <td>{{ $d->nisn }}</td>
                            <td>{{ $d->no_hp }}</td>
                            <td>
                                <span class="badge {{ $d->status }}">
                                    {{ ucfirst($d->status) }}
                                </span>
                            </td>
                            <td class="action-btns">
                                <a href="{{ route('admin.data-pendaftar.edit', $d->id) }}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('admin.data-pendaftar.destroy', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
    <script>
        function hapusDummy(btn) {
            if (confirm('Apakah kamu yakin ingin menghapus pendaftar ini?')) {
                const row = btn.closest('tr');
                row.remove(); // hapus baris tabel
                alert('Data pendaftar berhasil dihapus (dummy)');
            }
        }
    </script>
</body>

</html>
