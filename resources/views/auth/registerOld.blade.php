@extends('layouts.headerRegister')

@section('content')

<h2>Please complete your registration below.</h2>
<br><br>
<form method="post" id="signUpForm" action="{{ route('register')}}">
    @csrf
    <label for="Name"><b>{{ __('Name') }}</b></label>

    <input type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror"
        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>

    <label for="email"><b>{{ __('Email Address') }}</b></label>
    <input type="text" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <br>
    <label for="paswoord"><b>{{ __('Password') }}</b></label>
    <input type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror"
        name="password" required autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <br>
    <label for="psw-repeat"><b>{{ __('Confirm Password') }}</b></label>
    <input type="password" placeholder="Repeat Password" class="form-control" name="password_confirmation" required
        autocomplete="new-password">
    <br>

    <div class="clearfix">
        <button type="button" class="btn btn-primary">{{ __('Register') }}</button>
    </div>

</form>

@endsection