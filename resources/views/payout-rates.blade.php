@extends('layouts.front')
@section('title', 'Payout Rates')
@section('content')


    <!--============= Publisher Section Starts Here =============-->
    <div class="publisher-section">
        <div class="container">
            <div class="row mb-30-none justify-content-center mt--150">
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="{{asset('images/publisher/01.png')}}" alt="publisher">
                            </div>
                            <h4 class="title">Pay Per View</h4>
                            <p>Get Paid For Every View To Your Link</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="{{asset('images/publisher/02.png')}}" alt="publisher">
                            </div>
                            <h4 class="title">All Countries</h4>
                            <p>No matter what Country is ,
                                You'll still get Paid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="publisher-item">
                        <div class="publisher-inner">
                            <div class="thumb">
                                <img src="{{asset('images/publisher/03.png')}}" alt="publisher">
                            </div>
                            <h4 class="title">35% Per Referral</h4>
                            <p>Earn More When your bring
                                a Friend to us, Up to 35%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= Publisher Section Ends Here =============-->


    <!--============= Payout Section Starts Here =============-->
    <section class="payout-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-header mw-100">
                        <h5 class="cate">PAYOUT RATES</h5>
                        <h2 class="title">We offer you the best</h2>
                        <p>We pay for ALL legitimate visitor you bring to your links. Multiple views from the same viewer
                            are also counted thus you will be benefiting from all your traffic.</p>
                    </div>
                </div>
            </div>
            <div class="payout-wrapper">
                <div class="payout-area">
                    <ul class="payout-header">
                        <li>
                            Package Description / Country
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('images/payout/icon1.png')}}" alt="payout">
                            </div>
                            <div class="content">
                                <h5 class="subtitle">Desktop</h5>
                                <p>Earnings per 1000 Views</p>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('images/payout/icon2.png')}}" alt="payout">
                            </div>
                            <div class="content">
                                <h5 class="subtitle">Mobile / Tablet</h5>
                                <p>Earnings per 1000 Views</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="payout-rates">
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/us.png')}}" alt="payout">
                                </div>
                                <div class="content">United States</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/canada.png')}}" alt="payout">
                                </div>
                                <div class="content">Canada</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/uk.png')}}" alt="payout">
                                </div>
                                <div class="content">United Kingdom</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/ger.png')}}" alt="payout">
                                </div>
                                <div class="content">Germany</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/france.png')}}" alt="payout">
                                </div>
                                <div class="content">France</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/egypt.png')}}" alt="payout">
                                </div>
                                <div class="content">Egypt</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/uae.png')}}" alt="payout">
                                </div>
                                <div class="content">United Arab Emirates</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/italy.png')}}" alt="payout">
                                </div>
                                <div class="content">Italy</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/spain.png')}}" alt="payout">
                                </div>
                                <div class="content">Spain</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/bra.png')}}" alt="payout">
                                </div>
                                <div class="content">Brazil</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/mexico.png')}}" alt="payout">
                                </div>
                                <div class="content">Mexico</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/turky.png')}}" alt="payout">
                                </div>
                                <div class="content">Turky</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/alg.png')}}" alt="payout">
                                </div>
                                <div class="content">Algeria</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/tuni.png')}}" alt="payout">
                                </div>
                                <div class="content">Tunisia</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                        <li>
                            <div class="payout-contry">
                                <div class="thumb">
                                    <img src="{{asset('images/payout/bah.png')}}" alt="payout">
                                </div>
                                <div class="content">Bahrain</div>
                            </div>
                            <div class="dextop-amount">$11.00</div>
                            <div class="mobile-amount">$10.80</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--============= Payout Section Ends Here =============-->


    <!--============= Call In Action Section Starts Here =============-->
    <section class="call-in-action padding-top padding-bottom section-bg text-center">
        <div class="container">
            <div class="section-header mb-low">
                <h5 class="cate">JOIN US NOW</h5>
                <h2 class="title">Boost Your Earnings</h2>
                <p>Sign up for free and become one of the millions of people around the world
                    who have fallen in love with Cortaly</p>
            </div>
            <a href="payout-rates.html#0" class="custom-button">Start earning now!</a>
        </div>
    </section>
    <!--============= Call In Action Section Ends Here =============-->

@endsection
