<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterMenu;
use App\Models\Jurusan;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $data = Pengaturan::pluck('value', 'key');
        $jurusans = Jurusan::orderBy('urutan')->get();
        $footerMenus = FooterMenu::orderBy('urutan')->get();

        return view('admin.pengaturan.index', compact('data', 'jurusans', 'footerMenus'));
    }

    // ===== HERO =====
    public function updateHero(Request $request)
    {
        Pengaturan::set('hero_judul', $request->hero_judul);
        Pengaturan::set('hero_subjudul', $request->hero_subjudul);

        return back()->with('success', 'Hero berhasil disimpan!');
    }

    // ===== TENTANG =====
    public function updateTentang(Request $request)
    {
        Pengaturan::set('tentang_judul', $request->tentang_judul);
        Pengaturan::set('tentang_isi', $request->tentang_isi);
        Pengaturan::set('tentang_visi', $request->tentang_visi);
        Pengaturan::set('tentang_misi', $request->tentang_misi);

        return back()->with('success', 'Tentang berhasil disimpan!');
    }

    // ===== JURUSAN =====
    public function storeJurusan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
        ]);

        $urutan = Jurusan::max('urutan') + 1;

        Jurusan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon ?? 'fa-graduation-cap',
            'urutan' => $urutan,
        ]);

        return back()->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function updateJurusan(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon ?? 'fa-graduation-cap',
        ]);

        return back()->with('success', 'Jurusan berhasil diupdate!');
    }

    public function destroyJurusan($id)
    {
        Jurusan::findOrFail($id)->delete();

        return back()->with('success', 'Jurusan berhasil dihapus!');
    }

    // ===== FOOTER =====
    public function updateFooter(Request $request)
    {
        Pengaturan::set('footer_nama', $request->footer_nama);
        Pengaturan::set('footer_deskripsi', $request->footer_deskripsi);
        Pengaturan::set('footer_alamat', $request->footer_alamat);
        Pengaturan::set('footer_email', $request->footer_email);
        Pengaturan::set('footer_telepon', $request->footer_telepon);
        Pengaturan::set('footer_youtube', $request->footer_youtube);
        Pengaturan::set('footer_instagram', $request->footer_instagram);
        Pengaturan::set('footer_maps', $request->footer_maps);
        Pengaturan::set('footer_copyright', $request->footer_copyright);
        Pengaturan::set('footer_menu', json_encode($request->menu ?? []));
        Pengaturan::set('footer_info', json_encode($request->info ?? []));

        // LOGO (UPLOAD)
        if ($request->hasFile('footer_logo')) {
            $path = $request->file('footer_logo')->store('logo', 'public');
            Pengaturan::set('footer_logo', $path);
        }

        return back()->with('success', 'Footer berhasil disimpan!');
    }

    public function storeFooterMenu(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
        ]);

        FooterMenu::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'urutan' => FooterMenu::max('urutan') + 1,
        ]);

        return back()->with('success', 'Menu footer ditambahkan!');
    }

    public function updateFooterMenu(Request $request, $id)
    {
        $menu = FooterMenu::findOrFail($id);

        $menu->update([
            'judul' => $request->judul,
            'link' => $request->link,
        ]);

        return back()->with('success', 'Menu diupdate!');
    }

    public function destroyFooterMenu($id)
    {
        FooterMenu::findOrFail($id)->delete();

        return back()->with('success', 'Menu dihapus!');
    }

    public function updateNavbar(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key != '_token' && $key != '_method') {
                Pengaturan::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        return back()->with('success', 'Navbar berhasil disimpan!');
    }
}
