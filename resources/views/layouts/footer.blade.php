<footer class="bg-[#0f172a] text-white mt-16">
    <div class="max-w-7xl mx-auto py-12 px-6 grid md:grid-cols-4 gap-8">
        <div class="text-center">
            <h3 class="font-bold text-xl mb-4">SMK Samudra</h3>
            <img src="{{ asset('img/samnus.png') }}" alt="Logo SMK Samudra"
                class="mx-auto mb-4 w-32 md:w-48 rounded-lg shadow-md">
            <p>Sekolah unggulan berbasis teknologi dan industri.</p>
        </div>
        <div>
            <h3 class="font-bold text-xl mb-4">Menu</h3>
            <a href="{{ url('/') }}" class="block hover:text-blue-500">
                Beranda
            </a>

            <a href="{{ url('/') }}" class="block hover:text-blue-500">
                Jurusan
            </a>
        </div>
        <div>
            <h3 class="font-bold text-xl mb-4">Informasi</h3>
            <a href="{{ route('galeri.foto') }}" class="block hover:text-blue-500">
                Galeri Foto
            </a>

            <a href="{{ route('galeri.video') }}" class="block hover:text-blue-500">
                Galeri Video
            </a>
        </div>
        <div>
            <h3 class="font-bold text-xl mb-4">Hubungi Kami</h3>

            <div class="flex items-center gap-5">

                <!-- YouTube -->
                <a href="https://www.youtube.com/@studiosamnus" target="_blank" rel="noopener noreferrer"
                    class="text-2xl transition duration-300 hover:text-red-600">
                    <i class="fab fa-youtube"></i>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/smksamnus" target="_blank" rel="noopener noreferrer"
                    class="text-2xl transition duration-300 hover:text-pink-500">
                    <i class="fab fa-instagram"></i>
                </a>

            </div>
        </div>
    </div>
    <div class="map px-6">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.620929186866!2d108.61360437399624!3d-6.815875393181768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1caa564d3215%3A0xc52a029b57757581!2sSMK%20Samudra%20Nusantara!5e0!3m2!1sid!2sid!4v1775022580253!5m2!1sid!2sid"
            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="text-center py-4 border-t border-gray-600 mt-6">
        © 2026 SMK Samudra Nusantara
    </div>
</footer>
