@inject('lang', 'App\Lang')
@inject('currency', 'App\Currency')
@inject('basket', 'App\Basket')
@inject('settings', 'App\Settings')

{{--13.02.2021--}}

<div class="shopping-cart" id="shopping-cart">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2 px-0 ">
            <img src="img/cart.png" class="img-fluid q-santa" style="height: 50px; width: auto"/>
        </div>
        <div class="col-md-8">
            <a href="{{route("/cart")}}">
                <div class="cart-info d-inline-block">
                    <p>{{$lang->get(17)}}      {{--Shopping Cart--}}
                        <span id="basket_totals">
                        </span>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="cart-floating-box" id="cart-floating-box">
        <div class="cart-calculation">
            <div class="calculation-details">
                <p class="total">{{$lang->get(155)}} <span id="basket_shopName"></span></p>  {{--Shop Name--}}
            </div>
        </div>
        <div id="basket_products" class="cart-items">

        </div>
        <div id="cart-calculation" class="cart-calculation">
            <div class="calculation-details">
                <p class="total">{{$lang->get(19)}} <span id="basket_subtotal"></span></p>  {{--Subtotal--}}
                <p class="total">{{$lang->get(21)}} <span id="basket_tax"></span></p>  {{--Tax--}}
                <p class="total">{{$lang->get(22)}} <span id="basket_fee"></span></p>  {{--Delivery Fee--}}
                <p class="total">{{$lang->get(20)}} <span id="basket_total"></span></p> {{--Total--}}
            </div>
            <div class="floating-cart-btn text-center">
                @if (Auth::check())
                    <a href="{{route("/cart")}}">{{$lang->get(113)}}</a> {{--View Cart--}}
                @else
                    <a href="{{route("/account")}}">{{$lang->get(113)}}</a> {{--View Cart--}}
                @endif
            </div>
        </div>
    </div>
</div>

<script>

        // from modal dialog
        function addToBasket(){
            if (currentModalData == null)
                return;
            for (var i = basketItems.length; i--;) {
                if (basketItems[i].id == currentModalData.food.id)
                    return showNotification("pastel-danger", "{{$lang->get(23)}}", "bottom", "center", "", "");  // This product already on cart
                if (basketItems[i].restId != currentModalData.food.restId)
                    return showMessageDifferentShopsInBasket(currentModalData.food.id);
            }
            // save to local basket
            var item = {
                id: currentModalData.food.id,
                title: currentModalData.food.name,
                price: currentModalData.food.price,
                discountprice: currentModalData.food.discountprice,
                image: currentModalData.food.image,
                count: document.getElementById("dialog_info_count").value,
                restId: currentModalData.food.restId,
                restName: currentModalData.food.restName,
                tax: currentModalData.food.tax,
                //
                fee: currentModalData.food.fee,
                percent: currentModalData.food.percent,
                perkm: currentModalData.food.perkm,
            };
            basketItems.push(item);
            localStorage.setItem('items', JSON.stringify(basketItems));
            initBasket();
            saveOrder();
            // hide dialog
            $('#quick-view-modal-container').modal('hide')
        }

        var countToBasket = 1;
        var temp_variant_id = "";
        function addToBasketByIdCount(id, variant_id){
            temp_variant_id = variant_id;
            countToBasket = document.getElementById("product_details_count").value;
            addToBasketById(id);
        }

        function addToBasketById(id){
            for (var i = basketItems.length; i--;)
                if (basketItems[i].id == id)
                    return showNotification("pastel-danger", "{{$lang->get(23)}}", "bottom", "center", "", "");  // This product already on cart
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("foodsInfo") }}',
                data: {
                    id: id,
                },
                success: function (data){
                    console.log(data);
                    if (data.food == null)
                        return;

                    for (var i = basketItems.length; i--;)
                        if (basketItems[i].restId != data.food.restId)
                            return showMessageDifferentShopsInBasket(id);

                    var _price = data.food.price;
                    var _dprice = data.food.discountprice;
                    var _name = data.food.name;
                    console.log("temp_variant_id");
                    console.log(temp_variant_id);
                    console.log(_price);
                    console.log(_dprice);
                    if (temp_variant_id != "")
                        data.food.variants.forEach(function(data){
                            if (data.id == temp_variant_id){
                                _price = data.price;
                                _dprice = data.dprice;
                                _name = _name + " " + data.name;
                            }
                        });
                    console.log(_price);
                    console.log(_dprice);
                    // save to local basket
                    var item = {
                        id: data.food.id,
                        title: _name,
                        price: _price,
                        discountprice: _dprice,
                        image: data.food.image,
                        count: countToBasket,
                        restId: data.food.restId,
                        restName: data.food.restName,
                        tax: data.food.tax,
                        //
                        fee: data.food.fee,
                        percent: data.food.percent,
                        perkm: data.food.perkm,
                    };
                    temp_variant_id = "";
                    countToBasket = 1;
                    basketItems.push(item);
                    console.log(basketItems);
                    localStorage.setItem('items', JSON.stringify(basketItems));
                    initBasket();
                    saveOrder();
                    showNotification("pastel-info", "{{$lang->get(25)}}", "bottom", "center", "", "");  // Product added to cart
                },
                error: function(e) {
                    console.log(e);
                }}
            );
        }

        // localStorage.setItem('items', JSON.stringify([]));
        let basketItems = JSON.parse(localStorage.getItem("items")) || [];
        initBasket();
        @if (\Request::route()->getName() != "/complete" && \Request::route()->getName() != "/completeStripe")
            loadBasketFromServer();
        @endif

        function loadBasketFromServer(){
            console.log("loadBasketFromServer");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("getBasket") }}',
                data: {
                },
                success: function (data){
                    console.log(data);
                    if (data.order == null || data.orderdetails == null)
                        return;
                    console.log("basketItems");
                    console.log(basketItems);
                    //
                    var found = 0;
                    if (basketItems.length === 0)
                        found = 1;
                    for (var i = basketItems.length; i--;) {
                        for (var y = data.orderdetails.length; y--;) {
                            if (data.orderdetails[y].id === basketItems[i].id)
                                found = 1;
                        }
                    }
                    // add items to local basket
                    for (var y = data.orderdetails.length; y--;) {
                        var itemFound = 0;
                        for (var i = basketItems.length; i--;) {
                            console.log("data.orderdetails[y].foodid " + data.orderdetails[y].foodid + " basketItems[i].id " + basketItems[i].id);
                            if (data.orderdetails[y].foodid === basketItems[i].id)
                                itemFound = 1;  // item already in local basket
                        }
                        console.log("itemFound " + itemFound)
                        if (itemFound === 0) {
                            // add to local basket
                            var item = {
                                id: data.orderdetails[y].foodid,
                                title: data.orderdetails[y].food,
                                price: data.orderdetails[y].foodprice,
                                discountprice: data.orderdetails[y].discountprice,
                                image: data.orderdetails[y].image,
                                count: countToBasket,
                                restId: data.order.restaurant,
                                restName: data.restName,
                                tax: data.tax,
                                //
                                fee: data.fee,
                                percent: data.percent,
                                perkm: data.perkm,
                            };
                            console.log("add data to local basket");
                            console.log(item);
                            countToBasket = 1;
                            basketItems.push(item);
                            console.log(basketItems);
                            localStorage.setItem('items', JSON.stringify(basketItems));
                            initBasket();
                            showNotification("pastel-info", "{{$lang->get(25)}}", "bottom", "center", "", "");  // Product added to cart
                        }
                    }
                    if (found == 0) {
                        saveOrder();
                    }
                },
                error: function(e) {
                    console.log(e);
                    //showNotification("pastel-danger", `{{$lang->get(89)}} loadBasketFromServer"`, "bottom", "center", "", "");  // Something went wrong
                }}
            );
        }

        function initBasket(){
            var totalCount = 0;
            document.getElementById("basket_shopName").innerHTML = "";
            document.getElementById("basket_products").innerHTML = basketItems.map((product, i) => {
                totalCount += parseInt(product.count);
                if (product.discountprice != 0)
                    var price = parseFloat(product.discountprice);
                else
                    var price = parseFloat(product.price);

                console.log("initBasket");
                console.log(price);
                var currentPrice = price*parseInt(product.count);
                console.log(currentPrice);
                document.getElementById("basket_shopName").innerHTML = product.restName;
                return `
                <div class="cart-float-single-item d-flex">
                    <span class="remove-item" onClick="removeFromBasket(${product.id});">
                            <a href="#"><img src="img/delete.png" class="img-fluid" style="width: 20px"></a></span>
                    <div class="cart-float-single-item-image">
                        <a href="{{route('/foodDetails')}}?id=${product.id}"><img src="${product.image}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="cart-float-single-item-desc">
                        <p class="product-title"> <a href="{{route('/foodDetails')}}?id=${product.id}" style="margin-right: 20px;">${product.title} </a></p>
                        <p class="price"><span class="count">${getPriceString(price)}x${product.count}</span> = ${getPriceString(currentPrice)}</p>
                    </div>
                </div>
                `;
            }).join("");
            var prices = getPrices();

            document.getElementById("basket_subtotal").innerHTML = prices.subTotal;
            document.getElementById("basket_tax").innerHTML = prices.tax;
            if (prices.perkm == '1')
                document.getElementById("basket_fee").innerHTML = prices.fee + " {{$lang->get(156)}} {{$settings->getKmOrMiles()}}"; {{--per km--}}
            else
                document.getElementById("basket_fee").innerHTML = prices.fee;

            document.getElementById("basket_total").innerHTML = prices.total;
            //
            document.getElementById("basket_totals").innerHTML = totalCount + " {{$lang->get(18)}} - " + prices.total; {{--items--}}
        }

        var pickupPresent = "false";
        function getPrices(){
            var _debug = [];
            var subTotalPrice = 0;
            var taxT = 0;
            var feeT = 0;
            var percentT = 0;
            var perkmT = 0;
            basketItems.map((product, i) => {
                if (product.discountprice != 0)
                    var currentPrice = (parseFloat(product.discountprice)*parseInt(product.count));
                else
                    var currentPrice = (parseFloat(product.price)*parseInt(product.count));
                subTotalPrice += currentPrice;
                taxT = product.tax;
                feeT = parseFloat(product.fee);
                percentT = product.percent;
                perkmT = product.perkm;
            });
            //
            var couponPrice = subTotalPrice;
            _debug.push({subTotalPrice: subTotalPrice});
            _coupon = "";
            if (allCoupons != null) {
                let t = document.getElementById("couponCode");
                if (t != null) {
                    if (t.value.length > 0)
                        document.getElementById("coupon_text").innerHTML = "{{$lang->get(117)}}"; // Not Found
                    for (let coupon of allCoupons) {
                        if (coupon[0].toUpperCase() == document.getElementById("couponCode").value.toUpperCase()) {
                            _coupon = coupon;
                            _debug.push({_coupon: _coupon});
                            subTotalPrice = getSubTotalWithCoupon(_debug);
                            document.getElementById("coupon_text").innerHTML = "{{$lang->get(118)}}"; // Found
                            _debug.push({subTotalPrice: subTotalPrice});
                            break;
                        }
                    }
                }
            }
            //
            var tax = taxT * subTotalPrice/100;
            var fee = feeT;
            if (percentT == '1')
                fee = subTotalPrice * feeT/100;
            if (perkmT == '1')
                fee = feeT;
            if (pickupPresent == "true")
                fee = 0;
            if (subTotalPrice == 0)
                fee = 0;
            _debug.push({fee: fee});
            _debug.push({tax: tax});
            _debug.push({percentT: percentT});
            _debug.push({perkmT: perkmT});
            var _total = subTotalPrice+tax+fee;
            if (perkmT == '1')
                _total = subTotalPrice+tax;
            _debug.push({_total: _total});
            var totalString = getPriceString(_total);
            _debug.push({totalString: totalString});
            console.log("getPrices");
            console.log(_debug);
            return {
                subTotal: getPriceString(subTotalPrice),
                _subTotal: subTotalPrice,
                tax: getPriceString(tax),
                _tax: tax,
                fee: getPriceString(fee),
                _fee: fee,
                total: totalString,
                coupon: _coupon,
                couponPrice: getPriceString(couponPrice),
                _total: _total,
                perkm: perkmT
            };
        }

        function saveOrder(){
            console.log("saveOrder");
            var data = {
                send: "0",
                tax: 0,
                fee: 0,
                method: "",
                hint: "",
                address: "",
                phone: "",
                total: "0",
                lat: 0,
                lng: 0,
                couponName: "",
                curbsidePickup: "false",
                data: basketItems,
            };
            // data = JSON.stringify(data);
            console.log(data);
            //return;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("addToBasket") }}',
                data: data,
                success: function (data){
                    console.log(data);
                },
                error: function(e) {
                    console.log(e);
                }}
            );
        }

        function getPriceString(price){
            if ({{$currency->rightSymbol()}} == "false")
                return parseFloat(price).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
            else
                return "{{$currency->currency()}}" + parseFloat(price).toFixed({{$currency->symbolDigits()}});
        }

        function removeFromBasket(id){
            for (var i = basketItems.length; i--;)
                if (basketItems[i].id == id)
                    basketItems.splice(i, 1);
            localStorage.setItem('items', JSON.stringify(basketItems));
            redrawCart();
        }

        $("#shopping-cart").mouseenter(function () {
            $("#cart-floating-box").stop().slideDown({
                duration: 1000,
                progress: function(){ // callback
                    // console.log("floating:" + document.getElementById('cart-floating-box').clientHeight);
                    // console.log("products:" + document.getElementById('basket_products').clientHeight);
                },
                complete: function(){ // callback
                    var t = document.getElementById('basket_products').clientHeight +  document.getElementById('cart-calculation').clientHeight + 140;
                    document.getElementById('cart-floating-box').style.height=t+'px';
                },
            });
        });

        $("#shopping-cart").mouseleave(function () {
            $("#cart-floating-box").stop().slideUp(1000);
        });


        var allCoupons = new Array();
        var _coupon = "";
        @foreach($settings->getCoupons() as $key => $idata)
        allCoupons.push([
            "{{$idata->name}}",             // 0
            "{{$idata->discount}}",         // 1
            "{{$idata->inpercents}}",       // 2
            "{{$idata->amount}}",           // 3
            "{{$idata->allRestaurants}}",   // 4
            "{{$idata->allCategory}}",      // 5
            "{{$idata->allFoods}}",         // 6
            JSON.parse("[{{$idata->restaurantsList}}]"),    // 7
            JSON.parse("[{{$idata->categoryList}}]"),       // 8
            JSON.parse("[{{$idata->foodsList}}]")           // 9
        ]);
        @endforeach
        console.log("allCoupons");
        console.log(allCoupons);

        function getSubTotalWithCoupon(_debug){
            var _total = 0;
            basketItems.forEach(function(entry) {
                var total = entry.price * entry.count;
                _total += total;
            });
            if (_coupon == null)
                return _total;
            _debug.push({_total: _total});
            _debug.push({_couponAmount: _coupon[3]});
            if (_total > _coupon[3]){
                _debug.push({"_total > _coupon[3]": "yes"});
                var total = 0.0;
                basketItems.forEach(function(entry) {
                    var price = entry.price * entry.count;
                    var priceCoupon = price;
                    if (_coupon[4] == '1') {        // allRestaurants
                        priceCoupon = _couponCalculate(price);
                        if (_coupon[5] != '1' && !_coupon[8].includes(entry.category))       // allCategory
                            priceCoupon = price;
                        if (_coupon[6] != '1' && !_coupon[9].includes(entry.foodid))
                            priceCoupon = price;
                    }else{
                        if (_coupon[7].includes(dataOrder.order.restaurant)) {
                            priceCoupon = _couponCalculate(price);
                            if (_coupon[5] != '1' && !_coupon[8].includes(entry.category))       // allCategory
                                priceCoupon = price;
                            if (_coupon[6] != '1' && !_coupon[9].includes(entry.foodid))
                                priceCoupon = price;
                        }else {
                            priceCoupon = price;
                        }
                    }
                    total += priceCoupon;
                });
                if (total != _total)
                    if (_coupon[2] != '1')
                        total = _total - _coupon[1];
                return total;
            }
            return _total;
        }

        function _couponCalculate(_total){
            if (_coupon[2] == '1')  // inpercents
                _total = (100-_coupon[1])/100*_total;  // discount
            else
                _total -= _coupon[1]; //discount
            return _total;
        }

        function clearBasket(){
            basketItems = [];
            localStorage.setItem('items', JSON.stringify(basketItems));
        }

        function showMessageDifferentShopsInBasket(id){
            swal({
                title: "{{$lang->get(28)}}", // INFORMATION
                text: "{{$lang->get(152)}}", // You can add to cart, only products from single market. Do you want to reset cart? And add new product.
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{$lang->get(153)}}", // YES
                cancelButtonText: "{{$lang->get(154)}}", // CANCEL
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    clearBasket();
                    redrawCart();
                    addToBasketById(id);
                } else {
                }
            });
        }

</script>

<script src="js/bootstrap-notify/bootstrap-notify.js"></script>
<script src="js/utils.js"></script>

