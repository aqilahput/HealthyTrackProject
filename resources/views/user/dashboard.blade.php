<x-default-layout title="Dashboard" section_title="Dashboard Pengguna">
    <div class="bg-green-50 min-h-screen p-6 rounded-lg space-y-10">

        {{-- Header --}}
        <div>
            <h2 class="text-3xl font-bold text-zinc-700 mb-1">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-sm text-zinc-500">Berikut adalah daftar makanan yang tersedia untuk Anda.</p>
        </div>

        {{-- Tentang Healthy Track - 3 Kotak --}}
<div>
    <h3 class="text-lg font-semibold text-zinc-700 mb-4">Apa yang Bisa Kamu Lakukan di Healthy Track?</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Kotak 1: Membuat Riwayat --}}
        <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition border border-green-200 hover:bg-green-100">
            <div class="flex items-center gap-3 mb-3">
                <i class="ph ph-plus-circle text-green-700 text-2xl"></i>
                <h4 class="text-md font-semibold text-zinc-800">Membuat Riwayat</h4>
            </div>
            <p class="text-sm text-zinc-600">
                Tambahkan makanan yang Anda konsumsi ke dalam riwayat harian sesuai waktu makan seperti sarapan, makan siang, atau makan malam.
            </p>
        </div>

        {{-- Kotak 2: Riwayat Makanan --}}
        <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition border border-green-200 hover:bg-green-100">
            <div class="flex items-center gap-3 mb-3">
                <i class="ph ph-clock-counter-clockwise text-green-700 text-2xl"></i>
                <h4 class="text-md font-semibold text-zinc-800">Riwayat Makanan</h4>
            </div>
            <p class="text-sm text-zinc-600">
                Lihat kembali makanan yang sudah dikonsumsi sebelumnya untuk evaluasi pola makan sehatmu.
            </p>
        </div>

        {{-- Kotak 3: Rekomendasi Makanan Sehat --}}
        <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition border border-green-200 hover:bg-green-100">
            <div class="flex items-center gap-3 mb-3">
                <i class="ph ph-heartbeat text-green-700 text-2xl"></i>
                <h4 class="text-md font-semibold text-zinc-800">Rekomendasi Makanan Sehat</h4>
            </div>
            <p class="text-sm text-zinc-600">
                Dapatkan berbagai pilihan makanan bergizi yang menunjang gaya hidup sehatmu setiap hari.
            </p>
        </div>

    </div>
</div>


        {{-- Preview Daftar Makanan --}}
        <div class="space-y-4 mt-10">
            <h3 class="text-lg font-semibold text-zinc-700">Daftar Makanan Sehat</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($foods as $food)
                    <div class="bg-white border border-green-200 rounded-lg shadow p-4 space-y-2 hover:bg-green-50 transition">
                        {{-- Gambar makanan --}}
                        @if ($food->image)
                            <img src="{{ asset('storage/' . $food->image) }}"
                                 alt="{{ $food->name }}"
                                 class="w-full h-32 object-cover rounded-md">
                        @else
                            <div class="w-full h-32 flex items-center justify-center bg-green-100 rounded-md text-green-400 italic text-sm">
                                Tidak ada gambar
                            </div>
                        @endif

                        {{-- Nama dan kategori --}}
                        <div class="font-medium text-zinc-800 text-sm truncate">{{ $food->name }}</div>
                        <div class="text-xs text-zinc-500">Kategori: {{ $food->category->name ?? 'Tidak Berkategori' }}</div>
                    </div>
                @empty
                    <p class="text-zinc-500 col-span-full">Tidak ada makanan tersedia.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-default-layout>
