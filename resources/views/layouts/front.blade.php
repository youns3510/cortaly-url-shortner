<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>@yield('title') | {{ config('app.name', 'Cortaly - URL Shortner') }}</title>




        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
       
        @stack('styles')
    </head>

    <body>
        <!--============= ScrollToTop Section Starts Here =============-->
        <div class="overlayer" id="overlayer">
            <div class="loader">
                <div class="loader-inner"></div>
            </div>
        </div>
        <a href="#" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
        <div class="overlay"></div>
        <!--============= ScrollToTop Section Ends Here =============-->

        <!--============= Header Section Starts Here =============-->
        <header class="header-section">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu">
                        <li><a href="{{route('home')}}">Home</a> </li>
                        <li><a href="{{route('home.payout-rates')}}">Payout Rates</a> </li>
                        <li><a href="{{route('home.faq')}}">Faq</a> </li>
                        <li><a href="{{route('home.blog')}}">Blog</a></li>






                        @auth


                        <li>
                            <a href="{{route('dashboard')}}"> {{ Auth::user()->name }}</a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();                                                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>


                        @endauth








                    </ul>
                    <div class="header-bar d-lg-none mr-sm-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    @guest
                    <div class="header-right">

                        @if (Route::has('login'))

                        <a href="{{ route('login') }}" class="header-button d-none d-sm-inline-block m-0 active">{{
                            __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="header-button d-none d-sm-inline-block m-0">{{
                            __('Register') }}
                        </a>

                        @endif
                    </div>
                    @endguest

                </div>
            </div>
        </header>
        <!--============= Header Section Ends Here =============-->
        @if(!request()->routeIs('home'))
        <!--============= Page Header Section Starts Here =============-->
        <section class="page-header">
            <div class="banner-bg bg_img" data-background="{{asset('images/banner/banner-bg.jpg')}}">
                <div class="banner-bg-shape"><img src="{{asset('images/banner/banner-shape.png')}}" alt="banner"></div>
                <div class="round-1">
                    <img src="{{asset('images/banner/01.png')}}" alt="banner">
                </div>
                <div class="round-2">
                    <img src="{{asset('images/banner/02.png')}}" alt="banner">
                </div>
            </div>
            <div class="container">
                <div class="hero-content">
                    <h1 class="title">@yield('title')</h1>
                </div>
            </div>
        </section>
        <!--============= Page Header Section Ends Here =============-->
        @endif




        @yield('content')


        <!--============= Footer Section Starts Here =============-->
        <footer class="footer-section padding-top">
            <div class="footer-bg bg_img" data-background="{{asset('images/footer/footer-bg.jpg')}}"></div>
            <div class="footer-bg d-md-block d-none"><img src="{{asset('images/footer/wave.png')}}" alt="footer"></div>
            <div class="container">
                <div class="section-header cl-white-499">
                    <h5 class="cate">Contact Us</h5>
                    <h2 class="title">Get in touch!</h2>
                    <p>We thrive to ensure that you get the most out of your experience</p>
                </div>
                <form class="contact-form" id="contact_form_submit">
                    <div class="form-group">
                        <label for="name">Your Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="form-group check-group">
                        <input type="checkbox" id="check" required>
                        <label for="check">I agree to receive emails, newsletters and promotional messages</label>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
                <div class="footer-top">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('images/logo/footer-logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="#"><img src="{{asset('images/footer/neteller.png')}}" alt="footer"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('images/footer/skrill.png')}}" alt="footer"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('images/footer/paypal.png')}}" alt="footer"></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-area">
                        <div class="left cl-white">
                            <p>&copy; Copyright 2020 | <a href="#">Cortaly</a> By UIAXIS</p>
                        </div>
                        <ul class="social-icons">
                            <li>
                                <a href="#" class="active">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--============= Footer Section Ends Here =============-->




        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/waypoints.js')}}"></script>
        <script src="{{asset('js/nice-select.js')}}"></script>
        <script src="{{asset('js/counterup.min.js')}}"></script>
        <script src="{{asset('js/owl.min.js')}}"></script>
        <script src="{{asset('js/magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/paroller.js')}}"></script>
        <script src="{{asset('js/contact.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>

        @stack('scripts')
    </body>

</html>