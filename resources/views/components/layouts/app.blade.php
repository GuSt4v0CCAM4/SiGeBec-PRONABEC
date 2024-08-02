<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div x-init="initFlowbite();"></div>
    <div class="app-container">
        <x-layouts.navbar />
        {{ $slot }}
    </div>
</body>

</html>
