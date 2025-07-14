<div>
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 p-6 rounded-t-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-white">Pengajuan Menunggu Persetujuan</h2>
    </div>

    <div class="bg-white shadow-lg rounded-b-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">NIK</th>
                        <th class="px-6 py-3">Alamat KTP</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($pengajuans as $pengajuan)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pengajuan->nama }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nik ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->alamat_ktp }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('kades.pengajuan.detail', $pengajuan->id) }}"
                                   class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12H9m12 0A9 9 0 1112 3a9 9 0 019 9z"/>
                                    </svg>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-6 py-4 text-gray-500">Tidak ada pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
