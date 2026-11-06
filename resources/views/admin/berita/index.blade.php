@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Panel Admin - Kelola Berita Desa</h2>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Kembali ke Layanan</a>
        </div>

        <!-- Menu Navigasi Tab Admin -->
        <div class="mb-4">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-primary">📋 Layanan Surat</a>
                <a href="{{ route('admin.pesan.index') }}" class="btn btn-outline-primary">💬 Pesan Warga</a>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-primary active">📰 Kelola Berita</a>
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
                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita Baru</a>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th> <!-- Tambahan Kolom Foto -->
                                <th>Judul Berita</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Berita" style="width: 70px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted small">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $item->judul }}</strong></td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                       </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada berita yang diunggah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection