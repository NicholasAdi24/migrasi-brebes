<?php

namespace App\Livewire\Pages\Warga;

use App\Models\PengajuanMigrasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;

#[Layout('layouts.warga')]
class PengajuanSurat extends Component
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
    public $kerabat, $relasi,$nama_relasi, $tempat_lahir_relasi, $tanggal_lahir_relasi, $nik_relasi, $alamat_relasi;


    public $negaraList = [];
    public $kotaList = [];
    public $tempat_tujuan_manual = '';
    


    protected $listeners = ['negaraUpdated' => 'getKotaList'];


    public function mount()
    {
        $this->getNegaraList();
    }
    public function updatedNegaraTujuan($value)
    {
        logger("✅ Negara dipilih: $value");
        $this->tempat_tujuan = '';
        $this->getKotaList($value);
    }

        public function getNegaraList()
        {
            $response = Http::get('https://restcountries.com/v3.1/all?fields=name,cca2');

            if ($response->successful()) {
                $this->negaraList = collect($response->json())
                    ->mapWithKeys(function ($country) {
                        return [$country['cca2'] => $country['name']['common']];
                    })
                    ->sort()
                    ->toArray();
            }
        }



public function getKotaList($countryCode)
{
    logger("📄 Ambil kota dari file lokal untuk: $countryCode");

    $path = resource_path('data/kota-negara.json'); // ✅ FIXED di sini

    if (!file_exists($path)) {
        logger()->error('❌ File JSON tidak ditemukan.');
        $this->kotaList = [];
        return;
    }

    $json = file_get_contents($path);
    $data = collect(json_decode($json, true)); // ubah ke array associative

    $filtered = $data->where('iso2', $countryCode)->pluck('city')->unique()->sort()->values();
    $this->kotaList = $filtered->toArray();

    logger("✅ Kota ditemukan dari file lokal: " . count($this->kotaList));
}

public function getKotaListManual()
{
    if (!$this->negara_tujuan) {
        $this->addError('negara_tujuan', 'Silakan pilih negara terlebih dahulu.');
        return;
    }

    $this->getKotaList($this->negara_tujuan); // gunakan method yang sudah ada
}








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
    $negaraNama = $this->negaraList[$this->negara_tujuan] ?? $this->negara_tujuan;


    PengajuanMigrasi::create([
        'user_id' => auth()->id(),
        'nama' => $this->nama,
        'nik' => $this->nik,
        'tempat_lahir' => $this->tempat_lahir,
        'tanggal_lahir' => $this->tanggal_lahir,
        'alamat_ktp' => $this->alamat_ktp,
        'foto_diri' => $fotoPath,
        'negara_tujuan' => $negaraNama,
        'tempat_tujuan' => $this->tempat_tujuan ?: $this->tempat_tujuan_manual,
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

    if (!$this->tempat_tujuan && !$this->tempat_tujuan_manual) {
    $this->addError('tempat_tujuan', 'Pilih salah satu kota atau ketik kota secara manual.');
    }

    if ($this->tempat_tujuan && $this->tempat_tujuan_manual) {
        $this->addError('tempat_tujuan', 'Hanya boleh memilih salah satu: dropdown atau input manual.');
    }

    $this->dispatch('form-success'); // ✅ BENAR untuk Livewire v3.6.3

    session()->flash('success', 'Pengajuan berhasil dikirim.');
    $this->reset();
}




    public function render()
    {

        return view('livewire.pages.warga.pengajuan-surat');
    }
}
