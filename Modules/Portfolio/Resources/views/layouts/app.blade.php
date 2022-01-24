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
        <div class="relative lg:hidden mx-auto px-6 flex">
            <div x-data="{showMenu: false}" class="flex items-center justify-end">
                <!-- menu button -->
                <button x-on:click="showMenu = true" class="fixed top-0 left-0 mt-8 ml-6 z-10">
                    <x-fas-bars class="w-8 h-8 text-black/80" />
                </button>

                <div x-show="showMenu" x-trap.inert.noscroll="showMenu"
                    class="fixed inset-0 w-screen h-full bg-white z-30" x-cloak>
                    <button x-on:click="showMenu = false" class="z-20 absolute top-0 left-0 mt-8 ml-6">
                        <x-fas-times class="w-8 h-8 text-black/80" />
                    </button>
                    <div class="h-full mx-auto px-6 py-8 relative z-10 flex flex-col items-center justify-center text-2xl uppercase font-bold tracking-widest space-y-6"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-x-10"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-10" x-show="showMenu">
                        <a href="#" class="inline-block border-b-2 @if (true) border-black text-black/80 @else border-transparent @endif">
                            Home
                        </a>
                        <a href="#" class="inline-block border-b-2 @if (false) border-black @else border-transparent @endif">
                            About
                        </a>
                        <a href="#" class="inline-block border-b-2 @if (false) border-black @else border-transparent @endif">
                            Work
                        </a>
                        <a href="#" class="inline-block border-b-2 @if (false) border-black @else border-transparent @endif">
                            Contact
                        </a>
                    </div>
                    <div class="absolute bottom-10 right-6 left-6 text-black/80">
                        <ul class="flex items-center justify-center" x-show="showMenu"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-10">
                            <li>
                                <a href="#">
                                    <x-fab-facebook-f class="w-5 h-5 mx-5" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <x-fab-twitter class="w-5 h-5 mx-5" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <x-fab-linkedin-in class="w-5 h-5 mx-5" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="absolute inset-0 w-screen h-full bg-black/5 bg-opacity-20"></div>
                </div>
            </div>

            <div class="text-white text-[0.6rem] md:tracking-widest text-center mt-2 col-span-3">
                {{ setting('header_slogan') }}
            </div>
        </div>
        <aside
            class="text-center h-screen hidden lg:block lg:fixed w-full lg:w-1/4 p-11 top-0 bottom-0 left-0 overflow-y-auto z-20 bg-black/5">
            <a href="/">
                <h1 class="mb-10 w-full font-black text-4xl text-black/80">
                    baro<span class="text-neutral-400">.</span>
                </h1>
            </a>
            <nav role="navigation">
                <ul class="m-0 p-0">
                    <li class="mb-4 p-0 font-bold hover:text-black transition text-black"><a href="/"
                            class="border-b-2 border-b-black pb-1">Home</a></li>
                    <li class="mb-4 p-0 font-bold hover:text-black transition"><a
                            href="photography.html">Photography</a>
                    </li>
                    <li class="mb-4 p-0 font-bold hover:text-black transition"><a href="travel.html">Travel</a></li>
                    <li class="mb-4 p-0 font-bold hover:text-black transition"><a href="fashion.html">Fashion</a></li>
                    <li class="mb-4 p-0 font-bold hover:text-black transition"><a href="about.html">About</a></li>
                    <li class="mb-4 p-0 font-bold hover:text-black transition"><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <div class="absolute bottom-10 right-6 left-6 text-black/80">
                <ul class="flex items-center justify-center">
                    <li><a href="#">
                            <x-fab-facebook-f class="w-5 h-5 mx-5" />
                        </a></li>
                    <li><a href="#">
                            <x-fab-twitter class="w-5 h-5 mx-5" />
                        </a></li>
                    <li><a href="#">
                            <x-fab-linkedin-in class="w-5 h-5 mx-5" />
                        </a></li>
                </ul>
            </div>
        </aside>
        <div class="w-full lg:w-3/4 float-right transition-all">
            <div class="h-screen w-full relative z-0 bg-gray-100">
                <div class="absolute top-0 left-0 right-0 bottom-0 opacity-50 bg-white z-0"></div>
                <div class="h-screen flex justify-center items-center">
                    <div class="w-3/4 md:w-2/3 mx-auto text-center z-10">
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
