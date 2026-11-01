<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Surat Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <!-- Form Cari Riwayat -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-primary mb-3">📋 Riwayat Pengajuan Surat</h4>
                        <p class="text-muted small">Masukkan NIK Anda untuk melihat semua riwayat surat yang pernah diajukan.</p>
                        
                        <form action="{{ route('layanan.riwayat') }}" method="GET" class="row g-2">
                            <div class="col-8 col-sm-9">
                                <input type="number" name="nik" class="form-control" placeholder="Masukkan 16 Digit NIK..." value="{{ $nik ?? '' }}" required>
                            </div>
                            <div class="col-4 col-sm-3">
                                <button type="submit" class="btn btn-primary w-100">Cari Riwayat</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Hasil Riwayat -->
                @if(isset($pengajuans))
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Hasil Pencarian NIK: <span class="text-primary">{{ $nik }}</span></h5>
                            
                            @if($pengajuans->isEmpty())
                                <div class="alert alert-info text-center my-3 py-3">
                                    Belum ada riwayat pengajuan surat untuk NIK ini.
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Tracking</th>
                                                <th>Jenis Surat</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengajuans as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><strong>{{ $item->kode_tracking }}</strong></td>
                                                    <td>{{ strtoupper($item->jenis_layanan) }}</td>
                                                    <td><small>{{ $item->created_at->format('d/m/Y H:i') }}</small></td>
                                                    <td>
                                                        <span class="badge 
                                                            @if($item->status == 'Menunggu') bg-warning text-dark 
                                                            @elseif($item->status == 'Diproses') bg-info text-dark 
                                                            @elseif($item->status == 'Selesai') bg-success 
                                                            @else bg-danger @endif">
                                                            {{ $item->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($item->status == 'Selesai')
                                                            <a href="{{ route('layanan.cetak', $item->id) }}" target="_blank" class="btn btn-sm btn-success">🖨️ Cetak</a>
                                                        @else
                                                            <span class="text-muted small">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <a href="/" class="btn btn-outline-secondary w-100 mt-3">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</body>
</html>