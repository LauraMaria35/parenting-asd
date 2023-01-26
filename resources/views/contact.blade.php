@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
<script src="{{asset('js/clearUserMsg.js')}}"></script>
<script src="{{asset('js/contactForm.js')}}"></script>
@include ('layouts.header')
@if(Session::has('success'))
<br>
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<main>
    <div id="mainContact">
        <div id="contactForm">

            <form method="post" action="{{ route('contact.store') }}" id="mailForm">
                @csrf
                
                <input type="text" name="name" placeholder="What is your name?" id="firstName" class="name
                            {{$errors->has('name')? 'error': ''}}" />
                @if ($errors->has('name'))
                <div class="error">
                    {{$errors->first('name')}}
                </div>
                @endif
                <input type="email" name="email" placeholder="What is your email?" class="email {{$errors->has('email')? 'error': ''}}" />
                @if ($errors->has('email'))
                <div class="error">
                    {{$errors->first('email')}}
                </div>
                @endif
                <input type="text" placeholder="Subject" id="subject" class="name {{$errors->has('subject') ? 'error': ''}}" name="subject" />
                @if ($errors->has('subject'))
                <div>{{$errors->first('subject')}}</div>
                @endif
                <textarea rows="4" cols="50" name="message" id="message" placeholder="Please enter your message" class="message {{$errors ->has('message') ? 'error' : ''}}"></textarea>
                @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message')}}
                </div>
                @endif
                <input name="send" class="btn" type="submit" value="Send" onClick="contactForm()" />
                <br><br>

            </form>

            <iframe width="600" height="550" id="gmap_canvas" src="https://maps.google.com/maps?q=Antwerpen,%20Belgie&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
</main>


@endsection