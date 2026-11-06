<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Desa Sokoyoso</title>
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

    <!-- Navbar / Header Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.layanan.index') }}">
                <i class="fa fa-gauge"></i> Admin Desa Sokoyoso
            </a>
            <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" class="btn btn-light btn-sm text-dark fw-semibold" target="_blank">
                <i class="fa fa-globe"></i> Lihat Website Utama
            </a>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm fw-semibold">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
        </div>
    </nav>

    <div class="container mb-5">
        <!-- Tab Navigasi Menu Admin (Konsisten di semua halaman admin) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body p-2">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm {{ request()->routeIs('admin.layanan.*') ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                        <i class="fa fa-file-alt"></i> Layanan Surat
                    </a>
                    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm {{ request()->routeIs('admin.pesan.*') ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                        <i class="fa fa-comments"></i> Pesan Warga
                    </a>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm {{ request()->routeIs('admin.berita.*') ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                        <i class="fa fa-newspaper"></i> Kelola Berita
                    </a>
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-sm {{ request()->routeIs('admin.agenda.*') ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                        <i class="fa fa-calendar-alt"></i> Kelola Agenda
                    </a>
                    <a href="{{ route('admin.pengurus.index') }}" class="btn btn-sm {{ request()->routeIs('admin.pengurus.*') ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                        <i class="fa fa-users"></i> Kelola Pengurus
                    </a>
                </div>
            </div>
        </div>

        <!-- Notifikasi Sukses / Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa fa-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Konten Halaman Admin -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>