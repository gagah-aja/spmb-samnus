<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $table = 'galeri_fotos';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_path',
        'kategori',
        'urutan',
        'is_aktif',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }

    public function getFotoUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}