<x-default-layout title="Edit Makanan" section_title="Edit Makanan Sehat">
    <div class="grid grid-cols-3 gap-6">
        <form action="{{ route('foods.update', $food->id) }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="col-span-3 md:col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-green-300">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-2 gap-6">
                {{-- Nama --}}
                <div>
                    <label for="name" class="block font-semibold text-green-700 mb-1">Nama</label>
                    <input type="text" id="name" name="name"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Nama makanan"
                           value="{{ old('name', $food->name) }}">
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="category_id" class="block font-semibold text-green-700 mb-1">Kategori</label>
                    <select id="category_id" name="category_id"
                            class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id', $food->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="sm:col-span-2">
                    <label for="description" class="block font-semibold text-green-700 mb-1">Deskripsi</label>
                    <textarea id="description" name="description"
                              class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400 h-28 resize-none"
                              placeholder="Deskripsi singkat makanan">{{ old('description', $food->description) }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kalori --}}
                <div>
                    <label for="calories" class="block font-semibold text-green-700 mb-1">Kalori (kcal)</label>
                    <input type="number" id="calories" name="calories" step="any"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Kalori"
                           value="{{ old('calories', $food->calories) }}">
                    @error('calories')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Lemak --}}
                <div>
                    <label for="fat" class="block font-semibold text-green-700 mb-1">Lemak (g)</label>
                    <input type="number" id="fat" name="fat" step="0.01"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Lemak"
                           value="{{ old('fat', $food->fat) }}">
                    @error('fat')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Protein --}}
                <div>
                    <label for="protein" class="block font-semibold text-green-700 mb-1">Protein (g)</label>
                    <input type="number" id="protein" name="protein" step="0.01"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Protein"
                           value="{{ old('protein', $food->protein) }}">
                    @error('protein')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Karbohidrat --}}
                <div>
                    <label for="carbohydrate" class="block font-semibold text-green-700 mb-1">Karbohidrat (g)</label>
                    <input type="number" id="carbohydrate" name="carbohydrate" step="0.01"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Karbohidrat"
                           value="{{ old('carbohydrate', $food->carbohydrate) }}">
                    @error('carbohydrate')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Waktu Memasak --}}
                <div>
                    <label for="cooking_time" class="block font-semibold text-green-700 mb-1">Waktu Memasak (menit)</label>
                    <input type="number" id="cooking_time" name="cooking_time"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400"
                           placeholder="Waktu memasak"
                           value="{{ old('cooking_time', $food->cooking_time) }}">
                    @error('cooking_time')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bahan-bahan --}}
                <div class="sm:col-span-2">
                    <label for="ingredients" class="block font-semibold text-green-700 mb-1">Bahan-bahan</label>
                    <textarea id="ingredients" name="ingredients"
                              class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400 h-28 resize-none"
                              placeholder="Daftar bahan">{{ old('ingredients', $food->ingredients) }}</textarea>
                    @error('ingredients')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Langkah Memasak --}}
                <div class="sm:col-span-2">
                    <label for="steps" class="block font-semibold text-green-700 mb-1">Langkah Memasak</label>
                    <textarea id="steps" name="steps"
                              class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400 h-36 resize-none"
                              placeholder="Instruksi memasak">{{ old('steps', $food->steps) }}</textarea>
                    @error('steps')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="sm:col-span-2">
                    <label for="image" class="block font-semibold text-green-700 mb-1">Gambar</label>
                    @if ($food->image)
                        <div class="mb-4 flex justify-center">
                            <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-64 h-64 object-cover rounded-lg shadow">
                        </div>
                    @endif
                    <input type="file" id="image" name="image"
                           class="w-full px-4 py-2 border border-green-400 rounded-md bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @error('image')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-4">
                <a href="{{ route('foods.index') }}"
                   class="px-5 py-2 rounded-md border border-green-500 text-green-700 bg-white hover:bg-green-50 transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-5 py-2 rounded-md bg-green-500 text-white hover:bg-green-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
