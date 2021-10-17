@inject('currency', 'App\Currency')
@inject('lang', 'App\Lang')

<div class="sidebar mb-35">
    <h3 class="sidebar-title">{{$lang->get(11)}}</h3>   {{--Filter By Price--}}
    <div class="sidebar-price">
        <div id="price-range"></div>
        <input type="text" id="price-amount" readonly>

    </div>
</div>

<script>

    var sliderS;
    console.log("max: {{$max}}");
    $('#price-range').slider({
        range: true,
        min: {{$min}},
        max: {{$max}},
        values: [ {{$min}}, {{$max}} ],
        slide: slider_slide
    });

    function slider_slide( event, ui ) {
        sliderS = this;
        $('#price-amount').val( '{{$lang->get(9)}}' + makePrice(ui.values[0]) + ' - ' + makePrice(ui.values[1]));  // Price

        console.log("foodMinPrice " + ui.values[0]);
        console.log("foodMaxPrice " + ui.values[1]);
        if (!dataLoading) {
            foodMinPrice = ui.values[0];
            foodMaxPrice = ui.values[1];
            lastFoodMinPrice = foodMinPrice;
            lastFoodMaxPrice = foodMaxPrice;
            paginationGoPage(1);
        } else {
            lastFoodMinPrice = ui.values[0];
            lastFoodMaxPrice = ui.values[1];
        }
    }

    $('#price-amount').val( '{{$lang->get(9)}}' + makePrice({{$min}}) + ' - ' + makePrice({{$max}}));  // Price

    function slider_newRange(min, max){
        $("#price-range").slider('destroy');
        $('#price-range').slider({
            range: true,
            min: min,
            max: max,
            values: [ min, max ],
            slide: slider_slide
        });
        $('#price-amount').val( '{{$lang->get(9)}}' + makePrice(min) + ' - ' + makePrice(max));  // Price
    }

</script>
