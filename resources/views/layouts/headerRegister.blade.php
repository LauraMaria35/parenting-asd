<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signUp.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/signUp1.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/copyright.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/copyright.js')}}"></script>
    <title>Sign Up</title>
</head>

<body>
    <div id="container">
        <div class="title">
            <a href="{{ asset('/')}}">
                <div id="logo">
                    <img src="{{ asset('images/logo.png')}}" alt="logo">
                    <h1>parenting-asd</h1>
                </div>
            </a>

        </div>
        <br>

        @yield('content')

        <footer>
            <p></p>
            <p id="copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>

    </div>
    <script>
        function nextLogIn() {
            window.open("../scripts/A_logon.php");
        }
        var currentYear = new Date().getFullYear()
        max = currentYear;
        var option = "";
        for (var year = currentYear - 80; year <= max; year++) {

            var option = document.createElement("option");
            option.text = year;
            option.value = year;

            document.getElementById("year").appendChild(option)

        }
        document.getElementById("year").value = currentYear;
    </script>
</body>

</html>
