<x-default-layout title="Detail Makanan" section_title="Detail Makanan Sehat">
    <div class="px-6 py-4">
        <div class="bg-white border border-gray-300 shadow-lg rounded-xl p-6 space-y-6">

            {{-- Header: Nama & Kategori --}}
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                <h2 class="text-2xl font-bold text-green-700">{{ $food->name }}</h2>
                <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">
                    {{ $food->category->name ?? '-' }}
                </span>
            </div>

            {{-- Gambar --}}
            @if ($food->image)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $food->image) }}"
                         alt="{{ $food->name }}"
                         class="w-80 h-80 object-cover rounded-lg shadow">
                </div>
            @endif

            {{-- Deskripsi --}}
            <div>
                <h3 class="font-semibold text-green-700 mb-1">Deskripsi</h3>
                <p class="text-gray-700 leading-relaxed">{!! nl2br(e($food->description)) !!}</p>
            </div>

            {{-- Nutrisi & Info Masak --}}
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-green-50 border border-green-200 p-4 rounded">
                    <p class="text-sm text-green-700">Kalori</p>
                    <p class="text-lg font-semibold">{{ $food->calories }} kcal</p>
                </div>
                <div class="bg-green-50 border border-green-200 p-4 rounded">
                    <p class="text-sm text-green-700">Lemak</p>
                    <p class="text-lg font-semibold">{{ number_format($food->fat, 2) }} g</p>
                </div>
                <div class="bg-green-50 border border-green-200 p-4 rounded">
                    <p class="text-sm text-green-700">Protein</p>
                    <p class="text-lg font-semibold">{{ number_format($food->protein, 2) }} g</p>
                </div>
                <div class="bg-green-50 border border-green-200 p-4 rounded">
                    <p class="text-sm text-green-700">Karbohidrat</p>
                    <p class="text-lg font-semibold">{{ number_format($food->carbohydrate, 2) }} g</p>
                </div>
                <div class="bg-green-50 border border-green-200 p-4 rounded">
                    <p class="text-sm text-green-700">Waktu Memasak</p>
                    <p class="text-lg font-semibold">{{ $food->cooking_time }} menit</p>
                </div>
            </div>

            {{-- Bahan & Langkah --}}
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold text-green-700 mb-2">Bahan-bahan</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        @foreach(explode("\n", trim($food->ingredients)) as $ingredient)
                            @if(trim($ingredient))
                                <li>{{ trim($ingredient) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-green-700 mb-2">Langkah Memasak</h3>
                    <ol class="list-decimal list-inside text-gray-700 space-y-1">
                        @foreach(explode("\n", trim($food->steps)) as $step)
                            @if(trim($step))
                                <li>{{ trim($step) }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('foods.index') }}"
                   class="px-4 py-2 bg-gray-100 border border-gray-400 text-gray-700 hover:bg-gray-200 rounded-md">
                    Kembali
                </a>
                <a href="{{ route('foods.edit', $food->id) }}"
                   class="px-4 py-2 bg-green-600 text-white hover:bg-green-700 rounded-md flex items-center gap-2">
                    <i class="ph ph-pencil-simple"></i> Edit
                </a>
            </div>
        </div>
    </div>
</x-default-layout>
