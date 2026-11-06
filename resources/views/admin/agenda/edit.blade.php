@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agenda Tahunan</h2>

    <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Bulan</label>
            <input type="text" name="bulan" class="form-control" value="{{ $agenda->bulan }}" required maxlength="10">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="text" name="tahun" class="form-control" value="{{ $agenda->tahun }}" required maxlength="4">
        </div>
        <div class="mb-3">
            <label class="form-label">Judul Agenda</label>
            <input type="text" name="judul" class="form-control" value="{{ $agenda->judul }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $agenda->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi (Opsional)</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $agenda->lokasi }}">
        </div>
        <button type="submit" class="btn btn-success">Perbarui Agenda</button>
        <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection