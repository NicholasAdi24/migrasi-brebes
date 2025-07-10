<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Riwayat Pengajuan Migrasi</h2>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Negara Tujuan</th>
                <th class="border px-4 py-2">Tempat Tujuan</th>
                <th class="border px-4 py-2">Perusahaan</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Aksi</th>
                <th class="border px-4 py-2">Cancel</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengajuans as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->negara_tujuan }}</td>
                    <td class="border px-4 py-2">{{ $item->tempat_tujuan }}</td>
                    <td class="border px-4 py-2">{{ $item->nama_perusahaan }}</td>
                    <td class="border px-4 py-2">
                        <span class="
                            px-2 py-1 rounded text-sm
                            @if($item->status == 'menunggu pengecekan') bg-yellow-200 text-yellow-800
                            @elseif($item->status == 'menunggu persetujuan') bg-orange-200 text-orange-800
                            @elseif($item->status == 'disetujui') bg-green-200 text-green-800
                            @elseif($item->status == 'ditolak') bg-red-200 text-red-800
                            @endif
                        ">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="border px-4 py-2 text-center">
                        @if($item->status == 'disetujui' && $item->surat_pdf)
                            <a href="{{ asset('storage/' . $item->surat_pdf) }}" target="_blank"
                               class="inline-block text-sm text-blue-600 hover:text-blue-800 underline">
                                Unduh PDF
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-center">
                        @if($item->status == 'disetujui' && $item->surat_pdf)
                            <a href="{{ asset('storage/' . $item->surat_pdf) }}" target="_blank"
                            class="inline-block text-sm text-blue-600 hover:text-blue-800 underline">
                                Unduh PDF
                            </a>
                        @elseif($item->status == 'menunggu pengecekan')
                            <button wire:click="batalkan({{ $item->id }})"
                                    class="text-sm text-red-600 hover:text-red-800 underline"
                                    onclick="return confirm('Yakin ingin membatalkan pengajuan ini?')">
                                Batalkan
                            </button>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>


                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada pengajuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
