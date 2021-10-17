@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')
@inject('theme', 'App\Theme')
@inject('utils', 'App\Utils')
@inject('currency', 'App\Currency')

<html>
    @include('elements.head', array('title' => $breadcrumb))
<body>

@include('elements.header', array())

<!-- breadcrumb -->
<div class="breadcrumb-area q-mb20 q-mt10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{route('/')}}"><i class="fa fa-home q-mr10"></i>{{$lang->get(12)}}</a></li>      {{--HOME--}}
                        <li class="active">{{$breadcrumb}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shop page container -->

<div class="shop-page-container mb-50 ">
    <div class="container ">


                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered" style="background-color: #FFFFFF">
                        <thead class="thead-light">
                        <tr>
                            <th>{{$lang->get(95)}}</th> {{--Id--}}
                            <th>{{$lang->get(46)}}</th> {{--Product--}}
                            <th>{{$lang->get(96)}}</th> {{--Date--}}
                            <th>{{$lang->get(97)}}</th> {{--Status--}}
                            <th>{{$lang->get(20)}}</th> {{--Total--}}
                        </tr>
                        </thead>

                        <tbody>
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
                            </tr>

                        </tbody>
                    </table>
                </div>

        <table class="table table-bordered" style="background-color: #FFFFFF">
            <tbody>
            @foreach($ordersdetails as $key => $data)
                <tr>
                    <td align="center"><img src="{{$data->image}}" class="img-fluid" style="max-height: 100px;"></td>
                    <td class="align-middle" align="right">
                        {{$data->count}} x {{$currency->makePrice($data->foodprice)}} = {{$currency->makePrice($data->count * $data->foodprice)}}
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td class="align-middle" align="right">
                        @if ($couponCode != null)
                            <span class="text-info">{{$lang->get(100)}}:</span> {{$couponCode}} <br> {{--Coupon Code--}}
                            <span class="text-info">{{$lang->get(19)}}:</span> <del>{{$currency->makePrice($subtotalAll)}}</del> {{$currency->makePrice($subtotal)}}  {{--Subtotal--}}
                        @else
                            <span class="text-info">{{$lang->get(19)}}:</span> {{$currency->makePrice($subtotal)}}   {{--Subtotal--}}
                        @endif
                        <br>
                        <span class="text-info">{{$lang->get(101)}}:</span> {{$currency->makePrice($fee)}}   {{--Delivery Fee--}}
                        <br>
                        <span class="text-info">{{$lang->get(102)}}:</span> {{$currency->makePrice($tax)}}   {{--Tax--}}
                        <br>
                        <span class="text-info">{{$lang->get(103)}}:</span> {{$currency->makePrice($total)}}   {{--TOTAL--}}

                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</div>

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get('0')))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.wishlist', array('default_tax' => ""))

@include('elements.bottom', array())

</body>
</html>
