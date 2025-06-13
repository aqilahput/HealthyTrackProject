<x-default-layout title="Detail Kategori" section_title="Detail Kategori Makanan Sehat">
    <div class="px-6 py-4">
        <div class="bg-white border border-gray-300 shadow-lg rounded-xl p-6 space-y-6">

            {{-- Header: Nama Kategori --}}
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-green-700">{{ $category->name }}</h2>
            </div>

            {{-- Deskripsi --}}
            <div>
                <h3 class="font-semibold text-green-700 mb-1">Deskripsi</h3>
                <p class="text-gray-700 leading-relaxed">{!! nl2br(e($category->description)) !!}</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('categories.index') }}"
                   class="px-4 py-2 bg-gray-100 border border-gray-400 text-gray-700 hover:bg-gray-200 rounded-md">
                    Kembali
                </a>
                <a href="{{ route('categories.edit', $category->id) }}"
                   class="px-4 py-2 bg-green-600 text-white hover:bg-green-700 rounded-md flex items-center gap-2">
                    <i class="ph ph-pencil-simple"></i> Edit
                </a>
            </div>

        </div>
    </div>
</x-default-layout>
