<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanLayanan; // Sesuaikan dengan nama file model di folder Models kamu
use App\Models\Pesan;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Pengurus;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = PengajuanLayanan::count();
        $layananMenunggu = PengajuanLayanan::where('status', 'Menunggu')->count();
        $totalPesan = Pesan::count();
        $totalBerita = Berita::count();
        $totalAgenda = Agenda::count();
        $totalPengurus = Pengurus::count();

        return view('admin.dashboard', compact(
            'totalLayanan', 
            'layananMenunggu', 
            'totalPesan', 
            'totalBerita', 
            'totalAgenda', 
            'totalPengurus'
        ));
    }
}