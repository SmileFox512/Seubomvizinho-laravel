@inject('lang', 'App\Lang')
@inject('docs', 'App\Docs')

<html>
    @include('elements.head', array('title' => $title))
<body>

@include('elements.header', array('1' => ""))

@include('elements.broadcrumb', array('type' => "1"))

<!-- Shop page container -->

@include('elements.products', array())

<!--=====  down of page  ======-->

@include('elements.footer', array('docs' => $docs->get('0')))

<!--=====  Dialogs, elements, etc  ======-->

@include('elements.dialogDetails', array('pages' => ""))
@include('elements.wishlist', array('default_tax' => ""))

@include('elements.bottom', array())
</body>
</html>

