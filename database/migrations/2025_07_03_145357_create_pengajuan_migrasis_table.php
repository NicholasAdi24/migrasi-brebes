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
        Schema::create('pengajuan_migrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_ktp');
            $table->string('foto_diri');
            $table->string('negara_tujuan');
            $table->string('tempat_tujuan');
            $table->string('nama_perusahaan');
            $table->string('surat_penawaran_kerja');
            $table->enum('status', ['menunggu pengecekan', 'menunggu persetujuan', 'disetujui', 'ditolak'])->default('menunggu pengecekan');
            $table->string('surat_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_migrasis');
    }
};
