@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a id="signup-page-tab" class="nav-link active text-4" data-toggle="tab"role="tab" aria-controls="signup" aria-selected="true">{{ __('Register') }}</a> </li>
                <li class="nav-item"> <a id="login-page-tab" class="nav-link  text-4"  href="{{ route('login') }}" role="tab" aria-controls="login" >{{ __('Login') }}</a> </li>
            </ul>
            <div class="tab-content pt-4">

                <div class="tab-pane fade show active" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @if(session('status')) is-invalid @endif @error('refid') is-invalid @enderror" name="refid"  value="{{ old('refid') ? 'Admin' : 'Admin' }}" placeholder="Referal ID" required autofocus>
                            @if(session('status'))
                                <span class="text-center text-danger" role="alert">
                                    <strong>{{ session('status') }}</strong></br>
                                </span>
                            @endif
                            @error('refid')
                                <span class="text-center invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="text-info"> Enter the username of your upline. Leave Admin as your upliner if you have no upliner.</small>
                        </div>

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="text-center invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="username" type="text" class="form-control  @error('username') is-invalid @enderror" placeholder="User Name" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                            <span class="text-center invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-center invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" required placeholder="Mobile Number" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-center invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <p>{{ __('Disclaimer') }}</p>
                    <p>{{ __('Networking involves risk. Only risk capital you are prepared to loose. However with the knowledge you will acquire is worth more than your sign up capital.') }}</p>
                </div>

            </div>
        </div>
    </div>


@endsection
