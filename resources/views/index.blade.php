@extends('layouts.app')

@section('content')
    <div class="hero-wrap py-2 py-md-3 py-lg-4">
        <div class="hero-mask opacity-3 bg-dark"></div>
        <div class="hero-bg" style="background-image:url('{{ asset('img/bg/image-6.jpg') }}');"></div>
        <div class="hero-content py-3 py-lg-5 my-3 my-md-5">
            <div class="container">
                <!-- Tabs -->
                <!-- Welcome Text
                ============================================= -->
                <!-- Tabs -->
                <div class="tab-content  shadow-md rounded rounded-top-0 px-4 pt-4 pb-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="form-row">
                            <div class="offset-lg-2  col-lg-8 form-group">
                                <div class="text-center mt-5">
                                    <h2 class="text-9 font-weight-300 text-light text-center">{{ __('Get equipped with information that will shape your finance.') }}<br/>
                                        <small>{{ __('refer and earn today') }}</small></h2>
                                    @guest
                                        <a class="btn btn-outline-light mt-3 mt-md-4"  href="{{ route('login') }}" title="{{ __('Get Started') }}">{{ __('Get Started') }}</a>
                                    @elseguest
                                        <a class="btn btn-outline-light mt-3 mt-md-4"  href="{{ route('dashboard') }}" title="{{ __('YOur Dashboard') }}">{{ __('Visit Your Dashboard') }}</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabs End -->
            </div>
        </div>
    </div>
    <!-- Why choose
    ============================================= -->
    <section class="section bg-light shadow-md">
        <div class="container">

            <h2 class="text-9 font-weight-500 text-center">{{ __('Why Choose Gemstone?') }}</h2>
            <p class="lead text-center mb-5">{{ __('a platform where you mine both knowledge and money!') }}</p>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="fas fa-piggy-bank"></i> </div>
                                <h3>{{ __('affordable plans') }}</h3>
                                <p>{{ __('plans available at a pocket friendly rates') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="fas fa-rocket"></i> </div>
                                <h3>{{ __('Fast') }}</h3>
                                <p>{{ __('Get your coupon and do your registration on the go!') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="fas fa-file-alt"></i> </div>
                                <h3>{{ __('Simple') }}</h3>
                                <p>{{ __('complete your 4 persons matrix and withdraw.') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="fas fa-hands-helping"></i> </div>
                                <h3>{{ __('Trust pay') }}</h3>
                                <p>{{ __('100% Payment Protection.') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="fas fa-lock"></i> </div>
                                <h3>{{ __('100% Secure') }} </h3>
                                <p>{{ __('personal information are secured') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box mb-5 style-3">
                                <div class="featured-box-icon border text-primary rounded-circle"> <i class="far fa-life-ring"></i> </div>
                                <h3>{{ __('24X7 Support') }}</h3>
                                <p>{{ __('We are here to help. Have a query and need help? ') }}<a href="#">Click here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why choose end -->
    <!-- Refer & Earn
    ============================================= -->
    <section class="hero-wrap section shadow-md">
        <div class="hero-mask opacity-5 bg-dark"></div>
        <div class="hero-bg" style="background-image:url('{{ asset('img/bg/image-3.jpg') }}');"></div>
        <div class="hero-content">
            <div class="container">
                <h2 class="text-9 font-weight-500 text-light text-center">{{ __('Available Packages') }}</h2>
                <p class="lead text-light opacity-8 text-center mb-5">{{ __('Select from our range of packages') }}</p>
                <div class="row">
                    <div class="col-md-4 mt-3 mt-md-0">
                        <div class="featured-box text-center p-4">
                            <div class="hero-mask opacity-7 bg-dark rounded"></div>
                            <div class="hero-content">
                                <div class="featured-box-icons shadow-none text-light"> <i class="fas ">{{ __('Regular 1') }}</i> </div>
                                <hr style="background-color:white"/>
                                <h3 class="text-light"></h3>
                                <h2  class="text-center text-capitalize text-light opacity-8">{{ __('₦1,000') }}</h2>

                                <span class="badge badge-primary badge-pill">{{ __('3 Levels') }}</span>
                                <p class="text-3 text-light opacity-8">{{ __('₦2,500 Returns') }}</p>
                                <hr style="background-color:white"/>
                                <p class="text-3 text-light opacity-8">{{ __('Total Downlines: 4') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <div class="featured-box text-center p-4">
                            <div class="hero-mask opacity-7 bg-primary rounded"></div>
                            <div class="hero-content">
                                <div class="featured-box-icons shadow-none text-light"> <i class="fas ">{{ __('business') }}</i> </div>
                                <hr style="background-color:white"/>
                                <h3 class="text-light"></h3>
                                <h2  class="text-center text-capitalize text-light opacity-8">{{ __('₦2,000') }}</h2>

                                <span class="badge badge-info badge-pill">{{ __('3 Levels') }}</span>
                                <p class="text-3 text-light opacity-8">{{ __('₦5,000 Returns') }}</p>
                                <hr style="background-color:white"/>
                                <p class="text-3 text-light opacity-8">{{ __('Total Downlines: 4') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <div class="featured-box text-center p-4">
                            <div class="hero-mask opacity-7 bg-dark rounded"></div>
                            <div class="hero-content">
                                <div class="featured-box-icons shadow-none text-light"> <i class="fas ">{{ __('VIP') }}</i> </div>
                                <hr style="background-color:white"/>
                                <h3 class="text-light"></h3>
                                <h2  class="text-center text-capitalize text-light opacity-8">{{ __('4,000') }}</h2>

                                <span class="badge badge-primary badge-pill">{{ __('3 Levels') }}</span>
                                <p class="text-3 text-light opacity-8">{{ __('₦10,000 Returns') }}</p>
                                <hr style="background-color:white"/>
                                <p class="text-3 text-light opacity-8">{{ __('Total Downlines: 4') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-5">
                    @guest
                        <a class="btn btn-outline-light shadow-none"  href="{{ route('login') }}" title="{{ __('Get Started') }}">{{ __('Get Started') }}</a>
                    @elseguest
                        <a class="btn btn-outline-light shadow-none"  href="{{ route('dashboard') }}" title="{{ __('YOur Dashboard') }}">{{ __('Visit Your Dashboard') }}</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- Refer & Earn end -->

    </div>
    <!-- Content end -->
@endsection
