@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')
@inject('settings', 'App\Settings')
@inject('userinfo', 'App\UserInfo')
@inject('currency', 'App\Currency')

<html>
    @include('elements.head', array('title' => $title)) {{--Cart--}}
<body>

@include('elements.header', array('1' => ""))

<!-- breadcrumb -->
<div class="breadcrumb-area q-mb20 q-mt10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{route('/')}}"><i class="fa fa-home q-mr10"></i>{{$lang->get(12)}}</a></li>      {{--HOME--}}
                        <li class="active">{{$title}}</li>  {{--Cart--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-page-container mb-50">

{{--    cart--}}

    <div id="view-cart" class="container" >

        <div class="cart-table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="pro-thumbnail">{{$lang->get(45)}}</th>  {{--Image--}}
                    <th class="pro-title">{{$lang->get(46)}}</th> {{--Product--}}
                    <th class="pro-price">{{$lang->get(47)}}</th> {{--Price--}}
                    <th class="pro-price">{{$lang->get(115)}}</th> {{--Quantity--}}
                    <th class="pro-price">{{$lang->get(20)}}</th> {{--Total--}}
                    <th class="pro-remove">{{$lang->get(48)}}</th> {{--Remove--}}
                </tr>
                </thead>
                <tbody id="cart_tbody">

                </tbody>
            </table>
        </div>

        <div class="row mt-15 mr-0" >

            <div class="col-5 p-5">
                <div class="cart-table" style="background-color: white;">
                    <div class="account-details-form">
                        <div class="row p-5">
                        <div class="mb-10">
                            <p class="h6">{{$lang->get(100)}}:</p> {{--Coupon Code--}}
                        </div>
                        <div>
                            <input id="couponCode" oninput="changeCoupon();" placeholder="{{$lang->get(116)}}" type="text" >  {{--Enter coupon--}}
                        </div>
                        <div class="col-12 mt-10">
                            <p class="h6 text-right" id="coupon_text"></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 cart-table p-5" >

                <div style="background-color: white;">
                    <div class="q-line q-mb20" style=" display: flex; justify-content: space-between;">
                        <span class="h6 pull-left">{{$lang->get(155)}} </span> <span id="basket2_shopName" class="h6 pull-right"></span> {{--Shop Name--}}
                    </div>
                    <div style=" display: flex; justify-content: space-between;">
                        <span class="h6 pull-left">{{$lang->get(19)}} </span>   {{--Subtotal--}}
                        <span id="" class="h6 pull-right">
                            <span id="basket2_coupon" class="h6"></span>
                            <span id="basket2_subtotal" class="h6 pull-right"></span>
                        </span>
                    </div>
                    <div style=" display: flex; justify-content: space-between;">
                        <span class="h6 pull-left">{{$lang->get(21)}} </span> <span id="basket2_tax" class="h6 pull-right"></span> {{--Tax--}}
                    </div>
                    <div style=" display: flex; justify-content: space-between;">
                        <span class="h6 pull-left">{{$lang->get(22)}} </span> <span id="basket2_fee" class="h6 pull-right"></span> {{--Delivery Fee--}}
                    </div>
                    <div style=" display: flex; justify-content: space-between;">
                        <span class="h4 pull-left">{{$lang->get(20)}} </span> <span id="basket2_total" class="h4 pull-right"></span> {{--Total--}}
                    </div>

                    <div id="minamount" hidden>
                        <p style="text-align: center; color: red; font-size: 25px; margin-top: 20px; font-size: 25px">{{$lang->get(150)}} {{--Minimum order amount--}}
                            <span id="minamount-sum"></span>
                        </p>
                    </div>
                    <div id="btn-checkout" class="floating-cart-btn text-center mt-25">
                        <a href="#" onclick="selectDeliveryMethod();">{{$lang->get(43)}}</a> {{--Checkout--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    delivery method--}}

    <div id="view-deliveryMethod" class="container" hidden>
        <div class="row" >
            <div class="col-12">
                <div class="cart-table">
                    <div class="account-details-form">
                        <div class="p-5">
                            <div class="myaccount-content">
                                <div class="col-12 mb-20">
                                    <p class="h5">{{$lang->get(119)}}:</p> {{--Select Destination method--}}
                                </div>
                                <div class="col-12 mb-10">
                                    @include('elements.check', array('id' => "pickup", 'text' => $lang->get(120), 'initvalue' => "false", 'callback' => "onRadioDestinationMethod"))  {{--Curbside pickup. I will pick up the groceries myself.--}}
                                </div>
                                <div class="col-12 mb-20">
                                    @include('elements.check', array('id' => "delivered", 'text' => $lang->get(121), 'initvalue' => "true", 'callback' => "onRadioDestinationMethod"))  {{--Deliver my products--}}
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-30">
                                        <button onclick="onBackToStart();" class="save-btn">{{$lang->get(123)}}</button> {{--Back--}}
                                    </div>
                                    <div class="col-6 mt-30 ">
                                        <div align="right">
                                            <button onclick="onPaymentMethodClick();" class="save-btn">{{$lang->get(122)}}</button> {{--Next--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div >

{{--    select address--}}

    <div id="view-Address" class="container" hidden>
        <div class="cart-table">
            <div class="account-details-form">
                <div class="p-5">

                    <div class="myaccount-content">
                        <div class="col-12 mb-30 q-line" id="shop_address" >
                        </div>
                        <div class="col-12 mb-20">
                            <p class="h5">{{$lang->get(124)}}:</p> {{--Select Destination Address--}}
                        </div>
                        <div class="col-12 mb-10" id="addresses-body" >
                            <div class="btn-group btn-group-toggle" id="AddressesSelectValue" data-toggle="buttons">

                            </div>
                        </div>
                        <div id="no-address" class="col-12">
                            <p>{{$lang->get(125)}}  {{--No addresses found. You can add addresses --}}
                            <a class="text-primary" href="{{route("/account")}}">
                                {{$lang->get(126)}}  {{--here--}}
                            </a>
                            </p>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 mb-30 q-line" id="total_costs" >

                        </div>
                        <div class="row">
                            <div class="col-6 mt-30">
                                <button onclick="onBackToDeliveryMethods();" class="save-btn">{{$lang->get(123)}}</button> {{--Back--}}
                            </div>
                            <div class="col-6 mt-30 ">
                                <div id="next-button-2" align="right">
                                    <button onclick="onPaymentMethods();" class="save-btn">{{$lang->get(122)}}</button> {{--Next--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    payments method--}}

    <div id="view-Payments" class="container" hidden>
        <div class="cart-table">
            <div class="account-details-form">
                <div class="p-5">

                    <div class="myaccount-content">
                        <div class="col-12 mb-20">
                            <p class="h5">{{$lang->get(127)}}:</p> {{--Payments Method--}}
                        </div>
                        <div class="col-12 mb-10" id="payments-body" >
                            <div class="btn-group btn-group-toggle" id="PaymentsSelectValue" data-toggle="buttons">

                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-30">
                                <button onclick="onBackToDeliveryMethods();" class="save-btn">{{$lang->get(123)}}</button> {{--Back--}}
                            </div>
                            <div class="col-6 mt-30 ">
                                <div id="next-button-2" align="right">
                                    <button onclick="onPayment();" class="save-btn">{{$lang->get(122)}}</button> {{--Next--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  PayMob payer data --}}

    <div id="view-PayMob" class="container" hidden>
        <div class="cart-table">
            <div class="account-details-form">
                <div class="p-5">

                    <div class="myaccount-content">
                        <div class="col-12 mb-20">
                            <p class="h5" style="text-align: center">Provide the following information for payment</p>
                        </div>
                        <div class="col-12 mb-10" >
                            @include('elements.form.text', array('label' => "Country", 'text' => "Enter Country", 'id' => "pmCountry", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Postal code", 'text' => "Enter Postal code", 'id' => "pmPostalCode", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "State", 'text' => "Enter State", 'id' => "pmState", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "City", 'text' => "Enter City", 'id' => "pmCity", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Street", 'text' => "Enter Street", 'id' => "pmStreet", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Building", 'text' => "Enter Building", 'id' => "pmBuilding", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Floor", 'text' => "Enter Floor", 'id' => "pmFloor", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Apartment", 'text' => "Enter Apartment", 'id' => "pmApartment", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "First Name", 'text' => "Enter First Name", 'id' => "pmFirstName", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Last Name", 'text' => "Enter Last Name", 'id' => "pmLastName", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Email", 'text' => "Enter Email", 'id' => "pmEmail", 'request' => "true", 'maxlength' => "400"))
                            @include('elements.form.text', array('label' => "Phone", 'text' => "Enter Phone", 'id' => "pmPhone", 'request' => "true", 'maxlength' => "400"))
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-30">
                                <button onclick="onBackToPaymentsMethod();" class="save-btn">{{$lang->get(123)}}</button> {{--Back--}}
                            </div>
                            <div class="col-6 mt-30 ">
                                <div id="next-button-2" align="right">
                                    <button onclick="onPaymentPayMob();" class="save-btn">{{$lang->get(122)}}</button> {{--Next--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get('0')))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.cartlist', array('default_tax' => ""))

<script>
    initTableCart();

    //
    // delivery method
    //
    function selectDeliveryMethod(){
        document.getElementById("view-cart").hidden = true;
        document.getElementById("view-deliveryMethod").hidden = false;
    }

    function onBackToStart(){
        document.getElementById("view-cart").hidden = false;
        document.getElementById("view-deliveryMethod").hidden = true;
    }

    function onRadioDestinationMethod(name, value){
        if (!pickup && !delivered){
            if (name == "pickup")
                onSetCheck_pickup(true);
            if (name == "delivered")
                onSetCheck_delivered(true);
        }
        if (name == "pickup" && value)
            onSetCheck_delivered(false);
        if (name == "delivered" && value)
            onSetCheck_pickup(false);

    }

    function onPaymentMethodClick(){
        loadAddressForCheckOuts();
        if (pickup)
            onPaymentMethods();
        if (delivered)
            onAddressSelect();
    }

    //
    // Address
    //

    function onAddressSelect(){
        document.getElementById("view-Address").hidden = false;
        document.getElementById("view-deliveryMethod").hidden = true;
        loadAddressForCheckOuts();
    }

    function onBackToDeliveryMethods(){
        document.getElementById("view-Address").hidden = true;
        document.getElementById("view-deliveryMethod").hidden = false;
        document.getElementById("view-Payments").hidden = true;
    }

    var user_address;
    var shop_address;

    function loadAddressForCheckOuts(){
        var shopId = 0;
        for (var i = basketItems.length; i--;) {
            shopId = basketItems[i].restId;
            break;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            url: '{{ url("addresses") }}',
            data: {
                shop_id: shopId
            },
            success: function (data){
                console.log("addresses");
                console.log(data);
                var text = "";
                user_address = data.address;
                shop_address = data;
                if (data.address.length == 0){
                    document.getElementById("no-address").hidden = false;
                    document.getElementById("next-button-2").hidden = true;
                    return;
                }
                document.getElementById("next-button-2").hidden = false;
                document.getElementById("no-address").hidden = true;
                data.address.forEach(function(data) {
                    var ch = "";
                    if (data.default == "true")
                        ch = "checked";
                    text += `
                            <div class="col-12" >
                                <div class="col-6">
                                    <input class="form-check-input" onclick="onAddressSelectForPerKm()" type="radio" name="exampleRadios" id="exampleRadios${data.id}"  style="width: 10%" ${ch}>
                                </div>
                                <div class="col-6 ml-30">
                                    <label id="exampleRadiosText${data.id}" class="form-check-label" for="exampleRadios${data.id}">${data.text}</label>
                                </div>
                            </div>
                    `;
                });

                document.getElementById("shop_address").innerHTML = `
                <h4>${data.shopName}</h4><br>
                <h5>${data.shopAddr}</h5>
                `;
                //
                document.getElementById("addresses-body").innerHTML = text;
                onAddressSelectForPerKm();
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1);
        var a =
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon/2) * Math.sin(dLon/2)
        ;
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI/180)
    }

    function onAddressSelectForPerKm(){
        console.log("onAddressSelectForPerKm");
        console.log(shop_address.shopPerKm);
        if (shop_address.shopPerKm === 1) {
            user_address.forEach(function (data) {
                var value = document.getElementById(`exampleRadios${data.id}`).checked;
                if (value) {
                    console.log(shop_address.shopLat)
                    console.log(shop_address.shopLng)
                    console.log(data.lat)
                    console.log(data.lng)
                    var t = getDistanceFromLatLonInKm(
                        shop_address.shopLat, shop_address.shopLng,
                        data.lat, data.lng);
                    console.log(t.toFixed(3));

                    //
                    var prices = getPrices();
                    delivery_fee = prices._fee*t;
                    var fee = getPriceString(delivery_fee);
                    document.getElementById("total_costs").innerHTML = `
                    <div class="cart-calculation">
                    <div class="calculation-details" style="width: 500px">
                        <p class="total" style="font-weight: bold;">{{$lang->get(19)}} <span style="float: right">${prices.subTotal}</span></p>  {{--Subtotal--}}
                        <p class="total" style="font-weight: bold;">{{$lang->get(21)}} <span style="float: right">${prices.tax}</span></p>  {{--Tax--}}
                        <p class="total" style="font-weight: bold;">{{$lang->get(22)}} <span style="float: right">
                                    ${fee} (${t.toFixed(3)} {{$settings->getKmOrMiles()}})</span></p>  {{--Delivery Fee--}}
                        <p class="total" style="font-weight: bold;">{{$lang->get(20)}} <span style="float: right">
                            ${getPriceString(prices._subTotal+delivery_fee+prices._tax)}</span></p> {{--Total--}}
                    </div>
                    </div>
                    `;
                }
            });
        }
    }

    var delivery_fee = 0;

    //
    // Payments method
    //
    let payment_methods = new Array();

    var selected_address_lat = "";
    var selected_address_lng = "";
    var selected_address_text = "";

    function onPaymentMethods(){
        var selectedItem;
        if (!pickup) {
            user_address.forEach(function (data) {
                var value = document.getElementById(`exampleRadios${data.id}`).checked;
                if (value) {
                    selectedItem = data.id;
                    selected_address_text = data.text;
                    selected_address_lat = data.lat;
                    selected_address_lng = data.lng;
                }
                //console.log(`exampleRadios${data.id}`, value);
            });
            console.log(document.getElementById(`exampleRadiosText${selectedItem}`).innerHTML);
        }
        if (pickup)
            document.getElementById("view-deliveryMethod").hidden = true;
        document.getElementById("view-Payments").hidden = false;
        document.getElementById("view-Address").hidden = true;
        loadPaymentsMethods();
    }

    function loadPaymentsMethods(){
        var text = "";
        if ("{{$settings->pmCashOnDelivery()}}" == "true") {
            text += onePaymentItem("cashOnDelivery", "checked", "{{$lang->get(137)}}");  {{--Cash on Delivery--}}
            payment_methods.push("cashOnDelivery");
        }
        // payMob
        if ("{{$settings->pmPayMobEnable()}}" == "true") {
            text += onePaymentItem("PayMob", "", "PayMob");  // PayMob
            payment_methods.push("PayMob");
        }
        if ("{{$settings->pmPayPal()}}" == "true") {
            text += onePaymentItem("PayPal", "", "PayPal");
            payment_methods.push("PayPal");
        }
        if ("{{$settings->pmStripeEnable()}}" == "true") {
            text += onePaymentItem("Stripe", "", "{{$lang->get(138)}}");  {{--Visa & Mastercard--}}
            payment_methods.push("Stripe");
        }

        document.getElementById(`payments-body`).innerHTML = text;
    }

    function onePaymentItem(id, ch, text){
        return `<div class="col-12" >
                    <div class="col-6">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="${id}"  style="width: 10%" ${ch}>
                    </div>
                    <div class="col-6 ml-30">
                        <label class="form-check-label" for="${id}">${text}</label>
                    </div>
                </div>`;
    }

    let order_info = JSON.parse(localStorage.getItem("order_info")) || [];

    //
    // Payment
    //
    function onPayment(){
        pickupPresent = "true";
        var prices = getPrices();
        var _total = prices._total.toFixed({{$currency->symbolDigits()}});
        pickupPresent = "false";
        //
        if (shop_address.shopPerKm === 1)
            _total = (prices._total+delivery_fee).toFixed({{$currency->symbolDigits()}});

        var order_info = {
            hint: "",
            address: selected_address_text,
            phone: "{{$userinfo->getUserPhone()}}",
            total: _total,
            lat: selected_address_lat,
            lng: selected_address_lng,
            couponName: _coupon[0],
            curbsidePickup: (pickup) ? "true" : "false",
            fee: delivery_fee,
        };
        console.log("save data1");
        console.log(order_info);
        localStorage.setItem('order_info', JSON.stringify(order_info));
        //
        for (let item of payment_methods) {
            var value = document.getElementById(item).checked;
            if (item == "cashOnDelivery" && value){
                window.location='{{route("/complete")}}';
            }
            if (item == "PayPal" && value){
                payPalPayment();
            }
            if (item == "Stripe" && value){
                window.location='{{route("/stripe")}}';
            }
            if (item == "PayMob" && value){
                document.getElementById("view-PayMob").hidden = false;
                document.getElementById("view-Payments").hidden = true;
            }
        }
    }

    function onBackToPaymentsMethod(){
        document.getElementById("view-PayMob").hidden = true;
        document.getElementById("view-Payments").hidden = false;
    }

    function onPaymentPayMob(){
        if (document.getElementById("pmCountry").value === "")
            return showNotification("pastel-danger", "The Country field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmPostalCode").value == "")
            return showNotification("pastel-danger", "The Postal Code field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmState").value == "")
            return showNotification("pastel-danger", "The State field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmCity").value == "")
            return showNotification("pastel-danger", "The City field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmStreet").value == "")
            return showNotification("pastel-danger", "The Street field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmBuilding").value == "")
            return showNotification("pastel-danger", "The Building field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmFloor").value == "")
            return showNotification("pastel-danger", "The Floor field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmApartment").value == "")
            return showNotification("pastel-danger", "The Apartment field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmFirstName").value == "")
            return showNotification("pastel-danger", "The First Name field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmLastName").value == "")
            return showNotification("pastel-danger", "The Last Name field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmEmail").value == "")
            return showNotification("pastel-danger", "The Email field is required ", "bottom", "center", "", "");
        if (document.getElementById("pmPhone").value == "")
            return showNotification("pastel-danger", "The Phone field is required ", "bottom", "center", "", "");
        payMobPayment();
    }

</script>

@include('elements.paypal', array())
@include('elements.payMob', array())

@include('elements.bottom', array())

</body>
</html>
