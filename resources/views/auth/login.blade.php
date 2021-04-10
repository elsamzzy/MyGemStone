@extends('layouts.app')

@section('content')
        <div class="container">
            <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a id="login-page-tab" class="nav-link active text-4" data-toggle="tab" href="{{ route('login') }}" role="tab" aria-controls="login" aria-selected="true">{{ __('Login') }}</a> </li>
                    <li class="nav-item"> <a id="signup-page-tab" class="nav-link text-4"  href="{{ route('register') }}" role="tab">{{ __('Register') }}</a> </li>
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
                        <form action="{{ route('login') }}"  method="post">
                            @csrf
                            <div class="form-group">
                                <input id="username"  placeholder="Enter Your Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" required autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input  id="password" placeholder="Enter Your Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm">
                                    <div class="form-check custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
