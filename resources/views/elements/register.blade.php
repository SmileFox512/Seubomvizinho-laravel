@inject('lang', 'App\Lang')

<meta name="google-signin-client_id" content="110042320646-h85gn024lsiln2e574gnt8od7mpa4ui2.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v9.0&appId=885367539030289&redirect_uri=https://seubomvizinho.com.br/login" nonce="YFK4XINP"></script>

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 ">

        <div class="login-form">
            <h4 class="login-title">{{$lang->get(71)}}</h4>      {{--Create new account--}}

            <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label>{{$lang->get(52)}} <span class="text-danger">*</span></label>   {{--Email Address--}}
                    <input class="mb-0" id="username" name="username" placeholder="{{$lang->get(52)}}"> {{--Email Address--}}
                </div>
                <div class="col-md-12 col-12 mb-20">
                    <label>{{$lang->get(72)}} <span class="text-danger">*</span></label>   {{--User Name--}}
                    <input class="mb-0" id="email" name="email" placeholder="{{$lang->get(72)}}"> {{--User Name--}}
                </div>

                <div class="col-12 mb-20">
                    <label>{{$lang->get(53)}} <span class="text-danger">*</span></label> {{--Password--}}
                    <input class="mb-0" id="password" name="password" type="password" placeholder="{{$lang->get(53)}}"> {{--Password--}}
                </div>
                <div class="col-12 mb-20">
                    <label>{{$lang->get(73)}} <span class="text-danger">*</span></label> {{--Confirm Password--}}
                    <input class="mb-0" id="password2" name="password2" type="password" placeholder="{{$lang->get(73)}}"> {{--Confirm Password--}}
                </div>

                <div class="col-md-12">
                    <button onclick="doCreate();" class="register-button mt-0">{{$lang->get(74)}}</button>  {{--Create--}}
                </div>

                <div class="col-md-12 mt-20 text-center">
                    <hr>
                    {{$lang->get(75)}}  {{--or create with--}}
                </div>
                
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div id="gSignInWrapper">
                            <div id="customBtn" class="customGPlusSignIn">
                            <span class="icon"></span>
                            <span class="buttonText">Cadastrar com Gmail</span>
                            <script>startApp();</script>
                        </div>
                        <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default"
                                 data-auto-logout-link="false" data-use-continue-as="false" data-scope="public_profile,email" data-onlogin="checkRegisterState();"></div>
                        </div>    
                    </div>
                       
                    </div>
                </div>
<!--
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="col-md-6 mt-20 mr-20 ml-20" style="display: contents">
                            <div class="g-signin2" data-width="300px" data-onsuccess="onSignInRegister" ></div>
                        </div>
                        <br>
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="col-md-6 mt-20 mr-20 ml-20" style="display: contents">
                            <div class="fb-login-button" data-width="300px" data-size="large" data-button-type="continue_with" data-layout="default"
                                 data-auto-logout-link="false" data-use-continue-as="false" data-scope="public_profile,email" data-onlogin="checkRegisterState();"></div>
                        </div>
                    </div>
                </div>
-->

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

        sendToServerCreateAccount(profile.getId() + "@google.com", profile.getId(), "google", profile.getName());
        //signOut();
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }

    function doCreate(){
        var username = document.getElementById("email").value;
        if (username == "")
            return showNotification("pastel-danger", "{{$lang->get(76)}}", "bottom", "center", "", "");  // Please enter User Name
        var email = document.getElementById("username").value;
        if (email == "")
            return showNotification("pastel-danger", "{{$lang->get(58)}}", "bottom", "center", "", "");  // Please enter email-address
        var password = document.getElementById("password").value;
        if (password == "")
            return showNotification("pastel-danger", "{{$lang->get(59)}}", "bottom", "center", "", "");  // Please enter password
        var password2 = document.getElementById("password2").value;
        if (password2 == "")
            return showNotification("pastel-danger", "{{$lang->get(59)}}", "bottom", "center", "", "");  // Please enter password
        if (password != password2)
            return showNotification("pastel-danger", "{{$lang->get(77)}}", "bottom", "center", "", "");  // Passwords are not equals
        sendToServerCreateAccount(email, password, "email", username);
    }

    function sendToServerCreateAccount(email, password, typeReg, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("createUser") }}',
            data: {
                email : email,
                password : password,
                typeReg : typeReg,
                name : name,
            },
            success: function (data){
                console.log(data);
                if (data.error == "1")
                    window.location.reload(true);
                else
                    showNotification("pastel-danger", data.text, "bottom", "center", "", "");
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function checkRegisterState() {
        FB.getLoginStatus(function (response) {
            console.log(response);
            console.log(response.authResponse.accessToken);
            FB.api('/me', { fields: 'name' }, function (response) {
                console.log('Success ');
                console.log(response);
                sendToServerCreateAccount(response.id + "@facebook.com", response.id, "facebook", response.name);
            });
        });
    }

</script>
