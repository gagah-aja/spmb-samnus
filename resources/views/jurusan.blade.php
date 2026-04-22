<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan - SMK</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')

    <!-- HEADER -->
    <section class="bg-[#0f172a] text-white py-14 px-6 text-center">
        <h1 class="text-4xl font-bold mb-2">Jurusan Sekolah</h1>
        <p class="text-gray-400 text-lg">Daftar jurusan yang tersedia</p>

        <div class="mt-4 text-sm text-gray-400">
            <a href="/" class="hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-white">Jurusan</span>
        </div>
    </section>

    <!-- LIST JURUSAN -->
    <section class="max-w-7xl mx-auto py-14 px-6">

        @if ($jurusans->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($jurusans as $j)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition cursor-pointer"
                        onclick="openModal(
                            '{{ addslashes($j->nama) }}',
                            '{{ addslashes($j->deskripsi) }}',
                            '{{ $j->icon }}'
                        )">

                        <div class="p-6 text-center">

                            <div class="text-5xl text-blue-500 mb-4">
                                <i class="fas {{ $j->icon }}"></i>
                            </div>

                            <h3 class="font-bold text-lg text-gray-800 mb-2">
                                {{ $j->nama }}
                            </h3>

                            <p class="text-gray-500 text-sm line-clamp-3">
                                {{ Str::limit($j->deskripsi, 100) }}
                            </p>

                            <p class="mt-4 text-blue-500 text-sm font-semibold">
                                Lihat Detail →
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

        @else
            <div class="text-center py-24">
                <i class="fas fa-school text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-500">Belum ada jurusan</h3>
            </div>
        @endif

    </section>

    <!-- MODAL -->
    <div id="modalJurusan"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-60 px-4">

        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full">

            <!-- HEADER -->
            <div class="relative p-6 border-b">

                <button onclick="closeModal()"
                    class="absolute top-3 right-3 bg-gray-200 hover:bg-gray-300 w-8 h-8 rounded-full flex items-center justify-center">
                    ✕
                </button>

                <div class="text-center">
                    <div id="modalIcon" class="text-5xl text-blue-500 mb-3"></div>
                    <h2 id="modalNama" class="text-xl font-bold"></h2>
                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-6">
                <p id="modalDeskripsi" class="text-gray-600 text-sm leading-relaxed whitespace-pre-line"></p>
            </div>

        </div>
    </div>

    @include('layouts.footer')

    <!-- SCRIPT -->
    <script>
        function openModal(nama, deskripsi, icon) {
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalDeskripsi').textContent = deskripsi;
            document.getElementById('modalIcon').innerHTML = `<i class="fas ${icon}"></i>`;

            const modal = document.getElementById('modalJurusan');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modalJurusan');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.getElementById('modalJurusan').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>

</body>

</html>