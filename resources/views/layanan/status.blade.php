<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Cek Status Pengajuan Warga</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('layanan.cek-status') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_tracking" class="form-label">Masukkan Kode Tracking</label>
                                <input type="text" class="form-control" id="kode_tracking" name="kode_tracking" placeholder="Contoh: TRK-6AE18B104C817" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cek Status Sekarang</button>
                        </form>
                    </div>
                </div>

                <!-- Hasil Pencarian -->
                @if(isset($pengajuan))
                    <div class="card shadow-sm border-0 border-top border-primary border-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-success mb-3">Detail Pengajuan Ditemukan</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kode Tracking</th>
                                    <td>: <strong>{{ $pengajuan->kode_tracking }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Jenis Layanan</th>
                                    <td>: {{ strtoupper($pengajuan->jenis_layanan) }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pemohon</th>
                                    <td>: {{ $pengajuan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>: {{ $pengajuan->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Status Surat</th>
                                    <td>: 
                                        <span class="badge 
                                            @if($pengajuan->status == 'Menunggu') bg-warning text-dark 
                                            @elseif($pengajuan->status == 'Diproses') bg-info text-dark 
                                            @elseif($pengajuan->status == 'Selesai') bg-success 
                                            @else bg-danger @endif">
                                            {{ $pengajuan->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <td>: {{ $pengajuan->created_at->format('d M Y, H:i') }} WIB</td>
                                </tr>
                            </table>

                            <!-- Tombol Cetak / Download Surat (Langkah 3) -->
                            @if($pengajuan->status == 'Selesai')
                                <a href="{{ route('layanan.cetak', $pengajuan->id) }}" target="_blank" class="btn btn-success w-100 mt-2">🖨️ Cetak / Download Surat (PDF)</a>
                            @else
                                <div class="alert alert-warning text-center mt-2 mb-0 py-2">
                                    <small>Surat belum dapat dicetak karena status masih <strong>{{ $pengajuan->status }}</strong>.</small>
                                </div>
                            @endif

                            <a href="/" class="btn btn-outline-secondary w-100 mt-2">Kembali ke Beranda</a>
                        </div>
                    </div>
                    
                            <a href="/" class="btn btn-outline-secondary w-100 mt-2">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>