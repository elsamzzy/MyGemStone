@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a id="signup-page-tab" class="nav-link active text-4" data-toggle="tab"role="tab" aria-controls="signup" aria-selected="true">{{ __('Sign Up') }}</a> </li>
            </ul>
            <div class="tab-content pt-4">

                <div class="tab-pane fade show active" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab"></div>
                <form method="POST" action="{{ route('bank') }}" role="form">
                    @csrf
                    <div class="form-group">
                        <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" placeholder="Bank Name" name="bank" value="{{ old('bank') }}" required autofocus>
                        @error('bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Account Name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" placeholder="Account Number" name="number" value="{{ old('number') }}" required autofocus>
                        @error('number')
                            <span class="invalid-feedback" role="alert">
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
@endsection