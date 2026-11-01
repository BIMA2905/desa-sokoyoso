
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama website
Route::get('/', [LayananController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    // 1. Pesan Warga
    Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan.index');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');

    // 3. Kelola Agenda (CRUD)
    Route::resource('agenda', AgendaController::class, ['names' => 'admin.agenda']);
});
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

// Route untuk menampilkan halaman form cek status (opsional jika dibuatkan halaman khusus)
// Atau route untuk memproses pencarian kode tracking
Route::post('/layanan/cek-status', [LayananController::class, 'cekStatus'])->name('layanan.cek-status');
Route::get('/layanan/cek-status', function () {
    return view('layanan.status');
})->name('layanan.cek-form');

// Route Panel Admin Layanan Desa
Route::get('/admin/layanan', [LayananController::class, 'adminIndex'])->name('admin.layanan.index');
Route::put('/admin/layanan/{id}/update', [LayananController::class, 'updateStatus'])->name('admin.layanan.update');

Route::get('/layanan/riwayat', [LayananController::class, 'riwayat'])->name('layanan.riwayat');

// Rute untuk mengirim pesan dari halaman utama
Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('pesan.store');


Route::prefix('admin')->group(function () {
    // Rute Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/buat-baru', [BeritaController::class, 'create'])->name('admin.berita.create'); 
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});