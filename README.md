# Sistem Pengajuan Surat Migrasi - Desa Prapag Lor

Aplikasi berbasis Laravel + Livewire untuk memfasilitasi pengajuan surat rekomendasi migrasi luar negeri secara online bagi warga Desa Prapag Lor, Brebes.

## 🔧 Fitur Utama

- Autentikasi & Role-based access (Warga, Perangkat Desa, Kepala Desa)
- Formulir pengajuan migrasi lengkap dengan unggah dokumen
- Proses verifikasi & persetujuan pengajuan
- Generasi surat PDF setelah disetujui
- Manajemen berita dan informasi desa
- Dashboard masing-masing peran
- Desain responsif & interaktif

## 🚀 Cara Menjalankan Proyek Ini

```bash
# 1. Clone proyek ini
git clone https://github.com/NicholasAdi24/migrasi-brebes.git
cd migrasi-brebes

# 2. Install dependensi PHP
composer install

# 3. Install dependensi frontend
npm install

# 4. Copy dan konfigurasi environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Migrasi database
php artisan migrate

# 7. Buat symbolic link ke storage
php artisan storage:link

# 8. Jalankan server Laravel
php artisan serve



🧑‍💻 Login & Akses Role
Setelah menjalankan aplikasi, silakan:

Register akun untuk:

Warga (user biasa yang melakukan pengajuan)

Perangkat Desa (memverifikasi dan input manual)

Kepala Desa (menyetujui dan menghasilkan surat PDF)

Pastikan akun untuk masing-masing role telah dibuat agar semua fitur dapat digunakan sesuai perannya.

📦 Tech Stack
Laravel 10.x

Livewire v3

MySQL / MariaDB

Tailwind CSS & Vite

Alpine.js
