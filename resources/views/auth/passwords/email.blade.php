@extends('layouts.headerLogon')

@section('content')
<div id="signUpBox1">
<br>
<h2>Forgot your password?</h2>
<h4>Parenting-ASD will send you password reset instructions to the email associated with your account.</h4>
<br>
<h4>Please enter your email address</h4>
<br>

@if (session('status'))

<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
<br>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <label for="email">{{ __('Email Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <br>
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <br>
					  <br>
        <button type="submit" class='btn btn-secondary btn-block'>
            {{ __('Send Password Reset Link') }}
        </button>
  

</form>

</div>
<br>
@endsection