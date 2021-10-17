@inject('theme', 'App\Theme')
@inject('currency', 'App\Currency')
@inject('lang', 'App\Lang')

<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <div class="product-image-slider">

                            <div class="tab-content product-large-image-list" id="myTabContent">

                            </div>

                            <div class="product-small-image-list">
                                <div class="nav small-image-slider" role="tablist" id="mySmallTabContent">


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-xs-12">
                        <div class="product-feature-details">
                            <h2 id="dialog_info_name" class="product-title mb-15"></h2>

                            <h2 id="dialog_info_price" class="product-price mb-15">

                            </h2>

                            <p id="dialog_info_desc" class="product-description mb-20"></p>

                            <div id="variants_details" class="cart-buttons mb-20">
                            </div>

                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-10">
                                    <input type="text" id="dialog_info_count" value="1">
                                </div>
                                <div class="add-to-cart-btn">
                                    <a href="#" onClick="addToBasket();"><i class="fa fa-shopping-cart"></i>{{$lang->get(49)}} </a>  {{--Add to Cart--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var currentModalData;

    function openModal(id){
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("foodsInfo") }}',
            data: {
                id: id,
            },
            success: function (data){
                console.log(data);
                if (data.food == null)
                    return;
                currentModalData = data;
                document.getElementById("dialog_info_name").innerHTML = data.food.name;
                var text =`<div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                        <div class="single-product-img img-full">
                                            <img src="${data.food.image}" class="img-fluid">
                                    </div></div>`;
                var images_files_index = 2;

                if (data.food.images_files != null)
                    data.food.images_files.forEach(function(item, i, arr) {
                        text = text + `
                                <div class="tab-pane fade " id="single-slide${images_files_index}" role="tabpanel" aria-labelledby="single-slide-tab-${images_files_index}">
                                        <div class="single-product-img img-full">
                                            <img src="${item}" class="img-fluid">
                                    </div></div>
                            `;
                        images_files_index++;
                    });
                document.getElementById("myTabContent").innerHTML = text;
                //
                $('#mySmallTabContent').slick('removeSlide', null, null, true);
                images_files_index = 1;
                $('#mySmallTabContent').slick('slickAdd',`
                            <div class="single-small-image img-full">
                                <a data-toggle="tab" id="single-slide-tab-${images_files_index}" href="#single-slide${images_files_index}">
                                <img src="${data.food.image}" class="img-fluid" alt=""></a>
                            </div>`);
                images_files_index++;
                if (data.food.images_files != null)
                    data.food.images_files.forEach(function(item, i, arr) {
                        $('#mySmallTabContent').slick('slickAdd',`
                            <div class="single-small-image img-full">
                                <a data-toggle="tab" id="single-slide-tab-${images_files_index}" href="#single-slide${images_files_index}">
                                <img src="${item}" class="img-fluid" alt=""></a>
                            </div>
                    `);
                        images_files_index++;
                    });
                $('.small-image-slider a').on('click', function (e) {
                    e.preventDefault();

                    var $thisParent = $(this).closest('.product-image-slider');
                    var $href = $(this).attr('href');
                    $thisParent.find('.small-image-slider a').removeClass('active');
                    $(this).addClass('active');

                    $thisParent.find('.product-large-image-list .tab-pane').removeClass('active show');
                    $thisParent.find('.product-large-image-list ' + $href).addClass('active show');

                });

                //

                document.getElementById("dialog_info_desc").innerHTML = data.food.desc;

                var t = "";
                if (data.food.variants != null)
                    data.food.variants.forEach(function(item, i, arr) {
                        if (t == "") {
                            var _select = true
                            selectedItem = item.id;
                        }else
                            var _select = false;
                        arrayVariants.push({
                            id: item.id,
                            select: _select
                        });
                        if (item.dprice2 != "")
                            var textPrice2 = `<span class="main-price" style="font-weight: 400; font-size: 25px; float: right; margin-left: 10px; text-decoration: line-through; color: #999; margin-top: 15px">${item.price2}</span>
                                <span class="discounted-price" style="font-weight: 400; float: right; font-size: 25px; color: #{{$theme->getMainColor()}}; margin-top: 15px"> ${item.dprice2}</span>`;
                        else
                            var textPrice2 = `<span class="discounted-price" style="font-weight: 400; font-size: 20px; float: right; margin-top: 15px">${item.price2}</span>`;
                        if (t == "")
                            textPrice = textPrice2;
                        var imageFile = `<canvas style="width: 70px; height: 50px"></canvas>`;
                        if (item.image != "")
                            imageFile = `<img src="${item.image}" style="width:50px; height:50px; vertical-align:sub; margin-right: 20px; ">`;
                        t = `${t}
                            <div id="variants${item.id}" style="font-weight: bold; margin-bottom: 10px">
                            ${imageFile}
                            <canvas id="radio${item.id}" width="30" height="30" onclick="onRadioClick(${item.id});"></canvas>
                            <span style="vertical-align: super; font-size: 20px; margin-left: 10px;">${item.name}</span>
                            ${textPrice2}
                            </div>
                        `;
                    });
                document.getElementById("variants_details").innerHTML = t;
                drawRadios();
                mainPrice();
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function mainPrice(){
        if (currentModalData.food.discountprice2 != "")
            var textPrice = `<span class="main-price" style="font-size: 20px;">${currentModalData.food.price2}</span><span class="discounted-price" style="font-size: 20px;"> ${currentModalData.food.discountprice2}</span>`;
        else
            var textPrice = `<span class="discounted-price" style="font-size: 20px;">${currentModalData.food.price2}</span>`;

        currentModalData.food.variants.forEach(function(item, i, arr) {
            console.log("item.select="+ item.select);
            if (item.id == selectedItem){
                if (item.dprice2 != "")
                    textPrice = `<span class="main-price" style="font-size: 20px;">${item.price2}</span><span class="discounted-price" style="font-size: 20px;"> ${item.dprice2}</span>`;
                else
                    textPrice = `<span class="discounted-price" style="font-size: 20px;">${item.price2}</span>`;
                currentModalData.food.price = item.price;
                currentModalData.food.discountprice = item.dprice;
            }
        });

        document.getElementById("dialog_info_price").innerHTML = textPrice;
    }

    var arrayVariants = [];
    var selectedItem = "";

    function onRadioClick(id){
        selectedItem = id;
        arrayVariants.forEach(function(item, i, arr) {
            item.select = false;
            if (item.id == id)
                item.select = true;
        });
        drawRadios();
    }

    function drawRadios(){
        arrayVariants.forEach(function(item, i, arr) {
            drawRadio(`radio${item.id}`, item.select, "#{{$theme->getMainColor()}}");
        });
        mainPrice();
    }

    function drawRadio(id, check, color){
        var canvas = document.getElementById(id);
        if (canvas == null)
            return;
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, 30, 30);

        ctx.beginPath();
        ctx.lineWidth=2;
        ctx.strokeStyle=color;
        ctx.arc(15,15,10,0,12);
        ctx.stroke();
        if (check) {
            ctx.beginPath();
            ctx.arc(15, 15, 5, 0, 12);
            ctx.fillStyle = color;
            ctx.fill();
        }
    }

</script>
