<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trim($title) ?: __('Welcome') }} | {{ config('app.name', 'Docker Web - Distorted Fusion') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">

    <x-favicons />
    <livewire:styles />
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-black text-black dark:text-white">
    <main class="py-8">
        {{ $slot }}
    </main>

    <x-container-narrow>
        <footer class="flex items-center justify-center py-8">
            <a href="https://distortedfusion.com/?utm_source=unraid-docker-web&utm_medium=footer&utm_campaign=oss" class="block text-gray-500 hover:text-black dark:hover:text-white transition-colors">
                <x-logo width="147px" height="11px" />
            </a>
        </footer>
    </x-container-narrow>

    <livewire:scripts />
</body>
</html>
