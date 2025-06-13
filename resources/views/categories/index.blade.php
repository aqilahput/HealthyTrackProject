<x-default-layout title="Kategori Makanan Sehat" section_title="Kategori Makanan Sehat">
    @if (session('success'))
        <div class="px-3 py-2 mb-4 rounded text-green-800 bg-green-100 border border-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-green-600">Kelola kategori resep kamu di sini supaya mudah ditemukan.</p>
        <a href="{{ route('categories.create') }}" 
           class="bg-green-100 text-green-800 px-4 py-2 rounded flex items-center gap-2 hover:bg-green-200 transition">
            <i class="ph ph-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($categories as $category)
            <div class="bg-white shadow border border-green-200 rounded p-4 transition hover:bg-green-50 hover:shadow-md">
                <h3 class="text-green-800 font-semibold text-lg mb-2">{{ $category->name }}</h3>
                <p class="text-sm text-green-700 mb-3">
                    {{ $category->description ?? '-' }}
                </p>
                <div class="flex justify-start gap-2">
                    <a href="{{ route('categories.show', $category->id) }}" title="Lihat"
                       class="bg-green-100 text-green-800 px-2 py-1 rounded hover:bg-green-200 text-sm transition">
                        <i class="ph ph-eye"></i>
                    </a>
                    <a href="{{ route('categories.edit', $category->id) }}" title="Ubah"
                       class="bg-green-200 text-green-900 px-2 py-1 rounded hover:bg-green-300 text-sm transition">
                        <i class="ph ph-note-pencil"></i>
                    </a>
                    <form onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" method="POST" action="{{ route('categories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus" 
                                class="bg-green-100 text-red-700 px-2 py-1 rounded hover:bg-green-200 text-sm transition">
                            <i class="ph ph-trash-simple"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-6 text-green-400 italic">
                Data kategori belum ada.
            </div>
        @endforelse
    </div>
</x-default-layout>
