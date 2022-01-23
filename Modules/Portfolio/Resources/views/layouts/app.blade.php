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
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles

    <script src="{{ mix('assets/js/manifest.js') }}" defer></script>
    <script src="{{ mix('assets/js/vendor.js') }}" defer></script>
    <script src="{{ mix('assets/js/app.js') }}" defer></script>
</head>

<body class="font-['Montserrat'] leading-7 text-neutral-400">
    <div class="w-full overflow-hidden relative">
        <a href="#" class="hidden"><i></i></a>
        <aside role="complementary" class="text-center h-screen hidden">
            <h1><a href="/">baro<span>.</span></a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="/">Home</a></li>
                    <li><a href="photography.html">Photography</a></li>
                    <li><a href="travel.html">Travel</a></li>
                    <li><a href="fashion.html">Fashion</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <div class="colorlib-footer">
                <p>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <ul>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                </ul>
            </div>
        </aside>
        <div class="w-full float-right transition-all">
            <div class="h-screen w-full relative z-0 bg-gray-100">
                <div class="absolute top-0 left-0 right-0 bottom-0 opacity-50 bg-white z-0"></div>
                <div class="h-screen flex justify-center items-center">
                    <div class="px-4 text-center z-10">
                        <div class="w-48 h-48 mx-auto my-0 rounded-full bg-cover mb-6"
                            style="background-image: url(assets/images/ava.jpg);"></div>
                        <div class="desc">
                            <h2 class="text-2xl text-gray-400 font-light mb-6">Hello I'm</h2>
                            <h1 class="font-black tracking-widest mb-6 text-4xl text-black/80">Dương "Baro" Gia Bảo</h1>
                            <p class="mb-4 font-medium text-lg">
                                I am A Web Developer far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia, there live the blind texts. Separated they
                                live in Bookmarksgrove right at the coast of the Semantics.
                            </p>
                            <a href="#" class="text-neutral-400 border-b-2 border-b-neutral-400 text-lg">
                                More About Me
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ftco-loader" class="hidden fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>
</body>

</html>
