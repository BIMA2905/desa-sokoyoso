@extends('layouts.app') {{-- Sesuaikan dengan layout admin berita kamu --}}

@section('content')
<div class="container">
    <h2>Manajemen Agenda Tahunan</h2>
    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary mb-3">Tambah Agenda Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan & Tahun</th>
                <th>Judul Agenda</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($agendas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->bulan }} {{ $item->tahun }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->lokasi ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.agenda.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.agenda.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data agenda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection