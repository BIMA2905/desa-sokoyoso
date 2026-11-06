<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kepengurusan Desa - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { margin-bottom: 20px; color: #004d40; }
        .btn { display: inline-block; padding: 8px 15px; background: #004d40; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; }
        .btn-danger { background: #d9534f; border: none; cursor: pointer; }
        .btn-warning { background: #f0ad4e; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kelola Data Kepengurusan Desa</h2>
        <a href="{{ route('admin.pengurus.create') }}" class="btn"><i class="fa fa-plus"></i> Tambah Pengurus</a>
        
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penguruses as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($p->foto && file_exists(public_path($p->foto)))
                            <img src="{{ asset($p->foto) }}" alt="">
                        @else
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
                        @endif
                    </td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>
                        <a href="{{ route('admin.pengurus.edit', $p->id) }}" class="btn btn-warning btn-sm" style="padding: 5px 10px; font-size: 14px;">Edit</a>
                        <form action="{{ route('admin.pengurus.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 10px; font-size: 14px;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #777;">Belum ada data kepengurusan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        <a href="{{ route('home') }}" style="color: #004d40; text-decoration: none;"><i class="fa fa-arrow-left"></i> Kembali ke Beranda Website</a>
    </div>
</body>
</html>