<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::query();

        // 🔍 SEARCH NAMA
        if ($request->filled('search')) {
            $query->where('nama_lengkap', 'like', '%'.$request->search.'%');
        }

        // 🔽 FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $data = $query->latest()->get();

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

    public function updatePesan(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string',
        ]);

        Notifikasi::updateOrCreate(
            ['pendaftar_id' => $id],
            ['pesan' => $request->pesan]
        );

        return back()->with('success', 'Pesan berhasil diperbarui.');
    }
}
