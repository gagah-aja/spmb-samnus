<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Pendaftar;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Pendaftar::all(); // ambil semua data

        return view('admin.verifikasi.index', compact('data'));
    }

    public function setuju(Request $request, $id)
    {
        $data = Pendaftar::findOrFail($id);
        $data->status = 'disetujui';
        $data->save();

        Notifikasi::updateOrCreate(
            ['pendaftar_id' => $id],
            ['pesan' => $request->pesan]
        );

        return back()->with('success', 'Disetujui + pesan tersimpan');
    }

    public function tolak(Request $request, $id)
    {
        $data = Pendaftar::findOrFail($id);
        $data->status = 'ditolak';
        $data->save();

        Notifikasi::updateOrCreate(
            ['pendaftar_id' => $id],
            ['pesan' => $request->pesan]
        );

        return back()->with('success', 'Ditolak + pesan tersimpan');
    }
}
