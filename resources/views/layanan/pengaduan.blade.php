<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengaduan Masyarakat</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Formulir Pengaduan Masyarakat</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('layanan.store') }}" method="POST">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <a href="{{ route('layanan.cek-form') }}" class="alert-link">👉 Klik di sini untuk Cek Status Pengaduan Anda</a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <input type="hidden" name="jenis_layanan" value="pengaduan">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelapor</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor WhatsApp / HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>

                            <div class="mb-3">
                                <label for="judul_pengaduan" class="form-label">Judul / Perihal Pengaduan</label>
                                <input type="text" class="form-control" id="judul_pengaduan" name="judul_pengaduan" required>
                            </div>

                            <div class="mb-3">
                                <label for="isi_pengaduan" class="form-label">Isi Pengaduan / Laporan</label>
                                <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="4" required></textarea>
                            </div>

                           <!-- Tombol Kembali di sebelah kiri -->
                            <a href="/" class="btn btn-outline-secondary">Kembali</a>

                            <!-- Kelompok Tombol di sebelah kanan (tersusun ke bawah) -->
                            <div class="d-flex flex-column align-items-end gap-2">
                            <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
                            <a href="{{ route('layanan.cek-form') }}" class="btn btn-outline-primary btn-sm">🔍 Cek Status Surat</a>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>