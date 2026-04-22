<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Pengaturan;

class LandingController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::where('status', 'published')->latest()->take(3)->get();
        $setting = Pengaturan::pluck('value', 'key');
        $jurusans = Jurusan::all();

        return view('landing', compact('beritaTerbaru', 'setting', 'jurusans'));
    }

    public function tentang()
    {
        $setting = Pengaturan::pluck('value', 'key')->toArray();

        return view('tentang', compact('setting'));
    }

    public function jurusan()
    {
        $setting = Pengaturan::pluck('value', 'key')->toArray();

        // Ambil jurusan dari settings (JSON)
        $jurusans = [];

        if (! empty($setting['jurusan'])) {
            $jurusans = json_decode($setting['jurusan'], true);
        } else {
            // fallback database
            $jurusans = Jurusan::all();
        }

        return view('jurusan', compact('jurusans', 'setting'));
    }
}
