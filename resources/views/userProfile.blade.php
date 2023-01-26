@extends('layouts.index')

@section('content')

@include ('layouts.header')

<br>

@include ('addons.validationErrors')

@include ('addons.flashSession')


<div class="userSection">
    <div class='allUsers'>
        <div class='photoPost'>
            <div class='image'><img src="{{ asset('storage/images/'.$user->avatar) }}" alt='avatar' width='189px'></div>
        </div>
        <div class='postBox1'>
            <div class='userPost'>
                <div class='userName'>{{$user->name}}</div>
                <div class='country'>{{$user->country}}</div>
                <br>
                <div class="country">{{$user->role}}</div>
                <div class="country">{{$user->status}}</div>
            </div>
        </div>
        <div>
            <div class='userPost'>

                @if($friendship_status == 1)

                <a type="button" class="modifyFriendship" href="{{route('modifyFriendship', ['friendship_status'=>1, 'user_id'=>$user->id])}}">Remove friend</a>

                @elseif( $friendship_status == 2)

                <a type="button" class="modifyFriendship" href="{{route('modifyFriendship', ['friendship_status'=>2, 'user_id'=>$user->id])}}">Friend request sent</a>

                @elseif( $friendship_status == 3)

                <a type="button" class="modifyFriendship" href="{{route('modifyFriendship', ['friendship_status'=>3, 'user_id'=>$user->id])}}">Accept friendship</a>

                @elseif( $friendship_status == 0)

                <a type="button" class="modifyFriendship" href="{{route('modifyFriendship', ['friendship_status'=>0, 'user_id'=>$user->id])}}">Add friend</a>
                @else
                @endif


            </div>
            <br><br>
            <div class='userPost'>
                <a type="button" class="modifyFriendship" href="{{route('conversation', ['friendship_status'=>1, 'user_id'=>$user->id])}}">Send a message</a>
            </div>
        </div>
    </div>
</div>

<p class="nrFriends">Number of friends: {{$user->number_of_friends}}</p>

<div class='box2'>
    <div class="userProfile">
        <label class='labelForm'>Friend's description</label>
        <br>
        <p class="profiles">{{$user->description}}</p>
        <br>
        <label class='labelForm'>When did you know your child was on the spectrum?</label>
        <br>
        <p class="profiles">{{$user->about_diagnostic}}</p>
        <br>
        <label class='labelForm'>What therapies (if any) work best for your child?</label>
        <br>
        <p class="profiles">{{$user->therapies}}</p>
        <br>
        <label class='labelForm'>What are your biggest challenges or
            difficulties?</label>
        <br>
        <p class="profiles">{{$user->challenges}}</p>";
    </div>
</div>
<br>
<br>

@endsection