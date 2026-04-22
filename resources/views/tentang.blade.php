<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="max-w-5xl mx-auto py-8 md:py-12 px-4 md:px-6">

        <!-- JUDUL -->
        <h1 class="text-2xl md:text-3xl font-bold text-center mb-6 leading-tight">
            {{ $setting['tentang_judul'] ?? 'Tentang Sekolah' }}
        </h1>

        <div class="bg-white p-4 md:p-6 rounded-xl shadow">

            <!-- DESKRIPSI -->
            <p class="mb-4 text-gray-700 text-sm md:text-base leading-relaxed whitespace-pre-line">
                {{ $setting['tentang_isi'] ?? 'Konten belum diisi di admin' }}
            </p>

            <!-- VISI -->
            <div class="mt-6">
                <h2 class="text-lg md:text-xl font-semibold mb-2 flex items-center gap-2">
                    <i class="fas fa-bullseye text-blue-500"></i> Visi
                </h2>
                <p class="text-gray-700 text-sm md:text-base whitespace-pre-line leading-relaxed">
                    {{ $setting['tentang_visi'] ?? '-' }}
                </p>
            </div>

            <!-- MISI -->
            <div class="mt-5">
                <h2 class="text-lg md:text-xl font-semibold mb-2 flex items-center gap-2">
                    <i class="fas fa-list text-green-500"></i> Misi
                </h2>
                <p class="text-gray-700 text-sm md:text-base whitespace-pre-line leading-relaxed">
                    {{ $setting['tentang_misi'] ?? '-' }}
                </p>
            </div>

        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>
