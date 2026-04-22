<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengumuman</title>

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

        /* CSS Sidebar internal dihapus */

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
            justify-content: center;
        }

        td {
            word-wrap: break-word;
            white-space: normal;
            text-align: center;
        }

        td.isi {
            max-width: 250px;
            /* batas lebar */
            word-wrap: break-word;
            white-space: normal;
        }

        th {
            text-align: center;
        }

        .btn-detail {
            background: #f59e0b;
            /* kuning/orange */
            color: white;
        }
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

            {{-- @php
                $pengumuman = [
                    ['judul' => 'Pendaftaran Dibuka', 'tanggal' => '01 Apr 2026'],
                    ['judul' => 'Pengumuman Lulus Seleksi', 'tanggal' => '15 Apr 2026'],
                    ['judul' => 'Jadwal Wawancara', 'tanggal' => '20 Apr 2026'],
                    ['judul' => 'Libur Nasional', 'tanggal' => '01 Mei 2026'],
                ];
            @endphp --}}

            <div class="table-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($pengumuman as $i => $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($p->gambar)
                                    <img src="{{ asset('storage/' . $p->gambar) }}" width="80">
                                @else
                                    <small>No Image</small>
                                @endif
                            </td>
                            <td>{{ $p->judul }}</td>
                            <td class="isi">
                                {{ \Illuminate\Support\Str::words($p->isi, 50, '...') }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                            <td class="action-btns">
                                <a href="{{ route('admin.pengumuman.edit', $p->id) }}" class="btn btn-edit">Edit</a>
                                <a href="{{ route('admin.pengumuman.show', $p->id) }}" class="btn btn-detail">Detail</a>
                                <form action="{{ route('admin.pengumuman.destroy', $p->id) }}" method="POST"
                                    class="form-delete-pengumuman" data-judul="{{ $p->judul }}"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-delete btn-hapus-pengumuman">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-hapus-pengumuman').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('.form-delete-pengumuman');
                const judul = form.getAttribute('data-judul');

                Swal.fire({
                    title: 'Yakin hapus?',
                    text: `Data tidak bisa dikembalikan! Hapus pengumuman "${judul}"?`,
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
