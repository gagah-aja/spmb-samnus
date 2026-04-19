<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Siswa</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

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

        .shadow-3xl {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-blue-500 min-h-screen flex items-center justify-center">

    <div class="bg-white p-6 rounded-2xl shadow-2xl hover:shadow-3xl transition duration-300 w-full max-w-md fade-in">

        <img src="{{ asset('img/samnus.png') }}" class="w-16 mx-auto mb-2">

        <h2 class="text-xl font-bold text-center mb-4 text-gray-700">
            Form Pendaftaran
        </h2>

        <form method="POST" action="/daftar" class="space-y-3" onsubmit="return validasiForm()">
            @csrf

            <!-- 2 KOLOM -->
            <div class="grid grid-cols-2 gap-3">

                <input id="nama" type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                    class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition col-span-2">

                <input id="sekolah" type="text" name="asal_sekolah" placeholder="Asal Sekolah"
                    class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

                <input id="nisn" type="text" name="nisn" placeholder="NISN"
                    class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition">

                <input id="hp" type="text" name="no_hp" placeholder="No HP"
                    class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition col-span-2">

            </div>

            <!-- DROPDOWN -->
            <div class="relative" id="dropdownWrapper">

                <div id="dropdownBtn"
                    class="w-full p-2 border rounded-lg cursor-pointer flex justify-between items-center hover:border-blue-400 transition">
                    <span id="selectedText">-- Pilih Jurusan --</span>

                    <!-- PANAH SVG -->
                    <svg id="arrow" class="w-4 h-4 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div id="dropdownMenu"
                    class="dropdown absolute left-0 right-0 mt-1 bg-white border rounded-lg shadow z-10 max-h-40 overflow-y-auto text-sm">

                    <div class="p-2 hover:bg-blue-100 cursor-pointer">Teknik Otomasi Industri</div>
                    <div class="p-2 hover:bg-blue-100 cursor-pointer">Teknik Mesin</div>
                    <div class="p-2 hover:bg-blue-100 cursor-pointer">Teknik Kelistrikan</div>
                    <div class="p-2 hover:bg-blue-100 cursor-pointer">TJKT</div>
                    <div class="p-2 hover:bg-blue-100 cursor-pointer">TBSM</div>
                </div>

                <input type="hidden" name="jurusan" id="jurusan">
            </div>

            <!-- BUTTON -->
            <button
                class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition transform hover:scale-105 active:scale-95">
                Daftar
            </button>
        </form>

        <p class="text-xs text-center mt-3">
            Sudah punya akun?
            <a href="/login" class="text-blue-500 font-semibold hover:underline">Login</a>
        </p>

    </div>

    <script>
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

            if (isNaN(nisn) || isNaN(hp)) {
                alert("NISN & HP harus angka!");
                return false;
            }

            return true;
        }

        const wrapper = document.getElementById("dropdownWrapper");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const selectedText = document.getElementById("selectedText");
        const jurusanInput = document.getElementById("jurusan");
        const arrow = document.getElementById("arrow");

        let timeout;

        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Desktop hover
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
        wrapper.addEventListener("click", () => {
            if (isMobile()) {
                dropdownMenu.classList.toggle("show");
                arrow.classList.toggle("rotate-180");
            }
        });

        // Pilih
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