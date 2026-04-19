<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100">

{{-- Navbar --}}
@include('layouts.navbar')

<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Galeri Video</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Video 1 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/LV0AfSlOYcc"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        {{-- Video 2 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/2V2_e6hXvE0"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        {{-- Video 3 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/N_TbZ2iMsEU"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        {{-- Video 4 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/vdwUD9xkubs"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        {{-- Video 5 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/aO0tExbCjok"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        {{-- Video 6 --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <iframe class="w-full h-56"
                src="https://www.youtube.com/embed/j4a9CLQQpBA"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

    </div>
</div>

{{-- Footer --}}
@include('layouts.footer')

</body>
</html>