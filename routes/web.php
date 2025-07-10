<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Perangkat\InputPengajuanManual;
use App\Livewire\Perangkat\PengajuanWargaIndex;
use App\Livewire\Perangkat\PengajuanDetail;
use App\Livewire\Perangkat\Dashboardadmin;
use App\Livewire\Pages\Kades\PengajuanIndex;
use App\Livewire\Pages\Kades\PengajuanDetails;
use App\Livewire\Pages\Kades\Kades;
use App\Livewire\Pages\Warga\Dashboardwarga;
use App\Livewire\Pages\Warga\PengajuanSurat;
use App\Livewire\Pages\Warga\RiwayatPengajuan;
use App\Livewire\Pages\Admin\BeritaForm;
use App\Livewire\Pages\NewsIndex;
use App\Livewire\Pages\NewsDetail;
use App\Http\Controllers\NewsController;




Route::view('/', 'welcome');
Route::get('/berita', [NewsController::class, 'index']);
Route::get('/berita/{id}', [NewsController::class, 'detail'])->name('beritadetail');

Route::get('/news', NewsIndex::class)->name('news.index');
Route::get('/news/{id}', NewsDetail::class)->name('news.detail');

Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/dashboard/warga', Dashboardwarga::class)->name('livewire.warga');
    Route::get('/pengajuan', PengajuanSurat::class)->name('warga.pengajuan');
    Route::get('/riwayat', RiwayatPengajuan::class)->name('warga.riwayat');
});

Route::middleware(['auth', 'role:perangkat_desa'])->group(function () {
    Route::get('/dashboard/perangkat-desa', Dashboardadmin::class)->name('livewire.dashboardadmin');
    Route::get('/perangkat/pengajuan', PengajuanWargaIndex::class)->name('perangkat.pengajuan.index');
    Route::get('/perangkat/pengajuan/{pengajuanId}', PengajuanDetail::class)->name('perangkat.pengajuan.detail');
    Route::get('/perangkat/input', InputPengajuanManual::class)->name('perangkat.input.manual');
     Route::get('/perangkat/berita-upload', \App\Livewire\Perangkat\BeritaUpload::class)->name('berita.upload');

});

Route::middleware(['auth', 'role:kepala_desa'])->group(function () {
    Route::get('/dashboard/kepala-desa', Kades::class)->name('livewire.kades');
    Route::get('/dashboard/kades/pengajuan', PengajuanIndex::class)->name('kades.pengajuan.index');
    Route::get('/dashboard/kades/pengajuan/{pengajuanId}', PengajuanDetails::class)->name('kades.pengajuan.detail');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
require __DIR__.'/auth.php';
