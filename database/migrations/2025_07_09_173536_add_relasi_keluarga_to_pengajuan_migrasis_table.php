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
    Schema::table('pengajuan_migrasis', function (Blueprint $table) {
        $table->string('kerabat')->nullable();
        $table->string('nama_relasi')->nullable();
        $table->string('relasi')->nullable();
        $table->string('tempat_lahir_relasi')->nullable();
        $table->date('tanggal_lahir_relasi')->nullable();
        $table->string('nik_relasi', 16)->nullable();
        $table->text('alamat_relasi')->nullable();
    });
}

public function down(): void
{
    Schema::table('pengajuan_migrasis', function (Blueprint $table) {
        $table->dropColumn([
            'kerabat', 'relasi', 'nama_relasi','tempat_lahir_relasi', 
            'tanggal_lahir_relasi', 'nik_relasi', 'alamat_relasi'
        ]);
    });
}

};
