<x-default-layout title="Tambah Makanan" section_title="Tambah Makanan Sehat Baru">
    <div class="grid grid-cols-3 gap-4">
        <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data"
            class="col-span-3 md:col-span-2 bg-white border border-gray-200 shadow-md rounded-xl px-8 py-6 space-y-5">
            @csrf
            @method("POST")

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-green-700 font-semibold mb-1">Nama</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Nama makanan" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div>
                <label for="category_id" class="block text-green-700 font-semibold mb-1">Kategori</label>
                <select id="category_id" name="category_id"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-green-700 font-semibold mb-1">Deskripsi</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 h-28 resize-none"
                    placeholder="Deskripsi makanan">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kalori, Lemak, Protein, Karbohidrat --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ([
                    ['calories', 'Kalori (kcal)', 'Jumlah kalori'],
                    ['fat', 'Lemak (g)', 'Jumlah lemak'],
                    ['protein', 'Protein (g)', 'Jumlah protein'],
                    ['carbohydrate', 'Karbohidrat (g)', 'Jumlah karbohidrat'],
                ] as [$id, $label, $placeholder])
                    <div>
                        <label for="{{ $id }}" class="block text-green-700 font-semibold mb-1">{{ $label }}</label>
                        <input type="number" step="0.01" id="{{ $id }}" name="{{ $id }}"
                            class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="{{ $placeholder }}" value="{{ old($id) }}">
                        @error($id)
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            {{-- Waktu Memasak --}}
            <div>
                <label for="cooking_time" class="block text-green-700 font-semibold mb-1">Waktu Memasak (menit)</label>
                <input type="number" id="cooking_time" name="cooking_time"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Waktu memasak dalam menit" value="{{ old('cooking_time') }}">
                @error('cooking_time')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bahan-bahan --}}
            <div>
                <label for="ingredients" class="block text-green-700 font-semibold mb-1">Bahan-bahan</label>
                <textarea id="ingredients" name="ingredients"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 h-28 resize-none"
                    placeholder="Daftar bahan-bahan">{{ old('ingredients') }}</textarea>
                @error('ingredients')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Langkah Memasak --}}
            <div>
                <label for="steps" class="block text-green-700 font-semibold mb-1">Langkah Memasak</label>
                <textarea id="steps" name="steps"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 h-28 resize-none"
                    placeholder="Langkah-langkah memasak">{{ old('steps') }}</textarea>
                @error('steps')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="block text-green-700 font-semibold mb-1">Gambar</label>
                <input type="file" id="image" name="image"
                    class="w-full px-4 py-2 border border-green-300 bg-green-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <small class="text-gray-500">Kosongkan jika tidak ingin menambahkan gambar.</small>
                @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('foods.index') }}"
                    class="px-4 py-2 text-green-700 border border-green-500 rounded-lg bg-green-100 hover:bg-green-200 transition">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition flex items-center gap-2">
                    <i class="ph ph-floppy-disk"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
