@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')
@inject('currency', 'App\Currency')
@inject('category', 'App\Categories')
@inject('theme', 'App\Theme')

<html>
    @include('elements.head', array('title' => $food->name))
<body>

@include('elements.header', array('1' => ""))

@include('elements.broadcrumb', array('type' => "1"))

<div class="shop-page-container mb-50">
    <div class="container">

        <div class="single-product-content-container mb-35" >
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12" >
                    <div class="product-image-slider" >


                        <div class="col-md-12">
                            <div class="tab-content product-large-image-list">
                                <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                    <div class="single-product-img easyzoom img-full">
                                        <img src="{{$food->image}}" class="img-fluid" alt="">
                                        <a href="{{$food->image}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                                @if (sizeof($food->images_files) != 0)
                                    @php
                                        $images_files_index = 2;
                                    @endphp
                                    @foreach($food->images_files as $key => $data)
                                        <div class="tab-pane fade " id="single-slide{{$images_files_index}}" role="tabpanel" aria-labelledby="single-slide-tab-{{$images_files_index}}">
                                            <div class="single-product-img easyzoom img-full">
                                                <img src="{{$data}}" class="img-fluid">
                                                <a href="{{$data}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        @php
                                            $images_files_index++;
                                        @endphp
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="product-small-image-list" style="display: block">
                                <div class="nav small-image-slider" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1">
                                            <img src="{{$food->image}}" class="img-fluid" alt=""></a>
                                    </div>
                                    @if (sizeof($food->images_files) != 0)
                                        @php
                                            $images_files_index = 2;
                                        @endphp
                                        @foreach($food->images_files as $key => $data)
                                            <div class="single-small-image img-full">
                                                <a data-toggle="tab" id="single-slide-tab-{{$images_files_index}}" href="#single-slide{{$images_files_index}}">
                                                    <img src="{{$data}}" class="img-fluid" alt=""></a>
                                            </div>
                                            @php
                                                $images_files_index++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">

                    <div class="product-feature-details">
                        <h2 class="product-title mb-15">{{$food->name}}</h2>

                        <h2 class="product-price mb-15">
                            @if (sizeof($food->variants) == 0)
                                @if ($food->discountprice == 0)
                                    <span class="discounted-price"> {{$currency->makePrice($food->price)}}</span>
                                @else
                                    <span class="main-price">{{$currency->makePrice($food->price)}}</span>
                                    <span class="discounted-price"> {{$currency->makePrice($food->discountprice)}}</span>
                                @endif
                            @endif
                        </h2>

                        <p class="product-description mb-20">{{$food->desc}}</p>

                        <div id="variants" class="cart-buttons mb-20">

{{--variants--}}
                                @foreach($food->variants as $key => $data)
                                    <div id="variants{{$data->id}}" style="font-weight: bold; margin-bottom: 10px">
                                        @if ($data->image == "")
                                            <canvas style="width: 70px; height: 50px"></canvas>
                                        @else
                                            <img src="{{$data->image}}" style="width:50px; height:50px; vertical-align:sub; margin-right: 20px; ">
                                        @endif
                                        <canvas id="radio2{{$data->id}}" width="30" height="30" onclick="onRadioClick2({{$data->id}});"></canvas>
                                        <span style="vertical-align: super; font-size: 20px; margin-left: 10px;">{{$data->name}}</span>
                                        {{--price--}}
                                        @if ($data->dprice2 == "")
                                            <span class="main-price" style="font-size: 25px; float: right; margin-top: 15px">{{$currency->makePrice($data->price)}}</span>
                                        @else
                                            <span class="main-price" style="font-size: 20px; float: right; margin-left: 10px; text-decoration: line-through; color: #999; margin-top: 15px">{{$data->price2}}</span>
                                            <span class="discounted-price" style="font-size: 25px; float: right; color: #{{$theme->getMainColor()}}; margin-top: 15px">{{$data->dprice2}}</span>
                                        @endif
                                    </div>
                                @endforeach

                        </div>

                        <div class="cart-buttons mb-20">
                            <div class="pro-qty mr-20 mb-xs-20">
                                <input id="product_details_count" type="text" value="1">
                            </div>
                            <div class="btn btn-primary save-change-btn mt-0" onClick="addToBasketByIdCount({{$food->id}}, selectedItem2);">
                                 {{$lang->get(49)}}  {{--Add to Cart--}}
                            </div>
                        </div>
                        <div class="single-product-action-btn mb-20">
                            <a href="#" onClick="addToWishList({{$food->id}});" data-tooltip="{{$lang->get(15)}}"> <span class="icon_heart_alt"></span> {{$lang->get(15)}}</a>  {{--Add to wishlist--}}
                        </div>

                        <div class="single-product-category mb-20">
                            <h3>{{$lang->get(50)}}: <span><a href="{{route('/category')}}?cat={{$category->getIdByFoodId($food->id)}}">{{$category->getNameByFoodId($food->id)}}</a></span></h3> {{--Category--}}
                        </div>

                    </div>

                </div>
            </div>
        </div>

{{--Recommended products--}}

    @if (sizeof($food->rproducts_foods) != 0)
        <div class="slider related-product-slider mb-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="{{$theme->getMainColor()}}">
                            <h3>{{$lang->get(149)}}</h3>  {{--Recommended products--}}
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="related-product-slider-wrapper">

                            @include('elements.topfoods', array('products' => $food->rproducts_foods, 'type' => 1, 'parent' => ''))

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

{{--Top Rated products --}}

        @include('elements.topfoodsslider', array('topfoods' => ""))

    </div>
</div>

<script>
    var selectedItem2 = "";
    var arrayVariants2 = [];
    @foreach($food->variants as $key => $item)
        arrayVariants2.push({
            id: {{$item->id}},
            select: false
        });
    @endforeach
    if (arrayVariants2.length != 0)
        arrayVariants2[0].select = true;
    drawRadios2();

    function onRadioClick2(id){
        selectedItem2 = id;
        console.log("arrayVariants ");
        console.log(arrayVariants2);
        arrayVariants2.forEach(function(item, i, arr) {
            item.select = false;
            if (item.id == id)
                item.select = true;
        });
        drawRadios2();
    }

    function drawRadios2(){
        arrayVariants2.forEach(function(item, i, arr) {
            drawRadio2(`radio2${item.id}`, item.select, "#{{$theme->getMainColor()}}");
        });
    }

    function drawRadio2(id, check, color){
        var canvas = document.getElementById(id);
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, 30, 30);

        ctx.beginPath();
        ctx.lineWidth=2;
        ctx.strokeStyle=color;
        ctx.arc(15,15,10,0,12);
        ctx.stroke();
        if (check) {
            ctx.beginPath();
            ctx.arc(15, 15, 5, 0, 12);
            ctx.fillStyle = color;
            ctx.fill();
        }
    }

</script>
<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get($market)))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.wishlist', array('default_tax' => ""))

@include('elements.bottom', array())

</body>
</html>
