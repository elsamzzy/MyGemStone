@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
            <div class="tab-content pt-4">
                <div class="tab-pane fade show active" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab">
                    <form method="POST" action="{{ route('password') }}">
                        @csrf
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autofocus>
                            @error('password')
                                    <span class="text-center invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autofocus>
                        </div>
                        <div class="form-group">
                            <center><a class="text-danger"><b>{{ __('NOTE:') }}</b>{{ __('Password cannot be reset if forgotten. Please save password somewhere secured.') }} </a></center>
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