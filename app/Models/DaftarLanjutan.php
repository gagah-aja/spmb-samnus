<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLanjutan extends Model
{
    use HasFactory;

    protected $table = 'daftar_lanjutans';
    protected $fillable = [
        'pendaftar_id',
        'jalur_pendaftaran', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
        'agama', 'cita_cita', 'hobi',
        'nama_ayah', 'tahun_lahir_ayah', 'pekerjaan_ayah', 'pendidikan_ayah', 'penghasilan_ayah',
        'nama_ibu', 'tahun_lahir_ibu', 'pekerjaan_ibu', 'pendidikan_ibu', 'penghasilan_ibu',
        'nama_wali', 'pendidikan_wali', 'penghasilan_wali',
        'jenis_tinggal', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'kode_pos', 'alamat_lengkap',
        'tinggi_badan', 'berat_badan', 'ukuran_pakaian', 'ukuran_sepatu', 'berkebutuhan_khusus',
        'no_hp_ortu', 'jarak_ke_sekolah', 'alat_transportasi', 'jumlah_saudara', 'memiliki_kip', 'no_kip',
        'nama_smp', 'npsn_smp', 'provinsi_smp', 'kabupaten_smp', 'kecamatan_smp', 'desa_smp', 'kode_pos_smp',
        'alamat_smp', 'tahun_lulus', 'dari_mana_mengenal', 'mengapa_memilih_samnus',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    protected static function booted()
    {
        static::deleting(function ($daftarLanjutan) {
            // Hindari infinite loop dengan cek dulu
            if ($daftarLanjutan->pendaftar) {
                $daftarLanjutan->pendaftar()->delete();
            }
        });
    }
}
