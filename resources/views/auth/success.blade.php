@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a id="signup-page-tab" class="nav-link active text-4" data-toggle="tab"role="tab" aria-controls="signup" aria-selected="true">{{ __('Sign Up') }}</a> </li>
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane fade show active" id="signupPage" role="tabpanel" aria-labelledby="signup-page-tab">
                    <form>
                        <div class='text-center form-group'>
                            <h3 class='text-center text-success'>{{ __('Successfully Registered') }}</h3>
                        </div>
                        <div class='text-center form-group'>
                            <h6>{{ __('Please') }}<a href="{{ route('login') }}">{{ __(' login ') }}</a>{{ __('to go to the dashboard.') }}<h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection