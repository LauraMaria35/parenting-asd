@extends('layouts.index')

@section('content')


<section id="section1">
    <form action='{$srv}' method='post'>
        <div class="addPhotos">
            <span class="btnAddPhotos">
                <span>Add photos...</span>
            </span>
        </div>
        <textarea name="postContent" id="postContent" cols="80" rows="5"></textarea>

        <br>
        <input type="submit" name="submit" value="post" id="postButton">
        <a href=""><img src="{{ asset('images/reloadArrow.png')}}" alt="refresh" width="12px"> clear text field</a>

    </form>
    <p id="voidMsg">{$void_msg}</p>
</section>

<br>
<br>
<hr>
<section id='section2'><br>
    <div class='posts'>
        <div class='photoPost'>
            <div class='image'><img src="{{asset ('images/avatar.png')}}" alt='avatar' width='189px'></div>
        </div>
        <div class='postBox'>

            <div class='userPost'>
                <div></div><button class='addFriend'><img src="{{ asset ('images/add_friend.png')}}"
                        width='50px'></button>
                <section class='extendedMenu1'>
                    $_extendedMenu</section>
            </div>
            <div class='country'>$_country</div>

            <div class='text'>$_postContent</div>
            <div class='time'>$_timeAgo</div>
            $_comments
            <div class='commentBox'>
                <div class='imageComment'><img src='../images/imageComment.png' alt='img' width='48px'>
                </div>
                <form action='$_srv' method='post' class='comments'>
                    <input type='hidden' name='postID' value='$_postID'>
                    <textarea class='comment' name='comContent' id='comment' cols='60' rows='3'></textarea>
                    <button type='submit' name='submit1' class='sendComment' id='submitButton'><img
                            src='../images/arrowWrite.png' alt='arrow' width='20px'></button>
                </form>
            </div>
        </div>
    </div>
</section>";

<section id="extendedMenu">
    <br>
    <button class="accordion">My profile</button>
    <div class="panel">
        <a href="{{ asset('updates')}}">
            <p>my updates</p>
        </a>
        <a href="{{ asset('my-story')}}">
            <p>my story</p>
        </a>
        <a href="../scripts/my_kids.php">
            <p>my kids</p>
        </a>
        <a href="../scripts/my_friends.php">
            <p>my friends</p>
        </a>

    </div>

    <button class="accordion">Settings</button>
    <div class="panel">
        <a href="../scripts/settings.php">
            <p>Account settings</p>
        </a>
        <p>Upload your photo</p>
    </div>

    <button class="accordion">About Parenting-ASD</button>
    <div class="panel">
        <a href="../scripts/about.php">
            <p>What is Parenting-ASD</p>
            <a href="../scripts/Terms_of_use.php">
                <p>Terms of use</p>
                <a href="../scripts/Privacy_policy.php">
                    <p>Privacy policy</p>
                </a>
    </div>

    <a href="../scripts/contact.php"><button class="accordion">Contact us</button></a>


    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</section>

<section id="chatRooms">
    <div id="chatBox"><a href="../scripts/Group_chat.php">
            <p>Chat Room</p>
        </a>
    </div>
</section>


@endsection