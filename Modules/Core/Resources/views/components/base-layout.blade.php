<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <livewire:styles />
    <wireui:scripts />
    @vite(['Modules/Core/Resources/assets/js/app.js', 'Modules/Core/Resources/assets/css/app.css'])
</head>

<body class="h-full bg-gray-100 text-gray-900 dark:text-gray-100 dark:bg-gray-900">

    {{ $slot }}

    <x-core::notification />
    {{-- @livewire('livewire-ui-spotlight') --}}
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

</html>
