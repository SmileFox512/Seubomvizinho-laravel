@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')

<html>
    @include('elements.head', array('title' => $breadcrumb))
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
        @if ($page == "login")
            @include('elements.login')
        @endif
        @if ($page == "forgot")
            @include('elements.forgot')
        @endif
        @if ($page == "register")
            @include('elements.register')
        @endif
        @if ($page == "account")
            @include('elements.account')
        @endif
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
