@inject('category', 'App\Categories')
{{-- Menu item - Categories--}}

@foreach($category->get(false) as $key => $data)
    @if ($data->parent == $parent)
        @php $sub = 0; @endphp
        @foreach($category->get(false) as $key => $data2)
            @if ($data2->parent == $data->id)
                @php $sub = 1; @endphp
            @endif
        @endforeach
        @if ($sub == 1)
            <li class="menu-item-has-children"><a href="category?cat={{$data->id}}">{{$data->name}} <img src="img/arrowr.png" class="img-fluid" style="float: right; height: 10px; margin-top: 5px;"/></a>
                <ul class="sub-menu">
                    @include('elements.menucat', array('parent' => $data->id))
                </ul>
        @else
            <li class="menu-item-has-children"><a href="category?cat={{$data->id}}">{{$data->name}}</a>
        @endif
        </li>
    @endif
@endforeach
