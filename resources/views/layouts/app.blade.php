<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gemstone') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/theme.js') }}" defer></script>
    <script src="{{ asset('js/toastr.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader"><div data-loader="dual-ring"></div></div>
    <!-- Preloader End -->

    <div id="main-wrapper">

        <!-- Header============================================= -->
        <header id="header" class="bg-primary header-text-light">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start">

                        <!-- Logo
                        ============================================= -->
                        <div class="logo"> <a href="{{ route('home') }}" title="Gemstone "><img src="{{ asset('img/logo-light.png') }}" alt="Gemstone" width="127" height="29" /></a> </div>
                        <!-- Logo end -->

                    </div>
                    <div class="header-column justify-content-end">

                        <!-- Primary Navigation
                        ============================================= -->
                        <nav class="primary-menu navbar navbar-expand-lg">
                            <div id="header-nav" class="collapse navbar-collapse">
                                <ul class="navbar-nav">
                                    <li class="active"> <a class="dropdown-toggle " href="{{ route('home') }} " style="color:#0071cc;">Home</a></li>
                                    <li> <a  href="#" style="color:#0071cc;">Buy Coupon</a></li>
                                    <li> <a  href="#" style="color:#0071cc;">About Us</a></li>
                                    <li> <a   href="#" style="color:#0071cc;">Contact Us</a></li>
                                    <li> <a  href="#" style="color:#0071cc;">Support</a></li>
                                    <li> <a  href="#" style="color:#0071cc;">Privacy Policy</a></li>

                                    </li>
                                    @guest
                                        <li class="dropdown login-signup ml-lg-2"><a class="dropdown-toggle pl-lg-4 pr-0"  href="{{ route('login') }}" title="{{ __('Login/Register') }}" style="color:#0071cc;">{{ __('Login/Register') }} <span class="d-none d-lg-inline-block"></span></a>
                                            <ul class="dropdown-menu">
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route('login') }}" style="color:#0071cc;">{{ __('Login') }}</a></li>
                                                <li><a class="dropdown-item" href="{{ route('register') }}" style="color:#0071cc;">{{ __('Sign Up') }}</a></li>

                                            </ul>
                                        </li>
                                    @endguest
                                    @auth
                                        <li class="dropdown login-signup ml-lg-2"><a class="dropdown-toggle pl-lg-4 pr-0"  href="{{ route('dashboard') }}" title="{{ auth()->user()->name }}" style="color:#0071cc;">{{ auth()->user()->name }} <span class="d-none d-lg-inline-block"><i class="fas fa-user"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('settings') }}" style="color:#0071cc;">{{ __('Settings') }}</a></li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}" style="color:#0071cc;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </nav>          <!-- Primary Navigation end -->
                    </div>

                    <!-- Collapse Button
                    ============================================= -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
                </div>
            </div>
        </header>
        <!-- Header end -->
        <main class="py-4">
            <!-- Content
============================================= -->

            <div id="content">
                @yield('content')
            </div>
            <!-- Content end -->
        </main>
    </div>
    <!-- Footer
  ============================================= -->
    <footer id="footer">
        <section class="section bg-light shadow-md pt-4 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="featured-box text-center">
                            <div class="featured-box-icon"> <i class="fas fa-user"></i> </div>
                            <h4>{{ __('Register') }}</h4>
                            <p>{{ __('Complete registration using a valid coupon code obtained from official vendor.') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="featured-box text-center">
                            <div class="featured-box-icon"> <i class="fas fa-book"></i> </div>
                            <h4>{{ __('Take a course') }}</h4>
                            <p>{{ __('Get access to all available course content') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="featured-box text-center">
                            <div class="featured-box-icon"> <i class="fas fa-users"></i> </div>
                            <h4>{{ __('Refer & Earn') }}</h4>
                            <p>{{ __('Invite two friends to sign up using your username or link and Your two downline also invite one person each.') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="featured-box text-center">
                            <div class="featured-box-icon"> <i class="fas fa-money-bill-wave"></i> </div>
                            <h4>{{ __('Get Paid') }}</h4>
                            <p>{{ __('Once the chain is completed, click withdraw earning and you get paid within 24 hours') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="footer-copyright">
                <ul class="nav justify-content-center">
                    <li class="nav-item"> <a class="nav-link " href="#">{{ __('Buy Coupon') }}</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">{{ __('Contact') }}</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">{{ __('Support') }}</a> </li>
                </ul>
                <p class="copyright-text"> {{ __('@ 2021') }} <a href="{{ route('home') }}">{{ __('Gemstone') }}</a>{{ __('. All Rights Reserved  |') }}</p>
            </div>
        </div>
    </footer>
</body>
</html>
