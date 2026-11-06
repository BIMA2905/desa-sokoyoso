<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengurus - Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #004d40; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="file"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 10px 15px; background: #004d40; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; padding: 10px 15px; color: white; border-radius: 4px; margin-left: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Pengurus Desa</h2>
        
        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap & Gelar</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Contoh: Herlambang Fitnanto SE.">
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Kepala Desa">
            </div>

            <div class="form-group">
                <label>Foto Profil (Opsional)</label>
                <input type="file" name="foto" accept="image/jpeg,image/png,image/jpg">
            </div>

            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('admin.pengurus.index') }}" class="btn-back">Batal</a>
        </form>
    </div>
</body>
</html>