<x-default-layout title="Dashboard" section_title="Dashboard Admin">
    <div class="bg-green-50 min-h-screen p-6 rounded-lg space-y-10">
        
        {{-- Header --}}
        <div>
             <h2 class="text-3xl font-bold text-zinc-700 mb-1">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-sm text-zinc-500">Berikut adalah gambaran singkat tentang dashboard manajemen resep Anda.</p>
        </div>

       {{-- Tentang Admin Section --}}
<div>
    <h3 class="text-lg font-semibold text-zinc-700 mb-4">Fitur Admin di Healthy Track</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Kotak 1 --}}
        <div class="p-4 bg-white border border-green-200 rounded-lg shadow transition hover:bg-green-100 hover:shadow-lg">
            <div class="text-green-700 font-semibold mb-1">Kelola Makanan</div>
            <p class="text-sm text-zinc-600">Admin dapat menambahkan, mengubah, atau menghapus data makanan sehat sesuai kategori dan kebutuhan pengguna.</p>
        </div>

        {{-- Kotak 2 --}}
        <div class="p-4 bg-white border border-green-200 rounded-lg shadow transition hover:bg-green-100 hover:shadow-lg">
            <div class="text-green-700 font-semibold mb-1">Pantau Kategori</div>
            <p class="text-sm text-zinc-600">Klasifikasikan makanan berdasarkan jenis atau manfaat agar pengguna mudah menemukan makanan sesuai kebutuhan.</p>
        </div>

        {{-- Kotak 3 --}}
        <div class="p-4 bg-white border border-green-200 rounded-lg shadow transition hover:bg-green-100 hover:shadow-lg">
            <div class="text-green-700 font-semibold mb-1">Lihat Ringkasan & Statistik</div>
            <p class="text-sm text-zinc-600">Dapatkan ringkasan data kategori dan jumlah makanan yang tersedia untuk memastikan kelengkapan konten aplikasi.</p>
        </div>
    </div>
</div>

        {{-- Kartu Statistik --}}
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
    <div class="p-6 space-y-2 shadow-md border border-green-400 bg-green-100 rounded-lg transition hover:bg-green-200 hover:shadow-lg">
        <div class="flex justify-between items-center text-sm text-zinc-600">
            <span>Total Makanan</span>
            <a href="{{ route('foods.index') }}" class="text-green-600 underline hover:text-green-800">Lihat Makanan</a>
        </div>
        <div class="text-3xl font-bold text-green-800">{{ $totalFoods }}</div>
    </div>

    <div class="p-6 space-y-2 shadow-md border border-emerald-400 bg-emerald-100 rounded-lg transition hover:bg-emerald-200 hover:shadow-lg">
        <div class="flex justify-between items-center text-sm text-zinc-600">
            <span>Total Kategori</span>
            <a href="{{ route('categories.index') }}" class="text-green-600 underline hover:text-green-800">Lihat Kategori</a>
        </div>
        <div class="text-3xl font-bold text-green-800">{{ $totalCategories }}</div>
    </div>
</div>

{{-- Bagian Tabel --}}
<div class="space-y-4">
    <h3 class="text-lg font-semibold text-zinc-700">Kategori</h3>
    <div class="overflow-x-auto bg-white rounded shadow-md">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-green-100 text-zinc-700 font-semibold">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3 text-center">Total Makanan</th>
                </tr>
            </thead>
            <tbody class="text-zinc-600">
                @forelse($categories as $index => $category)
                <tr class="border-b transition hover:bg-green-50">
                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                    <td class="px-6 py-3">{{ $category->name }}</td>
                    <td class="px-6 py-3 text-center">{{ $category->foods_count }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-zinc-500">Tidak ada kategori tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Preview Daftar Makanan --}}
<div class="space-y-4">
    <h3 class="text-lg font-semibold text-zinc-700">Preview Daftar Makanan</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($foods as $food)
        <div class="bg-white border border-green-200 rounded-lg shadow p-4 space-y-2 transition hover:bg-green-50 hover:shadow-md">
            @if ($food->image)
                <img src="{{ asset('storage/' . $food->image) }}"
                     alt="{{ $food->name }}"
                     class="w-full h-32 object-cover rounded-md">
            @else
                <div class="w-full h-32 flex items-center justify-center bg-green-100 rounded-md text-green-400 italic text-sm">
                    Tidak ada gambar
                </div>
            @endif

            <div class="font-medium text-zinc-800 text-sm truncate">{{ $food->name }}</div>
            <div class="text-xs text-zinc-500">Kategori: {{ $food->category->name ?? 'Tidak Berkategori' }}</div>
        </div>
        @empty
        <p class="text-zinc-500 col-span-full">Tidak ada makanan tersedia.</p>
        @endforelse
    </div>
</div>

</x-default-layout>
