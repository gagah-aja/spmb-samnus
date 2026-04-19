<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-10 px-4">

        <!-- Tombol Kembali -->
        <a href="/dashboard"
            class="inline-flex items-center gap-2 bg-blue-500 px-4 py-2 rounded-lg shadow 
          text-white hover:bg-blue-600 transition duration-300 mb-6">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        <!-- GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- KIRI (DETAIL BERITA) -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-xl shadow p-6">

                    <!-- Gambar (diperkecil) -->
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                            class="w-full h-auto object-contain bg-gray-100 rounded-lg mb-6">
                    @endif

                    <!-- Judul -->
                    <h1 class="text-2xl font-bold mb-3">
                        {{ $berita->judul }}
                    </h1>

                    <!-- Tanggal -->
                    <p class="text-gray-500 mb-6 text-sm">
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                    </p>

                    <!-- Isi -->
                    <div class="text-gray-700 leading-relaxed text-justify">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                </div>

            </div>

            <!-- KANAN (BERITA TERBARU) -->
            <div>

                <div class="bg-white rounded-xl shadow p-5">

                    <h2 class="font-bold text-lg mb-4 border-l-4 border-orange-500 pl-3">
                        Berita Terbaru
                    </h2>

                    <div class="space-y-4">

                        @foreach ($pengumuman as $item)
                            <a href="{{ route('berita.detail', $item->id) }}"
                                class="flex gap-3 hover:bg-gray-100 p-2 rounded-lg transition">

                                <!-- Thumbnail -->
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="w-20 h-16 object-cover rounded">
                                @else
                                    <img src="https://via.placeholder.com/100x80"
                                        class="w-20 h-16 object-cover rounded">
                                @endif

                                <!-- Text -->
                                <div>
                                    <h3 class="text-sm font-semibold leading-snug hover:text-blue-600 hover:underline transition duration-200">
                                        {{ \Illuminate\Support\Str::limit($item->judul, 50) }}
                                    </h3>

                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    </p>
                                </div>

                            </a>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
