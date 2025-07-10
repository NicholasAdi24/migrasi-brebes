<?php

namespace App\Livewire\Pages\Kades;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.kades')]

class Kades extends Component
{
    public function render()
    {
        return view('livewire.pages.kades.kades');
    }
}
