<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class BeritaController extends Controller
{
    public function show($id)
    {
        $berita = Pengumuman::findOrFail($id);
        $pengumuman = Pengumuman::latest()->get(); // ambil semua berita

        return view('user.berita_detail', compact('berita', 'pengumuman'));
    }
}