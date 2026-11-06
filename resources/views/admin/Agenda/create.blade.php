@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Agenda Tahunan</h2>

    <form action="{{ route('admin.agenda.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Bulan (Contoh: JAN, FEB, dll)</label>
            <input type="text" name="bulan" class="form-control" required maxlength="10">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun (Contoh: 2026)</label>
            <input type="text" name="tahun" class="form-control" required maxlength="4">
        </div>
        <div class="mb-3">
            <label class="form-label">Judul Agenda</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi (Opsional)</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan Agenda</button>
        <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection