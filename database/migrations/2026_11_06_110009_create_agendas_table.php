<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('bulan'); // Contoh: JAN, FEB, dll.
            $table->string('tahun'); // Contoh: 2026
            $table->string('judul'); // Judul agenda
            $table->text('deskripsi'); // Isi/deskripsi agenda
            $table->string('lokasi')->nullable(); // Lokasi kegiatan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};