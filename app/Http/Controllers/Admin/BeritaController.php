<?php

namespace App\Http\Controllers\Admin;
    
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori')->latest();

        if ($request->search) {
            $query->where('judul', 'like', '%'.$request->search.'%')
                ->orWhere('konten', 'like', '%'.$request->search.'%');
        }

        $beritas = $query->paginate(10)->withQueryString();

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        // dd(Kategori::all());
        // dd($kategoris);
        return view('admin.berita.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_beritas,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only('judul', 'konten', 'status', 'kategori_id');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $kategoris = Kategori::all();

        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_beritas,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only('judul', 'konten', 'status', 'kategori_id');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
