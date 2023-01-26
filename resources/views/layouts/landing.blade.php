<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('css/landingPage.css')}}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script> -->
    <script type="text/javascript" src="{{ asset ('js/copyright.js')}}"></script>
    <title>Home Page</title>
</head>

<body>
    <div id="container">

        <header>
            <div id="header1">
                <a href="{{ asset('/')}}">
                    <div id="logo">
                        <img src="{{ asset('images/logo.png')}}" alt="logo" width="65">
                        <h2>parenting-asd</h2>
                    </div>
                </a>
                <div id="authentication">
                    <a href="{{ route('login') }}" id="logIn">Log in</a>
                    <a href="{{ route('register') }}" id="signUp">Sign up</a>
                </div>
            </div>
        </header>

        <main>

            @yield('content')

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