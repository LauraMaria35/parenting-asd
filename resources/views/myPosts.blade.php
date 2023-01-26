@extends('layouts.index')

@section('content')

@include ('layouts.header')

@include ('addons.flashSession')

<section id='section2'><br>

    @include ('addons.validationErrors')

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
            <div class="editDelete1">
                <a href="{{route('editPostForm',['id'=>$post->id])}}"><img src="../../images/Basic_Ui_(307).jpg" alt="edit" width='30' class="editBtn"></a>

                <a href="{{route('deletePost',['id'=>$post->id])}}" onclick="return confirm('Are you sure you want to delete this comment\?')"><img src="../../images/deleteComm.jpg" alt="delete" width='30' class="deleteBtn"></a>
                <input type="hidden" value="{{$post->id}}" name="postId">
            </div>
            <div class='seeComm'><a href="{{route('singlePost',['id'=>$post->id])}}">See comments</a></div>

        </div>
    </div>
    @endforeach
</section>
{{$posts->links()}}

@endsection