<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class NewsController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('news', compact('beritas'));
    }
        public function detail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('newsdetail', compact('berita'));
    }
}
