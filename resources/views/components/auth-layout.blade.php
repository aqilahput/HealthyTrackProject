@props(["title", "section_title" => "Menu", "section_description" => ""])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css" 
          href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css" 
          href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }}</title>
</head>

<body class="bg-green-50">
    {{-- Nav Home dengan kotak putih --}}
    <div class="w-full flex justify-end px-6 py-4">
        <div class="bg-white shadow-md rounded-full px-4 py-2">
            <a href="{{ url('/') }}"
               class="flex items-center gap-1 text-emerald-700 text-sm font-medium hover:underline">
                <i class="ph ph-house"></i> Home
            </a>
        </div>
    </div>

    <main class="flex items-center justify-center min-h-[calc(100vh-5rem)]">
        <div class="space-y-6 p-6 max-w-[30rem] w-full">
            {{-- Header --}}
            <div class="flex gap-2 justify-center items-center">
                <i class="ph ph-bowl-food inline-block text-xl bg-emerald-600 text-white p-1 rounded-md"></i>
                <p class="font-semibold text-sm text-emerald-700">Health Track Management</p>
            </div>

            {{-- Konten --}}
            <div class="flex flex-col w-full gap-4 border border-emerald-200 bg-white p-6 shadow-lg rounded-xl">
                <div class="space-y-2 text-center">
                    <h1 class="font-semibold text-2xl text-emerald-800">{{ $section_title }}</h1>
                    <p class="text-emerald-600 text-sm">{{ $section_description }}</p>
                </div>
                <div class="h-[1px] bg-emerald-300"></div>
                {{ $slot }}
            </div>
        </div>
    </main>
</body>
</html>
