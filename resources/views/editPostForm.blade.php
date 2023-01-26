@extends('layouts.index')

@section('content')
@include ('layouts.header')

<link rel="stylesheet" href="{{asset('css/editCommentForm.css')}}">

<section id="section1">

    @include ('addons.validationErrors')

    @include ('addons.flashSession')

    <form action="{{route('editPost')}}" method="post" enctype="multipart/form-data">
        @csrf
        <span class="btnAddPhotos">

            <input type="file" name="image" id="post-image" class="choosePhoto">

        </span>
        <textarea name="text" id="postContent" cols="80" rows="5">{{$post->text}}</textarea>
        <input type="hidden" value="{{$post->id}}" name="postId">
        <input type="hidden" value="{{$post->user_id}}" name="userId">
        <br>
        <button type="submit" name="submit" value="post" id="postButton">Edit post</button>
        <a href="#" id="avatar"></a>
        <input type="file" id="post-image" name="image" style="display:none">


    </form>


    @endsection