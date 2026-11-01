<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat Keterangan Usaha (SKU)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h4 class="card-title mb-0">Formulir Surat Keterangan Usaha (SKU)</h4>
                    </div>
                    <form action="{{ route('layanan.store') }}" method="POST">
    @csrf

    <!-- TAMBAHKAN ALERT DI SINI (DI DALAM FORM) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <hr>
            <a href="{{ route('layanan.cek-form') }}" class="alert-link">👉 Klik di sini untuk Cek Status Pengajuan Anda</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Input tersembunyi untuk jenis layanan -->
    <input type="hidden" name="jenis_layanan" value="usaha">

    <div class="mb-3">
        <label for="nama_pemilik" class="form-label">Nama Pemilik Usaha</label>
        <input type="text" class="form-control" id="nama_pemilik" name="nama" required>
    </div>

    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="number" class="form-control" id="nik" name="nik" required>
    </div>

    <div class="mb-3">
        <label for="nama_usaha" class="form-label">Nama Usaha / Toko</label>
        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" required>
    </div>

    <div class="mb-3">
        <label for="bidang_usaha" class="form-label">Bidang / Jenis Usaha</label>
        <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" required>
    </div>

     <!-- Tombol Kembali di sebelah kiri -->
                            <a href="/" class="btn btn-outline-secondary">Kembali</a>

                            <!-- Kelompok Tombol di sebelah kanan (tersusun ke bawah) -->
                            <div class="d-flex flex-column align-items-end gap-2">
                            <button type="submit" class="btn btn-success">Kirim Permohonan SKU</button>
                            <a href="{{ route('layanan.cek-form') }}" class="btn btn-outline-primary btn-sm">🔍 Cek Status Surat</a>
                        </div>
                    </div>
</form>
   
                </div>
            </div>
        </div>
    </div>
</body>
</html>