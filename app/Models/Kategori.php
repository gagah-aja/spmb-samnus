<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     protected $table = 'kategori_beritas';
    protected $fillable = ['nama', 'slug'];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
