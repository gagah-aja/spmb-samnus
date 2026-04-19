<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Daftar Lanjutan</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif; }
        body { background:#f1f5f9; }
        .container { display:flex; }
        .main { flex:1; padding:30px; }
        .header { display:flex; justify-content:space-between; margin-bottom:20px; }
        .header h1 { font-size:26px; }
        .toolbar { display:flex; justify-content:space-between; margin-bottom:15px; }
        .search { padding:10px; width:250px; border-radius:8px; border:1px solid #ccc; }
        .btn { padding:10px 15px; border:none; border-radius:8px; color:white; cursor:pointer; text-decoration:none; font-size:14px; display:inline-block; }
        .btn-add { background:#22c55e; }
        .btn-edit { background:#3b82f6; }
        .btn-delete { background:#ef4444; }
        .table-box { background:white; padding:20px; border-radius:12px; box-shadow:0 5px 20px rgba(0,0,0,0.05); }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:12px; text-align:left; }
        th { background:#e2e8f0; }
        tr:hover { background:#f9fafb; }
        .action-btns { display:flex; gap:5px; }
        .alert-success { background:#22c55e; color:white; padding:10px; border-radius:8px; margin-bottom:10px; }
    </style>
</head>
<body>

<div class="container">
    @include('admin.sidebar')

    <div class="main">
        <div class="header">
            <h1>Data Daftar Lanjutan</h1>
            <a href="{{ route('admin.daftar-lanjutan.export') }}" class="btn btn-add">
                <i class="fas fa-file-csv"></i> Export CSV
            </a>
        </div>

        <div class="toolbar">
            <form method="GET" action="{{ route('admin.daftar-lanjutan.index') }}" style="display:flex; gap:10px;">
                <input type="text" name="search" class="search" placeholder="Cari nama..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn" style="background:#3b82f6;">Cari</button>
                <a href="{{ route('admin.daftar-lanjutan.index') }}" class="btn" style="background:#6b7280;">Reset</a>
            </form>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Asal Sekolah</th>
                        <th>Jalur Pendaftaran</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($daftarLanjutans as $i => $d)
                        <tr>
                            <td>{{ $daftarLanjutans->firstItem() + $i }}</td>
                            <td>{{ $d->pendaftar->nama_lengkap ?? '-' }}</td>
                            <td>{{ $d->asal_sekolah_siswa ?? '-' }}</td>
                            <td>{{ $d->jalur_pendaftaran ?? '-' }}</td>
                            <td>{{ $d->pendaftar->no_hp ?? '-' }}</td>
                            <td class="action-btns">
                                <a href="{{ route('admin.daftar-lanjutan.edit', $d->id) }}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('admin.daftar-lanjutan.destroy', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; color:#6b7280;">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="margin-top:20px;">
                {{ $daftarLanjutans->links() }}
            </div>
        </div>
    </div>
</div>

</body>
</html>