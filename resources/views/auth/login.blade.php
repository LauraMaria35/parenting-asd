@extends('layouts.headerLogon')

@section('content')

<div id="signUpBox">
   <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2>
                    <div class="card-header">{{ __('Login') }}</div>
                </h2>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                </div>
                <label>{{ __('Email Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <label>{{ __('Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <br>


            <div id="forgot" class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <input type="submit" name="submit" value="Log in" id="logInButton">
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
    <br>
    <h3>Don't have an account?</h3>
    <br>

    <h4>It's Free! <a href="{{ route('register') }}">Sign up</a></h4>

</div>
@endsection