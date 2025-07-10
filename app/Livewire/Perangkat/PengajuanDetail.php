<?php

namespace App\Livewire\Perangkat;

use Livewire\Component;
use App\Models\PengajuanMigrasi;
use Livewire\Attributes\Layout;
#[Layout('layouts.perangkat')]

class PengajuanDetail extends Component
{
    public $pengajuanId;
    public $pengajuan;

    public function mount($pengajuanId)
    {
        $this->pengajuanId = $pengajuanId;
        $this->pengajuan = PengajuanMigrasi::findOrFail($pengajuanId);
    }

    public function updateStatus()
    {
        if ($this->pengajuan->status == 'menunggu pengecekan') {
            $this->pengajuan->status = 'menunggu persetujuan';
            $this->pengajuan->save();
            session()->flash('success', 'Status berhasil diubah.');
        }
    }

    public function render()
    {
        return view('livewire.pages.perangkat.pengajuan-detail');
    }
}
