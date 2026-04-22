<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Teknik Otomasi Industri',
             'deskripsi' => 'Mempelajari sistem otomatisasi industri, robotik, kontrol mesin.',
             'icon' => 'fa-robot', 'urutan' => 1],
            ['nama' => 'Teknik Mesin',
             'deskripsi' => 'Belajar desain, produksi, dan pemeliharaan mesin industri.',
             'icon' => 'fa-cogs', 'urutan' => 2],
            ['nama' => 'Teknik Kelistrikan',
             'deskripsi' => 'Mempelajari instalasi listrik, kontrol daya, dan kelistrikan.',
             'icon' => 'fa-bolt', 'urutan' => 3],
            ['nama' => 'Teknik Jaringan Komputer & Telekomunikasi',
             'deskripsi' => 'Mempelajari jaringan komputer, server, dan telekomunikasi.',
             'icon' => 'fa-network-wired', 'urutan' => 4],
            ['nama' => 'Teknik Bisnis Sepeda Motor',
             'deskripsi' => 'Mempelajari perbaikan, perawatan, dan bisnis sepeda motor.',
             'icon' => 'fa-motorcycle', 'urutan' => 5],
        ];

        foreach ($data as $item) {
            Jurusan::create($item);
        }
    }
}