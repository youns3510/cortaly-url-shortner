@extends('layouts.front')
@section('title', 'Home')

@pushOnce('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    .text-danger,
    .text-success {
        padding-left: 25px;
        margin-top: -25px;
    }

    .text-bold {
        font-weight: bold
    }

    .copy-btn {

        color: #ffffff;
        border: 1px solid #ee4730;
        -webkit-border-radius: 30px 0 0 30px;
        -moz-border-radius: 30px 0 0 30px;
        border-radius: 30px 0 0 30px;

        padding: 0 25px;
        font-size: 37px;

        background: -moz-linear-gradient(-94deg, #e74179 0%, #fe7a6a 84%);
        background: -webkit-linear-gradient(-94deg, #e74179 0%, #fe7a6a 84%);
        background: -ms-linear-gradient(-94deg, #e74179 0%, #fe7a6a 84%);
        box-shadow: 0px 19px 56px 0px rgba(0, 0, 0, 0.2);

    }
</style>
@endpushOnce
@pushOnce('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script>
    new ClipboardJS('.copy-btn');
</script>
@include('partial.toaster')
@endpushOnce


@section('content')

<!--============= Banner Section Starts Here =============-->
<section class="banner-section">
    <div class="banner-bg bg_img" data-background="{{ asset('images/banner/banner-bg.jpg') }}">
        <div class="banner-bg-shape"><img src="{{ asset('images/banner/banner-shape.png') }}" alt="banner"></div>
        <div class="round-1">
            <img src="{{ asset('images/banner/01.png') }}" alt="banner">
        </div>
        <div class="round-2">
            <img src="{{ asset('images/banner/02.png') }}" alt="banner">
        </div>
    </div>
    <div class="container">
        <div class="banner-content">
            <h3 class="cate">SHORTEN URLS AND</h3>
            <h1 class="title">Earn Money</h1>
            <p>Transforming long, ugly links into Shorten URLs and earn big money. Get paid by every person who
                visits your URLs.</p>
        </div>
        <div class="banner-form-group" id="shorter">
            <h3 class="subtitle">Shorten URL Is Just Simple</h3>


            <form class="banner-form" action="{{ route('short.store') }}" method="POST">
                @method('POST')
                @csrf
                <input type="text" placeholder="Your URL here" name="long-url" required>
                <button type="submit">Shorten <i class="flaticon-startup"></i></button>

                @error('long-url')
                <small class="in-valid text-danger">{{ $message }}</small>
                @enderror

                @if (session('status') == 'error')
                <p class="text-danger text-bold">{{ session('status-msg') }}</p>
                @endif
            </form>
            @if (session('status') == 'success')
            <div class="form-inline mb-5 banner-form">
                <div class="input-group mb-2 mr-sm-2 w-100">
                    <div class="input-group-prepend">
                        <div class="input-group-text copy-btn" data-clipboard-target="#short-link">
                            <i class="fas fa-copy"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="short-link" value="{{ session('status-msg') }}">
                </div>
            </div>
            @endif









            <div class="banner-counter">
                <div class="counter-item">
                    <h2 class="counter-title"><span class="counter">{{$total_urls}}</span>+</h2>
                    <p>Links clicked per day</p>
                </div>
                <div class="counter-item">
                    <h2 class="counter-title"><span class="counter">{{$total_clicks}}</span>+</h2>
                    <p>Shortened links in total</p>
                </div>
                <div class="counter-item">
                    <h2 class="counter-title"><span class="counter">1,180,000</span>+</h2>
                    <p>Happy users registered</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= Why Section Starts Here =============-->
<section class="why-section padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-lg-100">
                <div class="section-header left-style mb-lg-0 sticky-header mb-low ml-0">
                    <h2 class="title">
                        Why Join Us?
                    </h2>
                    <p>Cortaly is a completely free tool where you can create short links, which apart from being
                        free, you get paid! So, now you can make money from home, when managing and protecting your
                        links.</p>
                    <a href="#" class="custom-button active mt-2">Create Your Account</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="{{ asset('images/why/01.png') }}" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">JOIN OUR NETWORK</h5>
                        <p>Signup for an account in just one minute, shorten URLs and
                            sharing your links to everywhere. And you'll be paid from any views.</p>
                    </div>
                </div>
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="{{ asset('images/why/02.png') }}" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">HIGHEST RATES</h5>
                        <p>Make the most out of your traffic with our always increasing rates. You are required to
                            earn only $5.00 before you will be paid.</p>
                    </div>
                </div>
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="{{ asset('images/why/03.png') }}" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">PAYMENTS ON TIME</h5>
                        <p>We provide full mobile supports, you can even shorten the URL, control your account and
                            view the stats on a mobile device.</p>
                    </div>
                </div>
                <div class="choose-item">
                    <div class="choose-thumb">
                        <img src="{{ asset('images/why/04.png') }}" alt="why">
                    </div>
                    <div class="choose-content">
                        <h5 class="title">RESPONSIVE UI</h5>
                        <p>Request payments whenever you want and get your payments on 1st day and 15th day of every
                            month. Enjoy you Spendings!!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Why Section Ends Here =============-->


<!--============= Feature Section Starts Here =============-->
<section class="feature-section padding-top oh padding-bottom pb-lg-half bg_img pos-rel"
    data-background="{{ asset('images/feature/feature-bg.jpg') }}">
    <div class="top-shape d-none d-md-block">
        <img src="{{ asset('css/img/top-shape.png') }}" alt="css">
    </div>
    <div class="bottom-shape d-none d-md-block mw-0">
        <img src="{{ asset('css/img/bottom-shape.png') }}" alt="css">
    </div>
    <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground"
        data-paroller-direction="horizontal">
        <img src="{{ asset('images/balls/1.png') }}" alt="balls">
    </div>
    <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground"
        data-paroller-direction="horizontal">
        <img src="{{ asset('images/balls/2.png') }}" alt="balls">
    </div>
    <div class="ball-4" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground"
        data-paroller-direction="horizontal">
        <img src="{{ asset('images/balls/3.png') }}" alt="balls">
    </div>
    <div class="ball-5" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground"
        data-paroller-direction="vertical">
        <img src="{{ asset('images/balls/4.png') }}" alt="balls">
    </div>
    <div class="ball-6" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground"
        data-paroller-direction="horizontal">
        <img src="{{ asset('images/balls/5.png') }}" alt="balls">
    </div>
    <div class="ball-7" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground"
        data-paroller-direction="vertical">
        <img src="{{ asset('images/balls/6.png') }}" alt="balls">
    </div>
    <div class="container">
        <div class="section-header cl-white">
            <!-- <h5 class="cate">Choose a plan that's right for you</h5> -->
            <h2 class="title mt-md-0">All Features</h2>
            <p>
                Mosto has plans, from free to paid, that scale with your needs. Subscribe to a plan that fits the
                size of your business.
            </p>
        </div>
        <div class="tab">
            <ul class="tab-menu feature-tab">
                <li>
                    <div class="thumb">
                        <img src="{{ asset('images/feature/01.png') }}" alt="feature">
                    </div>
                    <div class="content">%99 Uptime</div>
                </li>
                <li>
                    <div class="thumb">
                        <img src="{{ asset('images/feature/02.png') }}" alt="feature">
                    </div>
                    <div class="content">Easy Dashboard</div>
                </li>
                <li>
                    <div class="thumb">
                        <img src="{{ asset('images/feature/03.png') }}" alt="feature">
                    </div>
                    <div class="content"> Referral Program</div>
                </li>
                <li>
                    <div class="thumb">
                        <img src="{{ asset('images/feature/04.png') }}" alt="feature">
                    </div>
                    <div class="content">1CLICK Script Installs</div>
                </li>
                <li>
                    <div class="thumb">
                        <img src="{{ asset('images/feature/05.png') }}" alt="feature">
                    </div>
                    <div class="content">Support</div>
                </li>
            </ul>
            <div class="tab-area">
                <div class="tab-item active">
                    <div class="feature-item">
                        <h3 class="title"> %99 Uptime</h3>
                        <p>We guarantee that our network will be up and functioning 99.9% of the time per
                            month. We feel a safety net of .1% each month allows us time for repairs and
                            unforeseen events that may arise. Furthermore, you can view our network status
                            24 hours a day 365 days a year.</p>
                    </div>
                </div>
                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">Easy Dashboard</h3>
                        <p>We guarantee that our network will be up and functioning 99.9% of the time per
                            month. We feel a safety net of .1% each month allows us time for repairs and
                            unforeseen events that may arise. Furthermore, you can view our network status
                            24 hours a day 365 days a year.</p>
                    </div>
                </div>
                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">Referral Program</h3>
                        <p>We guarantee that our network will be up and functioning 99.9% of the time per
                            month. We feel a safety net of .1% each month allows us time for repairs and
                            unforeseen events that may arise. Furthermore, you can view our network status
                            24 hours a day 365 days a year.</p>
                    </div>
                </div>
                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">1CLICK Script Installs</h3>
                        <p>We guarantee that our network will be up and functioning 99.9% of the time per
                            month. We feel a safety net of .1% each month allows us time for repairs and
                            unforeseen events that may arise. Furthermore, you can view our network status
                            24 hours a day 365 days a year.</p>
                    </div>
                </div>
                <div class="tab-item">
                    <div class="feature-item">
                        <h3 class="title">Support</h3>
                        <p>We guarantee that our network will be up and functioning 99.9% of the time per
                            month. We feel a safety net of .1% each month allows us time for repairs and
                            unforeseen events that may arise. Furthermore, you can view our network status
                            24 hours a day 365 days a year.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Feature Section Ends Here =============-->


<!--============= How Section Starts Here =============-->
<section class="how-section padding-top padding-bottom pt-md-half pb-max-lg-0">
    <div class="container">
        <div class="section-header mb-low">
            <h2 class="title mb-0">How to start</h2>
        </div>
        <div class="row justify-content-center mb--40">
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="how-item">
                    <div class="how-thumb">
                        <img src="{{ asset('images/how/how1.png') }}" alt="how">
                    </div>
                    <div class="how-content">
                        <h6 class="title">CREATE AN ACCOUNT</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="how-item">
                    <div class="how-thumb">
                        <img src="{{ asset('images/how/how2.png') }}" alt="how">
                    </div>
                    <div class="how-content">
                        <h6 class="title">SHORTEN YOUR LINK</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="how-item">
                    <div class="how-thumb">
                        <img src="{{ asset('images/how/how3.png') }}" alt="how">
                    </div>
                    <div class="how-content">
                        <h6 class="title">Earn Money</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= How Section Ends Here =============-->


<!--============= Testimonial Section Starts Here =============-->
<section class="testimonial-section padding-top padding-bottom pos-rel oh">
    <div class="ball-3 style2 d-none d-lg-block" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="{{ asset('images/client/circle2.png') }}" alt="client">
    </div>
    <div class="ball-6 style2 d-none d-lg-block" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
        data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="{{ asset('images/client/circle1.png') }}" alt="client">
    </div>
    <div class="container">
        <div class="row justify-content-between flex-wrap-reverse align-items-center">
            <div class="col-lg-7">
                <div class="testimonial-wrapper style-two">
                    <a href="#" class="testi-next trigger">
                        <img src="{{ asset('images/client/left.png') }}" alt="client">
                    </a>
                    <a href="#" class="testi-prev trigger">
                        <img src="{{ asset('images/client/right.png') }}" alt="client">
                    </a>
                    <div class="testimonial-area testimonial-slider owl-carousel owl-theme">
                        <div class="testimonial-item">
                            <div class="testimonial-thumb">
                                <div class="thumb">
                                    <img src="{{ asset('images/client/client1.jpg') }}" alt="client">
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur scing elit. Aliquam in nulla rhoncus,
                                    dapibus orci nec, venenatis eros.
                                </p>
                                <h5 class="title"><a href="#">Bela Bose</a></h5>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-thumb">
                                <div class="thumb">
                                    <img src="{{ asset('images/client/client1.jpg') }}" alt="client">
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="ratings">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur scing elit. Aliquam in nulla rhoncus,
                                    dapibus orci nec, venenatis eros.
                                </p>
                                <h5 class="title"><a href="#">Raihan Rafuj</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5">
                <div class="testi-wrapper">
                    <div class="testi-header">
                        <div class="section-header left-style mb-lg-0">
                            <h5 class="cate">Testimonials</h5>
                            <h2 class="title">5000+ happy clients all around the world</h2>
                            <a href="#" class="button-3 active mt-md-2">Leave a review <i
                                    class="flaticon-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Testimonial Section Ends Here =============-->


<!--============= Call In Action Section Starts Here =============-->
<section class="call-in-action padding-top padding-bottom section-bg text-center">
    <div class="container">
        <div class="section-header mb-low">
            <h5 class="cate">JOIN US NOW</h5>
            <h2 class="title">Boost Your Earnings</h2>
            <p>Sign up for free and become one of the millions of people around the world
                who have fallen in love with Cortaly</p>
        </div>
        <a href="#" class="custom-button">Start earning now!</a>
    </div>
</section>
<!--============= Call In Action Section Ends Here =============-->
@endsection