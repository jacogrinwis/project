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

    <script src="https://cdn.tiny.cloud/1/dfobam2l064w1yxq82or54w529ezmpz50y6ji4x3aeo9ov9w/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body',
            skin: 'oxide-dark',
            plugins: 'lists code table codesample link',
            toolbar: 'formatselect | bold italic underline strikethrough bullist link',
            menubar: false,
            statusbar: false,
        }, );
    </script>

</head>

<body class="font-sans antialiased text-gray-600 dark:text-gray-200 bg-gray-50 dark:bg-gray-900">

    <x-admin.navigation.index />

    <main {{ $attributes->merge(['class' => 'px-6 py-16 md:py-12 md:ml-64 xl:ml-80 max-w-7xl']) }}>

        @if (isset($header))
            <div class="flex justify-between items-center mb-4">
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

</body>

</html>
