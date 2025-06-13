<x-auth-layout title="Login" section_title="Welcome Back" section_description="Login with your account">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-700 px-3 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('auth.authenticate') }}" method="POST" class="flex flex-col gap-4 mt-2">
        @csrf
        @method("POST")

        <div class="flex flex-col gap-2">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <label for="email" class="font-semibold text-sm text-emerald-800">Email</label>
            <input type="email" id="email" name="email"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Your Email" value="{{ old('email') }}">
        </div>

        <div class="flex flex-col gap-2">
            <label for="password" class="font-semibold text-sm text-emerald-800">Password</label>
            <input type="password" id="password" name="password"
                   class="px-3 py-2 border border-emerald-300 bg-green-50 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                   placeholder="Your Password">
        </div>

        <button type="submit"
                class="bg-emerald-600 hover:bg-emerald-700 transition text-white px-3 py-2 rounded mt-4">
            <span>Login</span>
        </button>

        <p class="text-emerald-700 text-sm text-center">
            Don’t have an account?
            <a href="{{ route('auth.register') }}" class="text-emerald-600 font-semibold underline hover:text-emerald-800">Register Now</a>
        </p>
    </form>
</x-auth-layout>
