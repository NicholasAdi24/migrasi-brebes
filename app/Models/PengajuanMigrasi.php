<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMigrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
            'jenis_kelamin',
            'status_pmi',
            'status_perkawinan',
            'tujuan_keluar_negeri',
            'pengalaman_kerja',
            'pengelolaan_upah',
            'keinginan_kembali',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_ktp',
            'foto_diri',
            'negara_tujuan',
            'tempat_tujuan',
            'nama_perusahaan',
            'surat_penawaran_kerja',
            'status',
            'surat_pdf',

                    // 👉 Tambahan untuk relasi keluarga:
        'kerabat',
        'nama_relasi',
        'relasi',
        'tempat_lahir_relasi',
        'tanggal_lahir_relasi',
        'nik_relasi',
        'alamat_relasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
