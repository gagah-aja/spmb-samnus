<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>

<style>
* { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI'; }
body { background:#f1f5f9; }
.container { display:flex; }

/* ===== SIDEBAR ===== */
.sidebar {
    width:260px;
    min-height:100vh;
    background: linear-gradient(180deg,#0f172a,#1e293b);
    color:#e2e8f0;
    padding:20px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;  
}

.brand {
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:20px;
}

.logo {
    width:40px;
    height:40px;
    border-radius:10px;
    background:linear-gradient(135deg,#3b82f6,#6366f1);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:bold;
}

.menu-title {
    font-size:12px;
    color:#94a3b8;
    margin:15px 0;
}

.nav a {
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px;
    border-radius:10px;
    text-decoration:none;
    color:#e2e8f0;
    transition:0.3s;
}

/* 🔥 HOVER EFFECT */
.nav a:hover {
    background:rgba(255,255,255,0.08);
    transform:translateX(5px);
}

/* ACTIVE MENU */
.nav a.active {
    background:linear-gradient(135deg,#3b82f6,#6366f1);
    color:white;
    box-shadow:0 5px 15px rgba(59,130,246,0.4);
}

/* FOOTER */
.profile {
    display:flex;
    gap:10px;
    align-items:center;
}

.avatar {
    width:35px;
    height:35px;
    border-radius:50%;
    background:#3b82f6;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
}

.name { font-size:14px; }
.status { font-size:12px; color:#94a3b8; }

.logout {
    display:block;
    margin-top:10px;
    text-align:center;
    padding:10px;
    background:#ef4444;
    border-radius:8px;
    color:white;
    text-decoration:none;
    transition:0.3s;
}

.logout:hover {
    background:#dc2626;
}

/* ===== MAIN ===== */
.main { flex:1; padding:30px; }

.header {
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.header h1 { font-size:26px; }

.user {
    background:white;
    padding:10px 15px;
    border-radius:8px;
}

/* ===== CARDS ===== */
.cards {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:25px;
}

.card {
    padding:20px;
    border-radius:12px;
    color:white;
    transition:0.3s;
}

/* 🔥 HOVER CARD */
.card:hover {
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

.blue { background:linear-gradient(135deg,#3b82f6,#1e40af); }
.green { background:linear-gradient(135deg,#22c55e,#166534); }
.orange { background:linear-gradient(135deg,#f59e0b,#b45309); }

/* ===== TABLE ===== */
.table-box {
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

table {
    width:100%;
    border-collapse:collapse;
}

th, td {
    padding:12px;
}

th { background:#e2e8f0; }

tr:hover {
    background:#f9fafb;
}

/* BADGE */
.badge {
    padding:5px 10px;
    border-radius:6px;
    color:white;
    font-size:12px;
}

.lolos { background:#22c55e; }
.proses { background:#f59e0b; }
.ditolak { background:#ef4444; }

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

        <!-- CARD DATA -->
        <div class="cards">
            <div class="card blue">
                <p>Total Pendaftar</p>
                <h2>1,250</h2>
            </div>
            <div class="card green">
                <p>Sudah Diverifikasi</p>
                <h2>980</h2>
            </div>
            <div class="card orange">
                <p>Belum Diverifikasi</p>
                <h2>270</h2>
            </div>
        </div>

        <!-- TABLE DATA -->
        <div class="table-box">
            <h3>Data Pendaftar Terbaru</h3>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Ahmad</td>
                    <td>SMA 1 Jakarta</td>
                    <td><span class="badge lolos">Lolos</span></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Budi</td>
                    <td>SMK 2 Bandung</td>
                    <td><span class="badge proses">Proses</span></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Citra</td>
                    <td>SMA 3 Surabaya</td>
                    <td><span class="badge ditolak">Ditolak</span></td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>Dewi</td>
                    <td>SMA 5 Bandung</td>
                    <td><span class="badge proses">Proses</span></td>
                </tr>

            </table>
        </div>

    </div>
</div>

</body>
</html>