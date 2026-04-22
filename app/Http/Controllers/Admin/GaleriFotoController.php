<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->get('search');
        $kategori = $request->get('kategori');

        $query = GaleriFoto::orderBy('urutan')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $fotos      = $query->paginate(12)->withQueryString();
        $kategoris  = GaleriFoto::whereNotNull('kategori')->distinct()->pluck('kategori');
        $totalAktif = GaleriFoto::where('is_aktif', true)->count();
        $totalSemua = GaleriFoto::count();

        return view('admin.galeri.foto', compact('fotos', 'kategoris', 'totalAktif', 'totalSemua', 'search', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'foto'     => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'deskripsi'=> 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'urutan'   => 'nullable|integer',
        ], [
            'foto.required' => 'File foto wajib diupload.',
            'foto.image'    => 'File harus berupa gambar (jpg, png, webp).',
            'foto.max'      => 'Ukuran foto maksimal 5MB.',
        ]);

        $path = $request->file('foto')->store('galeri/foto', 'public');

        GaleriFoto::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
            'kategori'  => $request->kategori,
            'urutan'    => $request->urutan ?? 0,
            'is_aktif'  => $request->boolean('is_aktif', true),
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    public function update(Request $request, GaleriFoto $foto)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'deskripsi'=> 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'urutan'   => 'nullable|integer',
        ]);

        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori'  => $request->kategori,
            'urutan'    => $request->urutan ?? $foto->urutan,
            'is_aktif'  => $request->boolean('is_aktif', true),
        ];

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($foto->file_path);
            $data['file_path'] = $request->file('foto')->store('galeri/foto', 'public');
        }

        $foto->update($data);

        return back()->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy(GaleriFoto $foto)
    {
        Storage::disk('public')->delete($foto->file_path);
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    public function toggleAktif(GaleriFoto $foto)
    {
        $foto->update(['is_aktif' => !$foto->is_aktif]);
        $status = $foto->is_aktif ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Foto berhasil {$status}!");
    }
}