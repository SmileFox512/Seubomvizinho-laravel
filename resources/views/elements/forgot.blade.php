@inject('lang', 'App\Lang')

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 ">

            <div class="login-form">
                <h4 class="login-title">{{$lang->get(60)}}</h4>      {{--Forgot password--}}

                <div class="row">
                    <div class="col-md-12 col-12 mb-20">
                        <label>{{$lang->get(52)}} <span class="text-danger">*</span></label>   {{--Email Address--}}
                        <input class="mb-0" id="email" name="email" type="email" placeholder="{{$lang->get(52)}}"> {{--Email Address--}}
                    </div>
                    <div class="col-md-12 ">
                        <button onclick="doForgot();" class="register-button mt-0">{{$lang->get(61)}}</button>  {{--Send password--}}
                    </div>

                </div>
            </div>

    </div>
</div>

<script>

    function doForgot(){
        var email = document.getElementById("email").value;
        if (email == "")
            return showNotification("pastel-danger", "{{$lang->get(58)}}", "bottom", "center", "", "");  // Please enter email-address

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("doForgot") }}',
            data: {
                email : email,
            },
            success: function (data){
                console.log(data);
                if (data.error != "0")
                    showNotification("pastel-danger", data.text, "bottom", "center", "", "");
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

</script>
