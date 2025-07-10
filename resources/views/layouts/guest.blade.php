<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite([
        'resources/css/app.css',
        'resources/css/warga.css',
        'resources/js/app.js',
        'resources/js/warga.js',
        'resources/css/formulir.css',
        'resources/js/modal.js'
    ])
</head>
<body class="font-sans antialiased bg-[#151A2D] text-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-lg text-gray-800">

        {{-- Logo & Judul --}}
        <div class="text-center mb-6">
            <img src="/images/logo.png" alt="Logo" class="mx-auto w-16 h-16 object-contain mb-2" />
            <h1 class="text-xl font-bold leading-tight">Sistem Pengajuan Surat Migran</h1>
            <p class="text-sm text-gray-600">Desa Prapag Lor</p>
        </div>

        {{-- Slot Form --}}
        {{ $slot }}

    </div>
</body>
</html>
