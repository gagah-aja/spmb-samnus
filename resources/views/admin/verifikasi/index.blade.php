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

        .main {
            flex: 1;
            padding: 30px;
        }

        .header h1 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        .toolbar {
            margin-bottom: 20px;
        }

        .toolbar form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search {
            padding: 10px;
            width: 250px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .dropdown-filter {
            position: relative;
            width: 180px;
            cursor: pointer;
        }

        .dropdown-selected {
            background: white;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
        }

        .dropdown-menu {
            position: absolute;
            top: 110%;
            width: 100%;
            background: white;
            border-radius: 8px;
            display: none;
        }

        .dropdown-menu div {
            padding: 10px;
        }

        .dropdown-menu div:hover {
            background: #3b82f6;
            color: white;
        }

        .dropdown-filter:hover .dropdown-menu {
            display: block;
        }

        .btn {
            padding: 10px 14px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
        }

        .btn-search {
            background: #3b82f6;
        }

        .btn-reset {
            background: #6b7280;
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

        .action-btns {
            display: flex;
            justify-content: center;
            gap: 6px;
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

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
        }
    </style>
</head>

<body>

    <div class="container">
        @include('admin.sidebar')

        <div class="main">

            <div class="header">
                <h1>Verifikasi Pendaftar</h1>
            </div>

            <div class="toolbar">
                <form method="GET" action="{{ route('admin.verifikasi') }}">
                    <input type="text" name="search" class="search" placeholder="Cari nama..."
                        value="{{ request('search') }}">

                    <div class="dropdown-filter">
                        <div class="dropdown-selected">
                            <span id="selectedText">
                                {{ request('status') ? ucfirst(request('status')) : 'Semua Status' }}
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="dropdown-menu">
                            <div onclick="setStatus('')">Semua Status</div>
                            <div onclick="setStatus('proses')">Proses</div>
                            <div onclick="setStatus('disetujui')">Disetujui</div>
                            <div onclick="setStatus('ditolak')">Ditolak</div>
                        </div>

                        <input type="hidden" name="status" id="statusInput" value="{{ request('status') }}">
                    </div>

                    <button type="submit" class="btn btn-search">Cari</button>
                    <a href="{{ route('admin.verifikasi') }}" class="btn btn-reset">Reset</a>
                </form>
            </div>

            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal</th>
                            <th>NISN</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $i => $d)
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
                                            onclick="openModal({{ $d->id }}, 'detail', '{{ $d->notifikasi->pesan ?? '' }}')">
                                            Detail
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <!-- MODAL -->
    <div id="modalPesan" class="modal">
        <div class="modal-box">

            <h3 id="modalTitle">Pesan</h3>

            <form id="formPesan" method="POST">
                @csrf

                <textarea name="pesan" id="pesanInput" style="width:100%;margin:10px 0;height:100px;"></textarea>

                <div style="display:flex;justify-content:end;gap:10px;">
                    <button type="button" onclick="closeModal()" class="btn btn-reset">Batal</button>
                    <button type="submit" class="btn btn-search">Simpan</button>
                </div>

            </form>

        </div>
    </div>

    <script>
        function setStatus(value) {
            document.getElementById('statusInput').value = value;

            let text = "Semua Status";
            if (value === "proses") text = "Proses";
            if (value === "disetujui") text = "Disetujui";
            if (value === "ditolak") text = "Ditolak";

            document.getElementById('selectedText').innerText = text;
        }

        function openModal(id, type, pesan = '') {
            document.getElementById('modalPesan').style.display = 'flex';
            document.getElementById('pesanInput').value = pesan;

            let form = document.getElementById('formPesan');
            let title = document.getElementById('modalTitle');

            if (type === 'setuju') {
                title.innerText = 'Setujui Pendaftar';
                form.action = `/admin/verifikasi/${id}/setuju`;
            }

            if (type === 'tolak') {
                title.innerText = 'Tolak Pendaftar';
                form.action = `/admin/verifikasi/${id}/tolak`;
            }

            if (type === 'detail') {
                title.innerText = 'Edit Pesan';
                form.action = `/admin/verifikasi/${id}/update-pesan`;
            }
        }

        function closeModal() {
            document.getElementById('modalPesan').style.display = 'none';
        }
    </script>

</body>

</html>
