<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Manajemen Agenda Tahunan</title>
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
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-file-alt"></i> Layanan Surat
                    </a>
                    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-comments"></i> Pesan Warga
                    </a>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-newspaper"></i> Kelola Berita
                    </a>
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-sm btn-success fw-bold">
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

        <!-- Konten Utama Manajemen Agenda -->
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-calendar-alt text-success"></i> Manajemen Agenda Tahunan</h5>
                <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Agenda Baru
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Bulan & Tahun</th>
                                <th width="35%">Judul Agenda</th>
                                <th width="25%">Lokasi</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agendas as $index => $agenda)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $agenda->bulan_tahun ?? $agenda->tanggal }}</td>
                                <td>{{ $agenda->judul }}</td>
                                <td>{{ $agenda->lokasi }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada agenda tahunan yang ditambahkan.</td>
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