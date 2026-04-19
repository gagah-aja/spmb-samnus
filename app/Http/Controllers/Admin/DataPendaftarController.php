<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::query();

        // fitur search
        if ($request->search) {
            $query->where('nama_lengkap', 'like', '%'.$request->search.'%')
                ->orWhere('asal_sekolah', 'like', '%'.$request->search.'%')
                ->orWhere('nisn', 'like', '%'.$request->search.'%')
                ->orWhere('no_hp', 'like', '%'.$request->search.'%');
        }

        $data = $query->get();

        return view('admin.data_pendaftar.index', compact('data'));
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

    public function export(Request $request)
    {
        // bersihin buffer (PENTING biar tidak corrupt)
        if (ob_get_length()) {
            ob_end_clean();
        }

        $query = Pendaftar::query();

        if ($request->search) {
            $query->where('nama_lengkap', 'like', '%'.$request->search.'%')
                ->orWhere('asal_sekolah', 'like', '%'.$request->search.'%')
                ->orWhere('nisn', 'like', '%'.$request->search.'%')
                ->orWhere('no_hp', 'like', '%'.$request->search.'%');
        }

        $data = $query->get();

        $filename = 'data_pendaftar_'.date('Y-m-d').'.xls';

        return response()->streamDownload(function () use ($data) {

            echo '<table border="1" style="border-collapse: collapse; width:100%; text-align:center;">';

            echo '<thead>
                <tr style="background-color:#22c55e; color:white;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal Sekolah</th>
                    <th>NISN</th>
                    <th>No HP</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                </tr>
              </thead>';

            echo '<tbody>';

            foreach ($data as $i => $d) {
                echo '<tr>
                    <td>'.($i + 1).'</td>
                    <td>'.htmlspecialchars($d->nama_lengkap).'</td>
                    <td>'.htmlspecialchars($d->asal_sekolah).'</td>
                    <td>'.$d->nisn.'</td>
                    <td>'.$d->no_hp.'</td>
                    <td>'.htmlspecialchars($d->jurusan).'</td>
                    <td>'.htmlspecialchars($d->status).'</td>
                  </tr>';
            }

            echo '</tbody></table>';

        }, $filename, [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
        ]);
    }
}
