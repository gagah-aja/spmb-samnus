<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // tambahkan 'pendaftar_id' di sini
    protected $fillable = [
        'pendaftar_id',
        'pesan',
        // tambahkan kolom lain yang ingin bisa mass assign
    ];
}