<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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

        /* CSS Sidebar internal dihapus karena sudah pakai admin.css */

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

        .user {
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
        }

        /* ===== CARDS ===== */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            padding: 20px;
            border-radius: 12px;
            color: white;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .blue {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
        }

        .green {
            background: linear-gradient(135deg, #22c55e, #166534);
        }

        .orange {
            background: linear-gradient(135deg, #f59e0b, #b45309);
        }

        /* ===== TABLE ===== */
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
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

        .lolos {
            background: #22c55e;
        }

        .proses {
            background: #f59e0b;
        }

        .ditolak {
            background: #ef4444;
        }
    </style>
</head>

<body>
    <div class="container">

        @include('admin.sidebar')

        <div class="main">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="user">Admin</div>
            </div>

            <div class="cards">
                <div class="card blue">
                    <p>Total Pendaftar</p>
                    <h2>100</h2>
                </div>
                <div class="card green">
                    <p>Sudah Diverifikasi</p>
                    <h2>75</h2>
                </div>
                <div class="card orange">
                    <p>Belum Diverifikasi</p>
                    <h2>25</h2>
                </div>
            </div>

            <div class="table-box">
                <h3>Data Pendaftar Terbaru</h3>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Sekolah</th>
                        <th>NISN</th>
                        <th>No HP</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                    </tr>

                    @forelse($pendaftar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->asal_sekolah }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                                @if ($item->status == 'lolos')
                                    <span class="badge lolos">Lolos</span>
                                @elseif($item->status == 'proses')
                                    <span class="badge proses">Proses</span>
                                @else
                                    <span class="badge ditolak">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;">Belum ada data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</body>

</html>
