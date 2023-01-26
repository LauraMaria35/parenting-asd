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
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title></title>
</head>

<body>
    <div class="container">

        <br>

        <main>

            @yield('content')

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
                    <a href="{{route('blog')}}">
                        <p>blog</p>
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
                    <a href="{{route('articles')}}">
                        <p>Articles</p>
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


            <section class="chatRooms">
                <div class="chatBox">
                    <p class="dropbtn">Chat Room</p>
                    <div class="dropup-content">
                        @if (session('notifications'))
                        @foreach(session('notifications') as $notification)

                        <a href="{{route('conversation',['user_id'=>$notification->user1_id])}}" class="messageSeen">
                            <img src="{{asset('storage/images/'.$notification->sender->avatar)}}" alt="avatar" style="width:35px; height:35px;"><span>{{$notification->sender->name}}</span>
                            <span>{{$notification->text}}</span>
                        </a>
                        @endforeach
                        @endif


                        <a href="{{route('messagesList')}}">See all messages</a>
                    </div>
                </div>

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
    <script>
        $.ajax({
            'method': 'GET',
            'url': "{{route('notifications')}}"

        }).done(function(res) {
            
        });

        //Incercare pt clear number notifications
//         let counter1 = document.querySelector('.counter1');

// counter1.addEventListener("click", function() {
// if(counter1.value > 0){
// counter1.innerHTML = "0"
// }
// })
       
    </script>

</body>
<script src="{{ asset ('js/homeMenu.js')}}"></script>


</html>