@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')
@inject('currency', 'App\Currency')

<html>
    @include('elements.head', array('title' => $title))
<body>

@include('elements.header', array('1' => ""))

@include('elements.broadcrumb', array('type' => "1"))

@if (count($banners1) > 0)
    @include('elements.banner1', array())
@endif

@if ($market == '0')
    @include('elements.mostPopularFoods', array())      {{--from favorites--}}
@endif

@include('elements.categories', array())

@if ($market == '0')
    @include('elements.banner2', array())
@endif

@if ($market == '0')
    @include('elements.topfoodsslider', array())
@endif

@include('elements.products', array())

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get($market)))
<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.wishlist', array('default_tax' => ""))

@include('elements.bottom', array())

</body>
</html>
