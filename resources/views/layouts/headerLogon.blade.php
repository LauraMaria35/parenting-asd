<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/css/logon.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/copyright.js')}}"></script>
    <script src="../bootstrap/js/bootstrap.min.js "></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Log on</title>

</head>

<body>
    <div id="container">
        <div class="title">
            <a href="{{ asset('/')}}">
                <div id="logo">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                    <h1>parenting-asd</h1>
                </div>
            </a>
        </div>
        <br>

        @yield('content')
        
        <footer>
            <div id="footerDiv"></div>
            <p id="copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer "));
                </script>
            </p>

        </footer>
    </div>

</body>

</html>