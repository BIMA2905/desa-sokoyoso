<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_tracking',
        'jenis_layanan',
        'nama',
        'nik',
        'no_hp',
        'alamat',
        'nama_usaha',
        'alamat_usaha',
        'jenis_usaha',
        'judul_pengaduan',
        'isi_pengaduan',
        'keperluan',
        'detail_data',
        'status',
    ];
}
