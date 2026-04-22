<?php

use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DaftarLanjutanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\GaleriFotoController;
use App\Http\Controllers\Admin\GaleriVideoController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

use Illuminate\Support\Facades\Route;

// ================= LOGIN =================
Route::view('/login', 'login')->name('login');
Route::view('/login/admin', 'admin.login')->name('login.admin');

Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);

// ================= DAFTAR =================
Route::view('/daftar', 'daftar');
Route::post('/daftar', [AuthController::class, 'daftar']);

// ================= LOGOUT =================
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= LANDING =================
Route::get('/', [LandingController::class, 'index']);
Route::get('/tentang', [LandingController::class, 'tentang'])->name('tentang');
Route::get('/jurusan', [LandingController::class, 'jurusan'])->name('jurusan');

// ================= USER =================
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'detail'])->name('berita.detail');

Route::get('/galeri/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
Route::get('/galeri/video', [GaleriController::class, 'video'])->name('galeri.video');

// ================= USER LOGIN =================
Route::middleware('user')->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

});

// ================= ADMIN =================
Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ================= DATA PENDAFTAR =================
    Route::get('/data-pendaftar', [DataPendaftarController::class, 'index'])->name('admin.data-pendaftar');
    Route::get('/data-pendaftar/create', [DataPendaftarController::class, 'create'])->name('admin.data-pendaftar.create');
    Route::post('/data-pendaftar', [DataPendaftarController::class, 'store'])->name('admin.data-pendaftar.store');
    Route::get('/data-pendaftar/{id}/edit', [DataPendaftarController::class, 'edit'])->name('admin.data-pendaftar.edit');
    Route::put('/data-pendaftar/{id}', [DataPendaftarController::class, 'update'])->name('admin.data-pendaftar.update');
    Route::delete('/data-pendaftar/{id}', [DataPendaftarController::class, 'destroy'])->name('admin.data-pendaftar.destroy');
    Route::get('/data-pendaftar/export', [DataPendaftarController::class, 'export'])->name('admin.data-pendaftar.export');

    // ================= DAFTAR LANJUTAN =================
    Route::get('daftar-lanjutan', [DaftarLanjutanController::class, 'index'])->name('admin.daftar-lanjutan.index');
    Route::get('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'show'])->name('admin.daftar-lanjutan.show');
    Route::get('daftar-lanjutan/{id}/edit', [DaftarLanjutanController::class, 'edit'])->name('admin.daftar-lanjutan.edit');
    Route::put('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'update'])->name('admin.daftar-lanjutan.update');
    Route::delete('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'destroy'])->name('admin.daftar-lanjutan.destroy');
    Route::get('daftar-lanjutan/export/csv', [DaftarLanjutanController::class, 'exportCsv'])->name('admin.daftar-lanjutan.export');

    // ================= VERIFIKASI =================
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('admin.verifikasi');
    Route::post('/verifikasi/{id}/setuju', [VerifikasiController::class, 'setuju'])->name('admin.verifikasi.setuju');
    Route::post('/verifikasi/{id}/tolak', [VerifikasiController::class, 'tolak'])->name('admin.verifikasi.tolak');
    Route::post('/verifikasi/{id}/update-pesan', [VerifikasiController::class, 'updatePesan'])->name('admin.verifikasi.updatePesan');

    // ================= PENGUMUMAN =================
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('admin.pengumuman.show');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

    // ================= BERITA =================
    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{berita}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
    Route::get('/berita/{berita}', [AdminBeritaController::class, 'show'])->name('admin.berita.show');
    Route::delete('/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // ================= KATEGORI =================
    Route::get('/kategori-berita', [KategoriController::class, 'index'])->name('admin.kategori-berita.index');
    Route::get('/kategori-berita/create', [KategoriController::class, 'create'])->name('admin.kategori-berita.create');
    Route::post('/kategori-berita', [KategoriController::class, 'store'])->name('admin.kategori-berita.store');
    Route::get('/kategori-berita/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori-berita.edit');
    Route::put('/kategori-berita/{id}', [KategoriController::class, 'update'])->name('admin.kategori-berita.update');
    Route::delete('/kategori-berita/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori-berita.destroy');

    // ================= GALERI FOTO =================
    Route::get('/galeri-foto', [GaleriFotoController::class, 'index'])->name('admin.galeri.foto.index');
    Route::post('/galeri-foto', [GaleriFotoController::class, 'store'])->name('admin.galeri.foto.store');
    Route::put('/galeri-foto/{foto}', [GaleriFotoController::class, 'update'])->name('admin.galeri.foto.update');
    Route::delete('/galeri-foto/{foto}', [GaleriFotoController::class, 'destroy'])->name('admin.galeri.foto.destroy');
    Route::post('/galeri-foto/{foto}/toggle', [GaleriFotoController::class, 'toggleAktif'])->name('admin.galeri.foto.toggle');

    // ================= GALERI VIDEO =================
    Route::get('/galeri-video', [GaleriVideoController::class, 'index'])->name('admin.galeri.video.index');
    Route::post('/galeri-video', [GaleriVideoController::class, 'store'])->name('admin.galeri.video.store');
    Route::put('/galeri-video/{video}', [GaleriVideoController::class, 'update'])->name('admin.galeri.video.update');
    Route::delete('/galeri-video/{video}', [GaleriVideoController::class, 'destroy'])->name('admin.galeri.video.destroy');
    Route::post('/galeri-video/{video}/toggle', [GaleriVideoController::class, 'toggleAktif'])->name('admin.galeri.video.toggle');

    // ================= PENGATURAN =================
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan');

    Route::put('/pengaturan/hero', [PengaturanController::class, 'updateHero'])->name('admin.pengaturan.hero');
    Route::put('/pengaturan/tentang', [PengaturanController::class, 'updateTentang'])->name('admin.pengaturan.tentang');

    Route::post('/pengaturan/jurusan', [PengaturanController::class, 'storeJurusan'])->name('admin.pengaturan.jurusan.store');
    Route::put('/pengaturan/jurusan/{id}', [PengaturanController::class, 'updateJurusan'])->name('admin.pengaturan.jurusan.update');
    Route::delete('/pengaturan/jurusan/{id}', [PengaturanController::class, 'destroyJurusan'])->name('admin.pengaturan.jurusan.destroy');

    Route::put('/admin/pengaturan/footer', [PengaturanController::class, 'updateFooter'])->name('admin.pengaturan.footer');
    Route::post('/footer-menu', [PengaturanController::class, 'storeFooterMenu'])->name('footer.menu.store');
    Route::put('/footer-menu/{id}', [PengaturanController::class, 'updateFooterMenu'])->name('footer.menu.update');
    Route::delete('/footer-menu/{id}', [PengaturanController::class, 'destroyFooterMenu'])->name('footer.menu.delete');

    Route::put('/admin/pengaturan/navbar', [PengaturanController::class, 'updateNavbar'])->name('admin.pengaturan.navbar');
});