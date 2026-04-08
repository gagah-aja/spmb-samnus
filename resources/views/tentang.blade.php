<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')
    
    <div class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold text-center mb-6">Tentang SMK Samudra Nusantara</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="mb-4 text-gray-700 leading-relaxed">
                SMK Samudra Nusantara adalah sekolah kejuruan yang berfokus pada pengembangan
                keterampilan siswa di bidang teknologi, bisnis, dan industri kreatif.
            </p>

            <p class="mb-4 text-gray-700 leading-relaxed">
                Kami memiliki berbagai jurusan unggulan yang didukung oleh tenaga pengajar
                profesional serta fasilitas yang memadai untuk menunjang pembelajaran.
            </p>

            <p class="mb-4 text-gray-700 leading-relaxed">
                Visi kami adalah mencetak lulusan yang siap kerja, berkarakter, dan mampu
                bersaing di dunia industri maupun wirausaha.
            </p>

            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Visi</h2>
                <p class="text-gray-700">
                    Menjadi sekolah unggulan yang menghasilkan lulusan kompeten dan berdaya saing global.
                </p>
            </div>

            <div class="mt-4">
                <h2 class="text-xl font-semibold mb-2">Misi</h2>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Meningkatkan kualitas pendidikan berbasis teknologi</li>
                    <li>Mengembangkan karakter siswa yang disiplin dan profesional</li>
                    <li>Menjalin kerjasama dengan dunia industri</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>