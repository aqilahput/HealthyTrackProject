<x-default-layout title="Daftar Makanan Sehat" section_title="Daftar Makanan Sehat">
    @if (session('success'))
        <div class="px-3 py-2 mb-4 rounded text-green-800 bg-green-100 border border-green-400">
            {{ session('success') }}
        </div>
    @endif

    @can('store-food')
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-green-600">Kelola data makanan sehat kamu di sini.</p>
        <a href="{{ route('foods.create') }}" 
           class="bg-green-100 text-green-800 px-4 py-2 rounded flex items-center gap-2 hover:bg-green-200 transition">
            <i class="ph ph-plus"></i> Tambah Makanan
        </a>
    </div>
    @endcan

    @if(auth()->user()->role == 'user')
    <form action="{{ route('histories.store') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="flex items-center gap-3 mb-4">
            <select name="history_type" id="history_type"
                class="appearance-none w-50 border border-green-300 bg-white text-green-800 text-sm px-3 py-1 pr-6 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-400 transition"
                required>
                <option value="" disabled selected> --Pilih Waktu Makan-- </option>
                <option value="sarapan">Sarapan</option>
                <option value="makan_siang">Makan Siang</option>
                <option value="makan_malam">Makan Malam</option>
            </select>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm">
                Simpan ke Riwayat
            </button>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($foods as $food)
        <div class="bg-white shadow rounded p-4 border border-green-200 relative transition hover:bg-green-50 hover:shadow-md">
            @if(auth()->user()->role == 'user')
                <div class="absolute top-2 left-2">
                    <input type="checkbox" name="selected_foods[]" value="{{ $food->id }}">
                </div>
            @endif
            <div class="flex justify-center mb-3">
                @if ($food->image)
                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-24 h-24 object-cover rounded">
                @else
                    <span class="text-green-400 italic">Tidak ada gambar</span>
                @endif
            </div>
            <h3 class="text-green-800 font-semibold text-center mb-2">{{ $food->name }}</h3>
            <ul class="text-sm text-green-700 space-y-1 mb-3">
                <li><strong>Kalori:</strong> {{ $food->calories }} kcal</li>
                <li><strong>Lemak:</strong> {{ number_format($food->fat, 2) }} g</li>
                <li><strong>Protein:</strong> {{ number_format($food->protein, 2) }} g</li>
                <li><strong>Karbo:</strong> {{ number_format($food->carbohydrate, 2) }} g</li>
                <li><strong>Waktu Masak:</strong> {{ $food->cooking_time }} menit</li>
            </ul>
            <div class="flex justify-center gap-2">
                <a href="{{ route('foods.show', $food->id) }}" title="Lihat" 
                   class="bg-green-100 text-green-800 px-2 py-1 rounded hover:bg-green-200 transition text-sm">
                    <i class="ph ph-eye"></i>
                </a>
                @can('edit-food')
                <a href="{{ route('foods.edit', $food->id) }}" title="Ubah" 
                   class="bg-green-200 text-green-900 px-2 py-1 rounded hover:bg-green-300 transition text-sm">
                    <i class="ph ph-note-pencil"></i>
                </a>
                @endcan
                @can('destroy-food')
                <form onsubmit="return confirm('Yakin ingin menghapus makanan ini?')" method="POST" action="{{ route('foods.destroy', $food->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Hapus" 
                            class="bg-green-100 text-red-700 px-2 py-1 rounded hover:bg-green-200 transition text-sm">
                        <i class="ph ph-trash-simple"></i>
                    </button>
                </form>
                @endcan
            </div>
        </div>
        @empty
            <div class="col-span-full text-center py-6 text-green-400 italic">Data makanan sehat belum ada.</div>
        @endforelse
    </div>

    @if(auth()->user()->role == 'user')
    </form>

    <script>
        function validateForm() {
            const historyType = document.getElementById('history_type').value;
            const checkedFoods = document.querySelectorAll('input[name="selected_foods[]"]:checked').length;
            if (!historyType) {
                alert('Silakan pilih waktu makan terlebih dahulu.');
                return false;
            }
            if (checkedFoods === 0) {
                alert('Silakan pilih minimal satu makanan.');
                return false;
            }
            return true;
        }
    </script>
    @endif
</x-default-layout>
