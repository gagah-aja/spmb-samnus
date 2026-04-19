<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'asal_sekolah',
        'nisn',
        'no_hp',
        'jurusan',
        // tambahkan field lain sesuai tabel kamu
    ];

    public function notifikasi()
    {
        return $this->hasOne(Notifikasi::class);
    }

    // Relasi ke DaftarLanjutan (one-to-one)
    public function lanjutan()
    {
    return $this->hasOne(DaftarLanjutan::class);
    }

    // Hapus daftar lanjutan juga saat pendaftar dihapus
    protected static function booted()
    {
        static::deleting(function ($pendaftar) {
            $pendaftar->daftarLanjutan()->delete();
        });
    }
}
