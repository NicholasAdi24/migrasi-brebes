<div class="p-6 bg-white rounded-xl shadow-lg ring-1 ring-gray-200">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-4 flex items-center gap-2">
        <span class="material-symbols-rounded text-blue-500">info</span>
        Detail Pengajuan Migrasi
    </h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 text-sm md:text-base">
        <!-- Kolom Kiri -->
        <div class="space-y-3 text-gray-700">
            <div><strong>Nama:</strong> {{ $pengajuan->nama }}</div>
            <div><strong>NIK:</strong> {{ $pengajuan->nik }}</div>
            <div><strong>Jenis Kelamin:</strong> {{ ucfirst($pengajuan->jenis_kelamin) }}</div>
            <div><strong>Tempat, Tanggal Lahir:</strong> {{ $pengajuan->tempat_lahir }}, {{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir)->format('d-m-Y') }}</div>
            <div><strong>Alamat KTP:</strong> {{ $pengajuan->alamat_ktp }}</div>
            <div><strong>Status Perkawinan:</strong> {{ ucfirst($pengajuan->status_perkawinan) }}</div>
            <div><strong>Status PMI:</strong> {{ $pengajuan->status_pmi }}</div>
            <div><strong>Tujuan ke Luar Negeri:</strong> {{ $pengajuan->tujuan_keluar_negeri }}</div>
            <div><strong>Negara Tujuan:</strong> {{ $pengajuan->negara_tujuan }}</div>
            <div><strong>Tempat Tujuan:</strong> {{ $pengajuan->tempat_tujuan }}</div>
            <div><strong>Nama Perusahaan:</strong> {{ $pengajuan->nama_perusahaan }}</div>

            @if ($pengajuan->status_pmi === 'Purna PMI')
                <div><strong>Pengalaman Kerja:</strong> {{ $pengajuan->pengalaman_kerja }}</div>
                <div><strong>Pengelolaan Upah:</strong> {{ $pengajuan->pengelolaan_upah }}</div>
                <div><strong>Keinginan Kembali:</strong> {{ $pengajuan->keinginan_kembali }}</div>
            @endif
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-6">
            <div>
                <p class="font-medium text-gray-700 mb-1">Foto Diri:</p>
                <img src="{{ asset('storage/' . $pengajuan->foto_diri) }}" alt="Foto Diri"
                    class="w-44 h-44 rounded-lg object-cover shadow border" />
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-1">Surat Penawaran Kerja:</p>
                <a href="{{ asset('storage/' . $pengajuan->surat_penawaran_kerja) }}" target="_blank"
                   class="text-blue-600 hover:underline text-sm">Lihat Surat Penawaran</a>
            </div>

            <div>
                <p class="font-medium text-gray-700 mb-1">Status Pengajuan:</p>
                @php
                    $color = match($pengajuan->status) {
                        'menunggu pengecekan' => 'bg-yellow-100 text-yellow-800',
                        'menunggu persetujuan' => 'bg-blue-100 text-blue-800',
                        'disetujui' => 'bg-green-100 text-green-800',
                        default => 'bg-gray-100 text-gray-800',
                    };
                @endphp
                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full {{ $color }}">
                    {{ ucfirst($pengajuan->status) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Relasi Keluarga -->
    <div class="mt-10 bg-gray-50 border-t pt-6 rounded-md">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Relasi Keluarga</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm md:text-base text-gray-700">
            <div><strong>Kerabat:</strong> {{ $pengajuan->kerabat }}</div>
            <div><strong>Relasi:</strong> {{ $pengajuan->relasi }}</div>
            <div><strong>Nama Relasi:</strong> {{ $pengajuan->nama_relasi }}</div>
            <div><strong>Tempat Lahir Relasi:</strong> {{ $pengajuan->tempat_lahir_relasi }}</div>
            <div><strong>Tanggal Lahir Relasi:</strong> {{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir_relasi)->format('d-m-Y') }}</div>
            <div><strong>NIK Relasi:</strong> {{ $pengajuan->nik_relasi }}</div>
            <div><strong>Alamat Relasi:</strong> {{ $pengajuan->alamat_relasi }}</div>
        </div>
    </div>

        <button wire:click="setujuiPengajuan"
                class="mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Setujui Pengajuan
        </button>

        @if (session()->has('success'))
            <div class="mt-2 text-green-600">{{ session('success') }}</div>
        @endif
    </div>
</div>
