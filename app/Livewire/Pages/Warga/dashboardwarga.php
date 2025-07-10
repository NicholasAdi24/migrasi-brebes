<?php

namespace App\Livewire\Pages\Warga;

use App\Models\PengajuanMigrasi;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.warga')]
class Dashboardwarga extends Component
{
    public function render()
    {
        return view('livewire.pages.warga.warga'); // atau layout dashboard warga
    }
}
