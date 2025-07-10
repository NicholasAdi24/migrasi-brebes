<?php

namespace App\Livewire\Pages;

use App\Models\Berita;
use Livewire\Component;
// use Livewire\Attributes\Layout;
// #[Layout('layouts.kades')]

class NewsDetail extends Component
{
    public $berita;

    public function mount($id)
    {
        $this->berita = Berita::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.news-detail');
    }
}
