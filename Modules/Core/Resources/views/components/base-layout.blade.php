<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles

    <script src="{{ mix('assets/js/manifest.js') }}" defer></script>
    <script src="{{ mix('assets/js/vendor.js') }}" defer></script>
    <script src="{{ mix('assets/js/app.js') }}" defer></script>

</head>

<body class="h-full">

    {{ $slot }}

    <x-core::notification />
    @livewire('livewire-ui-spotlight')
    @livewireScripts
</body>

</html>
