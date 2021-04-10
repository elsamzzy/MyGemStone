@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item"> <a id="signup-page-tab" class="nav-link active text-4" data-toggle="tab"role="tab" aria-controls="signup" aria-selected="true">Sign Up</a> </li>

            </ul>
            <div class="tab-content pt-4">

                <div class="tab-pane fade show active" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab">
                    <form method="POST" action="{{ route('coupon') }}">
                        @csrf
                        <div class="form-group">
                            <input id="coupon" type="text" class="form-control @error('coupon') is-invalid @enderror" placeholder="Coupon Code" name="coupon" value="{{ old('coupon') }}" required autofocus>
                            @if(session('status'))
                                <span class="text-center text-danger" role="alert">
                                    <strong>{{ session('status') }}</strong></br>
                                </span>
                            @endif
                            @error('coupon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="text-danger"  href="#"> Get coupon code</a>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="checkbox @error('checkbox') is-invalid @enderror" name="checkbox" required/>{{ __('I accept the ') }}<a href="#">{{ __('Terms and Condition') }}s</a>
                            @error('checkbox')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Finish Registering') }}
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