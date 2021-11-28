<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trim($title) ?: __('Welcome') }} | {{ config('app.name', 'Docker Web - Distorted Fusion') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
    <livewire:styles />
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-black text-black dark:text-white">
    <main class="py-8">
        {{ $slot }}
    </main>

    <livewire:scripts />
</body>
</html>
