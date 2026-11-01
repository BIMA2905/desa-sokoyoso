<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Kelola Layanan Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
        <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Panel Admin Desa Sokoyoso</h2>
            <a href="/" class="btn btn-outline-secondary">Kembali ke Beranda</a>
        </div>

        <!-- MENU NAVIGASI ADMIN (Tab Bar) -->
        <div class="mb-4">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-primary active">📋 Layanan Surat</a>
                <a href="{{ route('admin.pesan.index') }}" class="btn btn-outline-primary">💬 Pesan Warga</a>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-primary">📰 Kelola Berita</a>
                <a href="{{ route('admin.agenda.index') }}" class="btn btn-outline-primary">📅 Kelola Agenda</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Tracking</th>
                                <th>Jenis Layanan</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal</th>
                                <th>Status Saat Ini</th>
                                <th>Aksi / Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengajuans as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $item->kode_tracking }}</strong></td>
                                    <td>{{ strtoupper($item->jenis_layanan) }}</td>
                                    <td>{{ $item->nama }}<br><small class="text-muted">NIK: {{ $item->nik }}</small></td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
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
                                        <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST" class="d-flex gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" style="width: 130px;">
                                                <option value="Menunggu" {{ $item->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada pengajuan layanan masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>