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
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles

    <script src="{{ mix('assets/js/manifest.js') }}" defer></script>
    <script src="{{ mix('assets/js/vendor.js') }}" defer></script>
    <script src="{{ mix('assets/js/app.js') }}" defer></script>
</head>

<body>
    <nav class="bg-transparent absolute top-0 left-0 right-0 z-10 px-4 py-2 flex lg:flex-nowrap lg:flex-row lg:justify-start"
        id="ftco-navbar">
        <div class="container mx-auto flex items-center justify-between py-5">
            <a class="font-extrabold" href="{{ route('home') }}">3aro</a>
            <button class="lg:hidden" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="flex basis-auto" id="ftco-nav">
                <ul class="flex flex-row ml-auto pl-0 mb-0 flex-wrap font-medium">
                    <li class=""><a href="#home-section" class="text-base px-5 py-3"><span>Home</span></a>
                    </li>
                    <li class=""><a href="#about-section"
                            class="text-base px-5 py-3"><span>About</span></a>
                    </li>
                    <li class=""><a href="#resume-section"
                            class="text-base px-5 py-3"><span>Resume</span></a>
                    </li>
                    <li class=""><a href="#services-section"
                            class="text-base px-5 py-3"><span>Services</span></a></li>
                    <li class=""><a href="#projects-section"
                            class="text-base px-5 py-3"><span>Projects</span></a></li>
                    <li class=""><a href="#blog-section" class="text-base px-5 py-3"><span>My
                                Blog</span></a>
                    </li>
                    <li class=""><a href="#contact-section"
                            class="text-base px-5 py-3"><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="w-100 h-screen bg-cover bg-no-repeat">
        <div class="absolute top-0 left-0 right-0 bottom-0 content w-1/2 bg-blue-600 opacity-10"></div>
        <div class="container mx-auto">
            <div class="items-center justify-center mx-0 flex h-screen">
                <div class="w-100 text-center">
                    <span class="uppercase font-extrabold text-blue-600 tracking-widest">Hey! This is</span>
                    <h1 class="font-extrabold text-6xl mb-2">Baro</h1>
                    <h2 class="font-bold text-3xl">I'm a
                        <span class="txt-rotate" data-period="2000"
                            data-rotate='[ "Web Designer.", "Developer.", "Photographer.", "Marketer.", "Blogger" ]'></span>
                    </h2>
                </div>
            </div>
        </div>
        </div>
        <div class="absolute left-0 right-0 bottom-28 z-10">
            <a href="#" class="w-20 h-20 cursor-pointer relative text-center mx-auto my-0">
                <div
                    class="h-20 w-20 flex justify-center mt-1 mb-0 mx-auto bg-transparent rounded-[50%] animate-bounce">
                    <x-heroicon-o-arrow-down class="w-12 h-12 text-blue-600 m-0" />
                </div>
            </a>
        </div>
    </section>
    <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 col-lg-6 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center"
                            style="background-image:url(images/xabout.jpg.pagespeed.ic.-j2kfNwXDg.webp)"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pl-md-5 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h1 class="big">About</h1>
                            <h2 class="mb-4">About Me</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <ul class="about-info mt-4 px-md-0 px-2">
                                <li class="d-flex"><span>Name:</span> <span>Ronaldo Fredrickson</span></li>
                                <li class="d-flex"><span>Date of birth:</span> <span>November 28, 1989</span>
                                </li>
                                <li class="d-flex"><span>Address:</span> <span>San Francisco CA 97987 USA</span>
                                </li>
                                <li class="d-flex"><span>Zip code:</span> <span>1000</span></li>
                                <li class="d-flex"><span>Email:</span> <span><a
                                            href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="aad8c5c4cbc6cec5eacdc7cbc3c684c9c5c7">[email&#160;protected]</a></span>
                                </li>
                                <li class="d-flex"><span>Phone: </span> <span>+1-2234-5678-9-0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text">
                            <p class="mb-4">
                                <span class="number" data-number="120">0</span>
                                <span>Project complete</span>
                            </p>
                            <p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner">
                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>___scripts_1___<img src="images/xpartner-1.png.pagespeed.ic.b7FlbbQVdf.webp"
                            class="img-fluid" alt="Colorlib Template" data-pagespeed-url-hash="2531790171"
                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="images/xpartner-2.png.pagespeed.ic.4tCtqXfPLh.webp"
                            class="img-fluid" alt="Colorlib Template" data-pagespeed-url-hash="2826290092"
                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="images/xpartner-3.png.pagespeed.ic.K6b-CsdlC4.webp"
                            class="img-fluid" alt="Colorlib Template" data-pagespeed-url-hash="3120790013"
                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="images/xpartner-4.png.pagespeed.ic.DaTQYymmyu.webp"
                            class="img-fluid" alt="Colorlib Template" data-pagespeed-url-hash="3415289934"
                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="images/xpartner-5.png.pagespeed.ic.A4xeUmT9Fd.webp"
                            class="img-fluid" alt="Colorlib Template" data-pagespeed-url-hash="3709789855"
                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb goto-here" id="resume-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <nav id="navi">
                        <ul>
                            <li><a href="#page-1">Education</a></li>
                            <li><a href="#page-2">Experience</a></li>
                            <li><a href="#page-3">Skills</a></li>
                            <li><a href="#page-4">Awards</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div id="page-1" class="page one">
                        <h2 class="heading">Education</h2>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Bachelor of Science in Computer Science</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Computer Processing Systems/Computer Software</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Diploma in Computer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Art &amp; Creative Director</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                    </div>
                    <div id="page-2" class="page two">
                        <h2 class="heading">Experience</h2>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Software Developer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Web Designer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Web Marketing</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Art &amp; Creative Director</h2>
                                <span class="position">Side Tech</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Wordpress Developer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2017-2018</span>
                                <h2>UI/UX Designer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                    </div>
                    <div id="page-3" class="page three">
                        <h2 class="heading">Skills</h2>
                        <div class="row progress-circle mb-5">
                            <div class="col-lg-4 mb-4">
                                <div class="bg-white rounded-lg shadow p-4">
                                    <h2 class="h5 font-weight-bold text-center mb-4">CSS</h2>
                                    <div class="progress mx-auto" data-value='90'>
                                        <span class="progress-left">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <div
                                            class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                            <div class="h2 font-weight-bold">90<sup class="small">%</sup>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-4">
                                        <div class="col-6 border-right">
                                            <div class="h4 font-weight-bold mb-0">28%</div>
                                            <span class="small text-gray">Last week</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="h4 font-weight-bold mb-0">60%</div>
                                            <span class="small text-gray">Last month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="bg-white rounded-lg shadow p-4">
                                    <h2 class="h5 font-weight-bold text-center mb-4">HTML</h2>
                                    <div class="progress mx-auto" data-value='80'>
                                        <span class="progress-left">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <div
                                            class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                            <div class="h2 font-weight-bold">80<sup class="small">%</sup>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-4">
                                        <div class="col-6 border-right">
                                            <div class="h4 font-weight-bold mb-0">28%</div>
                                            <span class="small text-gray">Last week</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="h4 font-weight-bold mb-0">60%</div>
                                            <span class="small text-gray">Last month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="bg-white rounded-lg shadow p-4">
                                    <h2 class="h5 font-weight-bold text-center mb-4">jQuery</h2>
                                    <div class="progress mx-auto" data-value='75'>
                                        <span class="progress-left">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <div
                                            class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                            <div class="h2 font-weight-bold">75<sup class="small">%</sup>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-4">
                                        <div class="col-6 border-right">
                                            <div class="h4 font-weight-bold mb-0">28%</div>
                                            <span class="small text-gray">Last week</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="h4 font-weight-bold mb-0">60%</div>
                                            <span class="small text-gray">Last month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>Photoshop</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                            <span>90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>jQuery</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-2" role="progressbar" aria-valuenow="85"
                                            aria-valuemin="0" aria-valuemax="100" style="width:85%">
                                            <span>85%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>HTML5</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-3" role="progressbar" aria-valuenow="95"
                                            aria-valuemin="0" aria-valuemax="100" style="width:95%">
                                            <span>95%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>CSS3</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-4" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                            <span>90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>WordPress</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
                                            aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                            <span>70%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="progress-wrap ftco-animate">
                                    <h3>SEO</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                            <span>80%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="page-4" class="page four">
                        <h2 class="heading">Awards</h2>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Top 10 Web Developer</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Top 5 LeaderShip Exellence Winner</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Top 4 Web Tester</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">2014-2015</span>
                                <h2>Art &amp; Creative Director</h2>
                                <span class="position">Cambridge University</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="services-section">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Services</h1>
                    <h2 class="mb-4">Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-analysis"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Web Design</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-flasks"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Phtography</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-ideas"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Web Developer</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-innovation"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">App Developing</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-ux-design"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Branding</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1 shadow">
                        <span class="icon">
                            <i class="flaticon-idea"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Product Strategy</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-project" id="projects-section">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Projects</h1>
                    <h2 class="mb-4">Our Projects</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-1.jpg.pagespeed.ic.-P_sxB_seN.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-2.jpg.pagespeed.ic.Q2f7kLKqWn.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-3.jpg.pagespeed.ic.Fm4c11sd7p.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-4.jpg.pagespeed.ic.AAx_2TLnn9.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-5.jpg.pagespeed.ic.wj7u8-RD3L.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image:url(images/xwork-6.jpg.pagespeed.ic.11SwA0AgXc.webp)">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container-fluid px-md-5">
            <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 shadow">
                        <div class="text">
                            <strong class="number" data-number="100">0</strong>
                            <span>Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 shadow">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Complete Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 shadow">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 shadow">
                        <div class="text">
                            <strong class="number" data-number="500">0</strong>
                            <span>Cups of coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Blog</h1>
                    <h2 class="mb-4">Our Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20"
                            style="background-image:url(images/ximage_1.jpg.pagespeed.ic.-B0UTb4vQO.webp)">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">Sept. 12, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20"
                            style="background-image:url(images/ximage_2.jpg.pagespeed.ic.hPYaVjNW0H.webp)">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">Sept. 12, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="single.html" class="block-20"
                            style="background-image:url(images/ximage_3.jpg.pagespeed.ic.XJ5IolSvSy.webp)">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">Sept. 12, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-hireme img"
        style="background-image:url(images/xbg_1.jpg.pagespeed.ic.4dZ7CYM3I2.webp)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>I'm <span>Available</span> for freelancing</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Address</h3>
                            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="/cdn-cgi/l/email-protection#87eee9e1e8c7fee8f2f5f4eef3e2a9e4e8ea"><span
                                        class="__cf_email__"
                                        data-cfemail="30595e565f70495f4542435944551e535f5d">[email&#160;protected]</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Website</h3>
                            <p><a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="img"
                        style="background-image:url(images/xabout.jpg.pagespeed.ic.-j2kfNwXDg.webp)"></div>
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake
                                        St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text"><span class="__cf_email__"
                                                data-cfemail="9bf2f5fdf4dbe2f4eee9fff4f6faf2f5b5f8f4f6">[email&#160;protected]</span></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>___scripts_3___ All rights reserved | This template is made with
                        <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
