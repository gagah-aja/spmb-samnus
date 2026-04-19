<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_lanjutans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftars')->onDelete('cascade'); // mengambil nama, nisn, no_hp, asal sekolah dari pendaftar

            // A. Identitas Peserta Didik
            $table->enum('jalur_pendaftaran', ['Afirmasi', 'Prestasi', 'Reguler'])->default('Afirmasi');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('hobi')->nullable();

            // Identitas Orang Tua/Wali
            $table->string('nama_ayah')->nullable();
            $table->year('tahun_lahir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->enum('pendidikan_ayah', [
                'Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat',
                'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3',
            ])->nullable();
            $table->enum('penghasilan_ayah', [
                'Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000',
            ])->nullable();

            $table->string('nama_ibu')->nullable();
            $table->year('tahun_lahir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->enum('pendidikan_ibu', [
                'Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat',
                'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3',
            ])->nullable();
            $table->enum('penghasilan_ibu', [
                'Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000',
            ])->nullable();

            $table->string('nama_wali')->nullable();
            $table->enum('pendidikan_wali', [
                'Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat',
                'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3',
            ])->nullable();
            $table->enum('penghasilan_wali', [
                'Tidak Berpenghasilan', 'Kurang Dari 1.000.000', '1.000.000-2.000.000', 'Lebih Dari 3.000.000',
            ])->nullable();

            $table->enum('jenis_tinggal', [
                'Bersama Orang Tua', 'Wali', 'Kost', 'Asrama/Pesantren', 'Panti Asuhan',
            ])->nullable();

            // Alamat Tempat Tinggal
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat_lengkap')->nullable();

            // Data Fisik & Lainnya
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('ukuran_pakaian')->nullable();
            $table->string('ukuran_sepatu')->nullable();
            $table->string('berkebutuhan_khusus')->nullable();
            $table->string('no_hp_ortu')->nullable();
            $table->integer('jarak_ke_sekolah')->nullable();
            $table->enum('alat_transportasi', [
                'Jalan Kaki', 'Kendaraan Pribadi', 'Kendaraan Umum', 'Jemputan', 'Ojek', 'Di Antarkan',
            ])->nullable();
            $table->string('jumlah_saudara')->nullable(); // contoh "Anak ke 2 dari 3 bersaudara"
            $table->boolean('memiliki_kip')->default(false);
            $table->string('no_kip')->nullable();

            // B. Asal Sekolah Siswa
            $table->string('nama_smp')->nullable();
            $table->string('npsn_smp')->nullable();
            $table->string('provinsi_smp')->nullable();
            $table->string('kabupaten_smp')->nullable();
            $table->string('kecamatan_smp')->nullable();
            $table->string('desa_smp')->nullable();
            $table->string('kode_pos_smp')->nullable();
            $table->text('alamat_smp')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('dari_mana_mengenal')->nullable();
            $table->text('mengapa_memilih_samnus')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_lanjutans');
    }
};
