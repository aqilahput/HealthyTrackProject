<x-auth-layout title="Register" section_title="Register" section_description="Register using your email">
    <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4 mt-2">
        @csrf
        @method("POST")

        <div class="flex flex-col gap-2">
            <label for="name" class="font-semibold text-sm text-emerald-800">Name</label>
            <input type="text" id="name" name="name"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Your name" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="email" class="font-semibold text-sm text-emerald-800">Email</label>
            <input type="email" id="email" name="email"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Your email" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="password" class="font-semibold text-sm text-emerald-800">Password</label>
            <input type="password" id="password" name="password"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Your password">
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="confirm_password" class="font-semibold text-sm text-emerald-800">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Confirm your password">
            @error('confirm_password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tambahkan dropdown role di sini -->
        <div class="flex flex-col gap-2">
            <label for="role" class="font-semibold text-sm text-emerald-800">Role</label>
            <select id="role" name="role" required
                    class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                <option value="">-- Select Role --</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 transition text-white px-3 py-2 rounded mt-4 w-full">
                <span>Register</span>
            </button>
        </div>

        <p class="text-emerald-700 text-sm text-center">
            Already have an account?
            <a href="{{ route('auth.login') }}" class="text-emerald-600 font-semibold underline hover:text-emerald-800">Login Here</a>
        </p>
    </form>
</x-auth-layout>
