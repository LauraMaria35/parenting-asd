@extends('layouts.index')

@section('content')

@include ('layouts.header')
<div class="row">

    <div>
        <div>
            <br>
            <div>
                <h2 class="m-0" style="color:midnightblue">Friends posts</h2>
            </div>

            <section id='section2'><br>

                @foreach ($posts as $post)
                <div class='posts'>
                    <div class='photoPosts'>
                        <div class='image'><img src="{{ URL::asset('storage/images/'.$post->user->avatar) }}" alt='avatar' width='156px' class="imgAvatar"></div>
                    </div>
                    <div class='postBox'>

                        <!--post displayed-->
                        <div class='userPost'>
                            <div>{{$post->user->name}}</div>
                        </div>
                        <div class='country'>{{$post->user->country}}</div>

                        <div class='image'>
                            @if ($post->image == Null)
                            <img src="{{asset('storage/posts/'.$post->image)}}" alt='avatar' width='156px' class="imgAvatar" style="display:none">
                            @else
                            <img src="{{asset('storage/posts/'.$post->image)}}" alt='avatar' width='156px' class="imgAvatar">
                            @endif
                        </div>

                        <div class='text'>{{$post->text}}</div>
                        <div class='time'>{{date('d, M, Y, H:i:s',strtotime($post->created_at))}}</div>
                        <div class='seeComm'><a href="{{route('singlePost',['id'=>$post->id])}}">See comments</a></div>


                    </div>
                </div>
                @endforeach
            </section>
            
        </div>
        {{$posts->links()}}
    </div>
    
</div>

@endsection