<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Cek apakah user login
        if (!session('user')) {
            return redirect('/login');
        }

        // 2. Ambil data user dari database pakai NISN
        $user = Pendaftar::where('nisn', session('user.nisn'))->first();

        // 3. Kirim ke view
        return view('user.dashboard', compact('user'));
    }
}