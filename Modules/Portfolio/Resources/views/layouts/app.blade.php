<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($metaTitle))
        <title>{{ $metaTitle }} | {{ setting('site_name', config('app.name', 'Rezonia')) }}</title>
        <meta property="og:title" content="{{ $metaTitle }}" />
    @else
        <title>{{ setting('site_name', config('app.name', 'Rezonia')) }}</title>
        <meta property="og:title" content="{{ setting('site_name', config('app.name', 'Rezonia')) }}" />
    @endif
    <meta name="description" content="{{ $metaDescription ?? setting('site_description', '') }}" />
    <meta name="keywords" content="{{ $metaKeywords ?? setting('site_keywords', '') }}" />
    <meta property="og:description" content="{{ $metaDescription ?? setting('site_description', '') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    @livewireStyles
    @vite(['Modules/Core/Resources/assets/js/app.js', 'Modules/Core/Resources/assets/css/app.css'])
    @if (setting('site_google_analytics'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site_google_analytics') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ setting('site_google_analytics') }}');
        </script>
    @endif
</head>

<body class="font-['Montserrat'] leading-7 text-neutral-400 bg-gray-100 dark:bg-zinc-900">
    <div class="w-full overflow-hidden relative">
        <x-portfolio::aside />
        <div class="w-full lg:w-4/5 float-right transition-all relative z-0 min-h-screen flex flex-col">
            <div class="flex justify-end w-full mt-8 pr-8 flex-initial">
                <livewire:portfolio::misc.switch-language />
            </div>
            {{ $slot }}
        </div>
    </div>

    <div id="ftco-loader" class="hidden fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

</html>
