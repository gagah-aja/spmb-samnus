<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Admin</title>

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

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: #e2e8f0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .menu-title {
            font-size: 12px;
            color: #94a3b8;
            margin: 15px 0;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #e2e8f0;
            transition: 0.3s;
            width: 100%;
        }

        .nav a:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .nav a.active {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
            width: 100%;
        }

        .profile {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .name {
            font-size: 14px;
        }

        .status {
            font-size: 12px;
            color: #94a3b8;
        }

        .logout {
            display: block;
            margin-top: 10px;
            text-align: center;
            padding: 10px;
            background: #ef4444;
            border-radius: 8px;
            color: white;
            text-decoration: none;
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
        }

        /* FORM CARD */
        .card-form {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-form .form-group {
            margin-bottom: 15px;
        }

        .card-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-form input[type="text"],
        .card-form input[type="email"],
        .card-form input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        /* Buat input color lebih tebal */
        .card-form input[type="color"] {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            padding: 0;
        }

        .card-form button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #22c55e;
            color: white;
            cursor: pointer;
        }

        .card-form button:hover {
            background: #16a34a;
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background: #64748b;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .logo-preview {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border: 1px solid #ccc;
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
                <h1>Pengaturan Website</h1>
            </div>

            <div class="card-form">
                {{-- <a href="{{ route('admin.dashboard') }}" class="btn-back">← Kembali</a> --}}

                <form id="settingsForm">
                    <div class="form-group">
                        <label for="siteName">Nama Website</label>
                        <input type="text" id="siteName" value="SPMB Samudra Nusantara">
                    </div>

                    <div class="form-group">
                        <label>Logo Website</label><br>
                        <img src="https://via.placeholder.com/100" class="logo-preview" id="logoPreview">
                        <input type="file" id="logoInput" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="adminEmail">Email Admin</label>
                        <input type="email" id="adminEmail" value="admin@example.com">
                    </div>

                    <div class="form-group">
                        <label for="themeColor">Warna Tema</label>
                        <input type="color" id="themeColor" value="#3b82f6">
                    </div>

                    <button type="submit">Simpan</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');

        logoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    logoPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('settingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Pengaturan berhasil disimpan (dummy)');
        });
    </script>
</body>

</html>