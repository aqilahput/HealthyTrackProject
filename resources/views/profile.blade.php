<x-default-layout title="Profil Pengguna" section_title="Profil Pengguna">
    @if (session('success'))
        <div class="px-3 py-2 rounded mb-4 bg-emerald-100 text-emerald-800 border border-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="mx-auto md:w-2/3 lg:w-1/2 px-6 py-6 bg-white border-t-4 border-emerald-500 shadow-lg rounded-xl space-y-5">

        <div class="text-center">
            <div class="inline-block bg-emerald-100 p-4 rounded-full">
                <i class="ph ph-user text-4xl text-emerald-600"></i>
            </div>
            <h2 class="mt-2 text-xl font-bold text-emerald-700">Profil Pengguna</h2>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="text-sm font-semibold text-emerald-800 block">Nama</label>
                <div class="px-3 py-2 border border-emerald-200 bg-green-50 rounded text-emerald-900">
                    {{ $user->name }}
                </div>
            </div>

            <div>
                <label class="text-sm font-semibold text-emerald-800 block">Email</label>
                <div class="px-3 py-2 border border-emerald-200 bg-green-50 rounded text-emerald-900">
                    {{ $user->email }}
                </div>
            </div>

            <div>
                <label class="text-sm font-semibold text-emerald-800 block">Role</label>
                <div class="px-3 py-2 border border-emerald-200 bg-green-50 rounded text-emerald-900">
                    {{ $user->role }}
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center pt-4 border-t border-emerald-200">
            @if ($user->id === auth()->id() && $user->role !== 'admin')
                <a href="{{ route('users.edit', $user->id) }}"
                   class="inline-flex items-center gap-1 bg-yellow-100 hover:bg-yellow-200 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md text-sm transition">
                    <i class="ph ph-pencil-line"></i> Edit Profil
                </a>
            @endif

            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 border border-red-400 text-red-600 px-4 py-2 rounded-md text-sm transition">
                    <i class="ph ph-sign-out"></i> Logout
                </button>
            </form>
        </div>
    </div>
</x-default-layout>
