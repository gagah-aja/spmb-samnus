<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data terbaru (limit 5)
        $pendaftar = Pendaftar::latest()->take(5)->get();

        // Hitung jumlah
        $total = Pendaftar::count();
        $verified = Pendaftar::where('status', 'lolos')->count();
        $pending = Pendaftar::where('status', 'proses')->count();
        
        return view('admin.Dashboard', compact('pendaftar', 'total', 'verified', 'pending'));
    }
}