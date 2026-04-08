<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pendaftar</title>

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

        /* ================= MAIN ================= */
        .main {
            flex: 1;
            padding: 30px;
        }

        .header h1 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        .toolbar {
            margin-bottom: 15px;
        }

        .search {
            padding: 10px;
            width: 250px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        /* ================= TABLE ================= */
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
            text-align: center; /* semua td center */
            vertical-align: middle;
        }

        th {
            background: #e2e8f0;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* ================= BADGE ================= */
        .badge {
            display: inline-block;
            min-width: 70px;
            text-align: center;
            padding: 6px 12px;
            border-radius: 20px;
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

        /* ================= BUTTON ================= */
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-approve {
            background: #22c55e;
        }

        .btn-reject {
            background: #ef4444;
        }

        .btn-detail {
            background: #3b82f6;
        }

        .btn-cancel {
            background: #64748b;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .action-btns {
            display: flex;
            justify-content: center;
            gap: 6px;
        }
    </style>
</head>

<body>

    <div class="container">

        @include('admin.sidebar')

        <!-- MAIN -->
        <div class="main">

            <div class="header">
                <h1>Verifikasi Pendaftar</h1>
            </div>

            <div class="toolbar">
                <input type="text" class="search" placeholder="Cari nama...">
            </div>

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
                                    @if ($d->status == 'proses')
                                        <button class="btn btn-approve"
                                            onclick="openModal({{ $d->id }}, 'setuju')">Setuju</button>
                                        <button class="btn btn-reject"
                                            onclick="openModal({{ $d->id }}, 'tolak')">Tolak</button>
                                    @else
                                        <button class="btn btn-detail"
                                            onclick="openDetailModal({{ $d->id }}, '{{ addslashes($d->notifikasi->pesan ?? '') }}')">
                                            Detail
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- MODAL -->
    <div id="modal" class="modal" style="display:none;">
        <div class="modal-box">
            <h3>Isi Pesan</h3>

            <form id="formAksi" method="POST">
                @csrf
                <textarea name="pesan" required></textarea>

                <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:15px;">
                    <button type="button" class="btn btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-approve">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, aksi) {
            const modal = document.getElementById('modal');
            const form = document.getElementById('formAksi');

            form.action = aksi === 'setuju' ?
                `/admin/verifikasi/${id}/setuju` :
                `/admin/verifikasi/${id}/tolak`;

            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openDetailModal(id, pesan) {
            const modal = document.getElementById('modal');
            const form = document.getElementById('formAksi');
            const textarea = form.querySelector('textarea');

            form.action = `/admin/verifikasi/${id}/update-pesan`;
            textarea.value = pesan;

            modal.style.display = 'flex';
        }
    </script>

</body>

</html>