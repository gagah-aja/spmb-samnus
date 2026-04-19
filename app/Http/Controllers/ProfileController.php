<?php

namespace App\Http\Controllers;

use App\Models\DaftarLanjutan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Pendaftar::find(session('user_id'));

        // dd(session()->all());

        if (! $user) {
            return redirect('/login');
        }

        $lanjutan = DaftarLanjutan::where('pendaftar_id', $user->id)->first();

        return view('profile', compact('user', 'lanjutan'));
    }

    public function store(Request $request)
    {
        $user = Pendaftar::find(session('user_id'));

        if (! $user) {
            return redirect('/login');
        }

        DaftarLanjutan::updateOrCreate(
            ['pendaftar_id' => $user->id],
            [
                'jalur_pendaftaran' => $request->jalur_pendaftaran,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'cita_cita' => $request->cita_cita,
                'hobi' => $request->hobi,

                // Ayah
                'nama_ayah' => $request->nama_ayah,
                'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'penghasilan_ayah' => $request->penghasilan_ayah,

                // Ibu
                'nama_ibu' => $request->nama_ibu,
                'tahun_lahir_ibu' => $request->tahun_lahir_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'penghasilan_ibu' => $request->penghasilan_ibu,

                // Wali
                'nama_wali' => $request->nama_wali,
                'pendidikan_wali' => $request->pendidikan_wali,
                'penghasilan_wali' => $request->penghasilan_wali,

                // Tempat tinggal
                'jenis_tinggal' => $request->jenis_tinggal,

                // Alamat
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'kode_pos' => $request->kode_pos,
                'alamat_lengkap' => $request->alamat_lengkap,

                // Fisik
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'ukuran_pakaian' => $request->ukuran_pakaian,
                'ukuran_sepatu' => $request->ukuran_sepatu,
                'berkebutuhan_khusus' => $request->berkebutuhan_khusus,

                // Lainnya
                'no_hp_ortu' => $request->no_hp_ortu,
                'jarak_ke_sekolah' => $request->jarak_ke_sekolah,
                'alat_transportasi' => $request->alat_transportasi,
                'jumlah_saudara' => $request->jumlah_saudara,
                'memiliki_kip' => $request->memiliki_kip ?? false,
                'no_kip' => $request->no_kip,

                // SMP
                'nama_smp' => $request->nama_smp,
                'npsn_smp' => $request->npsn_smp,
                'provinsi_smp' => $request->provinsi_smp,
                'kabupaten_smp' => $request->kabupaten_smp,
                'kecamatan_smp' => $request->kecamatan_smp,
                'desa_smp' => $request->desa_smp,
                'kode_pos_smp' => $request->kode_pos_smp,
                'alamat_smp' => $request->alamat_smp,
                'tahun_lulus' => $request->tahun_lulus,
                'dari_mana_mengenal' => $request->dari_mana_mengenal,
                'mengapa_memilih_samnus' => $request->mengapa_memilih_samnus,
            ]
        );

        return back()->with('success', 'Data berhasil disimpan');
    }
}
