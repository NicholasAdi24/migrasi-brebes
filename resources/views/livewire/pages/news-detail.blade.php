<div class="container py-10 max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
    @if ($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full mb-6 rounded">
    @endif
    <p class="text-gray-800 leading-relaxed">{{ $berita->isi }}</p>
</div>
