<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DaftarLanjutan;
use App\Models\Pendaftar;
use Faker\Factory as Faker;

class DaftarLanjutanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $pendaftars = Pendaftar::all();

        foreach ($pendaftars as $pendaftar) {

            DaftarLanjutan::create([

                'pendaftar_id' => $pendaftar->id,

                // A. Identitas
                'jalur_pendaftaran' => $faker->randomElement(['Afirmasi', 'Prestasi', 'Reguler']),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2008-12-31'),
                'agama' => $faker->randomElement(['Islam','Kristen','Katolik','Hindu','Budha']),
                'cita_cita' => $faker->jobTitle,
                'hobi' => $faker->randomElement(['Membaca','Olahraga','Musik','Gaming','Menggambar']),

                // Ayah
                'nama_ayah' => $faker->name('male'),
                'tahun_lahir_ayah' => $faker->year(),
                'pekerjaan_ayah' => $faker->jobTitle,
                'pendidikan_ayah' => $faker->randomElement([
                    'Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat',
                    'D1','D2','D3','D4/S1','S2','S3'
                ]),
                'penghasilan_ayah' => $faker->randomElement([
                    'Tidak Berpenghasilan','Kurang Dari 1.000.000',
                    '1.000.000-2.000.000','Lebih Dari 3.000.000'
                ]),

                // Ibu
                'nama_ibu' => $faker->name('female'),
                'tahun_lahir_ibu' => $faker->year(),
                'pekerjaan_ibu' => $faker->jobTitle,
                'pendidikan_ibu' => $faker->randomElement([
                    'Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat',
                    'D1','D2','D3','D4/S1','S2','S3'
                ]),
                'penghasilan_ibu' => $faker->randomElement([
                    'Tidak Berpenghasilan','Kurang Dari 1.000.000',
                    '1.000.000-2.000.000','Lebih Dari 3.000.000'
                ]),

                // Wali (optional aman)
                'nama_wali' => $faker->optional()->name,
                'pendidikan_wali' => $faker->optional()->randomElement([
                    'Tidak Sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat',
                    'D1','D2','D3','D4/S1','S2','S3'
                ]),
                'penghasilan_wali' => $faker->optional()->randomElement([
                    'Tidak Berpenghasilan','Kurang Dari 1.000.000',
                    '1.000.000-2.000.000','Lebih Dari 3.000.000'
                ]),

                'jenis_tinggal' => $faker->randomElement([
                    'Bersama Orang Tua','Wali','Kost','Asrama/Pesantren','Panti Asuhan'
                ]),

                // Alamat
                'provinsi' => $faker->state,
                'kabupaten' => $faker->city,
                'kecamatan' => $faker->city,
                'desa' => $faker->word,
                'kode_pos' => $faker->postcode,
                'alamat_lengkap' => $faker->address,

                // Fisik
                'tinggi_badan' => $faker->numberBetween(140, 180),
                'berat_badan' => $faker->numberBetween(35, 80),
                'ukuran_pakaian' => $faker->randomElement(['S','M','L','XL']),
                'ukuran_sepatu' => $faker->numberBetween(36, 44),
                'berkebutuhan_khusus' => $faker->randomElement(['Tidak Ada','Ringan','Sedang']),

                'no_hp_ortu' => $faker->phoneNumber,

                'jarak_ke_sekolah' => $faker->numberBetween(1, 20),
                'alat_transportasi' => $faker->randomElement([
                    'Jalan Kaki','Kendaraan Pribadi','Kendaraan Umum','Jemputan','Ojek','Di Antarkan'
                ]),

                'jumlah_saudara' => "Anak ke ".$faker->numberBetween(1,4)." dari ".$faker->numberBetween(2,6)." bersaudara",

                'memiliki_kip' => $faker->boolean,
                'no_kip' => $faker->optional()->numerify('KIP-########'),

                // asal sekolah dari pendaftar
    
                // SMP
                'nama_smp' => $faker->company.' SMP',
                'npsn_smp' => $faker->numerify('########'),
                'provinsi_smp' => $faker->state,
                'kabupaten_smp' => $faker->city,
                'kecamatan_smp' => $faker->city,
                'desa_smp' => $faker->word,
                'kode_pos_smp' => $faker->postcode,
                'alamat_smp' => $faker->address,
                'tahun_lulus' => $faker->year(),

                'dari_mana_mengenal' => $faker->randomElement([
                    'Teman','Sosial Media','Website Sekolah','Iklan','Lainnya'
                ]),

                'mengapa_memilih_samnus' => $faker->sentence(10),
            ]);
        }
    }
}