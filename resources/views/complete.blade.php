@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')
@inject('basket', 'App\Basket')
@inject('settings', 'App\Settings')

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

{{--    delivery method--}}

    <div id="view-deliveryMethod" class="container">
        <div class="row" >
            <div class="col-12">
                <div class="cart-table">
                    <div class="account-details-form">
                        <div class="p-5">
                            <div class="myaccount-content">
                                <div class="col-12 mb-20">
                                    <p id="text_title" class="h5">{{$lang->get(135)}}</p> {{--Wait!--}}
                                </div>
                                <div class="col-12 mb-20">
                                    <p id="order-id" class="h6"></p>
                                </div>
                                <div class="col-12 mb-10">
                                    <p id="text-1" hidden>{{$lang->get(132)}}</p> {{--You've successfully placed the order--}}
                                </div>
                                <div class="col-12 mb-20">
                                    <p id="text-2" hidden>{{$lang->get(133)}}</p> {{--You can check status of your order by using our delivery status feature. You will receive an order confirmation message.--}}
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-30">
                                        <button onclick="onBackToHome();" class="save-btn">{{$lang->get(134)}}</button> {{--Back to shop--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div >

</div>

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get('0')))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.cartlist', array('default_tax' => ""))

@include('elements.paypal', array())

<script>

    @if ($method == "paypal")
        initPayPalComplete();
    @endif

    @if ($method == "payMob")
        initPayMobComplete();
    @endif


    @if ($method == "Stripe")
        CreateOrder('{{$PayerID}}');
    @endif

    @if ($method == "cash")
        CreateOrder("CashOnDeivery");
    @endif

    function CreateOrder(id){
        let order_info = JSON.parse(localStorage.getItem("order_info")) || [];
        if (order_info.total == null)
            return;

        console.log("CreateOrder");
        var data = {
            send: "1",
            tax: "{{$basket->default_tax()}}",
            fee: order_info.fee,
            method: id,
            hint: "",
            address: order_info.address,
            phone: order_info.phone,
            total: order_info.total,
            lat: order_info.lat,
            lng: order_info.lng,
            couponName: order_info.couponName,
            curbsidePickup: order_info.curbsidePickup,
            data: basketItems
        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("addToBasket") }}',
            data: data,
            success: function (data){
                console.log("CreateOrder");
                console.log(data);
                if (data.error === "0"){
                    document.getElementById("text_title").innerHTML = `{{$lang->get(130)}}`;    {{--It's ordered!--}}
                    document.getElementById("order-id").innerHTML = `{{$lang->get(131)}} ${data.orderid}`;  {{--Order No. #--}}
                    document.getElementById("text-1").hidden = false;
                    document.getElementById("text-2").hidden = false;
                    localStorage.setItem('order_info', JSON.stringify({}));
                    basketItems = [];
                    localStorage.setItem('items', JSON.stringify(basketItems));
                    initBasket()
                } else
                    showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function onBackToHome(){
        window.location="{{route("/")}}";
    }

    function initPayPalComplete(){
        var username = '{{$settings->payPalClientId()}}';
        var password = '{{$settings->payPalSecret()}}';
        var name = window.btoa(`${username}:${password}`);
        console.log('initPayPalComplete');
        $.ajax({
            headers: {
                'Content-type': 'application/json',
                'Authorization': `Basic ${name}`
            },
            type: 'POST',
            url: `{{$settings->payPalUrl()}}/v1/payments/payment/{{$paymentId}}/execute`,
            data: `{
                "payer_id": "{{$PayerID}}"
            }`,
            success: function (data){
                console.log(data);
                if (data.transactions != null){
                    var res = data.transactions[0].related_resources;
                    if (res != null){
                        var id = res[0].sale.id;
                        console.log(id);
                        CreateOrder("PayPal_"+id);
                    }
                }
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function initPayMobComplete(){
        if ("{{$token}}" == "true")
            CreateOrder("PayMob "+ '{{$paymentId}}');
        else
            showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
    }


</script>

@include('elements.bottom', array())

</body>
</html>
