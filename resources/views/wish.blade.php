@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')

<html>
    @include('elements.head', array('title' => $title)) {{--Wishlist--}}
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
                        <li class="active">{{$lang->get(31)}}</li>  {{--Wishlist--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-page-container mb-50">
    <div class="container">

        <div class="cart-table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="pro-thumbnail">{{$lang->get(45)}}</th>  {{--Image--}}
                    <th class="pro-title">{{$lang->get(46)}}</th> {{--Product--}}
                    <th class="pro-price">{{$lang->get(47)}}</th> {{--Price--}}
                    <th class="pro-remove">{{$lang->get(48)}}</th> {{--Remove--}}
                </tr>
                </thead>
                <tbody id="wish_tbody">

                </tbody>
            </table>
        </div>

    </div>
</div>

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get('0')))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.wishlist', array('default_tax' => ""))

<script>
    initTableWish();
</script>

@include('elements.bottom', array())

</body>
</html>
