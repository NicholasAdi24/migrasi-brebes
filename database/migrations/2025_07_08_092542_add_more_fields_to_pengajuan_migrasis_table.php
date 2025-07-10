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
        $table->string('nik')->after('user_id');
        $table->enum('jenis_kelamin', ['pria', 'wanita'])->after('nik');
        $table->enum('status_pmi', ['Calon PMI', 'PMI', 'Purna PMI'])->after('jenis_kelamin');
        $table->enum('status_perkawinan', ['kawin', 'belum kawin'])->after('status_pmi');
        $table->string('tujuan_keluar_negeri')->nullable()->after('status_perkawinan');

        // Pertanyaan untuk Purna PMI
        $table->text('pengalaman_kerja')->nullable()->after('tujuan_keluar_negeri');
        $table->text('pengelolaan_upah')->nullable()->after('pengalaman_kerja');
        $table->string('keinginan_kembali')->nullable()->after('pengelolaan_upah');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_migrasis', function (Blueprint $table) {
            //
        });
    }
};
