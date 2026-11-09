<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // Menampilkan daftar berita di admin
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    // Menampilkan form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Menyimpan berita baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarUrl = null;
        if ($request->hasFile('gambar')) {
            // Upload otomatis ke Cloudinary ke folder 'desa-sokoyoso/berita'
            $uploadedFileUrl = $request->file('gambar')->storeOnCloudinary('desa-sokoyoso/berita');
            
            // Ambil URL aman (HTTPS) dari Cloudinary
            $gambarUrl = $uploadedFileUrl->getSecureUrl();
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarUrl // Menyimpan URL Cloudinary ke database
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Menghapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Karena gambar sekarang disimpan di Cloudinary (berupa URL), 
        // pengecekan file_exists lokal dihapus agar tidak error.
        // Jika ingin menghapus dari Cloudinary juga bisa ditambahkan nanti, 
        // tapi untuk sekarang cukup hapus data dari database.
        
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }
}