<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarLanjutan;
use Illuminate\Http\Request;

class DaftarLanjutanController extends Controller
{
    public function index(Request $request)
    {
        $query = DaftarLanjutan::with('pendaftar');

        if ($request->filled('search')) {
            $query->whereHas('pendaftar', function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%');
            });
        }

        $daftarLanjutans = $query->paginate(20)->withQueryString();

        return view('admin.daftar_lanjutan.index', compact('daftarLanjutans'));
    }

    public function show($id)
    {
        $daftarLanjutan = DaftarLanjutan::with('pendaftar')->findOrFail($id);
        return view('admin.daftar_lanjutan.show', compact('daftarLanjutan'));
    }

    public function edit($id)
{
    $daftarLanjutan = DaftarLanjutan::with('pendaftar')->findOrFail($id);
    dd($daftarLanjutan->id, $daftarLanjutan->exists); // ← tambah ini
    return view('admin.daftar_lanjutan.edit', compact('daftarLanjutan'));
}

    public function update(Request $request, $id)
    {
        $daftarLanjutan = DaftarLanjutan::findOrFail($id);

        $daftarLanjutan->update($request->only([
            // Data Diri
            'jalur_pendaftaran',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'cita_cita',
            'hobi',

            // Ayah
            'nama_ayah',
            'tahun_lahir_ayah',
            'pekerjaan_ayah',
            'pendidikan_ayah',
            'penghasilan_ayah',

            // Ibu
            'nama_ibu',
            'tahun_lahir_ibu',
            'pekerjaan_ibu',
            'pendidikan_ibu',
            'penghasilan_ibu',

            // Wali
            'nama_wali',
            'pendidikan_wali',
            'penghasilan_wali',

            // Tempat tinggal
            'jenis_tinggal',

            // Alamat
            'provinsi',
            'kabupaten',
            'kecamatan',
            'desa',
            'kode_pos',
            'alamat_lengkap',

            // Fisik & lainnya
            'tinggi_badan',
            'berat_badan',
            'ukuran_pakaian',
            'ukuran_sepatu',
            'berkebutuhan_khusus',
            'no_hp_ortu',
            'jarak_ke_sekolah',
            'alat_transportasi',
            'jumlah_saudara',
            'memiliki_kip',
            'no_kip',

            // SMP
            'nama_smp',
            'npsn_smp',
            'provinsi_smp',
            'kabupaten_smp',
            'kecamatan_smp',
            'desa_smp',
            'kode_pos_smp',
            'alamat_smp',
            'tahun_lulus',
            'dari_mana_mengenal',
            'mengapa_memilih_samnus',
        ]));

        return redirect()->route('admin.daftar-lanjutan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $daftarLanjutan = DaftarLanjutan::findOrFail($id);
        $daftarLanjutan->delete();

        return redirect()->route('admin.daftar-lanjutan.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function exportCsv()
    {
        $fileName = 'daftar_lanjutan.csv';
        $daftarLanjutans = DaftarLanjutan::with('pendaftar')->get();

        $headers = [
            "Content-Type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$fileName\"",
        ];

        $columns = [
            'Nama', 'NISN', 'No HP', 'Asal Sekolah',
            'Jalur Pendaftaran', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir',
            'Agama', 'Cita-Cita', 'Hobi',
            'Nama Ayah', 'Tahun Lahir Ayah', 'Pekerjaan Ayah', 'Pendidikan Ayah', 'Penghasilan Ayah',
            'Nama Ibu', 'Tahun Lahir Ibu', 'Pekerjaan Ibu', 'Pendidikan Ibu', 'Penghasilan Ibu',
            'Nama Wali', 'Pendidikan Wali', 'Penghasilan Wali',
            'Jenis Tinggal',
            'Provinsi', 'Kabupaten', 'Kecamatan', 'Desa', 'Kode Pos', 'Alamat Lengkap',
            'Tinggi Badan', 'Berat Badan', 'Ukuran Pakaian', 'Ukuran Sepatu',
            'Berkebutuhan Khusus', 'No HP Ortu', 'Jarak ke Sekolah', 'Alat Transportasi',
            'Jumlah Saudara', 'Memiliki KIP', 'No KIP',
            'Nama SMP', 'NPSN SMP', 'Provinsi SMP', 'Kabupaten SMP', 'Kecamatan SMP',
            'Desa SMP', 'Kode Pos SMP', 'Alamat SMP', 'Tahun Lulus',
            'Dari Mana Mengenal', 'Mengapa Memilih',
        ];

        $callback = function () use ($daftarLanjutans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($daftarLanjutans as $item) {
                fputcsv($file, [
                    optional($item->pendaftar)->nama_lengkap,
                    optional($item->pendaftar)->nisn,
                    optional($item->pendaftar)->no_hp,
                    optional($item->pendaftar)->asal_sekolah,
                    $item->jalur_pendaftaran,
                    $item->jenis_kelamin,
                    $item->tempat_lahir,
                    $item->tanggal_lahir,
                    $item->agama,
                    $item->cita_cita,
                    $item->hobi,
                    $item->nama_ayah,
                    $item->tahun_lahir_ayah,
                    $item->pekerjaan_ayah,
                    $item->pendidikan_ayah,
                    $item->penghasilan_ayah,
                    $item->nama_ibu,
                    $item->tahun_lahir_ibu,
                    $item->pekerjaan_ibu,
                    $item->pendidikan_ibu,
                    $item->penghasilan_ibu,
                    $item->nama_wali,
                    $item->pendidikan_wali,
                    $item->penghasilan_wali,
                    $item->jenis_tinggal,
                    $item->provinsi,
                    $item->kabupaten,
                    $item->kecamatan,
                    $item->desa,
                    $item->kode_pos,
                    $item->alamat_lengkap,
                    $item->tinggi_badan,
                    $item->berat_badan,
                    $item->ukuran_pakaian,
                    $item->ukuran_sepatu,
                    $item->berkebutuhan_khusus,
                    $item->no_hp_ortu,
                    $item->jarak_ke_sekolah,
                    $item->alat_transportasi,
                    $item->jumlah_saudara,
                    $item->memiliki_kip ? 'Ya' : 'Tidak',
                    $item->no_kip,
                    $item->nama_smp,
                    $item->npsn_smp,
                    $item->provinsi_smp,
                    $item->kabupaten_smp,
                    $item->kecamatan_smp,
                    $item->desa_smp,
                    $item->kode_pos_smp,
                    $item->alamat_smp,
                    $item->tahun_lulus,
                    $item->dari_mana_mengenal,
                    $item->mengapa_memilih_samnus,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}