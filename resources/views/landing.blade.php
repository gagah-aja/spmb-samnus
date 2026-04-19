<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB SMK Samudra Nusantara</title>

    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <!-- HERO SECTION -->
    <section id="beranda"
        class="relative h-screen flex justify-center items-center text-center text-white overflow-hidden">
        <!-- Slider Container -->
        <div class="absolute inset-0 w-full h-full overflow-hidden">
            <div id="slider" class="flex w-full h-full transition-transform duration-700">

                <div class="w-full h-full flex-shrink-0">
                    <img src="img/smksamudranusantara-hero.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

                <div class="w-full h-full flex-shrink-0">
                    <img src="img/smksamudranusantara-hero2.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

                <div class="w-full h-full flex-shrink-0">
                    <img src="img/smksamudranusantara-hero3.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di SPMB</h1>
            <p class="text-lg md:text-2xl mb-6">Pendaftaran Siswa Baru SMK Samudra Nusantara</p>
            <a href="#daftar"
                class="bg-blue-400 hover:bg-blue-500 transition px-6 py-3 rounded-lg font-semibold text-lg">
                Daftar Sekarang
            </a>
        </div>

        <!-- Slider Controls (optional) -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
            <button class="w-3 h-3 rounded-full bg-white opacity-50" onclick="goToSlide(0)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50" onclick="goToSlide(1)"></button>
            <button class="w-3 h-3 rounded-full bg-white opacity-50" onclick="goToSlide(2)"></button>
        </div>
    </section>

    <!-- JURUSAN SECTION -->
    <section id="jurusan" class="max-w-7xl mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold text-center mb-10">Jurusan Kami</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition">
                <i class="fas fa-robot text-4xl text-blue-400 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Teknik Otomasi Industri</h3>
                <p>Mempelajari sistem otomatisasi industri, robotik, kontrol mesin, dan pengelolaan proses produksi
                    modern.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition">
                <i class="fas fa-cogs text-4xl text-blue-400 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Teknik Mesin</h3>
                <p>Belajar desain, produksi, dan pemeliharaan mesin industri.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition">
                <i class="fas fa-bolt text-4xl text-blue-400 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Teknik Kelistrikan</h3>
                <p>Mempelajari instalasi listrik, kontrol daya, dan pemeliharaan sistem kelistrikan.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition">
                <i class="fas fa-network-wired text-4xl text-blue-400 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Teknik Jaringan Komputer & Telekomunikasi</h3>
                <p>Mempelajari jaringan komputer, server, internet, dan sistem telekomunikasi.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition">
                <i class="fas fa-motorcycle text-4xl text-blue-400 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Teknik Bisnis Sepeda Motor</h3>
                <p>Mempelajari perbaikan, perawatan, dan manajemen bisnis sepeda motor.</p>
            </div>
        </div>
    </section>

    <!-- GALERI FOTO -->
    <section class="bg-gray-50 py-16 px-6">
        <div class="max-w-7xl mx-auto">

            <!-- JUDUL -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Galeri Foto</h2>
                <p class="text-gray-600 mt-2">Dokumentasi kegiatan sekolah</p>
            </div>

            <!-- FOTO -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <img src="{{ asset('img/foto1.jpg') }}"
                    class="w-full h-56 object-cover rounded-lg shadow hover:scale-105 transition duration-300">

                <img src="{{ asset('img/foto2.jpg') }}"
                    class="w-full h-56 object-cover rounded-lg shadow hover:scale-105 transition duration-300">

                <img src="{{ asset('img/foto3.jpg') }}"
                    class="w-full h-56 object-cover rounded-lg shadow hover:scale-105 transition duration-300">

            </div>

            <!-- BUTTON -->
            <div class="text-center mt-8">
                <a href="{{ route('galeri.foto') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Lihat Selengkapnya
                </a>
            </div>

        </div>
    </section>

    <!-- GALERI VIDEO -->
    <section class="bg-white py-16 px-6">
        <div class="max-w-7xl mx-auto">

            <!-- JUDUL -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Galeri Video</h2>
                <p class="text-gray-600 mt-2">Video kegiatan sekolah</p>
            </div>

            <!-- VIDEO -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Video 1 -->
                <div class="bg-black rounded-lg overflow-hidden shadow">
                    <iframe class="w-full h-56" src="https://www.youtube.com/embed/LV0AfSlOYcc" frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

                <!-- Video 2 -->
                <div class="bg-black rounded-lg overflow-hidden shadow">
                    <iframe class="w-full h-56" src="https://www.youtube.com/embed/2V2_e6hXvE0" frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

                <!-- Video 3 -->
                <div class="bg-black rounded-lg overflow-hidden shadow">
                    <iframe class="w-full h-56" src="https://www.youtube.com/embed/N_TbZ2iMsEU" frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="text-center mt-8">
                <a href="{{ route('galeri.video') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Lihat Selengkapnya
                </a>
            </div>

        </div>
    </section>
    {{-- <!-- DAFTAR SECTION -->
    <section id="daftar" class="max-w-2xl mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Form Pendaftaran</h2>
        <form id="formPendaftaran" class="bg-white shadow-lg rounded-lg p-6 flex flex-col gap-4">
            <input type="text" id="nama" placeholder="Nama Lengkap"
                class="border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" id="asalSmp" placeholder="Asal SMP"
                class="border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="tel" id="noHp" placeholder="No. HP"
                class="border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" id="nisn" placeholder="NISN"
                class="border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select id="jurusan" class="border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Jurusan Pilihan</option>
                <option>Teknik Otomasi Industri</option>
                <option>Teknik Mesin</option>
                <option>Teknik Kelistrikan</option>
                <option>Teknik Jaringan Komputer & Telekomunikasi</option>
                <option>Teknik Bisnis Sepeda Motor</option>
            </select>
            <button type="submit"
                class="bg-blue-400 hover:bg-blue-500 transition px-4 py-2 rounded font-semibold text-white">
                Kirim Pendaftaran
            </button>
        </form>
    </section> --}}

    {{-- Footer --}}
    @include('layouts.footer')

    <!-- SCRIPT -->
    <script>
    const slider = document.getElementById("slider");
    const totalSlides = slider.children.length;
    let currentSlide = 0;

    function goToSlide(index) {
        currentSlide = index;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Auto slide tiap 5 detik
    setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
    }, 5000);
</script>

</body>

</html>
