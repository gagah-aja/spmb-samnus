<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Siswa</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Animasi card masuk */
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Dropdown smooth */
        .dropdown {
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
            transition: all 0.25s ease;
        }

        .dropdown.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Shadow tambahan biar premium */
        .shadow-3xl {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body class="bg-blue-500 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-2xl hover:shadow-3xl transition duration-300 w-full max-w-lg fade-in">
        <img src="{{ asset('img/samnus.png') }}" 
         alt="Logo" 
         class="w-20 mx-auto mb-3">

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">
            Form Pendaftaran
        </h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-600 p-2 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/daftar" class="space-y-4" onsubmit="return validasiForm()">
            @csrf

            <input id="nama" type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

            <input id="sekolah" type="text" name="asal_sekolah" placeholder="Asal Sekolah"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

            <input id="nisn" type="text" name="nisn" placeholder="NISN"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

            <input id="hp" type="text" name="no_hp" placeholder="No HP"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

            <!-- DROPDOWN -->
            <div class="relative" id="dropdownWrapper">

                <div id="dropdownBtn"
                    class="w-full p-3 border rounded-lg cursor-pointer bg-white flex justify-between items-center hover:border-blue-400 transition">
                    <span id="selectedText">-- Pilih Jurusan --</span>
                    <span id="arrow" class="transition-transform duration-300">▼</span>
                </div>

                <div id="dropdownMenu"
                    class="dropdown absolute left-0 right-0 mt-1 bg-white border rounded-lg shadow z-10 max-h-48 overflow-y-auto">

                    <div class="p-3 hover:bg-blue-100 cursor-pointer">Teknik Otomasi Industri</div>
                    <div class="p-3 hover:bg-blue-100 cursor-pointer">Teknik Mesin</div>
                    <div class="p-3 hover:bg-blue-100 cursor-pointer">Teknik Kelistrikan</div>
                    <div class="p-3 hover:bg-blue-100 cursor-pointer">Teknik Jaringan Komputer & Telekomunikasi</div>
                    <div class="p-3 hover:bg-blue-100 cursor-pointer">Teknik Bisnis Sepeda Motor</div>
                </div>

                <input type="hidden" name="jurusan" id="jurusan">

            </div>

            <button
                class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition transform hover:scale-105 active:scale-95">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Sudah punya akun?
            <a href="/login" class="text-blue-500 font-semibold hover:underline">Login disini</a>
        </p>

    </div>

    <script>
        function validasiForm() {
            let nama = document.getElementById("nama").value;
            let sekolah = document.getElementById("sekolah").value;
            let nisn = document.getElementById("nisn").value;
            let hp = document.getElementById("hp").value;
            let jurusan = document.getElementById("jurusan").value;

            if (nama === "" || sekolah === "" || nisn === "" || hp === "" || jurusan === "") {
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

        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const selectedText = document.getElementById("selectedText");
        const jurusanInput = document.getElementById("jurusan");
        const wrapper = document.getElementById("dropdownWrapper");
        const arrow = document.getElementById("arrow");

        let timeout;

        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Desktop hover smooth
        wrapper.addEventListener("mouseenter", () => {
            if (!isMobile()) {
                clearTimeout(timeout);
                dropdownMenu.classList.add("show");
                arrow.classList.add("rotate-180");
            }
        });

        wrapper.addEventListener("mouseleave", () => {
            if (!isMobile()) {
                timeout = setTimeout(() => {
                    dropdownMenu.classList.remove("show");
                    arrow.classList.remove("rotate-180");
                }, 150);
            }
        });

        // Mobile klik
        dropdownBtn.addEventListener("click", () => {
            if (isMobile()) {
                dropdownMenu.classList.toggle("show");
                arrow.classList.toggle("rotate-180");
            }
        });

        // Pilih item
        document.querySelectorAll("#dropdownMenu div").forEach(item => {
            item.addEventListener("click", () => {
                selectedText.innerText = item.innerText;
                jurusanInput.value = item.innerText;
                dropdownMenu.classList.remove("show");
                arrow.classList.remove("rotate-180");
            });
        });

        // Klik luar
        document.addEventListener("click", function(e) {
            if (!wrapper.contains(e.target)) {
                dropdownMenu.classList.remove("show");
                arrow.classList.remove("rotate-180");
            }
        });
    </script>

</body>

</html>
