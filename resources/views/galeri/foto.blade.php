<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Galeri Foto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <!-- CONTAINER -->
    <div class="max-w-6xl mx-auto py-10 px-4">

        <!-- JUDUL -->
        <h1 class="text-3xl font-bold mb-8 text-center">Galeri Foto</h1>

        <!-- GALERI -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <img src="/img/foto1.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">
            <img src="/img/foto2.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">
            <img src="/img/foto3.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">
            <img src="/img/foto4.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">
            <img src="/img/foto5.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">
            <img src="/img/foto6.jpg" class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transition duration-300">

        </div>

    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>