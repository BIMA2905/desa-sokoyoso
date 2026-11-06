<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController; // <--- Controller untuk Auth Login Admin

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama website
Route::get('/', [LayananController::class, 'index'])->name('home');

// Rute untuk mengirim pesan dari halaman utama
Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('pesan.store');

// Layanan Surat Domisili
Route::get('/layanan/surat-domisili', function () {
    return view('layanan.domisili');
})->name('layanan.domisili');

// Layanan Surat Usaha
Route::get('/layanan/surat-usaha', function () {
    return view('layanan.usaha');
})->name('layanan.usaha');

// Layanan Pengaduan Warga
Route::get('/layanan/pengaduan', function () {
    return view('layanan.pengaduan');
})->name('layanan.pengaduan');

Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/layanan/cetak/{id}', [LayananController::class, 'cetakSurat'])->name('layanan.cetak');

Route::post('/layanan/cek-status', [LayananController::class, 'cekStatus'])->name('layanan.cek-status');
Route::get('/layanan/cek-status', function () {
    return view('layanan.status');
})->name('layanan.cek-form');

Route::get('/layanan/riwayat', [LayananController::class, 'riwayat'])->name('layanan.riwayat');


/*
|--------------------------------------------------------------------------
| Autentikasi Admin (Login & Logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Panel Admin (Dilindungi Proteksi Auth/Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // 0. Dashboard Utama Admin (Halaman Pertama saat akses /admin)
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // 1. Pesan Warga
    Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan.index');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');

    // 2. Kelola Agenda (CRUD)
    Route::resource('agenda', AgendaController::class, ['names' => 'admin.agenda']);

    // 3. Layanan Desa
    Route::get('/layanan', [LayananController::class, 'adminIndex'])->name('admin.layanan.index');
    Route::put('/layanan/{id}/update', [LayananController::class, 'updateStatus'])->name('admin.layanan.update');

    // 4. Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/buat-baru', [BeritaController::class, 'create'])->name('admin.berita.create'); 
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // 5. Kelola Kepengurusan Desa (CRUD Lengkap)
    Route::resource('pengurus', PengurusController::class, ['names' => 'admin.pengurus']);
});