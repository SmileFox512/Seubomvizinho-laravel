@inject('topfoods', 'App\TopFoods')

{{--13.02.2021--}}
<div class="shop-page-container mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">

                <div class="sidebar-area">

                    @if ($subcatCount != 0)
                        <div class="sidebar mb-35">
                            <h3 class="sidebar-title">{{$lang->get(143)}}</h3>  {{--PRODUCT CATEGORIES--}}
                            <ul class="product-categories">
                                @foreach($subcat as $key => $data)
                                    <li>
                                        <canvas class="q-canvas-circle" width="15" height="15"></canvas>
                                        <a href="category?cat={{$data->id}}&market={{$market}}">{{$data->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include('elements.filterprice', array('min' => $min, 'max' => $max))

                    <!--=======  top foods  =======-->
                    <div class="sidebar mb-35">
                        <h3 class="sidebar-title">{{$lang->get(10)}}</h3>       {{--Top rated products--}}
                        @include('elements.topfoods', array('products' => $topfoods->getList(), 'type' => 2, 'parent' => ''))
                    </div>

                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2 mb-sm-35 mb-xs-35">

                <div class="shop-header mb-35">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">

                            <!--=======  grid or list   =======-->

                            <div class="view-mode-icons mb-xs-10 px-0">
                                <a class="active" href="#" data-target="grid"><img src="img/grid.png" class="img-fluid" style="height: 25px; padding-top: 3px;"/></a>
                                <a href="#" data-target="list"><img src="img/list.png" class="img-fluid" style="height: 25px; padding-top: 3px;"/></a>
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                            @include('elements.sortfood', array('data' => ""))
                            <p id="resultPages" class="result-show-message">
                                {{$lang->get(2)}}{{$page*12-11}}–{{$count_current+($page-1)*12}}{{$lang->get(3)}}{{$count}}{{$lang->get(4)}}</p>  {{--"Showing ", " of " " results"--}}
                        </div>
                    </div>
                </div>

                <!--=======  Foods list view  =======-->

                <div id="products" class="shop-product-wrap grid row no-gutters mb-35">

                    @include('elements.gridfood', array('data' => null))
                    @include('elements.listfood', array('data' => null))

                    @foreach($foods as $key => $data)

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                        <!--=======  Grid view product  =======-->
                        @include('elements.gridfood', array('data' => $data))
                        <!--=======  Shop list view product  =======-->
                        @include('elements.listfood', array('data' => $data))

                        </div>
                    @endforeach

                    @if (count($foods) == 0)
                    <div class="d-flex justify-content-around" style="align-self: center!important; width: 100%">
                        <img src="img/nf.jpg">
                    </div>
                    @endif

                </div>

                <!--=======  Pagination container  =======-->

                @include('elements.pagination', array('pages' => $pages, 'page' => $page, 'min' => $min, 'max' => $max))

            </div>
        </div>
    </div>
</div>
