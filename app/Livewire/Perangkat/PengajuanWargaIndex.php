<?php

namespace App\Livewire\Perangkat;

use Livewire\Component;
use App\Models\PengajuanMigrasi;
use Livewire\Attributes\Layout;
#[Layout('layouts.perangkat')]

class PengajuanWargaIndex extends Component
{
    public $pengajuans;

    public function mount()
    {
        $this->pengajuans = PengajuanMigrasi::latest()->get();
    }

    public function render()
    {
        return view('livewire.pages.perangkat.pengajuan-warga-index');
    }
}
