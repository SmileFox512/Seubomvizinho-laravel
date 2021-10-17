@inject('topfoods', 'App\TopFoods')

{{--13.02.2021--}}
<div class="slider related-product-slider mb-35">
    <div class="container q-card">
        <div class="row">
            <div class="col-lg-12" >

                <div class="q-section-title">
                    <h3>{{$lang->get(10)}}</h3>  {{--Top rated products--}}
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 q-pb10">

                <div class="related-product-slider-wrapper" id="topfoods-slider-container">
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    @include('elements.topfoods', array('products' => $topfoods->getList(), 'type' => 1, 'parent' => 'topfoods-slider-container'))
</script>
