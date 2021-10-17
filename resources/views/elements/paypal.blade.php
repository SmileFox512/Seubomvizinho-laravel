@inject('settings', 'App\Settings')
@inject('currency', 'App\Currency')

<script>

    function payPalPayment(){
        var username = '{{$settings->payPalClientId()}}';
        var password = '{{$settings->payPalSecret()}}';
        var name = window.btoa(`${username}:${password}`);
        console.log('payPalPayment');
        console.log(name);
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Accept-Language': 'en_US',
                'Authorization': `Basic ${name}`
            },
            type: 'POST',
            url: '{{$settings->payPalUrl()}}/v1/oauth2/token',
            data: {
                grant_type: "client_credentials"
            },
            success: function (data){
                console.log(data);
                if (data.access_token != null){
                    payPalPayment2(data.access_token);
                }
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function payPalPayment2(token){
        let prices = getPrices();
        let total = prices._total.toFixed({{$currency->symbolDigits()}});
        console.log(token);
        let dataPayPal = `{
            "intent": "sale",
                "redirect_urls": {
                "return_url": "{{route("/paypalCallback")}}",
                "cancel_url": "https://cancel.example.com"
            },
            "payer": {
                "payment_method": "paypal"
            },
            "transactions": [
                {
                    "amount": {
                        "total": "${total}",
                        "currency": "{{$currency->currencyCode()}}",
                        "details": {
                            "subtotal": "${total}",
                            "shipping": "0",
                            "handling_fee": "0",
                            "shipping_discount": "0"
                        }
                    },
                    "description": "",
                    "item_list": {
                        "items": [
                        ]
                    }
                }
            ]
            }`;
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Accept-Language': 'en_US',
                'Authorization': `Bearer ${token}`,
                'content-type': 'application/json'
            },
            type: 'POST',
            url: '{{$settings->payPalUrl()}}/v1/payments/payment/',
            data: dataPayPal,
            success: function (data){
                console.log(data);
                if (data.links != null){
                    data.links.forEach(function(data) {
                        if (data.rel == "approval_url")
                            window.location=data.href;
                    });
                }
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "{{$lang->get(89)}}", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }



</script>
