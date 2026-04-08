<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        /* ===== MAIN CONTENT ===== */
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
            font-size: 14px;
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
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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

            <div class="toolbar">
                <input type="text" class="search" placeholder="Cari nama...">
                <a href="{{ route('admin.data-pendaftar.create') }}" class="btn btn-add">+ Tambah</a>
            </div>

            @if (session('success'))
                <div style="background:#22c55e; color:white; padding:10px; border-radius:8px; margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>NISN</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <a href="{{ route('admin.data-pendaftar.edit', $d->id) }}"
                                        class="btn btn-edit">Edit</a>
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
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
