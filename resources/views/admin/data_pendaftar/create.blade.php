<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pendaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #e0f2fe;
            /* background biru muda sesuai kode asli */
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            display: flex;
        }

        /* CSS Sidebar internal dihapus agar mengikuti admin.css */

        /* MAIN CONTENT */
        .main {
            flex: 1;
            padding: 40px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .breadcrumb {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 25px;
        }

        .breadcrumb a {
            color: #3b82f6;
            text-decoration: none;
        }

        /* FORM CARD - Tetap Sesuai Kode Asli */
        .form-card {
            background: white;
            padding: 35px 40px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .form-card input,
        .form-card select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            transition: 0.3s;
        }

        .form-card input:focus,
        .form-card select:focus {
            border-color: #3b82f6;
            outline: none;
        }

        /* BUTTON */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #3b82f6;
            color: white;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.3s;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #2563eb;
            transform: scale(1.03);
        }

        /* DROPDOWN CUSTOM - Tetap Sesuai Kode Asli */
        .dropdown {
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
            transition: all 0.25s ease;
            max-height: 180px;
            overflow-y: auto;
            border: 1px solid #cbd5e1;
        }

        .dropdown.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown div {
            padding: 12px 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        .dropdown div:hover {
            background-color: #dbeafe;
        }

        #dropdownBtn {
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
            background: white;
        }

        #dropdownBtn:hover {
            border-color: #3b82f6;
        }
    </style>
</head>

<body>
    <div class="container">

        @include('admin.sidebar')

        <div class="main">
            <div class="header">
                <h1>Tambah Pendaftar</h1>
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a> <span>/</span>
                    <a href="{{ route('admin.data-pendaftar') }}">Data Pendaftar</a> <span>/</span>
                    <span>Tambah</span>
                </div>
            </div>

            <div class="form-card">
                <form method="POST" action="{{ route('admin.data-pendaftar.store') }}"
                    onsubmit="return validasiForm()">
                    @csrf

                    <div class="mb-5">
                        <input id="nama" type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-5">
                        <input id="sekolah" type="text" name="asal_sekolah" placeholder="Asal Sekolah">
                    </div>

                    <div class="mb-5">
                        <input id="nisn" type="text" name="nisn" placeholder="NISN">
                    </div>

                    <div class="mb-5">
                        <input id="hp" type="text" name="no_hp" placeholder="No HP">
                    </div>

                    <div class="relative mb-5" id="dropdownWrapper">
                        <div id="dropdownBtn">
                            <span id="selectedText">-- Pilih Jurusan --</span>
                            <span id="arrow" class="transition-transform duration-300">▼</span>
                        </div>
                        <div id="dropdownMenu"
                            class="dropdown absolute left-0 right-0 mt-1 bg-white border rounded-lg shadow z-10">
                            <div>Teknik Otomasi Industri</div>
                            <div>Teknik Mesin</div>
                            <div>Teknik Kelistrikan</div>
                            <div>Teknik Jaringan Komputer & Telekomunikasi</div>
                            <div>Teknik Bisnis Sepeda Motor</div>
                        </div>
                        <input type="hidden" name="jurusan" id="jurusan">
                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn-submit">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const selectedText = document.getElementById("selectedText");
        const jurusanInput = document.getElementById("jurusan");
        const wrapper = document.getElementById("dropdownWrapper");
        const arrow = document.getElementById("arrow");

        function isMobile() {
            return window.innerWidth <= 768;
        }

        wrapper.addEventListener("mouseenter", () => {
            if (!isMobile()) {
                dropdownMenu.classList.add("show");
                arrow.classList.add("rotate-180");
            }
        });

        wrapper.addEventListener("mouseleave", () => {
            if (!isMobile()) {
                dropdownMenu.classList.remove("show");
                arrow.classList.remove("rotate-180");
            }
        });

        dropdownBtn.addEventListener("click", () => {
            if (isMobile()) {
                dropdownMenu.classList.toggle("show");
                arrow.classList.toggle("rotate-180");
            }
        });

        document.querySelectorAll("#dropdownMenu div").forEach(item => {
            item.addEventListener("click", () => {
                selectedText.innerText = item.innerText;
                jurusanInput.value = item.innerText;
                dropdownMenu.classList.remove("show");
                arrow.classList.remove("rotate-180");
            });
        });

        document.addEventListener("click", function(e) {
            if (!wrapper.contains(e.target)) {
                dropdownMenu.classList.remove("show");
                arrow.classList.remove("rotate-180");
            }
        });

        function validasiForm() {
            let nama = document.getElementById("nama").value;
            let sekolah = document.getElementById("sekolah").value;
            let nisn = document.getElementById("nisn").value;
            let hp = document.getElementById("hp").value;
            let jurusan = document.getElementById("jurusan").value;

            if (!nama || !sekolah || !nisn || !hp || !jurusan) {
                alert("Semua field wajib diisi!");
                return false;
            }
            if (isNaN(nisn)) {
                alert("NISN harus berupa angka!");
                return false;
            }
            if (isNaN(hp)) {
                alert("No HP harus berupa angka!");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
