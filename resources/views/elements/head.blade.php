@inject('theme', 'App\Theme')
@inject('currency', 'App\Currency')

<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon-->
    <link rel="icon" href="{{$theme->getLogo()}}" type="image/png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugin.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/utils.css" rel="stylesheet">
    <link href="css/easyzoom.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/modernizr-2.8.3.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/colors.js"></script>
    <script src="js/plugin.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="js/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="js/sweetalert/sweetalert.min.js"></script>

    @include('elements.maincss', array())

    <script>
        function makePrice(price){
            @if ($currency->rightSymbol() == "false")
                return '{{$currency->currency()}}' + parseFloat(price).toFixed({{$currency->symbolDigits()}});
            @else
                return parseFloat(price).toFixed({{$currency->symbolDigits()}}) + '{{$currency->currency()}}';
            @endif
        }

    </script>

    
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <script src="https://apis.google.com/js/api:client.js"></script>

  <!-- //Inicio Facebook Login // -->
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=885367539030289&autoLogAppEvents=1" nonce="LpX81W3X"></script>

  <!-- //Fim Facebook Login // -->

  
  <!-- //Inicio Google Login // -->
<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="110042320646-h85gn024lsiln2e574gnt8od7mpa4ui2.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script>
  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '110042320646-h85gn024lsiln2e574gnt8od7mpa4ui2.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
          onSignIn(googleUser);
          //document.getElementById('name').innerText = "Signed in: " +
              //googleUser.getBasicProfile().getName();
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }
  </script>

  
  <!-- //Fim Google Login // -->

  <style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 240px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('./images/logingoogle.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>

<style>
body::after {
  object-fit: cover;
  content: "";
  background: url('./images/background.jpg') no-repeat center center fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-size: cover;
  background-position: 50% 50%;
  position: absolute;
  z-index: -1;   
}
        </style>
</head>
