@inject('lang', 'App\Lang')
@inject('theme', 'App\Theme')
@inject('currency', 'App\Currency')
@inject('settings', 'App\Settings')

@include('elements.cartlist', array())

{{--13.02.2021--}}
<header>
    <div class="header-top pt-10 pb-10 pt-lg-10 pb-lg-10 pt-md-10 pb-md-10">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center text-sm-left">
                    
                    <div class="lang-currency-dropdown">
                        <ul>
						<!--
                            <li> <a href="#">{{$lang->defLangName()}} <i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    @foreach($lang->langs() as $key => $data)
                                        @if ($lang->defLang() != $data["file"])
                                            <li><a href="{{route('/setLang')}}?lang={{$data['file']}}">{{$data["name"]}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
																  
								 -->
                            @if ($settings->citiesIsPresent())
                            {{-- <li> <a href="#" id="current-city">{{$lang->get(162)}}<i class="fa fa-chevron-down"></i></a> --}}
                            {{-- <li> <a href="#" id="current-city">{{$lang->get(162)}}<i class="fa fa-chevron-down"></i></a> 
                                <ul>
                                    @foreach($settings->cities() as $key => $data)
                                        <li><a href="javascript:saveCity('{{$data}}');">{{$data}}</a></li>
                                    @endforeach
                                </ul>
                            </li> --}}
                            
                            @endif
                        </ul>
                    </div>
               
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  text-center text-sm-right">
                    <div class="header-top-menu">
                        <ul>
							{{-- <li><a href="{{route('/sellerReg')}}">{{$lang->get(157)}}</a></li> --}}
                            {{--Seller Registration--}}				   
                            @if (Auth::check())
                                <li>
                                    <a href="{{route('/chat')}}" style="display: inline-block;">{{$lang->get(146)}}</a>  {{--Chat--}}
                                    <div id="chat-count" style="background-color: red; height: 20px; width: 20px; border-radius: 50%; display: inline-block" hidden>
                                        <div id="chat-messages-count" style="display: table; margin: 0 auto; color: white; vertical-align: middle; text-align: center;">0</div>
                                    </div>
                                </li>
                            @endif
                            <li><a href="{{route('/account')}}">{{$lang->get(41)}}</a></li> {{--My account--}}
                            <li><a href="{{route('/wishlist')}}">{{$lang->get(42)}}</a></li> {{--Wishlist--}}
                            @if (Auth::check())
                                <li><a href="{{route('/cart')}}">{{$lang->get(113)}}</a></li> {{--View Cart--}}
                                <li><a onclick="logoutFromAccount();" href="#" >{{$lang->get(56)}}</a></li> {{--Logout--}}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row">
                <div class="row col-md-12 q-mt10">
                    <div class="col-md-1 px-0 col-xs-1">
                        <a href="{{route('/')}}">
                            <img src="{{$theme->getLogo()}}" class="img-fluid" style="max-height: 80px; position: absolute">
                        </a>
                    </div>
                    <div class="col-md-7 col-xs-7 align-self-center">
                        <div class="container">
                            @include('elements.search', array('default_tax' => ""))
                        </div>
                    </div>
                    <div class="col-md-4 align-self-center">
                        @include('elements.basket', array('1' => ""))
                    </div>
                </div>

                <!-- Menu  -->
                @include('elements.menu', array('parent' => '-1'))

                <div class="col-12">
                    <!-- Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function logoutFromAccount(){
        clearBasket();
        window.location='{{route('/logout')}}';
    }

    setInterval(getChatNewMessages, 10000); // one time in 10 sec
    getChatNewMessages();

    function getChatNewMessages() {
        console.log($('meta[name="_token"]').attr('content'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("getChatMessagesNewCount") }}',
            data: {
            },
            success: function (data){
                console.log(data);
                if (data.error != "0")
                    return;
                if (document.getElementById("chat-count") != null)
                    document.getElementById("chat-count").hidden = true;
                if (data.count == 0)
                    return;
                document.getElementById("chat-count").hidden = false;
                document.getElementById("chat-messages-count").innerHTML = data.count;
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }


    function gridFood(id, image, name, price2, priceDiscount, rest_drating, restName, rest_rating, restId){

        if ({{$currency->rightSymbol()}} == "false"){
            var price = parseFloat(price2).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
            var discPrice = parseFloat(priceDiscount).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
        }else{
            var price = "{{$currency->currency()}}" + parseFloat(price2).toFixed({{$currency->symbolDigits()}});
            var discPrice = "{{$currency->currency()}}" + parseFloat(priceDiscount).toFixed({{$currency->symbolDigits()}});
        }

        if (priceDiscount != 0)
            var textPrice = `<span class="main-price">${price}</span><span class="discounted-price">${discPrice}</span>`;
        else
            var textPrice = `<span class="discounted-price">${price}</span>`;

        var sale = "";
        if (priceDiscount != 0)
            sale = `<span class="onsale">{{$lang->get(1)}}</span>`;  // Sale

        var ratings = createRatings(rest_drating);

        text = `
<div class="gf-product shop-grid-view-product">
    <div class="image">
        <a href="{{route('/foodDetails')}}?id=${id}">
            ${sale}
            <img src="${image}" class="img-fluid" style="height: 200px; width: auto;">
        </a>
        <div class="product-hover-icons">
            <a href="javascript:void(0);" data-tooltip="{{$lang->get(14)}}" onClick="addToBasketById(${id});"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> {{--Add to cart--}}
        <a href="javascript:void(0);" data-tooltip="{{$lang->get(15)}}" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(${id});"> </a> {{--Add to wishlist--}}
        <a href="javascript:void(0);" data-tooltip="{{$lang->get(16)}}" onClick="openModal(${id});" data-toggle="modal" data-target="#quick-view-modal-container">  {{--Quick view--}}
        <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
    </div>
    </div>
    <div class="product-content">
    <h3 class="product-title" style="height: 3em;"><a href="javascript:void(0);" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
        ${name}
        </a></h3>
            <div class="price-box">
                ${textPrice}
            </div>
            <a href="shop?id=${restId}">${restName}</a>
            <div>
                ${ratings}
                ${rest_rating}
            </div>
        </div>
    </div>
        `;
        return text;
    }

    function listFood(item){

        if ({{$currency->rightSymbol()}} == "false"){
            var price = parseFloat(item.price).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
            var discPrice = parseFloat(item.discountprice).toFixed({{$currency->symbolDigits()}}) + "{{$currency->currency()}}";
        }else{
            var price = "{{$currency->currency()}}" + parseFloat(item.price).toFixed({{$currency->symbolDigits()}});
            var discPrice = "{{$currency->currency()}}" + parseFloat(item.discountprice).toFixed({{$currency->symbolDigits()}});
        }

        if (item.discountprice != 0)
            var textPrice = `<span class="main-price">${price}</span><span class="discounted-price">${discPrice}</span>`;
        else
            var textPrice = `<span class="discounted-price">${price}</span>`;

        var sale = "";
        if (item.discountprice != 0)
            sale = `<span class="onsale">{{$lang->get(1)}}</span>`;  // sale

        var ratings = createRatings(item.rest_drating);
        console.log(item.restName);
        text = `
            <div class="gf-product shop-list-view-product">
                <div class="image">
                    <a href="{{route('/foodDetails')}}?id=${item.id}">
                        ${sale}
                        <img src="${item.image}" class="img-fluid" style="height: 200px; width: auto;">
                    </a>
                    </div>
                    <div class="product-content">
                    <h3 class="product-title"><a href="{{route('/foodDetails')}}?id=${item.id}">${item.name}</a></h3>
                    <div class="price-box mb-20">
                    ${textPrice}
                    </div>
                    <p class="product-description">${item.desc}</p>
                    <div class="list-product-icons">
                        <a href="javascript:void(0);" data-tooltip="{{$lang->get(16)}}" onClick="openModal(${item.id});" data-toggle="modal" data-target="#quick-view-modal-container">  {{--Quick view--}}
                        <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
                        <a href="javascript:void(0);" data-tooltip="{{$lang->get(14)}}" onClick="addToBasketById(${item.id});"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> {{--Add to cart--}}
                        <a href="javascript:void(0);" data-tooltip="{{$lang->get(15)}}" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(${item.id});"> </a> {{--Add to wishlist--}}
                        </div>
                        <div style="margin-top: 30px">

                        <a href="shop?id=${item.restId}">${item.restName}</a>

                </div>
                <div>
                    ${ratings}
                    ${item.rest_rating}
                </div>
            </div>
        </div>`;
        return text;
    }



    //
    // city
    //
    let currentCity = JSON.parse(localStorage.getItem("vmarkets_currentCity")) || [];
    console.log("currentCity", currentCity);
    if (currentCity.city == null) {
        localStorage.setItem('vmarkets_currentCity', JSON.stringify({city: ""}));
        currentCity = JSON.parse(localStorage.getItem("vmarkets_currentCity")) || [];
    }
    if (currentCity.city !== "")
        document.getElementById("current-city").innerHTML = currentCity.city;

    function saveCity(name){
        console.log(name);
        localStorage.setItem('vmarkets_currentCity', JSON.stringify({city: name}));
        let currentCity = JSON.parse(localStorage.getItem("vmarkets_currentCity")) || [];
        console.log("currentCity", currentCity);
        document.getElementById("current-city").innerHTML = name;
        window.location.reload(true);
    }

</script>

