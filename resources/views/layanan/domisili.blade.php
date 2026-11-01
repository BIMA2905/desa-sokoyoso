<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Surat Domisili</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Formulir Surat Keterangan Domisili</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('layanan.store') }}" method="POST">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <hr>
                                 <a href="{{ route('layanan.cek-form') }}" class="alert-link">👉 Klik di sini untuk Cek Status Pengajuan Domisili Anda</a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <input type="hidden" name="jenis_layanan" value="domisili">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Sesuai KTP</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Saat Ini</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="keperluan" class="form-label">Keperluan Pembuatan Surat</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                            </div>

                            <div class="d-flex justify-content-between pt-3 align-items-center">
    <!-- Tombol Kembali di sebelah kiri -->
    <a href="/" class="btn btn-outline-secondary">Kembali</a>

    <!-- Kelompok Tombol di sebelah kanan (tersusun ke bawah) -->
    <div class="d-flex flex-column align-items-end gap-2">
        <button type="submit" class="btn btn-success">Kirim Permohonan Domisili</button>
        <a href="{{ route('layanan.cek-form') }}" class="btn btn-outline-primary btn-sm">🔍 Cek Status Surat</a>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>