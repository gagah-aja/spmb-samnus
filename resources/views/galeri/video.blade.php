<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

{{-- Navbar --}}
    @include('layouts.navbar')

<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Galeri Video</h1>

    <div class="grid md:grid-cols-2 gap-6">

        <video controls class="rounded shadow">
            <source src="/video/video1.mp4" type="video/mp4">
        </video>

        <video controls class="rounded shadow">
            <source src="/video/video2.mp4" type="video/mp4">
        </video>

    </div>
</div>

{{-- Footer --}}
    @include('layouts.footer')

</body>
</html>