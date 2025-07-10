<?php

namespace App\Livewire\Pages;

use App\Models\Berita;
use Livewire\Component;

class NewsIndex extends Component
{
    public function render()
    {
        return view('news', [  // <-- ini diarahkan ke resources/views/news.blade.php
            'beritas' => Berita::latest()->get(),
        ]);
    }
}
