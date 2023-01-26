@extends('layouts.index')

@section('content')

@include ('layouts.header')

<link rel="stylesheet" href="{{asset('css/editCommentForm.css')}}">


@include ('addons.validationErrors')

<section id='section2'><br>
    <div class='posts'>
        <div class='photoPosts'>
            <div class='image'><img src="{{asset('storage/images/'.$post->user->avatar)}}" alt='avatar' width='156px' class="imgAvatar"></div>
        </div>

        <div class='postBox'>

            <!-- post displayed-->
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
            <button id="checkLikeStatusBtn" style="display:none" onclick="didUserLikeThisPost('{{Auth::user()->id}}','{{$post->id}}')"></button>
            <p><span onclick="likeThisPost('{{Auth::user()->id}}','{{$post->id}}')"><img src="{{ asset('images/like.png')}}" alt="likes-icon" width="35px" class="likeIcon" id="like"></span><span id="numberOfLikes"> {{$post->number_of_likes}} likes</span></p>
            <!--comments displayed-->

            @foreach($post->comments as $comment)

            <br>
            <div class='comBox'>
                <div class='nameUser'>
                    <div class='photoCom'><img src="{{asset('storage/images/'.$comment->user->avatar)}}" alt='img' width='48px'></div>
                    <div class='userCom'>{{$comment->user->name}} said:</div>
                </div>
                <hr>
                <div class='comContent' name='comContent'>{{$comment->text}}</div>
                <br>
                <div class='comTime'>{{date('d, M, Y, H:i:s', strtotime($comment->created_at))}}</div>
                @if(Auth::user()->id == $comment->user->id)
                <div class="editDelete">
                    <a onclick="showEditCommentForm('{{$comment->text}}','{{$comment->id}}')"><img src="../../images/Basic_Ui_(307).jpg" alt="edit" width='30' class="editBtn"></a>
                    <form method="post" action="{{route('deleteComment')}}" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete this comment\?')">
                        {{csrf_field()}}
                        <button type="submit" style="background:none; border:none;"><img src="../../images/deleteComm.jpg" alt="delete" width='30' class="deleteBtn"></button>
                        <input type="hidden" value="{{$comment->id}}" name="commentId">
                    </form>
                </div>
                @endif
            </div><br>

            @endforeach

            @include('addons.editCommentForm')

            <!-- write a comment -->
            <div class='commentBox'>
                <div class='imageComment'><img src="{{ URL::asset('storage/images/'.Auth::user()->avatar) }}" alt='img' width='48px'>
                </div>
                <form action="{{route('sendComment')}}" method="post" class="comments">
                    {{csrf_field()}}
                    <input type='hidden' name='postId' value="{{$post->id}}">
                    <textarea class='comment' name='text' id='comment' cols='60' rows='3'></textarea>
                    <button type='submit' name='submit1' class='sendComment' id='submitButton'><img src='../images/arrowWrite.png' alt='arrow' width='20px'></button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $('#checkLikeStatusBtn').trigger('click');

    function didUserLikeThisPost(user_id, post_id) {

        $.ajax({
                'method': 'post',
                'url': "{{route('didUserLikeThisPost')}}",
                'data': {
                    'user_id': user_id,
                    'post_id': post_id
                },
                'headers': {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            }).fail(function(code, err) {
                console.log(err);
            })
            .done(function(didUserLikeThisPost) {
                console.log(didUserLikeThisPost);

                if (didUserLikeThisPost) {
                    $('#like').css('backgroundColor', '#c79ec1');
                }else{
                    $('#like').css('backgroundColor', '');
                }

            });

    }

    function likeThisPost(user_id, post_id) {

        $.ajax({
                'method': 'post',
                'url': "{{route('likeThisPost')}}",
                'data': {
                    'user_id': user_id,
                    'post_id': post_id
                },
                'headers': {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            }).fail(function(code, err) {
                console.log(err);
            })
            .done(function(res) {
                console.log(res);

                $('#numberOfLikes').html("");
                $('#numberOfLikes').html(" " + res.number_of_likes + " likes");

                didUserLikeThisPost(user_id, post_id);

            });

    }
</script>


<script src="{{asset('js/editCommentForm.js')}}"></script>

@endsection