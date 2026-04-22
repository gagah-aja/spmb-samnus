<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kategori Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
            display: inline-block;
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

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('admin.sidebar')
        <div class="main">
            <div class="header">
                <h1>Kategori Berita</h1>
            </div>

            <div class="toolbar">

                <!-- LEFT: SEARCH + RESET -->
                <div style="display:flex; gap:10px;">
                    <form method="GET" action="{{ route('admin.kategori-berita.index') }}"
                        style="display:flex; gap:10px;">

                        <input type="text" name="search" class="search" placeholder="Cari kategori..."
                            value="{{ request('search') }}">

                        <button type="submit" class="btn" style="background:#3b82f6;">
                            Cari
                        </button>

                        <a href="{{ route('admin.kategori-berita.index') }}" class="btn" style="background:#6b7280;">
                            Reset
                        </a>

                    </form>
                </div>

                <!-- RIGHT: TAMBAH -->
                <div style="display:flex; gap:10px;">
                    <a href="{{ route('admin.kategori-berita.create') }}" class="btn btn-add">
                        + Tambah
                    </a>
                </div>

            </div>

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Slug</th>
                        <th>Jumlah Berita</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>{{ $kategori->slug }}</td>
                            <td>{{ $kategori->beritas_count }}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.kategori-berita.edit', $kategori->id) }}"
                                        class="btn btn-edit">Edit</a>
                                    <form action="{{ route('admin.kategori-berita.destroy', $kategori->id) }}"
                                        method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <form action="{{ route('admin.kategori-berita.destroy', $kategori->id) }}"
                                            method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-delete btn-hapus">
                                                Hapus
                                            </button>
                                        </form>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div style="margin-top:15px;">{{ $kategoris->links() }}</div>
            </div>
        </div>
    </div>

    <script>
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
