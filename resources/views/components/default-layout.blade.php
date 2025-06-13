@props(['title', 'section_title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }}</title>
</head>

<body class="bg-zinc-100">
<main x-data="{ sidebarOpen: false }" class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed z-30 inset-y-0 left-0 w-64 bg-green-700 text-white border-r border-green-800
               transform transition-transform duration-300 ease-in-out sm:translate-x-0 sm:static sm:flex-shrink-0">

        <div class="px-6 py-4 border-b border-green-800">
            {{-- Logo --}}
            <div class="flex items-center gap-3 mb-3">
                <i class="ph ph-bowl-food text-3xl"></i>
                <span class="text-xl font-bold">Healthy Track</span>
            </div>

            {{-- Mobile Close Button --}}
            <div class="flex items-center justify-between sm:hidden">
                <h2 class="text-lg font-bold">Healthy Track</h2>
                <button @click="sidebarOpen = false" class="focus:outline-none">
                    <i class="ph ph-x text-white text-2xl"></i>
                </button>
            </div>
        </div>

        @auth
        {{-- Navigasi hanya jika sudah login --}}
        <nav class="mt-6 px-4 flex flex-col gap-1">

            {{-- Dashboard --}}
            <a href="{{ auth()->user()->role === 'admin' ? url('/admin/dashboard') : url('/user/dashboard') }}"
               class="{{ request()->is('admin/dashboard') || request()->is('user/dashboard') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                      rounded px-3 py-2 font-semibold flex items-center gap-2">
                <i class="ph ph-speedometer"></i> Dashboard
            </a>

            {{-- Foods --}}
            <a href="{{ url(request()->is('admin/*') ? '/admin/foods' : '/user/foods') }}"
               class="{{ request()->is('*/foods*') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                      rounded px-3 py-2 font-semibold flex items-center gap-2">
                <i class="ph ph-apple-logo text-xl"></i> Foods
            </a>

            {{-- Histories untuk user --}}
            @if(auth()->user()->role === 'user')
                <a href="{{ route('histories.index') }}"
                   class="{{ request()->is('user/histories*') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                          rounded px-3 py-2 font-semibold flex items-center gap-2">
                    <i class="ph ph-clock-counter-clockwise text-xl"></i> History
                </a>
            @endif

            {{-- Categories dan Users untuk admin --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ url('/admin/categories') }}"
                   class="{{ request()->is('admin/categories*') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                          rounded px-3 py-2 font-semibold flex items-center gap-2">
                    <i class="ph ph-list"></i> Categories
                </a>

                <a href="{{ url('/admin/users') }}"
                   class="{{ request()->is('admin/users*') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                          rounded px-3 py-2 font-semibold flex items-center gap-2">
                    <i class="ph ph-users"></i> Users
                </a>
            @endif

            {{-- Profile --}}
            <a href="{{ url(request()->is('admin/*') ? '/admin/profile' : '/user/profile') }}"
               class="{{ request()->is('*/profile') ? 'bg-green-800' : 'hover:bg-green-600' }} 
                      rounded px-3 py-2 font-semibold flex items-center gap-2">
                <i class="ph ph-user-circle text-xl"></i> Profile
            </a>
        </nav>
        @endauth
    </aside>

    {{-- Content --}}
    <div class="flex-1 flex flex-col min-h-screen">
        {{-- Mobile Topbar --}}
        <header class="sm:hidden flex items-center justify-between bg-green-700 text-white px-4 py-3 border-b border-green-800">
            <button @click="sidebarOpen = true" class="focus:outline-none">
                <i class="ph ph-list text-white text-2xl"></i>
            </button>
            <h1 class="font-bold text-lg">{{ $section_title }}</h1>
            <div></div>
        </header>

        {{-- Desktop Topbar tanpa tombol Home --}}
        <header class="hidden sm:flex items-center justify-between bg-white px-8 py-4 shadow">
            <h1 class="text-xl font-bold text-green-700">{{ $section_title }}</h1>
            <div></div>
        </header>

        {{-- Section Content --}}
        <section class="px-4 sm:px-8 py-6 flex flex-col gap-6 bg-zinc-100 flex-grow">
            {{ $slot }}
        </section>
    </div>

</main>
</body>
</html>
