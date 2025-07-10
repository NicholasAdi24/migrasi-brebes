<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Perangkat Desa</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">

    <!-- Local CSS dan JS -->
    @vite(['resources/css/app.css', 'resources/css/warga.css', 'resources/js/app.js', 'resources/js/warga.js'])

    @livewireStyles
</head>

<aside class="sidebar">
        <!-- Sidebar header -->
        <header class="sidebar-header">
        <div class="logo-area">
            <a href="#" class="header-logo">
                <img src="/images/logo.png" alt="Logo">
            </a>
             <h5 class="admin-title text-white font-semibold text-sm sm:text-base">
                Pengajuan Izin Migrasi  
            </h5>
            <h5>
                
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
                    <a href="{{ url('/dashboard/warga') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">dashboard</span>
                        <span class="nav-label">Dashboard</span>
                    </a>
                    <span class="nav-tooltip">Dashboard</span>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pengajuan') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">description</span>
                        <span class="nav-label">Pengajuan Surat</span>
                    </a>
                    <span class="nav-tooltip">Pengajuan Surat</span>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/riwayat') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">history</span>
                        <span class="nav-label">Riwayat Pengajuan</span>
                    </a>
                    <span class="nav-tooltip">Riwayat</span>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/profile') }}" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">account_circle</span>
                        <span class="nav-label">Profil</span>
                    </a>
                    <span class="nav-tooltip">Profil</span>
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
    </main>

     @livewireScripts
</body>
</html>

