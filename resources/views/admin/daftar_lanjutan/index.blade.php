<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Daftar Lanjutan</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
            margin-bottom: 15px;
        }

        /* TOOLBAR */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .left {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search,
        .filter {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .search {
            width: 250px;
        }

        .filter {
            width: 180px;
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

        .btn-reset {
            background: #6b7280;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-top: 15px;
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

        .action-btns {
            display: flex;
            gap: 5px;
        }

        .alert-success {
            background: #22c55e;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Data Daftar Lanjutan</h1>

                <div class="toolbar">

                    <!-- KIRI -->
                    <form method="GET" action="{{ route('admin.daftar-lanjutan.index') }}" class="left">

                        <!-- SEARCH -->
                        <input type="text" name="search" class="search" placeholder="Cari nama..."
                            value="{{ request('search') }}">

                        <!-- FILTER STATUS -->
                        <select name="status" class="filter">
                            <option value="">Semua Status</option>
                            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>

                        <!-- BUTTON -->
                        <button type="submit" class="btn btn-edit">
                            <i class="fas fa-search"></i> Cari
                        </button>

                        <a href="{{ route('admin.daftar-lanjutan.index') }}" class="btn btn-reset">
                            Reset
                        </a>
                    </form>

                    <!-- KANAN -->
                    <a href="{{ route('admin.daftar-lanjutan.export', request()->all()) }}" class="btn btn-add">
                        <i class="fas fa-file-csv"></i> Export CSV
                    </a>

                </div>
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
                                <td>{{ $d->pendaftar->asal_sekolah ?? '-' }}</td>
                                <td>{{ $d->jalur_pendaftaran ?? '-' }}</td>
                                <td>{{ $d->pendaftar->no_hp ?? '-' }}</td>
                                <td class="action-btns">
                                    <a href="{{ route('admin.daftar-lanjutan.show', $d->id) }}" class="btn btn-reset">
                                        Show
                                    </a>

                                    <a href="{{ route('admin.daftar-lanjutan.edit', $d->id) }}"
                                        class="btn btn-edit">Edit</a>

                                    <form action="{{ route('admin.daftar-lanjutan.destroy', $d->id) }}" method="POST"
                                        class="form-delete-daftar"
                                        data-nama="{{ $d->pendaftar->nama_lengkap ?? 'Data ini' }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-delete btn-hapus-daftar">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center; color:#6b7280;">
                                    Data tidak ditemukan
                                </td>
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

    <script>
        document.querySelectorAll('.btn-hapus-daftar').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('.form-delete-daftar');
                const nama = form.getAttribute('data-nama');

                Swal.fire({
                    title: 'Yakin hapus?',
                    text: `Data "${nama}" akan dihapus permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>

</html>
