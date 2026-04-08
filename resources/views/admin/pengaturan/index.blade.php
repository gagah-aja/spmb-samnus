<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Admin</title>

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

        /* CSS Sidebar internal dihapus karena sudah menggunakan admin.css */

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

        /* FORM CARD - Tetap Sesuai Kode Asli */
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

        logoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    logoPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('settingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Pengaturan berhasil disimpan (dummy)');
        });
    </script>
</body>

</html>
