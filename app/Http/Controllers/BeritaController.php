<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::where('status', 'published')
                        ->latest()
                        ->paginate(9);
        $setting = Pengaturan::pluck('value', 'key');
        return view('berita.index', compact('beritas', 'setting'));
    }
}