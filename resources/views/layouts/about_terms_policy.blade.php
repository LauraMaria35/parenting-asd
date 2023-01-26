<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/copyright.js')}}"></script>

    <style>
        #section1 {
            height: fit-content;
            background-color: white;
            text-align: left;
            width: 650px;
            margin-left: 350px;
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

        @media (max-width: 1000px) {
            #section1 {
                margin-left: 200px;
            }

            #tv {
                width: 600px;
            }
        }

        @media (max-width: 800px) {
            #section1 {
                margin-left: 100px;
            }

            #tv {

                width: 500px;
            }
        }

        @media (max-width: 600px) {
            #section1 {
                margin-left: 100px;
            }

            #tv {
                width: 400px;
            }
        }

        @media (max-width: 500px) {
            #section1 {
                margin-left: 100px;
            }

            #tv {
                width: 300px;
            }
        }

        @media (max-width: 400px) {
            #section1 {
                margin-left: 50px;
            }

            #tv {
                width: 250px;
            }
        }

        @media (max-width: 300px) {
            #section1 {
                margin-left: 50px;
            }

            #tv {
                width: 200px;
            }
        }

        footer {
            position: relative;
        }
    </style>

    <title>{{$title}}</title>
</head>

<body>
    <div class="container">

        <br>
        <main>
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
            <section id="section1">
                <br>
                <div id="tv">
                    @yield('content')
                </div>
            </section>

            <br><br>

            <section class="extendedMenu">
                <br>
                <button class="accordion">My profile</button>
                <div class="panel">
                    <a href="{{asset('updates')}}">
                        <p>my updates</p>
                    </a>
                    <a href="{{asset('my-story')}}">
                        <p>my story</p>
                    </a>
                    <a href="{{route('myPosts')}}">
                        <p>my posts</p>
                    </a>
                    <a href="{{route('messagesList')}}">
                        <p>messages</p>
                    </a>
                </div>

                <button class="accordion">Friends</button>
                <div class="panel">
                    <a href="{{ route('findFriends')}}">
                        <p>Find friends</p>
                    </a>
                    <a href="{{ route('friendRequests')}}">
                        <p>Friends requests</p>
                    </a>
                    <a href="{{ route('checkoutFriends')}}">
                        <p>My friends</p>
                    </a>
                    <a href="{{ route('friendsPosts')}}">
                        <p>Friends posts</p>
                    </a>
                </div>

                <button class="accordion">About Parenting-ASD</button>
                <div class="panel">
                    <a href="{{asset('about')}}">
                        <p>What is Parenting-ASD</p>
                        <a href="{{asset('terms')}}">
                            <p>Terms of use</p>
                            <a href="{{asset('privacy-policy')}}">
                                <p>Privacy policy</p>
                            </a>
                </div>

                <a href="{{ route('contact.store') }}"><button class="accordion">Contact us</button></a>


                <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault()
                                                     document.getElementById('logout-form').submit()">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </section>

        </main>


        <footer>
            <p></p>
            <p class=" copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>

    </div>

    <script src="{{ asset ('js/homeMenu.js')}}"></script>

</body>

</html>