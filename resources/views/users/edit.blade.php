<x-default-layout title="Edit Data Pengguna" section_title="Edit Data Pengguna">
    <div class="flex justify-center items-start py-10 bg-gray-100 min-h-screen">
        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}"
              class="w-full max-w-xl bg-white p-6 rounded-xl shadow-md border-t-4 border-green-500 space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-1">Edit Data User</h2>
                <p class="text-sm text-gray-500">Silakan perbarui informasi user di bawah ini.</p>
            </div>

            {{-- Nama --}}
            <div class="flex flex-col gap-1">
                <label for="name" class="text-sm font-medium text-gray-700">Nama User</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300"
                    value="{{ old('name', $user->name) }}"
                    required
                >
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email (readonly) --}}
            <div class="flex flex-col gap-1">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="rounded-md border border-gray-300 bg-gray-100 px-4 py-2 text-sm text-gray-500"
                    value="{{ $user->email }}"
                    readonly
                >
            </div>

            {{-- Password Baru --}}
            <div class="flex flex-col gap-1">
                <label for="password" class="text-sm font-medium text-gray-700">Password Baru</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300"
                    required
                >
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="flex flex-col gap-1">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300"
                    required
                >
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('profile.index', $user->id) }}"
                   class="text-sm px-4 py-2 rounded-md border border-gray-400 text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                    Kembali ke Profil
                </a>
                <button type="submit"
                        class="text-sm px-4 py-2 rounded-md bg-green-500 text-white font-semibold hover:bg-green-600 transition flex items-center gap-2">
                    <i class="ph ph-floppy-disk"></i>
                    Update Data
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
