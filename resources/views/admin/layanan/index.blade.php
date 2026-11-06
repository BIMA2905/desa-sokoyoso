<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Kelola Layanan Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-admin { background: #004d40; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 10px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
        .table th { background-color: #004d40; color: white; vertical-align: middle; }
        .table td { vertical-align: middle; }
    </style>
</head>
<body>

    <!-- Navbar Header Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.layanan.index') }}">
                <i class="fa fa-gauge"></i> Admin Desa Sokoyoso
            </a>
            <div class="d-flex">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm text-dark fw-semibold" target="_blank">
                    <i class="fa fa-globe"></i> Lihat Website Utama
                </a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <!-- Tab Navigasi Menu Admin -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body p-2">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm btn-success fw-bold">
                        <i class="fa fa-file-alt"></i> Layanan Surat
                    </a>
                    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-comments"></i> Pesan Warga
                    </a>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-newspaper"></i> Kelola Berita
                    </a>
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-calendar-alt"></i> Kelola Agenda
                    </a>
                    <a href="{{ route('admin.pengurus.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-users"></i> Kelola Pengurus
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Konten Utama Layanan Surat -->
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-file-alt text-success"></i> Kelola Pengajuan Layanan Surat</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>