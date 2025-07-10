<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Perangkat Desa</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Local CSS dan JS -->
    @vite(['resources/css/app.css', 'resources/css/warga.css', 'resources/js/app.js', 'resources/js/warga.js', 'resources/css/formulir.css', 'resources/js/modal.js'])

    @livewireStyles
</head>
<body>
    <aside class="sidebar">
        <!-- Sidebar header -->
        <header class="sidebar-header">
        <div class="logo-area">
            <a href="#" class="header-logo">
                <img src="/images/logo.png" alt="Logo">
            </a>
             <h5 class="admin-title text-white font-semibold text-sm sm:text-base">
                Admin Desa Prapag Lor  
            </h5>
            </div>
        <div class="btn-area">
            <button class="toggler sidebar-toggler">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button class="toggler menu-toggler">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </div>
        </header>

        <nav class="sidebar-nav">
            <ul class="nav-list primary-nav">
                <li class="nav-item">
                    <a href="{{ route('livewire.dashboardadmin') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">dashboard</span>
                        <span class="nav-label">Dashboard</span>
                    </a>
                    <span class="nav-tooltip">Dashboard</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('perangkat.pengajuan.index') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">description</span>
                        <span class="nav-label">Data Pengajuan</span>
                    </a>
                    <span class="nav-tooltip">Pengajuan</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('perangkat.input.manual') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">input</span>
                        <span class="nav-label">Input Manual</span>
                    </a>
                    <span class="nav-tooltip">Input Manual</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita.upload') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">newspaper</span>
                        <span class="nav-label">Kelola Berita</span>
                    </a>
                    <span class="nav-tooltip">Berita</span>
                </li>
            </ul>

            <ul class="nav-list secondary-nav">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link w-full text-left">
                            <span class="nav-icon material-symbols-rounded">logout</span>
                            <span class="nav-label">Logout</span>
                        </button>
                    </form>
                    <span class="nav-tooltip">Logout</span>
                </li>
            </ul>
        </nav>
    </aside>

      <!-- OVERLAY (ini penting!) -->
  <div class="sidebar-overlay"></div>

    <!-- Main Content -->
    <main style="margin-left: 270px; padding: 20px;">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
