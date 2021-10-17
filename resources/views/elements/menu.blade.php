@inject('lang', 'App\Lang')

<div class="col-md-1 ">
</div>
<div class="col-md-10 align-self-center hidden">
    <div class="main-menu align-self-center container">
        <nav>
            <ul>
                <li><a href="{{route('/')}}">{{$lang->get(12)}}</a></li>

                <li class="menu-item-has-children"><a href="#">{{$lang->get(13)}}<img src="img/arrow.png" class="img-fluid" style="height: 15px; padding-left: 5px; padding-bottom: 5px"/></a>
                    <ul class="sub-menu">
                        @include('elements.menucat', array('parent' => '-1'))
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
