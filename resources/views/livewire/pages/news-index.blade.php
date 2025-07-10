<div class="container mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Berita Desa Prapag Lor</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($beritas as $berita)
            <div class="bg-white rounded shadow p-4">
                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" class="mb-3 w-full h-48 object-cover rounded">
                @endif
                <h3 class="text-lg font-semibold text-gray-900">{{ $berita->judul }}</h3>
                <a href="{{ route('news.detail', $berita->id) }}" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
            </div>
        @endforeach
    </div>
</div>
