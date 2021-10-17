@if ($type == 1)
    <div class="breadcrumb-area q-mb20 q-mt10">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            @if ($market != '0' && $market != '' )
                                <li><a href="shop?id={{$market}}"><i class="fa fa-home q-mr10"></i>{{$marketName}}</a></li>      {{--Market name--}}
                                @foreach($catNames as $key => $data)
                                    <li><a href="category?cat={{$data->id}}&market={{$market}}">{{$data->name}}</a></li>
                                @endforeach
                            @else
                                <li><a href="{{route('/')}}"><i class="fa fa-home q-mr10"></i>{{$lang->get(12)}}</a></li>      {{--HOME--}}
                                @foreach($catNames as $key => $data)
                                    <li><a href="category?cat={{$data->id}}">{{$data->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
