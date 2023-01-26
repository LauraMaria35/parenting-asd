<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ('css/home.css')}}">
    <script type="text/javascript" src="{{ asset('js/copyright.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@500&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
</head>

<body>
    <div class="container">

        <header>
            <div class="titleNav">

                <div class="name">
                    <a href="{{route('home')}}">
                        <div class="logo">
                            <img src="{{ asset('images/logo.png')}}" alt="logo" width="75">
                        </div>
                    </a>
                </div>

                <nav>
                    <div class="searchBar">
                        <form action="{{route('searchForPosts')}}" method="get">
                            <input type="text" id="myInput" name="searchInput" placeholder="Search for.."><img src="../../images/searchIcon.png" alt="search" width="23">
                            <span onclick="backToMenu()">cancel<span>
                        </form>
                    </div>
                    <ul id="menu">
                        <li class="hovertext" data-hover="search" id="search">
                            <div class="search-icon">
                                <img src="../../images/searchIcon.png" alt="search" width="43">
                            </div>
                        </li>
                        <li class="hovertext" data-hover="post">
                            <a href="{{route('home')}}" id="post"><img src="../../images/postIcon.png" alt="post" width="43"></a>
                        </li>
                        <li class="hovertext" data-hover="notifications">
                            <a href=""><img src="../../images/notificationsIcon.png" alt="notifications" width="43"></a>
                        </li>
                        <li class="hovertext" data-hover="profile">
                            <a href="{{asset('my-story')}}"><img src="{{ URL::asset('storage/images/'.Auth::user()->avatar) }}" alt="profile" width="43"></a>
                        </li>
                        <li class="hovertext" data-hover="menu" id="menuIcon">
                            <a href="#extendedMenu"><img src="../../images/menuIcon.jpg" alt="menu" width="43"></a>
                        </li>
                        <!--{$adminIcon}-->
                    </ul>

                </nav>

            </div>

        </header>

        @yield('content')

        <footer>
            <p></p>
            <p class=" copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>
    </div>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
        let menuIcon = document.querySelector("#menuIcon");
        let extendedMenu = document.querySelector(".extendedMenu");
        menuIcon.addEventListener("click", () => {
            extendedMenu.style.display = "block";
        })
    </script>

</body>

</html>