<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video</title>

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

    {{-- HELPER YOUTUBE ID --}}
    @php
        function getYoutubeId($url)
        {
            if (!$url) {
                return '';
            }

            // youtu.be/xxxx
            if (str_contains($url, 'youtu.be/')) {
                return substr(parse_url($url, PHP_URL_PATH), 1);
            }

            // youtube.com/watch?v=xxxx
            parse_str(parse_url($url, PHP_URL_QUERY), $vars);
            if (!empty($vars['v'])) {
                return $vars['v'];
            }

            // youtube.com/embed/xxxx
            if (str_contains($url, 'embed/')) {
                return basename(parse_url($url, PHP_URL_PATH));
            }

            return '';
        }
    @endphp

    <div class="max-w-6xl mx-auto py-8 md:py-10 px-4">

        <!-- JUDUL -->
        <h1 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-center">
            Galeri Video
        </h1>

        <!-- GRID VIDEO -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">

            @forelse($videos as $video)
                @php
                    $youtubeId = getYoutubeId($video->video_url);
                @endphp

                <div class="bg-white rounded-xl shadow overflow-hidden">

                    <div class="relative w-full aspect-video bg-black">

                        @if ($youtubeId)
                            <iframe class="absolute inset-0 w-full h-full"
                                src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        @else
                            <!-- FALLBACK -->
                            <div class="flex items-center justify-center h-full text-gray-400 text-sm">
                                Video tidak valid
                            </div>
                        @endif

                    </div>

                    <div class="p-3">
                        <h3 class="font-semibold text-sm">
                            {{ $video->judul }}
                        </h3>
                    </div>

                </div>

            @empty
                <p class="col-span-3 text-center text-gray-500">
                    Belum ada video
                </p>
            @endforelse

        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>
