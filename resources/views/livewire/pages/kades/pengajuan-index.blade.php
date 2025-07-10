<div>
    <h2 class="text-xl font-bold mb-4">Pengajuan Menunggu Persetujuan</h2>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full text-left table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIK</th>
                    <th class="px-4 py-3">Alamat KTP</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuans as $pengajuan)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $pengajuan->nama }}</td>
                        <td class="px-4 py-2">{{ $pengajuan->nik ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $pengajuan->alamat_ktp }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('kades.pengajuan.detail', $pengajuan->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                               Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
