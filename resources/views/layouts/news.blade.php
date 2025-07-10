<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Berita Desa')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    {{-- Header --}}
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-800">Desa Prapag Lor</h1>
        </div>
    </header>

    {{-- Konten --}}
    <main class="py-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white mt-12 shadow">
        <div class="container mx-auto px-4 py-6 text-center text-gray-500">
            &copy; {{ date('Y') }} Desa Prapag Lor. All rights reserved.
        </div>
    </footer>
</body>
</html>
