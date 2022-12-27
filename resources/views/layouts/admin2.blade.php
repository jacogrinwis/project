<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased text-gray-600 dark:text-gray-200 bg-gray-50 dark:bg-gray-900">

    <x-admin.navigation.index />

    <main {{ $attributes->merge(['class' => 'px-6 py-16 md:pt-6 md:py-12 md:ml-64 max-w-7xl']) }}>

        @if (isset($header))
            <div class="flex items-center justify-between mb-4">
                @if (isset($title))
                    <h2 class="text-2xl font-bold dark:text-white">
                        {{ $title }}
                    </h2>
                @endif
                {{ $header }}
            </div>
        @endif

        {{ $slot }}

    </main>

    @stack('scripts')
</body>

</html>
