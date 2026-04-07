<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pendaftar</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
            padding: 14px;
        }

        th {
            background: #e2e8f0;
            font-size: 13px;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* ================= BADGE ================= */
        .badge {
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
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
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
            gap: 8px;
        }

        /* ================= MODAL ================= */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            width: 320px;
        }

        textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: vertical;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div>
                <div class="logo">SPMB Admin</div>

                <div class="menu">
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.data-pendaftar') }}"
                        class="{{ request()->routeIs('admin.data-pendaftar*') ? 'active' : '' }}">Data Pendaftar</a>
                    <a href="{{ route('admin.verifikasi') }}"
                        class="{{ request()->routeIs('admin.verifikasi*') ? 'active' : '' }}">Verifikasi</a>
                    <a href="{{ route('admin.pengumuman') }}"
                        class="{{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">Pengumuman</a>
                    <a href="{{ route('admin.pengaturan') }}"
                        class="{{ request()->routeIs('admin.pengaturan*') ? 'active' : '' }}">Pengaturan</a>
                </div>
            </div>

            <div class="bottom">
                <p>Admin</p>
                <a href="{{ route('logout') }}" class="logout">Logout</a>
            </div>
        </div>

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
                            <th>Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $i => $d)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->asal_sekolah }}</td>
                                <td>{{ $d->nisn }}</td>
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
                                            onclick="lihatDetail('{{ $d->notifikasi->pesan ?? '' }}')">
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
    <div id="modal" class="modal">
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
    </script>

</body>

</html>
