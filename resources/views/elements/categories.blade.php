@foreach($categoriesAll as $key => $data)

<div class="slider q-mb20">
    <div class="container q-card">

        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog slider section title  =======-->

                <div class="q-section-title">
                    <h3>{{$data->name}}</h3>
                </div>

                <!--=======  End of blog slider section title  =======-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3" style="min-height: 200px">
                        <div class="q-img-cat">
                            <a href="category?cat={{$data->id}}">
                                <img src="{{$data->filename}}" class="q-img-cat2">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9" >
                        <div class="banner-slider-container" id="category-slider-container_{{$data->id}}">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    {{--console.log("-----categories.blade", "{{$data->name}}");--}}

    @isset($data->foods)
        @include('elements.topfoods', array('products' => $data->foods, 'type' => 1, 'parent' => 'category-slider-container_'.$data->id))
    @endisset
</script>


@endforeach

<script>
    // https://kenwheeler.github.io/slick/

    $('.banner-slider-container').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        prevArrow: '<button type="button" class="slick-prev"><img src="img/arrowl.png" style="width: 20px"></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="img/arrowr.png" style="width: 20px"></i></button>',
        responsive: [{
            breakpoint: 1499,
            settings: {
                slidesToShow: 4,
            }
        },
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

</script>
