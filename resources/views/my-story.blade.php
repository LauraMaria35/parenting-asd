@extends('layouts.index')

@section('content')

@include ('layouts.header')

<br>

@include ('addons.validationErrors')

<div>
    <div class='allUsers'>
        <div class='photoPost'>
            <div class='image'><img src="{{asset('storage/images/'.Auth::user()->avatar) }}" alt='avatar' width='189px'></div>
        </div>
        <div class='postBox1'>
            <div class='userPost'>
                <div class='userName'>{{Auth::user()->name}}</div>
                <div class='country'>{{Auth::user()->country}}</div>
                <br>
                <div class="country">{{Auth::user()->role}}</div>
                <div class="country">{{Auth::user()->status}}</div>
            </div>
        </div>

    </div>
</div>

    <p class="nrFriends1">Number of friends: {{Auth::user()->number_of_friends}}</p>

    <div class='box2'>
        <div class="userProfile">
            <label class='labelForm'>My description</label>
            <br>
            <p class="profiles">{{Auth::user()->description}}</p>
            <br>
            <label class='labelForm'>When did you know your child was on the spectrum?</label>
            <br>
            <p class="profiles">{{Auth::user()->diagnostic}}</p>
            <br>
            <label class='labelForm'>What therapies (if any) work best for your child?</label>
            <br>
            <p class="profiles">{{Auth::user()->therapies}}</p>
            <br>
            <label class='labelForm'>What are your biggest challenges or
                difficulties?</label>
            <br>
            <p class="profiles">{{Auth::user()->challenges}}</p>";
        </div>
    </div>
    <br>
    <br>

    @endsection