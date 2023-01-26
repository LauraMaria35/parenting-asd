@extends('layouts.index')

@section('content')

@include ('layouts.header')


<main>
    <div class="col-lg-12 col-md-8 col-sm-12 mb-4">
        <div class="card card-small">
            <br>
            <div class="card-header border-bottom">
                <h2 class="m-0" style="color:midnightblue">New message</h2>
            </div>
            <div class="card-body p-0">
                <ul class=" list-group list-group-small list-group-flush">

                    <section id=form>
                        <form action="{{route('sendMessage')}}" method='post'>
                            {{csrf_field()}}
                            <fieldset>

                                <textarea name='text' cols='41' rows='5' id='boodschap'></textarea>
                                <br><br>
                                <input type="hidden" value="{{$user_id}}" name="user_id">
                                <input type='submit' name='submit' value='Send message' class='submit' />
                            </fieldset>
                        </form>
                    </section>
                    <br><br>
                    
                    <section id=chat>
                        @foreach($messages as $message)
                        @if($message->user1_id == $user_id && $message->user2_id == Auth::user()->id)

                        <div class="postsMessages">
                            <div>
                                <img src="{{asset('storage/images/'.$message->sender->avatar)}}" alt="User avatar" width="60">
                                <p>{{$message->sender->name}}</p>
                            </div>
                            <div class='postBox2'>
                                <div class='text1'><a>{{$message->text}}</a></div>
                                <div class='time1'>{{date('d, M, Y, H:i:s',strtotime($message->created_at))}}</div>
                            </div>
                        </div>
                        @elseif ($message->user1_id == Auth::user()->id && $message->user2_id ==$user_id)
                        <div class="postsMessages">
                            
                            <div class="postBox3">
                                <div class='text2'><a>{{$message->text}}</a></div>
                                <div class='time2'>{{date('d, M, Y, H:i:s',strtotime($message->created_at))}}</div>
                            </div>
                            <div>
                                <img src="{{asset('storage/images/'.$message->sender->avatar)}}" alt="User avatar" width="60">
                                <p>{{Auth::user()->name}}</p>
                            </div>
                        </div>
@else
<div></div>
@endif
@endforeach
                    </section>





</main>

@endsection