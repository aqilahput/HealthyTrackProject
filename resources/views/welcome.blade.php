<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Welcome</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center px-4 py-10">

    <div class="bg-white rounded-2xl shadow-lg p-12 text-center max-w-6xl w-full space-y-12">
        {{-- Judul --}}
        <div>
            <h2 class="text-5xl font-extrabold text-green-800 mb-4">Selamat Datang di Healthy Track</h2>
            <p class="text-xl text-green-700">
                Platform manajemen makanan sehat untuk gaya hidup yang lebih baik dan teratur.
            </p>
        </div>

        {{-- Gambar --}}
        <img src="{{ asset('images/welcome/Healthy food typography vector.jpeg') }}" alt="Gambar Welcome"
             class="mx-auto rounded-lg shadow-lg max-w-md w-full border border-green-200">

        {{-- Tombol --}}
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('auth.login') }}"
               class="bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-lg transition">
                Masuk ke Akun
            </a>
            <a href="{{ route('auth.register') }}"
               class="bg-white border-2 border-green-700 text-green-700 hover:bg-green-100 font-semibold px-6 py-3 rounded-lg transition">
                Daftar Akun
            </a>
        </div>

        {{-- Tentang Healthy Track - 3 Kotak --}}
        <div class="mt-10">
            <h3 class="text-3xl font-bold text-green-800 mb-6">Tentang Healthy Track</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                {{-- Kotak 1 --}}
                <div class="bg-green-100 p-6 rounded-xl shadow-md hover:bg-green-200 hover:shadow-lg transition">
                    <i class="ph ph-clipboard-text text-3xl text-green-700 mb-4"></i>
                    <h4 class="text-xl font-semibold text-green-800 mb-2">Catat Konsumsi Harian</h4>
                    <p class="text-green-700 leading-relaxed">
                        Simpan dan pantau makanan yang kamu konsumsi setiap hari secara mudah dan cepat.
                    </p>
                </div>

                {{-- Kotak 2 --}}
                <div class="bg-green-100 p-6 rounded-xl shadow-md hover:bg-green-200 hover:shadow-lg transition">
                    <i class="ph ph-clock-counter-clockwise text-3xl text-green-700 mb-4"></i>
                    <h4 class="text-xl font-semibold text-green-800 mb-2">Riwayat Makanan</h4>
                    <p class="text-green-700 leading-relaxed">
                        Lihat riwayat konsumsi makananmu dan pantau kemajuan pola makan sehatmu.
                    </p>
                </div>

                {{-- Kotak 3 --}}
                <div class="bg-green-100 p-6 rounded-xl shadow-md hover:bg-green-200 hover:shadow-lg transition">
                    <i class="ph ph-heartbeat text-3xl text-green-700 mb-4"></i>
                    <h4 class="text-xl font-semibold text-green-800 mb-2">Kategori Makanan Sehat</h4>
                    <p class="text-green-700 leading-relaxed">
                        Dapatkan rekomendasi kategori makanan untuk menunjang kesehatanmu setiap hari.
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
