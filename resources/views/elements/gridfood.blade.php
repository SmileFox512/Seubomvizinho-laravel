@inject('currency', 'App\Currency')
@inject('lang', 'App\Lang')

@isset ($data)
    @include('elements.oneItem', array('data' => $data, 'type' => 1, 'parent' => ''))
@endisset

