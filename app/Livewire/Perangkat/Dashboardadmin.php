<?php

namespace App\Livewire\Perangkat;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.perangkat')]

class Dashboardadmin extends Component
{
    public function render()
    {
        return view('livewire.pages.perangkat.dashboardadmin');
    }
}
