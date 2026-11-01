<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
public function up(): void
{
    Schema::create('pengajuan_layanans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_tracking')->unique(); // Untuk cek status (misal: TRK-123456)
        $table->string('jenis_layanan'); // domisili / usaha / pengaduan
        $table->string('nama');
        $table->string('nik');
        $table->text('detail_data'); // Menyimpan data spesifik dalam bentuk JSON
        $table->enum('status', ['Menunggu', 'Diproses', 'Selesai', 'Ditolak'])->default('Menunggu');
        $table->text('catatan_admin')->nullable(); // Jika ditolak atau ada revisi
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_layanans');
    }
};
