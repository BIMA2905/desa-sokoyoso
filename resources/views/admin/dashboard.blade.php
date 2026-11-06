<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Desa Sokoyoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-admin { background: #004d40; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 12px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); transition: transform 0.2s; }
        .card:hover { transform: translateY(-3px); }
        .stat-card { border-left: 5px solid #004d40; }
    </style>
</head>
<body>

    <!-- Navbar Header Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
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
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-success fw-bold">
                        <i class="fa fa-gauge"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm btn-outline-secondary">
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

        <!-- Selamat Datang Section -->
        <div class="alert alert-success shadow-sm border-0 mb-4 p-4 text-white" style="background: linear-gradient(135deg, #004d40, #00796b);">
            <h3 class="fw-bold"><i class="fa fa-hand-wave"></i> Selamat Datang di Panel Admin Desa Sokoyoso!</h3>
            <p class="mb-0">Kelola data kependudukan, surat pengajuan warga, berita, agenda, dan informasi desa dengan lebih mudah dan cepat.</p>
        </div>

        <!-- Cards Statistik -->
        <div class="row g-4">
            <!-- Layanan Surat -->
            <div class="col-md-4">
                <div class="card stat-card p-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small fw-semibold">TOTAL PENGAJUAN SURAT</span>
                            <h2 class="fw-bold mt-1 mb-0 text-dark">{{ $totalLayanan }}</h2>
                            <small class="text-warning fw-bold"><i class="fa fa-clock"></i> {{ $layananMenunggu }} Menunggu</small>
                        </div>
                        <div class="fs-1 text-success opacity-50">
                            <i class="fa fa-file-alt"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm btn-outline-success w-100">Kelola Layanan <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Pesan Warga -->
            <div class="col-md-4">
                <div class="card stat-card p-3 bg-white" style="border-left-color: #0288d1;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small fw-semibold">PESAN MASUK WARGA</span>
                            <h2 class="fw-bold mt-1 mb-0 text-dark">{{ $totalPesan }}</h2>
                            <small class="text-muted">Aspirasi & Pertanyaan</small>
                        </div>
                        <div class="fs-1 text-info opacity-50">
                            <i class="fa fa-comments"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-outline-info w-100 text-dark">Kelola Pesan <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Kelola Berita -->
            <div class="col-md-4">
                <div class="card stat-card p-3 bg-white" style="border-left-color: #f57c00;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small fw-semibold">TOTAL BERITA DESA</span>
                            <h2 class="fw-bold mt-1 mb-0 text-dark">{{ $totalBerita }}</h2>
                            <small class="text-muted">Informasi & Kegiatan</small>
                        </div>
                        <div class="fs-1 text-warning opacity-50">
                            <i class="fa fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-warning w-100 text-dark">Kelola Berita <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Agenda Tahunan -->
            <div class="col-md-6">
                <div class="card stat-card p-3 bg-white" style="border-left-color: #7b1fa2;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small fw-semibold">AGENDA TAHUNAN</span>
                            <h2 class="fw-bold mt-1 mb-0 text-dark">{{ $totalAgenda }}</h2>
                            <small class="text-muted">Jadwal Kegiatan Desa</small>
                        </div>
                        <div class="fs-1 text-purple opacity-50">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.agenda.index') }}" class="btn btn-sm btn-outline-secondary w-100">Kelola Agenda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Kelola Pengurus -->
            <div class="col-md-6">
                <div class="card stat-card p-3 bg-white" style="border-left-color: #c2185b;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small fw-semibold">STRUKTUR KEPENGURUSAN</span>
                            <h2 class="fw-bold mt-1 mb-0 text-dark">{{ $totalPengurus }}</h2>
                            <small class="text-muted">Perangkat Desa Aktif</small>
                        </div>
                        <div class="fs-1 text-danger opacity-50">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.pengurus.index') }}" class="btn btn-sm btn-outline-secondary w-100">Kelola Pengurus <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>