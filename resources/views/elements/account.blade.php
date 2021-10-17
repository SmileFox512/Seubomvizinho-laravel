@inject('lang', 'App\Lang')
@inject('userInfo', 'App\UserInfo')
@inject('orders', 'App\Orders')
@inject('currency', 'App\Currency')
@inject('utils', 'App\Utils')
@inject('theme', 'App\Theme')
@inject('settings', 'App\Settings')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">

{{--Menu--}}
                <div class="col-lg-3 col-12">
                    <div class="myaccount-tab-menu nav" role="tablist">

                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> {{$lang->get(80)}}</a> {{--Account Details--}}

                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> {{$lang->get(81)}}</a> {{--Orders--}}

                        <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> {{$lang->get(36)}}</a> {{--Address--}}

                        <a href="{{route('/logout')}}"><i class="fa fa-sign-out"></i> {{$lang->get(56)}}</a> {{--Logout--}}
                    </div>
                </div>

                <div class="col-lg-9 col-12">
                    <div class="tab-content" id="myaccountContent">

{{--Account Details--}}

                        <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                            <div class="myaccount-content">
                                <h3> {{$lang->get(80)}} </h3>  {{--Account Details--}}

                                <div class="account-details-form">

                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <input id="name" placeholder="{{$lang->get(72)}}" type="text" value="{{$userInfo->getUserName()}}">  {{--User Name--}}
                                        </div>

                                    @if ($userInfo->getUserTypeReg() == "email")
                                            <div class="col-12 mb-30">
                                                <input id="email" placeholder="{{$lang->get(82)}}" type="email" value="{{$userInfo->getUserEmail()}}"> {{--E-mail Address--}}
                                            </div>
                                    @endif

                                        <div class="col-12 mb-30">
                                            <input id="phone" placeholder="{{$lang->get(34)}}" type="text" value="{{$userInfo->getUserPhone()}}"> {{--Phone--}}
                                        </div>

                                        <div class="col-12">
                                            <button onclick="saveAccountData();" class="save-btn">{{$lang->get(83)}}</button> {{--Save Changes--}}
                                        </div>

                                    @if ($userInfo->getUserTypeReg() == "email")
                                        <div class="col-12"><hr></div>

                                        <div class="col-12 mb-30"><h4>{{$lang->get(84)}}</h4></div> {{--Password change--}}

                                        <div class="col-12 mb-30">
                                            <input id="current-pwd" placeholder="{{$lang->get(85)}}" type="password"> {{--Current Password--}}
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="new-pwd" placeholder="{{$lang->get(86)}}" type="password"> {{--New Password--}}
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm-pwd" placeholder="{{$lang->get(73)}}" type="password"> {{--Confirm Password--}}
                                        </div>

                                        <div class="col-12">
                                            <button onclick="savePassword();" class="save-btn">{{$lang->get(87)}}</button> {{--Save Password--}}
                                        </div>
                                    @endif

                                    </div>
                                </div>
                            </div>
                        </div>

{{--Orders--}}
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>{{$lang->get(81)}} </h3>  {{--Orders--}}

                                <div class="myaccount-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{$lang->get(95)}}</th> {{--Id--}}
                                            <th>{{$lang->get(46)}}</th> {{--Product--}}
                                            <th>{{$lang->get(96)}}</th> {{--Date--}}
                                            <th>{{$lang->get(97)}}</th> {{--Status--}}
                                            <th>{{$lang->get(20)}}</th> {{--Total--}}
                                            <th>{{$lang->get(98)}}</th> {{--Action--}}
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($orders->getAll() as $key => $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->food}}</td>
                                                <td>
                                                    <div style="color: #{{$theme->getMainColor()}}">
                                                        {{$utils->timeago($order->updated_at)}}
                                                    </div>
                                                    <br>
                                                    {{$order->updated_at}}
                                                </td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$currency->makePrice($order->total)}}</td>
                                                <td><a href="{{route('/orderinfo')}}?id={{$order->id}}" class="btn">{{$lang->get(99)}}</a></td>  {{--View--}}
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

{{--Address--}}
                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>{{$lang->get(36)}} </h3>  {{--Address--}}

                                <div class="myaccount-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{$lang->get(36)}}</th> {{--Address--}}
                                            <th>{{$lang->get(104)}}</th> {{--Latitude--}}
                                            <th>{{$lang->get(105)}}</th> {{--Longitude--}}
                                            <th>{{$lang->get(107)}}</th> {{--Type--}}
                                            <th>{{$lang->get(106)}}</th> {{--Default--}}
                                            <th>{{$lang->get(98)}}</th> {{--Action--}}
                                        </tr>
                                        </thead>
                                        <tbody id="addressTable">
                                        </tbody>
                                    </table>
                                </div>

                                <div class="account-details-form">
                                    <div class="row">
                                        <div class="col-lg-9 col-12">
                                            <input id="pac-input" placeholder="{{$lang->get(108)}}" type="text" >  {{--Enter address--}}
                                        </div>
                                        <div class="col-lg-3 col-12 mb-20">
                                            <button id="buttonAdd" onclick="addAddress();" class="btn btn-primary save-change-btn mt-0" disabled>{{$lang->get(109)}}</button>  {{--Add--}}
                                        </div>
                                        <div class="col-lg-12 col-12 ml-20">
                                            <p id="latlng"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ml-20 d-inline">
                                    <div class="row">
                                        <div class="col-lg-3 col-12 d-inline">
                                            @include('elements.check', array('id' => "defaultAddress", 'text' => $lang->get(106), 'initvalue' => "true", 'callback' => "null")) {{--Default--}}
                                        </div>
                                        <div class="col-lg-9 col-12 d-inline">
                                            @include('elements.check', array('id' => "HomeAddress", 'text' => $lang->get(110), 'initvalue' => "true", 'callback' => "onRadio")) {{--Home--}}
                                            @include('elements.check', array('id' => "WorkAddress", 'text' => $lang->get(111), 'initvalue' => "false", 'callback' => "onRadio")) {{--Work--}}
                                            @include('elements.check', array('id' => "OtherAddress", 'text' => $lang->get(112), 'initvalue' => "false", 'callback' => "onRadio")) {{--Other--}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-12 mb-30" style="height: 300px">
                                <div id="map">
                                </div>
                                    <div id="infowindow-content">
                                        <img src="" width="16" height="16" id="place-icon" />
                                        <span id="place-name" class="title"></span><br />
                                        <span id="place-address"></span>
                                    </div>
                            </div>

                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function saveAccountData() {
        const data = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("changeProfile") }}',
            data: data,
            success: function (data){
                console.log(data);
                showNotification("pastel-info", "{{$lang->get(88)}}", "bottom", "center", "", "");  // Data Saved
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function savePassword() {
        const newPwd = document.getElementById("new-pwd").value;
        if (newPwd === "")
            return showNotification("pastel-danger", "{{$lang->get(92)}}", "bottom", "center", "", "");  // Enter new password
        if (newPwd !== document.getElementById("confirm-pwd").value)
            return showNotification("pastel-danger", "{{$lang->get(90)}}", "bottom", "center", "", "");  // New passwords are not the same
        const data = {
            oldPassword: document.getElementById("current-pwd").value,
            newPassword: newPwd,
        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("changePassword") }}',
            data: data,
            success: function (data){
                console.log(data);
                if (data.error === "1")
                    return showNotification("pastel-danger", "{{$lang->get(91)}}", "bottom", "center", "", "");  // Old password is incorrect
                if (data.error === "2")
                    return showNotification("pastel-danger", "{{$lang->get(93)}}", "bottom", "center", "", "");  // Password length must be more then 5 symbols
                showNotification("pastel-info", "{{$lang->get(88)}}", "bottom", "center", "", "");  // Data Saved
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    var lat = 0;
    var lng = 0;

    function initMap() {
        console.log("initmap");
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: {{$settings->getDefaultLat()}}, lng: {{$settings->getDefaultLng()}} },
            zoom: 13,
        });
        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        const autocomplete = new google.maps.places.Autocomplete(input);
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);
        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);
        const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            lat = place.geometry.location.lat();
            lng = place.geometry.location.lng();
            console.log(place.geometry.location.lat());
            console.log(place.geometry.location.lng());
            document.getElementById("latlng").innerHTML = `{{$lang->get(104)}}: ${place.geometry.location.lat()}
                                        {{$lang->get(105)}}: ${place.geometry.location.lng()}`;   // Latitude  Longitude
            document.getElementById("buttonAdd").disabled = false;

            marker.setVisible(true);
            let address = "";

            if (place.address_components) {
                address = [
                    (place.address_components[0] &&
                        place.address_components[0].short_name) ||
                    "",
                    (place.address_components[1] &&
                        place.address_components[1].short_name) ||
                    "",
                    (place.address_components[2] &&
                        place.address_components[2].short_name) ||
                    "",
                ].join(" ");
            }
            infowindowContent.children["place-icon"].src = place.icon;
            infowindowContent.children["place-name"].textContent = place.name;
            infowindowContent.children["place-address"].textContent = address;
            infowindow.open(map, marker);
        });
    }

     function addAddress(){
         var _type = "home";
         if (WorkAddress) _type = "work";
         if (OtherAddress) _type = "other";

         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             },
             type: 'POST',
             url: '{{ url("addressSave") }}',
             data: {
                 default: defaultAddress,
                 text: document.getElementById("pac-input").value,
                 lat: lat,
                 lng: lng,
                 type: _type,
             },
             success: function (data){
                 console.log(data);
                 doAdd(data.address);
             },
             error: function(e) {
                 console.log(e);
                 showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
             }}
         );

     }

    function doAdd(address){
        document.getElementById('addressTable').innerHTML = "";
        address.forEach(function(data){
            var div = document.createElement("tr");
            var type = "{{$lang->get(110)}}"; // Home
            if (data.type == "work")
                type = "{{$lang->get(111)}}"; // Work
            if (data.type == "other")
                type = "{{$lang->get(112)}}"; // Other

            var defAddr = "";
            if (data.default == "true")
                defAddr = "{{$lang->get(106)}}"; // Default

            div.innerHTML = `<tr>
                    <td>
                        ${data.text}
                    </td>
                    <td>
                        ${data.lat}
                    </td>
                    <td>
                        ${data.lng}
                    </td>
                    <td>
                        ${type}
                    </td>
                    <td>
                        ${defAddr}
                    </td>
                    <td align="center"><a href="#"><img src="img/delete.png" onclick="removeAddr(${data.id});" class="img-fluid" style="max-height: 30px"/></a></td>
                    </tr>`;
            document.getElementById('addressTable').appendChild(div);
        });
    }

    function onRadio(name, value){
        if (name == "HomeAddress" && value){
            onSetCheck_WorkAddress(false);
            onSetCheck_OtherAddress(false);
        }
        if (name == "WorkAddress" && value){
            onSetCheck_HomeAddress(false);
            onSetCheck_OtherAddress(false);
        }
        if (name == "OtherAddress" && value){
            onSetCheck_HomeAddress(false);
            onSetCheck_WorkAddress(false);
        }
    }

    loadAddress();

    function loadAddress(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            url: '{{ url("addresses") }}',
            data: {},
            success: function (data){
                console.log(data);
                doAdd(data.address);
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function removeAddr(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("addressDel") }}',
            data: {
                id : id
            },
            success: function (data){
                console.log(data);
                doAdd(data.address);
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );

    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{$settings->getGoogleMapKey()}}&callback=initMap&libraries=places&v=weekly"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

