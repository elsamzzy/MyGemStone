@extends('layouts.app')

@section('content')
    @if(session('bank'))
        <span class="text-center text-success" role="alert">
            <strong>{{ session('bank') }}</strong></br>
        </span>
    @endif
    @if(session('pass'))
        <span class="text-center text-success" role="alert">
            <strong>{{ session('pass') }}</strong></br>
        </span>
    @endif
    <div id="contentrew" style="background-image:url('{{ asset('img/bg/image-6.jpg') }}');">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ __('Settings') }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Settings') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false">Change Bank Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab-simple" data-toggle="tab" href="#contact-simple" role="tab" aria-controls="contact" aria-selected="false">Change Password</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                <div class="lead"> {{ __('Full Name: ') }}&nbsp;&nbsp;
                                    {{ auth()->user()->name }}
                                </div>
                                &nbsp;&nbsp;
                                <div class="lead">{{ __('Username: ') }}  &nbsp;&nbsp;
                                    {{ auth()->user()->username }}
                                </div>
                                &nbsp;&nbsp;
                                <div class="lead">{{ __('Phone Number: 0') }}{{auth()->user()->phone}}</div>
                                &nbsp;&nbsp;
                                <div class="lead">{{ __('Email Address: ') }}  &nbsp;&nbsp;
                                    {{ auth()->user()->email }}
                                </div>
                                &nbsp;&nbsp;
                                <div class="lead">{{ __('Your Plan: ') }}&nbsp;&nbsp;
                                    {{ $coupon->plan() }} Plan
                                </div>
                                &nbsp;&nbsp;
                                <div class="lead">{{ __('Referrals: ') }}  &nbsp;&nbsp;
                                    {{ $user->referal(auth()->user()) }}{{ __('/2') }}
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                <div class="lead">{{ __('Bank Name: ') }} &nbsp;&nbsp;
                                    {{ auth()->user()->bank }}
                                </div>
                                <div class="lead">{{ __('Bank Account Name: ') }} &nbsp;&nbsp;
                                    {{ auth()->user()->account_name }}
                                </div>
                                <div class="lead">{{ __('Bank Account Number: ') }} &nbsp;
                                    {{ auth()->user()->account_number }}
                                </div>
                                &nbsp;&nbsp;
                                <center>
                                    <div class="lead"> <h4 styles="padding_left:40px">{{ __('Change Bank Details') }}</h4>&nbsp;&nbsp;</div>
                                </center>
                                <section>
                                    <form method="POST" action="{{ route('settings.bank') }}">
                                        @csrf
                                        <center>
                                            <div class="lead col-md-8">{{ __('Bank Name: ') }}
                                                <input type="text" class="form-control @error('bank') is-invalid @enderror" name="bank"  value ="{{ auth()->user()->bank }}" placeholder="Bank Name" required autofocus>
                                                @error('bank')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        &nbsp;&nbsp;
                                        <center>
                                            <div class="lead col-md-8">{{ __('Bank Account Name: ') }}
                                                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name"  value ="{{ auth()->user()->account_name }}" placeholder="Bank Account Name" required autofocus>
                                                @error('account_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        &nbsp;&nbsp;
                                        <center>
                                            <div class="lead col-md-8">{{ __('Bank Account Number: ') }}
                                                <input type="number" class="form-control @error('account_number') is-invalid @enderror" name="account_number"  value ="{{ auth()->user()->account_number }}" placeholder="Bank Account Number" required autofocus>
                                                @error('account_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        &nbsp;&nbsp;
                                        <center>
                                            <div class="lead col-md-8">{{ __('Enter Password: ') }}
                                                <input type="password" class="form-control @error('password') is-invalid @enderror @if(session('password')) is-invalid @endif" name="password" placeholder="Your Password" required autofocus>
                                                @if(session('password'))
                                                    <span class="text-center text-danger" role="alert">
                                                        <strong>{{ session('password') }}</strong></br>
                                                    </span>
                                                @endif
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        &nbsp;&nbsp;
                                        <center><button type="submit" class="btn btn-secondary">{{ __('Submit') }}</button></center>
                                    </form>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="contact-simple" role="tabpanel" aria-labelledby="contact-tab-simple">
                                <form method="POST" action="{{ route('settings.password') }}">
                                    @method('put')
                                    @csrf
                                    <center>
                                        <div class="lead col-md-8">{{ __('Your Current Password: ') }}
                                            <input type="password" class="form-control @error('old_password') is-invalid @enderror @if(session('pass_error')) is-invalid @endif" name="old_password" placeholder="Your Current Password" required autofocus>
                                        </div>
                                        @if(session('pass_error'))
                                            <span class="text-center text-danger" role="alert">
                                                <strong>{{ session('pass_error') }}</strong></br>
                                            </span>
                                        @endif
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>></br>
                                            </span>
                                        @enderror
                                    </center>
                                    &nbsp;&nbsp;
                                    <center>
                                        <div class="lead col-md-8">{{ __('Your New Password: ') }}
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autofocus>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </center>
                                    &nbsp;&nbsp;
                                    <center>
                                        <div class="lead col-md-8">{{ __('Confirm Password: ') }}
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autofocus>
                                        </div>
                                    </center>
                                    &nbsp;&nbsp;
                                    <center><button type="submit" class="btn btn-secondary">{{ __('Change Password') }}</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection