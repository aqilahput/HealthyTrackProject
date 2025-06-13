<x-default-layout title="Tambah Kategori" section_title="Tambah Kategori Makanan Sehat Baru">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <form action="{{ route('categories.store') }}" method="POST"
            class="flex flex-col gap-6 px-8 py-6 bg-white border border-zinc-200 shadow-lg rounded-2xl col-span-2 transition-all duration-300">
            @csrf
            @method("POST")

            {{-- Nama Kategori --}}
            <div class="flex flex-col gap-1">
                <label for="name" class="text-sm font-medium text-green-800">Nama Kategori</label>
                <input type="text" id="name" name="name"
                    class="px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200"
                    placeholder="Masukkan nama kategori" value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi (opsional) --}}
            <div class="flex flex-col gap-1">
                <label for="description" class="text-sm font-medium text-green-800">Deskripsi (opsional)</label>
                <textarea id="description" name="description"
                    class="px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200 h-32 resize-none"
                    placeholder="Tulis deskripsi singkat...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('categories.index') }}"
                    class="px-4 py-2 text-sm font-semibold rounded-lg border border-green-400 text-green-700 bg-green-50 hover:bg-green-100 transition">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold rounded-lg border border-green-600 text-white bg-green-600 hover:bg-green-700 transition flex items-center gap-2">
                    <i class="ph ph-floppy-disk"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
