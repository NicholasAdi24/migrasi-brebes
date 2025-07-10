<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Daftar Pengajuan Warga</h2>

    @if($pengajuans->isEmpty())
        <p class="text-gray-600">Belum ada pengajuan dari warga.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Tanggal Pengajuan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Tempat Tujuan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">PDF</th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($pengajuans as $pengajuan)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pengajuan->updated_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pengajuan->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pengajuan->tempat_tujuan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $color = match($pengajuan->status) {
                                        'menunggu pengecekan' => 'bg-yellow-100 text-yellow-800',
                                        'menunggu persetujuan' => 'bg-blue-100 text-blue-800',
                                        'disetujui' => 'bg-green-100 text-green-800',
                                        default => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $color }}">
                                    {{ ucfirst($pengajuan->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('perangkat.pengajuan.detail', $pengajuan->id) }}" class="text-sm text-blue-600 hover:underline font-medium">
                                    Lihat Detail
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if($pengajuan->status == 'disetujui' && $pengajuan->surat_pdf)
                                <a href="{{ asset('storage/' . $pengajuan->surat_pdf) }}" target="_blank"
                                class="inline-block text-sm text-blue-600 hover:text-blue-800 underline">
                                    Unduh PDF
                                </a>
                            @else
                                <span class="text-gray-400 text-sm">-</span>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
