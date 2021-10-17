@inject('currency', 'App\Currency')
@inject('topfoods', 'App\TopFoods')

@foreach($products as $key => $data)
    @include('elements.oneItem', array('data' => $data, 'type' => $type, 'parent' => $parent))
@endforeach
