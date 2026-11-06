<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use Illuminate\Support\Facades\File;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::latest()->get();
        return view('admin.pengurus.index', compact('penguruses'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pengurus'), $filename);
            $fotoPath = 'images/pengurus/' . $filename;
        }

        Pengurus::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = $pengurus->foto;
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengurus->foto && file_exists(public_path($pengurus->foto))) {
                unlink(public_path($pengurus->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pengurus'), $filename);
            $fotoPath = 'images/pengurus/' . $filename;
        }

        $pengurus->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        if ($pengurus->foto && file_exists(public_path($pengurus->foto))) {
            unlink(public_path($pengurus->foto));
        }
        $pengurus->delete();

        return back()->with('success', 'Data pengurus berhasil dihapus!');
    }
}