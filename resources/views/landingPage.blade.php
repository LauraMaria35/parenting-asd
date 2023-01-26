@extends('layouts.landing')

@section('content')
<img src="{{asset ('images/world_autism.png')}}" alt="image">
            <div id="section1">

                <div class="text">
                    <h1>Looking for people who understand?</h1>
                    <br>
                    <br>
                    <h1>You are in the right place.</h1>
                    <br>
                    <br>
                    <h1>Meet people who are going through the same trials.</h1>
                    <br>
                    <br>
                    <h1>You are not alone.</h1>
                </div>

            </div>
            <div id="section2">
                <div class="info">
                    <a href="{{asset('about')}}">
                        <div id="about-us"></div>
                    </a>
                    <a href="{{asset('guide')}}">
                        <div id="guide"></div>
                    </a>
                    <a href="{{asset('resources')}}">
                        <div id="resources"></div>
                    </a>
                </div>
                <div class="titleInfo">
                    <a href="{{asset('about')}}">
                        <p>About Parenting-ASD</p>
                    </a>
                    <a href="{{asset('guide')}}">
                        <p class="guide">Your Guide to Autism </p>
                    </a>
                    <a href="{{asset('resources')}}">
                        <p>Resources</p>
                    </a>
                </div>
            </div>
@endsection