@inject('lang', 'App\Lang')

<meta name="google-signin-client_id" content="110042320646-h85gn024lsiln2e574gnt8od7mpa4ui2.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>


<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 ">

        <div class="login-form">
            <h4 class="login-title">{{$lang->get(51)}}</h4>      {{--Login--}}

            <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label>{{$lang->get(52)}} <span class="text-danger">*</span></label>   {{--Email Address--}}
                    <input class="mb-0" id="email" name="email" type="email" placeholder="{{$lang->get(52)}}"> {{--Email Address--}}
                </div>
                <div class="col-12 mb-20">
                    <label>{{$lang->get(53)}} <span class="text-danger">*</span></label> {{--Password--}}
                    <input class="mb-0" id="password" name="password" type="password" placeholder="{{$lang->get(53)}}"> {{--Password--}}
                </div>
                <div class="col-md-8">

                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">{{$lang->get(54)}}</label>  {{--Remember me--}}
                    </div>

                </div>

                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                    <a href="{{route("/forgot")}}"> {{$lang->get(55)}}</a>  {{--Forgot password?--}}
                </div>

                <div class="col-md-12">
                    <button onclick="doLogin();" class="save-btn mt-0">{{$lang->get(51)}}</button>  {{--Login--}}
                </div>

                <div class="col-md-12 mt-20 text-center">
                    <hr>
                    {{$lang->get(68)}}  {{--or login with--}}
                </div>

                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div id="gSignInWrapper">
                            <div id="customBtn" class="customGPlusSignIn">
                            <span class="icon"></span>
                            <span class="buttonText">Entrar com Gmail</span>
                            <script>startApp();</script>
                        </div>
                        <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default"
                                 data-auto-logout-link="false" data-use-continue-as="false" data-scope="public_profile,email" data-onlogin="checkLoginState();"></div>
                        </div>    
                    </div>
                       
                    </div>
                </div>

                <div class="col-md-12 mt-30 text-center">
                    <hr>
                    <a href="{{route("/register")}}" >{{$lang->get(69)}}</a>  {{--"Don't have account? Create",--}}
                </div>

            </div>
        </div>

    </div>
</div>

<script>

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        doLoginSendToServer(profile.getId() + "@google.com", profile.getId(), "off");
        //signOut();
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }

    function doLogin(){
        var email = document.getElementById("email").value;
        if (email == "")
            return showNotification("pastel-danger", "{{$lang->get(58)}}", "bottom", "center", "", "");  // Please enter email-address
        var password = document.getElementById("password").value;
        if (password == "")
            return showNotification("pastel-danger", "{{$lang->get(59)}}", "bottom", "center", "", "");  // Please enter password
        var remember = document.getElementById("remember").value;
        doLoginSendToServer(email, password, remember);
    }

    function doLoginSendToServer(email, password, remember){
        console.log($('meta[name="_token"]').attr('content'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("login") }}',
            data: {
                email : email,
                password : password,
                remember : remember,
            },
            success: function (data){
                console.log(data);
                if (data.error == "1")
                    window.location.href = '{{route("/")}}'; //Will take you to Google.
                    //window.location.reload(true);
                else
                    showNotification("pastel-danger", data.text, "bottom", "center", "", "");
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            console.log(response);
            console.log(response.authResponse.accessToken);
            FB.api('/me', { fields: 'name' }, function (response) {
                console.log('Success ');
                console.log(response);
                doLoginSendToServer(response.id + "@facebook.com", response.id, "off");
            });
        });
    }
    FB.login(function(response) {
  if (response.status === 'connected') {
    doLoginSendToServer(response.id + "@facebook.com", response.id, "off");
  } else {
    // The person is not logged into your webpage or we are unable to tell. 
  }
});
    $(document).ready(function(){
  console.log('Ready disparado');
  //document.getElementById("content").innerHTML = "whatever";
});
</script>
