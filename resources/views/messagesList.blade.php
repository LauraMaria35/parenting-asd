@extends('layouts.index')

@section('content')
@include ('layouts.header')

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<div class="rowMessagesList">

    <div>
        <div class="messagesList">
            <br>
            <div>
                <h2 class="m-0" style="color:midnightblue">Messages</h2>
            </div>
<br>
            <ul class=" list-group list-group-small list-group-flush">

                @foreach($messages as $message)

                <li class="list-group-item d-flex px-3">
                    <div class="findUsers" class="blog-comments__avatar mr-3">
                        <div class="boxSetting">
                            <div class='allUsers'>
                                <div class='photoUser' class="card-header border-bottom">
                                    <div class='imageUser'> <img src="{{asset('storage/images/'.$message->sender->avatar)}}" alt='avatar' width='100px' class="avatarUsers"> </div>
                                </div>
                                <div class='postBox1'>
                                    <div class='userPost'>
                                        {{$message->sender->name}}
                                    </div>

                                    @if(Auth::user()->id == $message->sender->id)
                                    <div class='text1'><span>To: {{$message->receiver->name}}</span>
                                        {{$message->text}}
                                    </div>
                                    @else
                                    <div class='text1'>
                                        {{$message->text}}
                                    </div>
                                    @endif
                                    <div class='time3'>{{date('d, M, Y, H:i:s',strtotime($message->created_at))}}</div>

                                    @if(Auth::user()->id == $message->sender->id)

                                    <a href="{{route('conversation',['user_id'=>$message->user2_id])}}" class="readMessage">
                                        Read
                                    </a>

                                    @else
                                    <a href="{{route('conversation',['user_id'=>$message->user1_id])}}" class="readMessage">
                                        Read
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection