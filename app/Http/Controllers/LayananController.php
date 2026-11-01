<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\PengajuanLayanan;
use PDF; // Jika nanti ingin pakai DomPDF untuk cetak PDF, atau bisa pakai window.print() bawaan browser

class LayananController extends Controller
{
    // Menyimpan data pengajuan dari form
    public function store(Request $request)
    {
        // Validasi data umum
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'jenis_layanan' => 'required|string',
        ]);

        // Buat kode tracking unik
        $kodeTracking = 'TRK-' . strtoupper(uniqid());

        // Simpan data ke database
        PengajuanLayanan::create([
            'kode_tracking' => $kodeTracking,
            'jenis_layanan' => $request->jenis_layanan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'detail_data' => json_encode($request->except(['_token', 'nama', 'nik', 'jenis_layanan'])),
            'status' => 'Menunggu',
        ]);

        // Redirect kembali ke form dengan membawa Notifikasi Sukses dan Kode Tracking
        return back()->with('success', 'Pengajuan berhasil dikirim! Simpan Kode Tracking Anda: ' . $kodeTracking);
    }

    // Fitur Cek Status Pengajuan oleh Warga
   // Fitur Cek Status Pengajuan oleh Warga
public function cekStatus(Request $request)
{
    $request->validate([
        'kode_tracking' => 'required|string',
    ]);

    $pengajuan = PengajuanLayanan::where('kode_tracking', $request->kode_tracking)->first();

    if (!$pengajuan) {
        return back()->with('error', 'Kode tracking tidak ditemukan!');
    }

    return view('layanan.status', compact('pengajuan'));
}

    // Fitur Cetak Surat (jika status sudah selesai)
    public function cetakSurat($id)
    {
        $pengajuan = PengajuanLayanan::findOrFail($id);
        
        // Pastikan hanya bisa dicetak jika status sudah Selesai
        if ($pengajuan->status != 'Selesai') {
            return back()->with('error', 'Surat belum disetujui / belum selesai diproses.');
        }

        return view('layanan.cetak', compact('pengajuan'));
    }
    // Menampilkan Daftar Pengajuan di Panel Admin
    public function adminIndex()
    {
        $pengajuans = PengajuanLayanan::latest()->get();
        return view('admin.layanan.index', compact('pengajuans'));
    }

    // Mengubah Status Surat (Setujui / Selesai / Tolak)
    public function updateStatus(Request $request, $id)
    {
        $pengajuan = PengajuanLayanan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak'
        ]);

        $pengajuan->status = $request->status;
        $pengajuan->save();

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }


// Menampilkan halaman cari & hasil riwayat berdasarkan NIK
    public function riwayat(Request $request)
    {
        $pengajuans = null;
        $nik = $request->input('nik');

        if ($nik) {
            $pengajuans = PengajuanLayanan::where('nik', $nik)->latest()->get();
        }

        return view('layanan.riwayat', compact('pengajuans', 'nik'));
    }
    public function index()
{
    $beritas = Berita::latest()->get(); // Mengambil data berita terbaru dari database
    return view('welcome', compact('beritas')); // Kirim variabel $beritas ke view
}
}