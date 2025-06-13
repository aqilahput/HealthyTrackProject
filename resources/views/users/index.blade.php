<x-default-layout title="Daftar Pengguna" section_title="Daftar Pengguna">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($users as $user)
            <div class="bg-white shadow border border-green-200 rounded p-4 transition hover:bg-green-50 hover:shadow-md">
                <h3 class="text-green-800 font-semibold text-lg mb-1">{{ $user->name }}</h3>
                <p class="text-sm text-green-700 mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="text-sm text-green-700 mb-3"><strong>Role:</strong> {{ $user->role }}</p>

                <div class="flex justify-start">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus"
                                class="bg-green-100 text-red-700 px-2 py-1 rounded hover:bg-green-200 text-sm flex items-center gap-1">
                            <i class="ph ph-trash-simple"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-6 text-green-400 italic">
                Data user belum ada.
            </div>
        @endforelse
    </div>
</x-default-layout>
