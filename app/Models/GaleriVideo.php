<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriVideo extends Model
{
    protected $table = 'galeri_videos';

    protected $fillable = [
        'judul',
        'deskripsi',
        'video_url',
        'thumbnail',
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

    // Ambil YouTube Video ID dari berbagai format URL
    public function getYoutubeIdAttribute(): ?string
    {
        if (! $this->video_url) {
            return null;
        }
        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $m);

        return $m[1] ?? null;
    }

    // Thumbnail: custom upload atau auto dari YouTube
    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return asset('storage/'.$this->thumbnail);
        }
        if ($this->youtube_id) {
            return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
        }

        return asset('images/video-placeholder.jpg');
    }

    // URL embed untuk ditampilkan di iframe
    public function getEmbedUrlAttribute(): ?string
    {
        if (! $this->youtube_id) {
            return null;
        }

        return "https://www.youtube.com/embed/{$this->youtube_id}?autoplay=1&rel=0";
    }
}
