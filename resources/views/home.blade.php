@extends('layouts.index')

@section('content')
@include ('layouts.header')

<link rel="stylesheet" href="{{asset('css/editCommentForm.css')}}">

<section id="section1">
    @include ('addons.validationErrors')
    @include ('addons.flashSession')

    <form action="{{route('createNewPost')}}" method="post" enctype="multipart/form-data">
        @csrf

        <span class="btnAddPhotos">

            <input type="file" name="image" id="post-image" class="choosePhoto">

        </span>
        <textarea name="text" id="postContent" cols="80" rows="5"></textarea>

        <br>
        <input type="submit" name="submit" value="post" id="postButton">


        <a href=""><img src="{{ asset('images/reloadArrow.png')}}" alt="refresh" width="12px"> clear text field</a>

    </form>


    <script>
        $(document).ready(function() {
            $('#postImages').click(function() {
                $('#post-image').trigger('click');

            });
        });
    </script>
</section>

<br>
<br>
<hr>

<!--All posts displayed-->
<section id='section2'><br>

    @foreach ($posts as $post)

    <div class='posts'>
        <div class='photoPosts'>
            <div class='image'><img src="{{asset('storage/images/'.$post->user->avatar) }}" alt='avatar' width='156px' class="imgAvatar"></div>
        </div>
        <div class='postBox'>

            <!--post displayed-->
            <div class='userPost'>
                <div>{{$post->user->name}}</div>
            </div>
            <div class='country'>{{$post->user->country}}</div>
            <div class='image'>@if ($post->image == Null)
                <img src="{{asset('storage/posts/'.$post->image)}}" alt='avatar' width='156px' class="imgAvatar" style="display:none">
                @else
                <img src="{{asset('storage/posts/'.$post->image)}}" alt='avatar' width='456px' class="imgAvatar">
                @endif
            </div>
            <div class='text'><a>{{$post->text}}</a></div>
            <div class='time'>{{date('d, M, Y, H:i:s',strtotime($post->created_at))}}</div>

            <div class='seeComm'><a href="{{route('singlePost',['id'=>$post->id])}}">See comments</a></div>

            <!-- write a comment -->
            <div class='commentBox'>
                <div class='imageComment'><img src="{{ URL::asset('storage/images/'.Auth::user()->avatar) }}" alt='img' width='48px'>
                </div>
                <form action="{{route('sendComment')}}" method="post" class="comments">
                    {{csrf_field()}}
                    <input type='hidden' name='postId' value="{{$post->id}}">
                    <textarea class='comment' name='text' id='comment' cols='60' rows='3'></textarea>
                    <button type='submit' name='submit1' class='sendComment' id='submitButton1'><img src='../images/arrowWrite.png' alt='arrow' width='20px'></button>
                </form>
            </div>

        </div>
    </div>
    @endforeach
</section>
<br>

@endsection