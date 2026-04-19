<?php

use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
// ================= IMPORT =================
use App\Http\Controllers\Admin\DaftarLanjutanController; // USER
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController; // ADMIN
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
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
Route::get('/', fn () => view('landing'));
Route::get('/tentang', fn () => view('tentang'))->name('tentang');

// ================= USER =================

// 🔥 PENTING: pakai parameter {berita} biar tidak bentrok
Route::get('/berita/{berita}', [BeritaController::class, 'show'])
    ->whereNumber('berita') // 🔥 biar /create tidak ketangkep
    ->name('berita.detail');

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

    // ================= DAFTAR LANJUTAN =================
    Route::get('daftar-lanjutan', [DaftarLanjutanController::class, 'index'])->name('admin.daftar-lanjutan.index');
    Route::get('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'show'])->name('admin.daftar-lanjutan.show');
    Route::get('daftar-lanjutan/{id}/edit', [DaftarLanjutanController::class, 'edit'])->name('admin.daftar-lanjutan.edit');
    Route::put('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'update'])->name('admin.daftar-lanjutan.update');
    Route::delete('daftar-lanjutan/{id}', [DaftarLanjutanController::class, 'destroy'])->name('admin.daftar-lanjutan.destroy');

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

    // ================= BERITA (ADMIN) =================
    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{berita}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
    Route::get('/berita/{berita}', [AdminBeritaController::class, 'show'])->name('admin.berita.show');
    Route::delete('/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // ================= KATEGORI =================
    Route::get('/kategori-berita', [KategoriController::class, 'index'])
        ->name('admin.kategori-berita.index');

    Route::get('/kategori-berita/create', [KategoriController::class, 'create'])
        ->name('admin.kategori-berita.create');

    Route::post('/kategori-berita', [KategoriController::class, 'store'])
        ->name('admin.kategori-berita.store');

    Route::get('/kategori-berita/{id}/edit', [KategoriController::class, 'edit'])
        ->name('admin.kategori-berita.edit');

    Route::put('/kategori-berita/{id}', [KategoriController::class, 'update'])
        ->name('admin.kategori-berita.update');

    Route::delete('/kategori-berita/{id}', [KategoriController::class, 'destroy'])
        ->name('admin.kategori-berita.destroy');

    // ================= PENGATURAN =================
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan');

});
