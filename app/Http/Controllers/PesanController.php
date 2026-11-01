<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'pesan' => 'required',
    ]);

    Pesan::create($request->all());

    return back()->with('success', 'Pesan Anda berhasil dikirim!');
}

    public function index()
    {
        $pesans = Pesan::latest()->get();

        return view('admin.pesan', compact('pesans'));
    }
}