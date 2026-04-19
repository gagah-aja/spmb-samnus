<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarLanjutan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DaftarLanjutanController extends Controller
{
    // Tampilkan semua daftar lanjutan
    public function index()
    {
        $daftarLanjutans = DaftarLanjutan::with('pendaftar')->paginate(20);

        return view('admin.daftar_lanjutan.index', compact('daftarLanjutans'));
    }

    // Tampilkan form edit
    public function edit(DaftarLanjutan $daftarLanjutan)
    {
        return view('admin.daftar_lanjutan.edit', compact('daftarLanjutan'));
    }

    // Update data
    public function update(Request $request, DaftarLanjutan $daftarLanjutan)
    {
        $daftarLanjutan->update($request->all()); // bisa tambahkan validasi sederhana jika mau

        return redirect()->route('admin.daftar_lanjutan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(DaftarLanjutan $daftarLanjutan)
    {
        $daftarLanjutan->delete();

        return redirect()->route('admin.daftar_lanjutan.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    // Ekspor Excel
    public function exportCsv()
    {
        $fileName = 'daftar_lanjutan.csv';
        $daftarLanjutans = DaftarLanjutan::with('pendaftar')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $columns = [
            'Nama', 'NISN', 'No HP', 'Jalur Pendaftaran', 'Jenis Kelamin',
            'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'Cita-Cita', 'Hobi',
            // bisa ditambahkan semua kolom lain sesuai kebutuhan
        ];

        $callback = function () use ($daftarLanjutans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($daftarLanjutans as $item) {
                fputcsv($file, [
                    $item->nama,
                    $item->nisn,
                    $item->no_hp,
                    $item->jalur_pendaftaran,
                    $item->jenis_kelamin,
                    $item->tempat_lahir,
                    $item->tanggal_lahir,
                    $item->agama,
                    $item->cita_cita,
                    $item->hobi,
                    // tambahkan kolom lain jika perlu
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
