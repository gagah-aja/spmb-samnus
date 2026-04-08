<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function foto()
    {
        return view('galeri.foto');
    }

    public function video()
    {
        return view('galeri.video');
    }
}