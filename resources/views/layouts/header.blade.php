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

                <li class="hovertext" data-hover="notifications" class="notif-nr">
                    <a href="{{route('messagesList')}}" class="notif">
                        <img src="{{asset('images/notificationsIcon.png')}}" alt="notifications" width="43">
                        @if(session('notifications'))
                        <div class="counter1">{{count(session('notifications'))}}</div>
                        @else
                        <span></span>

                        @endif
                    </a>
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