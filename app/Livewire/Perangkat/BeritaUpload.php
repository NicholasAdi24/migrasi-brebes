<?php

namespace App\Livewire\Perangkat;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.perangkat')]
class BeritaUpload extends Component
{
    use WithFileUploads;

    public $judul, $isi, $gambar, $gambarLama;
    public $berita_id = null;
    public $editing = false;

    public function save()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => $this->editing ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $path = $this->gambar ? $this->gambar->store('berita', 'public') : $this->gambarLama;

        if ($this->editing && $this->berita_id) {
            $berita = Berita::find($this->berita_id);
            if ($berita->gambar && $this->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $berita->update([
                'judul' => $this->judul,
                'isi' => $this->isi,
                'gambar' => $path,
            ]);
            session()->flash('success', 'Berita berhasil diperbarui.');
        } else {
            Berita::create([
                'judul' => $this->judul,
                'isi' => $this->isi,
                'gambar' => $path,
            ]);
            session()->flash('success', 'Berita berhasil ditambahkan.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $this->judul = $berita->judul;
        $this->isi = $berita->isi;
        $this->gambarLama = $berita->gambar;
        $this->berita_id = $berita->id;
        $this->editing = true;
    }

    public function delete($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        session()->flash('success', 'Berita berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['judul', 'isi', 'gambar', 'berita_id', 'gambarLama', 'editing']);
    }

    public function render()
    {
        $beritas = Berita::latest()->get();
        return view('livewire.pages.perangkat.berita-upload', compact('beritas'));
    }
}
