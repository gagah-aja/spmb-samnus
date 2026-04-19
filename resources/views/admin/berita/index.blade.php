<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Berita</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 30px;
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
        }

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

        .btn-detail {
            background: #f59e0b;
        }

        .table-box {
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            flex: 1;
            overflow: hidden;
        }

        .table-scroll {
            overflow-y: auto;
            flex: 1;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
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
            justify-content: center;
        }

        td.konten {
            max-width: 200px;
            word-wrap: break-word;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .badge-published {
            background: #22c55e;
        }

        .badge-draft {
            background: #94a3b8;
        }

        .badge-kategori {
            background: #3b82f6;
        }

        .alert-success {
            background: #dcfce7;
            color: #166634;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .no-data {
            padding: 30px;
            text-align: center;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')

        <div class="main">
            <div class="header">
                <h1>Berita</h1>
            </div>

            @if (session('success'))
                <div class="alert-success" id="successAlert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="toolbar">
                <form method="GET" action="{{ route('admin.berita.index') }}" style="display:flex; gap:10px;">

                    <input type="text" name="search" class="search" placeholder="Cari berita..."
                        value="{{ request('search') }}">

                    <button type="submit" class="btn btn-edit">
                        <i class="fas fa-search"></i> Cari
                    </button>

                    <a href="{{ route('admin.berita.index') }}" class="btn btn-delete">
                        <i class="fas fa-rotate-left"></i> Reset
                    </a>
                </form>

                <a href="{{ route('admin.berita.create') }}" class="btn btn-add">
                    + Tambah
                </a>
            </div>

            <div class="table-box">
                <div class="table-scroll">

                    <table>
                        <tr>
                            <th>No</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Konten</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                        @forelse ($beritas as $berita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" width="70"
                                            style="border-radius:6px;">
                                    @else
                                        <small>No Image</small>
                                    @endif
                                </td>

                                <td>{{ $berita->judul }}</td>

                                <td>
                                    <span class="badge badge-kategori">
                                        {{ $berita->kategori->nama ?? '-' }}
                                    </span>
                                </td>

                                <td class="konten">
                                    {{ \Illuminate\Support\Str::words($berita->konten, 15, '...') }}
                                </td>

                                <td>
                                    <span class="badge badge-{{ $berita->status }}">
                                        {{ ucfirst($berita->status) }}
                                    </span>
                                </td>

                                <td>{{ $berita->created_at->format('d M Y') }}</td>

                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                            class="btn btn-edit">Edit</a>

                                        <a href="{{ route('admin.berita.show', $berita->id) }}"
                                            class="btn btn-detail">Detail</a>

                                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                            class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-delete btn-hapus">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="no-data">
                                        <i class="fas fa-folder-open fa-2x"></i><br><br>
                                        Tidak ada data berita
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </table>

                    <div style="margin-top:15px;">
                        {{ $beritas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        // AUTO HIDE ALERT
        setTimeout(() => {
            let alert = document.getElementById('successAlert');
            if (alert) alert.style.display = 'none';
        }, 3000);

        // DELETE CONFIRM
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function() {
                let form = this.closest('.form-delete');

                Swal.fire({
                    title: 'Yakin hapus?',
                    text: "Data tidak bisa dikembalikan!",
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
