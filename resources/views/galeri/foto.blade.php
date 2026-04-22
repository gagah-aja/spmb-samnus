<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>

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

    <!-- CONTAINER -->
    <div class="max-w-6xl mx-auto py-8 md:py-10 px-4">

        <!-- JUDUL -->
        <h1 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-center">
            Galeri Foto
        </h1>

        <!-- GALERI -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">

            @forelse($fotos as $foto)
                <img src="{{ asset('storage/' . $foto->file_path) }}"
                    class="w-full h-36 sm:h-44 md:h-48 object-cover rounded-lg shadow 
            active:scale-95 md:hover:scale-105 transition duration-300"
                    alt="{{ $foto->judul }}">
            @empty
                <p class="col-span-3 text-center text-gray-500">
                    Belum ada foto
                </p>
            @endforelse

        </div>

    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>
