<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    <script type="text/javascript" src="{{asset('js/copyright.js')}}"></script>
    <title>{{$title}}</title>
</head>

<body>
    <div id="container">

        <header>
            <div id="header1">
                <a href="{{ asset('/')}}">
                    <div id="logo">
                        <img src="{{asset('images/logo.png')}}" alt="logo" width="65">
                        <h2>parenting-asd</h2>
                    </div>
                </a>
                <div id="authentication">
                    <a href="{{ route('login') }}" id="logIn">Log in</a>
                    <a href="{{route('register')}}" id="signUp">Sign up</a>
                </div>
            </div>
        </header>

        <main>
            <br>
            <div id="tv">
            @yield('content')
            </div>
<br><br>
        </main>

        <footer>
            <p></p>
            <p id="copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>

    </div>
</body>

</html>