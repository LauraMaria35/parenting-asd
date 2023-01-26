@extends('layouts.landing')

@section('content')

<style>
    #section1 {
        height: fit-content;
        background-color: white;
        text-align: left;
        width: 650px;
        margin: 0 auto;
    }

    #tv {
        width: 650px;
        height: fit-content;
        background: white;
        border-radius: 0% 0% 0% 0% / 0% 0% 0% 0%;
        box-shadow: 20px 20px rgba(0, 0, 0, .15);
        transition: all .4s ease;
        padding-left: 20px;
        padding-right: 20px;
        color: rgb(96, 43, 100);
        font-family: 'IBM Plex Serif', serif;
    }

    #tv:hover {
        border-radius: 0% 0% 50% 50% / 0% 0% 5% 5%;
        box-shadow: 10px 10px rgba(0, 0, 0, .25);
    }

    #tv h1 {
        font-size: 22px;
    }

    #tv h3 a {
        color: rgb(109, 42, 113);
    }

    #tv h3 a:hover {
        background-color: rgb(142, 67, 146);
        color: white;
        text-decoration: none;
    }

    #tv p {
        color: rgb(109, 42, 113);
        font-size: 17px;
    }

    #tv ul li {
        font-size: 16px;
    }

    .article {
        min-height: 440px;
    }

    h2 {
        text-align: center;
    }

    footer {
        position: relative;
    }

    @media (max-width: 600px) {
        #section1 {
            max-width: 600px;
        }

        #tv {
            max-width: 600px;
        }

        .article h2 {
            max-width: 600px;
            font-size: 20px;
            margin: 0 auto;
        }
    }

    @media (max-width: 500px) {
        #section1 {
            max-width: 500px;
        }

        #tv {
            max-width: 500px;
        }

        .article h2 {
            max-width: 500px;
            font-size: 18px;
            margin: 0 auto;
        }
    }

    @media (max-width: 400px) {
        #section1 {
            max-width: 400px;
        }

        #tv {
            max-width: 400px;
        }

        .article h2 {
            max-width: 400px;
            font-size: 18px;
            margin: 0 auto;
        }
    }

    @media (max-width: 300px) {
        #section1 {
            max-width: 300px;
        }

        #tv {
            max-width: 300px;
        }

        .article h2 {
            max-width: 300px;
            font-size: 16px;
            margin: 0 auto;
        }
    }
</style>
<br>
<main>
    <section id="section1">

        <br>
        <div id="tv">
            <div class="article">
                <h2>Page for future articols about ASD</h2>
                <h4></h4>
            </div>
            <br><br>
            <h3>
            </h3>
        </div>
        @endsection