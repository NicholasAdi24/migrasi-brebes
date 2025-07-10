<?php

namespace App\Livewire\Perangkat;

use Livewire\Component;
use App\Models\PengajuanMigrasi;
use App\Models\User;
use Livewire\WithFileUploads;

use Livewire\Attributes\Layout;
#[Layout('layouts.perangkat')]

class InputPengajuanManual extends Component

{
    use WithFileUploads;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat_ktp;
    public $foto_diri;
    public $negara_tujuan;
    public $tempat_tujuan;
    public $nama_perusahaan;
    public $surat_penawaran_kerja;
    public $nik, $jenis_kelamin, $status_pmi, $status_perkawinan;
    public $tujuan_keluar_negeri;
    public $pengalaman_kerja, $pengelolaan_upah, $keinginan_kembali;
    public $kerabat, $relasi, $nama_relasi, $tempat_lahir_relasi, $tanggal_lahir_relasi, $nik_relasi, $alamat_relasi;


public function submit()
{
    $this->validate([
        'nama' => 'required|string|max:255',
        'nik' => 'required|digits:16',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'alamat_ktp' => 'required|string|max:500',
        'foto_diri' => 'required|image|max:2048',
        'negara_tujuan' => 'required|string|max:100',
        'tempat_tujuan' => 'required|string|max:255',
        'nama_perusahaan' => 'required|string|max:255',
        'surat_penawaran_kerja' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'jenis_kelamin' => 'required|in:pria,wanita',
        'status_pmi' => 'required|in:Calon PMI,PMI,Purna PMI',
        'status_perkawinan' => 'required|in:kawin,belum kawin',
        'kerabat' => 'nullable|string|max:100',
        'relasi' => 'nullable|string|max:100',
        'nama_relasi' => 'required|string|max:255',
        'tempat_lahir_relasi' => 'nullable|string|max:255',
        'tanggal_lahir_relasi' => 'nullable|date',
        'nik_relasi' => 'nullable|digits:16',
        'alamat_relasi' => 'nullable|string|max:500',

    ]);

    $fotoPath = $this->foto_diri->store('foto_diri', 'public');
    $suratPath = $this->surat_penawaran_kerja->store('surat_penawaran', 'public');

    PengajuanMigrasi::create([
        'user_id' => auth()->id(),
        'nama' => $this->nama,
        'nik' => $this->nik,
        'tempat_lahir' => $this->tempat_lahir,
        'tanggal_lahir' => $this->tanggal_lahir,
        'alamat_ktp' => $this->alamat_ktp,
        'foto_diri' => $fotoPath,
        'negara_tujuan' => $this->negara_tujuan,
        'tempat_tujuan' => $this->tempat_tujuan,
        'nama_perusahaan' => $this->nama_perusahaan,
        'surat_penawaran_kerja' => $suratPath,
        'jenis_kelamin' => $this->jenis_kelamin,
        'status_pmi' => $this->status_pmi,
        'status_perkawinan' => $this->status_perkawinan,
        'tujuan_keluar_negeri' => $this->tujuan_keluar_negeri,
        'pengalaman_kerja' => $this->pengalaman_kerja,
        'pengelolaan_upah' => $this->pengelolaan_upah,
        'keinginan_kembali' => $this->keinginan_kembali,
        'kerabat' => $this->kerabat,
        'relasi' => $this->relasi,
        'nama_relasi' => $this->nama_relasi,
        'tempat_lahir_relasi' => $this->tempat_lahir_relasi,
        'tanggal_lahir_relasi' => $this->tanggal_lahir_relasi,
        'nik_relasi' => $this->nik_relasi,
        'alamat_relasi' => $this->alamat_relasi,

        'status' => 'menunggu pengecekan',
    ]);
    $this->dispatch('form-success'); // ✅ BENAR untuk Livewire v3.6.3

    session()->flash('success', 'Pengajuan berhasil dikirim.');
    $this->reset();
}


    public function render()
    {
        return view('livewire.pages.perangkat.input-pengajuan-manual');
    }
}

