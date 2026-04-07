<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function daftar(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'asal_sekolah' => 'required',
            'nisn' => 'required|unique:pendaftars',
            'no_hp' => 'required',
            'jurusan' => 'required',
        ]);

        Pendaftar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'nisn' => $request->nisn,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil, silakan login');
    }

    // LOGIN ADMIN
    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && \Hash::check($request->password, $admin->password)) {
            session([
                'login_admin' => true,
                'admin_nama' => $admin->name,
            ]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function loginUser(Request $request)
{
    $user = Pendaftar::where('nisn', $request->nisn)
        ->where('nama_lengkap', $request->nama_lengkap)
        ->first();

    if ($user) {
        session([
            'user' => [
                'nama' => $user->nama_lengkap,
                'nisn' => $user->nisn,
                'foto' => $user->foto ?? null
            ]
        ]);

        return redirect('/dashboard'); // ⬅️ WAJIB
    }

    return back()->with('error', 'Data tidak ditemukan');
}

    // LOGOUT
    public function logout()
    {
        Session::flush();

        return redirect('/');
    }
}
