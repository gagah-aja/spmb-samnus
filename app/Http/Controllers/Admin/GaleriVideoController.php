<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriVideoController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->get('search');
        $kategori = $request->get('kategori');

        $query = GaleriVideo::orderBy('urutan')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $videos     = $query->paginate(12)->withQueryString();
        $kategoris  = GaleriVideo::whereNotNull('kategori')->distinct()->pluck('kategori');
        $totalAktif = GaleriVideo::where('is_aktif', true)->count();
        $totalSemua = GaleriVideo::count();

        return view('admin.galeri.video', compact('videos', 'kategoris', 'totalAktif', 'totalSemua', 'search', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'video_url' => 'required|url',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'nullable|string|max:100',
            'urutan'    => 'nullable|integer',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'video_url.required' => 'URL video YouTube wajib diisi.',
            'video_url.url'      => 'Format URL tidak valid. Contoh: https://youtube.com/watch?v=...',
        ]);

        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'video_url' => $request->video_url,
            'kategori'  => $request->kategori,
            'urutan'    => $request->urutan ?? 0,
            'is_aktif'  => $request->boolean('is_aktif', true),
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('galeri/thumbnail', 'public');
        }

        GaleriVideo::create($data);

        return back()->with('success', 'Video berhasil ditambahkan!');
    }

    public function update(Request $request, GaleriVideo $video)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'video_url' => 'required|url',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'nullable|string|max:100',
            'urutan'    => 'nullable|integer',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'video_url' => $request->video_url,
            'kategori'  => $request->kategori,
            'urutan'    => $request->urutan ?? $video->urutan,
            'is_aktif'  => $request->boolean('is_aktif', true),
        ];

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('galeri/thumbnail', 'public');
        }

        $video->update($data);

        return back()->with('success', 'Video berhasil diperbarui!');
    }

    public function destroy(GaleriVideo $video)
    {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $video->delete();

        return back()->with('success', 'Video berhasil dihapus!');
    }

    public function toggleAktif(GaleriVideo $video)
    {
        $video->update(['is_aktif' => !$video->is_aktif]);
        $status = $video->is_aktif ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Video berhasil {$status}!");
    }
}