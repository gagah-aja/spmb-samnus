<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMK Samudra Nusantara</title>

    <link rel="icon" type="image/png" href="{{ asset('img/samnus.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')

    <!-- PAGE HEADER -->
    <section class="bg-[#0f172a] text-white py-14 px-6 text-center">
        <h1 class="text-4xl font-bold mb-2">Berita Sekolah</h1>
        <p class="text-gray-400 text-lg">Informasi dan kegiatan terkini SMK Samudra Nusantara</p>

        <!-- Breadcrumb -->
        <div class="mt-4 text-sm text-gray-400">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Berita</span>
        </div>
    </section>

    <!-- BERITA SECTION -->
    <section class="max-w-7xl mx-auto py-14 px-6">

        @if ($beritas->count() > 0)

            <!-- GRID KARTU -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($beritas as $berita)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                        onclick="openModal(
                            '{{ addslashes($berita->judul) }}',
                            '{{ asset('storage/' . $berita->gambar) }}',
                            '{{ addslashes(\Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y')) }}',
                            '{{ addslashes(strip_tags($berita->konten)) }}',
                            '{{ addslashes($berita->kategori->nama ?? 'Umum') }}'
                        )">

                        <!-- Thumbnail -->
                        <div class="relative">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                class="w-full h-52 object-cover">

                            <!-- Badge Kategori -->
                            <span
                                class="absolute top-3 left-3 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                {{ $berita->kategori->nama ?? 'Umum' }}
                            </span>
                        </div>

                        <!-- Konten Kartu -->
                        <div class="p-5">

                            <!-- Tanggal -->
                            <p class="text-xs text-gray-400 mb-2">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                            </p>

                            <!-- Judul -->
                            <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2 leading-snug">
                                {{ $berita->judul }}
                            </h3>

                            <hr class="my-2 border-gray-100">

                            <!-- Ringkasan -->
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>

                            <!-- Hint -->
                            <p class="mt-4 text-blue-500 text-sm font-semibold flex items-center gap-1">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right text-xs"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="mt-12 flex justify-center">
                {{ $beritas->links('vendor.pagination.tailwind') }}
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="text-center py-24">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-500">Belum ada berita</h3>
                <p class="text-gray-400 mt-2">Berita akan segera hadir.</p>
            </div>
        @endif

    </section>

    <!-- MODAL DETAIL BERITA -->
    <div id="modalBerita" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-60 px-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">

            <!-- Gambar Header -->
            <div class="relative">
                <img id="modalGambar" src="" alt="" class="w-full h-64 object-cover rounded-t-2xl">

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-t-2xl"></div>

                <!-- Tombol Close -->
                <button onclick="closeModal()"
                    class="absolute top-3 right-3 bg-white/80 hover:bg-white text-gray-700 w-8 h-8 rounded-full flex items-center justify-center shadow text-lg font-bold transition">
                    ✕
                </button>

                <!-- Judul Overlay -->
                <div class="absolute bottom-0 left-0 right-0 px-6 pb-4">
                    <h2 id="modalJudulOverlay"
                        class="text-white text-xl font-bold leading-snug drop-shadow-lg line-clamp-2">
                    </h2>
                </div>
            </div>

            <!-- Konten Modal -->
            <div class="px-6 py-5">

                <!-- Kategori + Tanggal -->
                <div class="flex items-center justify-between mb-4">
                    <span id="modalKategori"
                        class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">
                    </span>
                    <span id="modalTanggal" class="text-xs text-gray-400"></span>
                </div>

                <!-- Judul -->
                <h2 id="modalJudul" class="text-2xl font-bold text-gray-800 mb-4 leading-snug"></h2>

                <hr class="mb-4 border-gray-200">

                <!-- Isi -->
                <p id="modalIsi" class="text-gray-600 text-sm leading-relaxed whitespace-pre-line"></p>

            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function openModal(judul, gambar, tanggal, isi, kategori) {
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalJudulOverlay').textContent = judul;
            document.getElementById('modalGambar').src = gambar;
            document.getElementById('modalGambar').alt = judul;
            document.getElementById('modalTanggal').innerHTML =
                '<i class="fas fa-calendar-alt mr-1"></i>' + tanggal;
            document.getElementById('modalIsi').textContent = isi;
            document.getElementById('modalKategori').textContent = kategori;

            const modal = document.getElementById('modalBerita');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modalBerita');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.getElementById('modalBerita').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>

</body>

</html>
