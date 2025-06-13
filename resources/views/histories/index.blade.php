<x-default-layout title="Riwayat Makanan" section_title="Riwayat Makanan">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 transition">
            {{ session('success') }}
        </div>
    @endif

    {{-- Jika tidak ada riwayat --}}
    @if($histories->isEmpty())
        <p class="text-green-600 italic text-center py-6">Belum ada riwayat makanan yang disimpan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded text-green-900 text-sm">
                <thead>
                    <tr class="border-b border-green-300 font-semibold text-green-800">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Makanan</th>
                        <th class="py-3 px-6 text-center">Jenis Riwayat</th>
                        <th class="py-3 px-6 text-center">Kalori (kcal)</th>
                        <th class="py-3 px-6 text-center">Lemak (g)</th>
                        <th class="py-3 px-6 text-center">Protein (g)</th>
                        <th class="py-3 px-6 text-center">Karbohidrat (g)</th>
                        <th class="py-3 px-6 text-center">Waktu Simpan</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $index => $history)
                        <tr class="border-b border-green-200 hover:bg-green-50 transition">
                            <td class="py-3 px-6">{{ $index + 1 }}</td>
                            <td class="py-3 px-6">{{ $history->food->name ?? '-' }}</td>
                            <td class="py-3 px-6 text-center">{{ ucfirst(str_replace('_', ' ', $history->history_type)) }}</td>
                            <td class="py-3 px-6 text-center">{{ $history->food->calories ?? '-' }}</td>
                            <td class="py-3 px-6 text-center">{{ isset($history->food->fat) ? number_format($history->food->fat, 2) : '-' }}</td>
                            <td class="py-3 px-6 text-center">{{ isset($history->food->protein) ? number_format($history->food->protein, 2) : '-' }}</td>
                            <td class="py-3 px-6 text-center">{{ isset($history->food->carbohydrate) ? number_format($history->food->carbohydrate, 2) : '-' }}</td>
                            <td class="py-3 px-6 text-center">{{ $history->created_at->format('d M Y H:i') }}</td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('histories.destroy', $history->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus"
                                            class="text-red-600 hover:text-red-800 transition hover:scale-110 duration-150 ease-in-out">
                                        <i class="ph ph-trash-simple text-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</x-default-layout>
