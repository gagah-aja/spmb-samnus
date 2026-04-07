<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $data = Pendaftar::all(); // / Ambil semua data pendaftar dari database

        return view('admin.data_pendaftar.index', compact('data')); // / Tampilkan view dengan data pendaftar
    }

    public function create()
    {
        return view('admin.data_pendaftar.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftars,nisn',
            'no_hp' => 'required|numeric',
            'jurusan' => 'required|string',
        ]);

        // Simpan ke database
        Pendaftar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'nisn' => $request->nisn,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
        ]);

        // Redirect dengan flash session untuk SweetAlert
        return redirect()->route('admin.data-pendaftar')->with('success', 'Penambahan Data Berhasil, Silahkan Siswa Login Menggunakan Nama Lengkap dan NISN.');
    }

    public function edit($id)
    {
        $data = Pendaftar::findOrFail($id);

        return view('admin.data_pendaftar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pendaftar::findOrFail($id);

        // validasi
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftars,nisn,'.$id,
            'no_hp' => 'required|numeric',
            'jurusan' => 'required|string',
            'status' => 'required|string',
        ]);

        // update data
        $data->update([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'nisn' => $request->nisn,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.data-pendaftar')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Pendaftar::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
