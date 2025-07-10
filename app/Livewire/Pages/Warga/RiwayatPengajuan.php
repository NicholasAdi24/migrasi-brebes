<?php

namespace App\Livewire\Pages\Warga;

use App\Models\PengajuanMigrasi;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.warga')]
class RiwayatPengajuan extends Component
{
    public $pengajuans;

    public function mount()
    {
        $this->loadPengajuans();
    }

        public function loadPengajuans()
    {
        $this->pengajuans = PengajuanMigrasi::where('user_id', auth()->id())->latest()->get();
    }

public function batalkan($id)
{
    $pengajuan = PengajuanMigrasi::where('id', $id)
        ->where('user_id', auth()->id())
        ->first();

    if (!$pengajuan) {
        session()->flash('error', 'Data tidak ditemukan.');
        return;
    }

    if ($pengajuan->status !== 'menunggu pengecekan') {
        session()->flash('error', 'Hanya pengajuan dengan status "menunggu pengecekan" yang bisa dibatalkan.');
        return;
    }

    // Jika ada file yang perlu dihapus, tambahkan di sini (misal foto/surat)
    if ($pengajuan->foto_diri) {
        \Storage::disk('public')->delete($pengajuan->foto_diri);
    }
    if ($pengajuan->surat_penawaran_kerja) {
        \Storage::disk('public')->delete($pengajuan->surat_penawaran_kerja);
    }

    $pengajuan->delete();

    session()->flash('success', 'Pengajuan berhasil dibatalkan.');
    $this->pengajuans = PengajuanMigrasi::where('user_id', auth()->id())->latest()->get(); // refresh data
}


    public function render()
    {
        return view('livewire.pages.warga.riwayat-pengajuan'); // atau layout dashboard warga
    }
}
