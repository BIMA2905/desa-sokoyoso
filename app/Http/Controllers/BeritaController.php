<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // <-- Pastikan namespace ini ada

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
            $uploadedFileUrl = Cloudinary::upload($request->file('gambar')->getRealPath());
            $gambarUrl = $uploadedFileUrl->getSecureUrl();
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarUrl
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Menghapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }
}