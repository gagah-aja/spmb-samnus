<footer class="bg-[#0f172a] text-white mt-16">

    <div class="max-w-7xl mx-auto py-12 px-6 grid md:grid-cols-4 gap-8">

        <!-- PROFILE -->
        <div class="text-center">
            <h3 class="font-bold text-xl mb-4">
                {{ $setting['footer_nama'] ?? 'SMK Samudra' }}
            </h3>

            <img src="{{ $setting['footer_logo'] ? asset('storage/' . $setting['footer_logo']) : asset('img/samnus.png') }}"
                class="mx-auto mb-4 w-32 md:w-48 rounded-lg shadow-md">
            <p>
                {{ $setting['footer_deskripsi'] ?? 'Sekolah unggulan berbasis teknologi.' }}
            </p>
        </div>

        <!-- MENU -->
        <div>
            <h3 class="font-bold text-xl mb-4">Menu</h3>

            @php
                $menus = json_decode($setting['footer_menu'] ?? '[]', true);
            @endphp

            @forelse ($menus as $menu)
                <a href="{{ $menu['link'] }}" class="block mb-2 hover:text-blue-400">
                    {{ $menu['label'] }}
                </a>
            @empty
                <p class="text-gray-400">Belum ada menu</p>
            @endforelse
        </div>

        <!-- INFORMASI -->
        <div>
            <h3 class="font-bold text-xl mb-4">Informasi</h3>

            @php
                $infos = json_decode($setting['footer_info'] ?? '[]', true);
            @endphp

            @forelse ($infos as $info)
                <a href="{{ $info['link'] }}" class="block mb-2 hover:text-blue-400">
                    {{ $info['label'] }}
                </a>
            @empty
                <p class="text-gray-400">Belum ada info</p>
            @endforelse
        </div>

        <!-- KONTAK -->
        <div>
            <h3 class="font-bold text-xl mb-4">Hubungi Kami</h3>

            <p>{{ $setting['footer_alamat'] ?? '-' }}</p>
            <p>Email: {{ $setting['footer_email'] ?? '-' }}</p>
            <p>Telp: {{ $setting['footer_telepon'] ?? '-' }}</p>

            <div class="flex gap-4 mt-3">
                <a href="{{ $setting['footer_youtube'] ?? '#' }}">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="{{ $setting['footer_instagram'] ?? '#' }}">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- MAP -->
    <div class="px-6">
        {!! $setting['footer_maps'] ?? '' !!}
    </div>

    <!-- COPYRIGHT -->
    <div class="text-center py-4 border-t border-gray-600 mt-6">
        {{ $setting['footer_copyright'] ?? '© 2026 SMK Samudra Nusantara' }}
    </div>

</footer>
