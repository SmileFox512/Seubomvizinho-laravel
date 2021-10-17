@inject('currency', 'App\Currency')
@inject('lang', 'App\Lang')

{{--13.02.2021--}}

@isset ($data)
<div class="gf-product shop-list-view-product">
    <div class="image">
        <a href="{{route('/foodDetails')}}?id={{$data->id}}">
            @if ($data->discountprice != 0)
                <span class="onsale">{{$lang->get(1)}}</span>            {{--Sale!--}}
            @endif
            <img src="{{$data->image}}" class="img-fluid" style="height: 200px; width: auto;">
        </a>
    </div>
    <div class="product-content">
        <h3 class="product-title"><a href="{{route('/foodDetails')}}?id={{$data->id}}">{{$data->name}}</a></h3>
        <div class="price-box mb-20">
            @if ($data->discountprice != 0)
                <span class="main-price">{{$currency->makePrice($data->price)}}</span>
                <span class="discounted-price">{{$currency->makePrice($data->discountprice)}}</span>
            @else
                <span class="discounted-price">{{$currency->makePrice($data->price)}}</span>
            @endif
        </div>
        <p class="product-description">{{$data->desc}}</p>
        <div class="list-product-icons">
            <a href="javascript:void(0);" data-tooltip="{{$lang->get(16)}}" onClick="openModal({{$data->id}});" data-toggle="modal" data-target="#quick-view-modal-container">  {{--Quick view--}}
                <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
            <a href="javascript:void(0);" data-tooltip="{{$lang->get(14)}}" onClick="addToBasketById({{$data->id}});"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> {{--Add to cart--}}
            <a href="javascript:void(0);" data-tooltip="{{$lang->get(15)}}" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList({{$data->id}});"> </a> {{--Add to wishlist--}}
        </div>
        <div style="margin-top: 30px">
            <a href="shop?id={{$data->restId}}">{{$data->restName}}</a>
            <div>
                @include('elements.rating', array('rating' => $data->rest_drating))
                {{$data->rest_rating}}
            </div>
        </div>
    </div>
</div>
@endisset

