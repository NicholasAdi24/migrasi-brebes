<?php

namespace App\Livewire\Pages\Kades;


use Livewire\Component;
use App\Models\PengajuanMigrasi;
use Livewire\Attributes\Layout;
#[Layout('layouts.kades')]

class PengajuanIndex extends Component
{
    public $pengajuans;

    public function mount()
    {
        $this->pengajuans = PengajuanMigrasi::where('status', 'menunggu persetujuan')->with('user')->get();
    }

    public function render()
    {
        return view('livewire.pages.kades.pengajuan-index');
    }
}
