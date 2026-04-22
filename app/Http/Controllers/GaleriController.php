<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use App\Models\GaleriVideo;

class GaleriController extends Controller
{
    public function foto()
    {
        $setting = Pengaturan::pluck('value', 'key');
        $fotos = GaleriFoto::where('is_aktif', true)
                    ->orderBy('urutan')
                    ->latest()
                    ->get();

        return view('galeri.foto', compact('setting', 'fotos'));
    }

    public function video()
    {
        $setting = Pengaturan::pluck('value', 'key');
        $videos = GaleriVideo::where('is_aktif', true)
                    ->orderBy('urutan')
                    ->latest()
                    ->get();
        return view('galeri.video', compact('setting', 'videos'));
    }
}