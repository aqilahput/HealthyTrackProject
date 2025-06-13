<x-default-layout title="Edit Kategori" section_title="Edit Kategori Makanan Sehat">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <form action="{{ route('categories.update', $category->id) }}"
              method="POST"
              class="col-span-1 md:col-span-2 bg-white rounded-2xl shadow-lg border border-green-300 p-8 flex flex-col gap-6">
            @csrf
            @method('PUT')

            {{-- Nama Kategori --}}
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-semibold text-green-700">Nama Kategori</label>
                <input type="text" id="name" name="name"
                       class="rounded-lg border border-green-400 bg-green-50 px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all"
                       placeholder="Masukkan nama kategori"
                       value="{{ old('name', $category->name) }}">
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-semibold text-green-700">Deskripsi</label>
                <textarea id="description" name="description"
                          class="rounded-lg border border-green-400 bg-green-50 px-4 py-2 h-32 resize-none shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all"
                          placeholder="Tulis deskripsi singkat...">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4 pt-4">
                {{-- Batal --}}
                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center px-4 py-2 rounded-lg border border-green-300 bg-green-100 text-green-700 hover:bg-green-200 transition">
                    Batal
                </a>

                {{-- Simpan --}}
                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-green-500 bg-green-300 text-green-800 font-medium hover:bg-green-400 transition">
                    <i class="ph ph-floppy-disk text-green-700 text-lg"></i>
                    <span>Perbarui</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
