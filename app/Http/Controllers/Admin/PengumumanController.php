<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    private $pengumuman = [
        ['id' => 1, 'judul' => 'Pengumuman Penting', 'tanggal' => '2026-04-01', 'isi' => 'Ini adalah isi pengumuman dummy yang bisa diedit.'],
        ['id' => 2, 'judul' => 'Pengumuman Libur', 'tanggal' => '2026-04-05', 'isi' => 'Hari libur nasional pada tanggal ini.'],
    ];

    public function index()
    {
        return view('admin.pengumuman.index');
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function edit($id)
    {
        // Cari dummy berdasarkan id
        $pengumuman = collect($this->pengumuman)->firstWhere('id', $id);

        if (! $pengumuman) {
            abort(404);
        }

        return view('admin.pengumuman.edit', compact('pengumuman'));
    }
}
