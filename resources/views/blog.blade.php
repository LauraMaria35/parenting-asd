@extends('layouts.index')

@section('content')
@include ('layouts.header')

@include ('addons.validationErrors')
@include ('addons.flashSession')

<link rel="stylesheet" href="/css/app.css">
<style>
    body {
        background: #e2e2e2;
    }

    .content {
        background: #fff;
        padding: 20px;
        margin-bottom: 10px;
    }
</style>
<div class="main-content">
    <div class="container">
        <div class="content">
            <h3>Getting Started with Laravel 5.5</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
    </div>
</div>

@endsection