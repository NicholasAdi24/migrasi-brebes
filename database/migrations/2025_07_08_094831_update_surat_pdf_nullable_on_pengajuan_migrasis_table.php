<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSuratPdfNullableOnPengajuanMigrasisTable extends Migration
{
    public function up()
    {
        Schema::table('pengajuan_migrasis', function (Blueprint $table) {
            $table->string('surat_pdf')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pengajuan_migrasis', function (Blueprint $table) {
            $table->string('surat_pdf')->nullable(false)->change();
        });
    }
}

