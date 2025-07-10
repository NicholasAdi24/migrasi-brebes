<div class="p-6 bg-white shadow rounded space-y-6">
    @if (session()->has('success'))
        <div class="text-green-600 font-semibold">{{ session('success') }}</div>
    @endif

    {{-- Form Berita --}}
    <form wire:submit.prevent="save" class="space-y-4">
        <h2 class="text-xl font-bold">{{ $editing ? 'Edit Berita' : 'Tambah Berita' }}</h2>

        <div>
            <label>Judul</label>
            <input type="text" wire:model.defer="judul" class="w-full p-2 border rounded">
            @error('judul') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Isi</label>
            <textarea wire:model.defer="isi" class="w-full p-2 border rounded" rows="5"></textarea>
            @error('isi') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Gambar {{ $editing ? '(Biarkan kosong jika tidak diganti)' : '' }}</label>
            <input type="file" wire:model="gambar" class="block mt-1">
            @error('gambar') <span class="text-red-600">{{ $message }}</span> @enderror

            @if ($gambar)
                <p class="text-sm text-gray-500 mt-2">Preview Gambar Baru:</p>
                <img src="{{ $gambar->temporaryUrl() }}" class="w-32 rounded shadow">
            @elseif ($editing && $gambarLama)
                <p class="text-sm text-gray-500 mt-2">Gambar Lama:</p>
                <img src="{{ asset('storage/' . $gambarLama) }}" class="w-32 rounded shadow">
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $editing ? 'Perbarui' : 'Simpan' }}
            </button>
            @if ($editing)
                <button type="button" wire:click="resetForm" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
            @endif
        </div>
    </form>

    {{-- Daftar Berita --}}
    <div>
        <h3 class="text-lg font-semibold mt-6 mb-2">Daftar Berita</h3>

        @forelse ($beritas as $item)
            <div class="border p-4 mb-4 rounded shadow-sm bg-gray-50">
                <h4 class="text-xl font-bold">{{ $item->judul }}</h4>
                <p class="text-gray-600 text-sm mb-2">{{ \Illuminate\Support\Str::limit($item->isi, 100) }}</p>
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar" class="w-32 h-32 object-cover rounded mb-2">
                @endif
                <div class="space-x-2 mt-2">
                    <button wire:click="edit({{ $item->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $item->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada berita.</p>
        @endforelse
    </div>
</div>
