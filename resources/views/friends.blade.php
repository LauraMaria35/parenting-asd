@extends('layouts.index')

@section('content')

@include ('layouts.header')

@if(session('status'))
    <div class="alert alert-danger">{{session('status')}}</div>
    @endif
<div class="row">

    <div>
        <div>
            <br>
            <div>
                <h2 class="m-0" style="color:midnightblue">Friends</h2>
            </div>
            <div>
                <ul>

                @foreach($users as $user)

                    <li class="list-group-item d-flex px-3">
                        <div class=" findUsers" class="blog-comments__avatar mr-3">
                            <div class="boxSetting">
                                <div class='allUsers'>
                                    <div class='photoUser' class="card-header border-bottom">
                                        <div class='imageUser'><img src="{{ URL::asset('storage/images/'.$user->avatar) }}" alt='User avatar' width="100"
                                        class="avatarUsers"
                                        /></div>
                                    </div>
                                    <div class='postBox1'>
                                        <div class='userPost' class="text-semibold text-fiord-blue">{{$user->name}}</div>
                                        <div class='country'>{{$user->country}}</div>
                                        <div class='defineRol'>{{$user->role}}</div>
                                    </div>
                                </div>
                                <a href="{{ route('userProfile',['id'=>$user->id] )}}"><h3 class="seeProfileUser" class="ml-auto text-right text-semibold text-reagent-gray">Profile</h3></a>
                            </div>
                        </div>
                    </li>
                    <hr>
                    @endforeach
                </ul>
                <br>
                
            </div>
        </div>
    </div>

    <div class="card-footer border-top">
        <div class="row">
            
        
        </div>

    </div>
    {{$users->links()}}
</div>


@endsection