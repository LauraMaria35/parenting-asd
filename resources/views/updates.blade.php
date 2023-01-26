@extends('layouts.updates-template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<br>
<main>

    @include ('addons.validationErrors')

    @include ('addons.flashSession')
    <br>
    <div>
        <div class='posts'>
            <div class='photoPost'>

                <form class='image' id="imageForm" action="{{route('uploadUserAvatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="change_image" id="change_image" style="display:none">
                    <input type="submit" id="submit_avatar" style="display:none">
                    <img src="{{asset('storage/images/'.Auth::user()->avatar) }}" alt='avatar' width='189px' id="avatar">

                </form>
            </div>

            <script>
                $(document).ready(function() {
                    $('#avatar').click(function() {
                        $('#change_image').trigger('click');
                        $('#change_image').change(function() {
                            $('#imageForm').submit();
                        });
                    });
                });
            </script>
            <div class='postBox1'>
                <div class='userPost'>
                    <div class='userName'>{{Auth::user()->name}}</div>
                    <div class='country'>{{Auth::user()->country}}</div>
                    <br>
                    <div class='country'>{{Auth::user()->role}}</div>
                    
                    <div class='country'>{{Auth::user()->status}}</div>
                </div>
            </div>
            <div class='userPost'>

                <a type="button" class="modifyFriendship" href="{{route('checkoutFriends')}}">My friends</a>
            </div>
        </div>
    </div>

    <br>
    <div class="box2">

        <form action="{{ route('updateUserInfo') }}" method="post">
            @csrf
            <h2>Here you can update your profile!</h2>
            <br><br>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{Auth::user()->name}}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{Auth::user()->email}}</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row mb-3">

                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <br>
            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <br><br>
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control" class="form-control @error('country') is-invalid @enderror">
                <option value="country">{{Auth::user()->country}}</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                </option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                </option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                    Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                    Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                </option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
            @error('country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br><br>
            <label for="aboutYou" class="labelForm">What is your role?</label>
            <br>
            <select id="aboutYou" onchange=kiezenSoort1() name="role" value=''>
                <option value=about>{{Auth::user()->role}}</option>
                <option value=2>Mom</option>
                <option value=3>Dad</option>
                <option value=4>Grandparent</option>
                <option value=5>Caregiver</option>
            </select>
<br><br><br>
            <div>
                <label for="feInputState">status</label>
                <select id="feInputState" name="status">
                    <option selected>{{Auth::user()->status}}</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="In a relationship">In a relationship</option>


                </select>
            </div>

            <br>
            <label for="biography" class="labelForm">Describe yourself</label>
            <br>
            <textarea class="textForm" name="description" id="biography" cols="90" rows="6" placeholder="Tell us about yourself. Your story/personality/hobbies, etc.">{{Auth::user()->description}}</textarea>
            <br>
            <label for="diagnose" class="labelForm">When did you know your child was on the spectrum?</label>
            <br>
            <textarea class="textForm" name="diagnostic" id="diagnose" cols="90" rows="6" placeholder="Ex. Answers: He was diagnosed a year ago but I noticed some things long before.">{{Auth::user()->diagnostic}}</textarea>
            <br>
            <label for="therapy" class="labelForm">What therapies (if any) work best for your child?</label>
            <br>
            <textarea class="textForm" name="therapies" id="therapy" cols="90" rows="6" placeholder="Ex. : ABA, logopedie, play therapy">{{Auth::user()->therapies}}</textarea>
            <br>
            <label for="difficulties" class="labelForm">What are your biggest challenges or difficulties?</label>
            <br>
            <textarea class="textForm" name="challenges" id="difficulties" cols="90" rows="6" placeholder="Ex.: my son's agression">{{Auth::user()->challenges}}</textarea>

            <br>
            <label>Gender</label>
            <select onchange=kiezenSoort1() class="form-control @error('role') is-invalid @enderror" name="gender" required>{{Auth::user()->gender}}
                <option value="I prefer not to say">I prefer not to say</option>
                <option value="woman">woman</option>
                <option value="man">man</option>
                <option value="non-binary">non-binary</option>
                <option value='transgender'>transgender</option>
                <option value='transgender'>transgender</option>
                <option value='intersex'>intersex</option>
                <option value='other gender'>other gender</option>

            </select>
            <!-- <label class="labelForm">Share with your friends</label>
            <input type=radio name="gender" value="0" checked>
            <span>yes</span>
            <input type=radio name="gender" value="1">
            <span>no</span> -->
            <br><br>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>
            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
</button>
<i class="fa fa-check mx-2"></i>
<strong>Succes!</strong>Your profile has been updated! </div> -->


        </form>
        <br>
        <br>

    </div>

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
                <p>Friends requests <i class="material-icons">add_alert</i></p>
            </a>
            <a href="{{ route('checkoutFriends')}}">
                <p>My friends</p>
            </a>
            <a href="{{ route('friendsPosts')}}">
                <p>Friends posts <i class="material-icons">add_alert</i></p>
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


        <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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


@endsection