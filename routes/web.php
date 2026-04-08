<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AuthController;
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

// ================= USER =================
Route::get('/', function () {
    return view('landing');
});

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/galeri/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
Route::get('/galeri/video', [GaleriController::class, 'video'])->name('galeri.video');

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// ================= ADMIN (PAKAI MIDDLEWARE) =================
Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/data-pendaftar', [DataPendaftarController::class, 'index'])->name('admin.data-pendaftar');
    Route::get('/data-pendaftar/create', [DataPendaftarController::class, 'create'])->name('admin.data-pendaftar.create');
    Route::post('/data-pendaftar', [DataPendaftarController::class, 'store'])->name('admin.data-pendaftar.store');
    Route::get('/data-pendaftar/{id}/edit', [DataPendaftarController::class, 'edit'])->name('admin.data-pendaftar.edit');
    Route::put('/data-pendaftar/{id}', [DataPendaftarController::class, 'update'])->name('admin.data-pendaftar.update');
    Route::delete('/data-pendaftar/{id}', [DataPendaftarController::class, 'destroy'])->name('admin.data-pendaftar.destroy');

    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('admin.verifikasi');
    Route::post('/verifikasi/{id}/setuju', [VerifikasiController::class, 'setuju'])->name('admin.verifikasi.setuju');
    Route::post('/verifikasi/{id}/tolak', [VerifikasiController::class, 'tolak'])->name('admin.verifikasi.tolak');
    Route::post('/verifikasi/{id}/update-pesan', [VerifikasiController::class, 'updatePesan'])->name('admin.verifikasi.updatePesan');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::get('/admin/pengumuman/{id}', [PengumumanController::class, 'show'])->name('admin.pengumuman.show');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan');

});
