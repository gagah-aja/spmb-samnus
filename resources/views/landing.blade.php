<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB SMK Samudra Nusantara</title>

    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans scroll-smooth">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <!-- HERO -->
    <section id="beranda"
        class="relative min-h-[80vh] md:h-screen flex justify-center items-center text-center text-white overflow-hidden px-4">

        <div class="absolute inset-0 w-full h-full">
            <div id="slider" class="flex w-full h-full transition-transform duration-700">

                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="img/smksamudranusantara-hero.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                </div>

                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="img/smksamudranusantara-hero2.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                </div>

                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="img/smksamudranusantara-hero3.jpg" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                </div>

            </div>
        </div>

        <div class="relative z-10">
            <h1 class="text-2xl sm:text-3xl md:text-6xl font-bold mb-4 leading-tight">
                {{ $setting['hero_judul'] ?? 'Selamat Datang di SPMB' }}
            </h1>
            <p class="text-sm sm:text-base md:text-2xl mb-6">
                {{ $setting['hero_subjudul'] ?? 'Pendaftaran Siswa Baru SMK Samudra Nusantara' }}
            </p>

            <a href="#daftar"
                class="bg-blue-400 hover:bg-blue-500 px-5 py-2 md:px-6 md:py-3 rounded-lg font-semibold text-sm md:text-lg">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- BERITA -->
    <section id="berita" class="bg-white py-12 px-4 md:px-6">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold">Berita Terbaru</h2>
                <p class="text-gray-600 mt-2 text-sm md:text-base">Informasi terkini sekolah</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($beritaTerbaru as $berita)
                    <div class="bg-white border rounded-xl shadow hover:shadow-xl transition cursor-pointer overflow-hidden"
                        onclick="openModal(
                            '{{ addslashes($berita->judul) }}',
                            '{{ asset('storage/' . $berita->gambar) }}',
                            '{{ addslashes(\Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y')) }}',
                            '{{ addslashes(strip_tags($berita->konten)) }}',
                            '{{ addslashes($berita->kategori->nama ?? 'Umum') }}'
                        )">

                        <div class="relative">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                class="w-full h-40 md:h-48 object-cover">

                            <span class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                {{ $berita->kategori->nama ?? 'Umum' }}
                            </span>
                        </div>

                        <div class="p-4">
                            <p class="text-xs text-gray-400 mb-2">
                                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                            </p>

                            <h3 class="font-bold text-sm md:text-lg mb-2 line-clamp-2">
                                {{ $berita->judul }}
                            </h3>

                            <p class="text-gray-500 text-xs md:text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($berita->konten), 100) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- MODAL -->
    <div id="modalBerita" class="fixed inset-0 hidden z-50 items-center justify-center bg-black/60 px-3">

        <div class="bg-white w-full max-w-lg md:max-w-2xl rounded-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

            <img id="modalGambar" class="w-full h-48 md:h-64 object-cover">

            <div class="p-4 md:p-6">

                <div class="flex justify-between text-xs text-gray-400 mb-2">
                    <span id="modalKategori"></span>
                    <span id="modalTanggal"></span>
                </div>

                <h2 id="modalJudul" class="text-lg md:text-2xl font-bold mb-3"></h2>

                <p id="modalIsi" class="text-sm text-gray-600 whitespace-pre-line"></p>

                <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
                    Tutup
                </button>

            </div>
        </div>
    </div>

    <!-- JURUSAN -->
    <section class="py-12 px-4 md:px-6">
        <h2 class="text-2xl md:text-3xl text-center font-bold mb-8">Jurusan Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($jurusans as $jurusan)
                <div class="bg-white p-6 text-center rounded-lg shadow">
                    <i class="fas {{ $jurusan->icon }} text-3xl text-blue-400 mb-3"></i>
                    <h3 class="font-bold">{{ $jurusan->nama }}</h3>
                    <p class="text-sm text-gray-500">{{ $jurusan->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Footer --}}
    @include('layouts.footer')

    <script>
        // Slider
        const slider = document.getElementById("slider");
        let index = 0;

        setInterval(() => {
            index = (index + 1) % 3;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }, 4000);

        // Modal
        function openModal(judul, gambar, tanggal, isi, kategori) {
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalGambar').src = gambar;
            document.getElementById('modalTanggal').textContent = tanggal;
            document.getElementById('modalIsi').textContent = isi;
            document.getElementById('modalKategori').textContent = kategori;

            document.getElementById('modalBerita').classList.remove('hidden');
            document.getElementById('modalBerita').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modalBerita').classList.add('hidden');
            document.getElementById('modalBerita').classList.remove('flex');
        }
    </script>

</body>

</html>
    