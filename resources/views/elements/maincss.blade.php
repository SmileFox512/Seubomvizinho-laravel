@inject('theme', 'App\Theme')

<style>

.q-chat-messages-window{
    height: 80%;
    overflow: auto;
    overflow-y: scroll;
    padding: 20px;
    background-color: white;
    border-top-left-radius: {{$theme->getRadius()}}px;
    border-top-right-radius: {{$theme->getRadius()}}px;
    border: 1px solid grey;
    border-color: #e0e0e0;
}

.q-chat-users-window{
    height: 100%;
    overflow: auto;
    overflow-y: scroll;
    background-color: white;
    border-top-left-radius: {{$theme->getRadius()}}px;
    border-top-right-radius: {{$theme->getRadius()}}px;
    border: 1px solid grey;
    border-color: #e0e0e0;
}

.q-chat-send-window{
    border: 1px solid grey;
    border-color: #e0e0e0;
    border-bottom-left-radius: {{$theme->getRadius()}}px;
    border-bottom-right-radius: {{$theme->getRadius()}}px;
    padding: 20px;
}

.q-canvas-circle{
    border-radius: 50%;
    background-color: #{{$theme->getMainColor()}};
}

.product-categories li a{
    color: #{{$theme->getMainColor()}};
}

.product-categories li:hover a{
    color: #{{$theme->getMainColorHover()}};
}

.product-categories li:hover canvas{
    background-color: #{{$theme->getMainColorHover()}};
}

.q-banner{
    max-height: {{$theme->getBannerHeight()}};;
    width: 100%;
    object-fit: contain;
}

.q-slider {
    position: relative;
    height: {{$theme->getSliderProductHeight()}};
    display: inline-block;
}
.q-slider a:hover {
    background: #5d8801; }
.q-slider a:hover:before, .q-slider a:hover:after {
    visibility: visible;
    opacity: 1; }

.product-hover-icons {
    position: absolute;
    bottom: auto;
    left: 50%;
    margin: 0;
    margin-right: -50%;
    max-width: 90%;
    padding: 0;
    top: 50%;
    z-index: 78;
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
.product-hover-icons a {
    display: inline-block;
    background: #{{$theme->getMainColor()}};
    border: none;
    color: #fff;
    height: 43px;
    letter-spacing: 0;
    line-height: 46px;
    margin: 2px;
    padding: 0;
    text-align: center;
    text-transform: none;
    width: 43px;
    border-radius: 100%;
    -webkit-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
    position: relative; }
@media only screen and (max-width: 575px) {
    .product-hover-icons a {
        height: 33px;
        width: 33px;
        line-height: 33px;
        font-size: 13px; } }
.product-hover-icons a:hover {
    background: #{{$theme->getMainColorHover()}};
}
.product-hover-icons a:hover:before, .product-hover-icons a:hover:after {
    visibility: visible;
    opacity: 1; }
.product-hover-icons a.active {
    background: #{{$theme->getMainColorHover()}}; }
.product-hover-icons a:before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-bottom: 12px;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    font-size: 14px;
    font-weight: 400;
    background-color: #444444;
    color: #ffffff;
    line-height: 16px;
    padding: 5px 10px;
    border-radius: 2px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
.product-hover-icons a:after {
    position: absolute;
    left: 50%;
    bottom: 100%;
    margin-bottom: 8px;
    margin-left: -4px;
    content: "";
    border-width: 4px 4px 0 4px;
    border-style: solid;
    border-color: #444444 transparent transparent transparent;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }

/* header advance search */
.header-advance-search {
    position: relative;
    -ms-flex-preferred-size: 50%;
    flex-basis: 50%;
    background-color: #ffffff;
    height: 50px;
    border: 1px solid #e4e4e4;
    padding-right: 55px;
    border-radius: {{$theme->getRadius()}}px !important;
}
@media only screen and (min-width: 1200px) and (max-width: 1499px) {
    .header-advance-search {
        -ms-flex-preferred-size: 45%;
        flex-basis: 45%; } }
@media only screen and (min-width: 992px) and (max-width: 1199px) {
    .header-advance-search {
        -ms-flex-preferred-size: 40%;
        flex-basis: 40%; } }
@media only screen and (max-width: 479px) {
    .header-advance-search {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        margin-bottom: 15px; } }
.header-advance-search input {
    border: none;
    width: 95%;
    margin-top: 12px;
    margin-left: 15px;
    color: #a4a4a4; }
.header-advance-search button {
    position: absolute;
    right: 5px;
    top: 5px;
    background: none;
    border: none;
    background-color: #{{$theme->getMainColor()}};
    color: #ffffff;
    width: 60px;
    height: 40px;
    border-radius: {{$theme->getRadius()}}px !important;
}
.header-advance-search button:hover {
    background-color: #{{$theme->getMainColorHover()}}; }

/*----------  list product icons  ----------*/
.list-product-icons {
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
.list-product-icons a {
    margin-right: 10px;
    display: inline-block;
    background: #{{$theme->getMainColor()}};
    border: none;
    color: #fff;
    height: 43px;
    letter-spacing: 0;
    line-height: 46px;
    margin: 0;
    padding: 0;
    text-align: center;
    text-transform: none;
    width: 43px;
    border-radius: 100%;
    -webkit-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
    position: relative; }
.list-product-icons a:hover {
    background: #{{$theme->getMainColorHover()}}; }
.list-product-icons a:hover:before, .list-product-icons a:hover:after {
    visibility: visible;
    opacity: 1; }
.list-product-icons a.active {
    background: #{{$theme->getMainColorHover()}}; }
.list-product-icons a:before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-bottom: 12px;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    font-size: 14px;
    font-weight: 400;
    background-color: #444444;
    color: #ffffff;
    line-height: 16px;
    padding: 5px 10px;
    border-radius: 2px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
.list-product-icons a:after {
    position: absolute;
    left: 50%;
    bottom: 100%;
    margin-bottom: 8px;
    margin-left: -4px;
    content: "";
    border-width: 4px 4px 0 4px;
    border-style: solid;
    border-color: #444444 transparent transparent transparent;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }



.q-card{
    background: #fff;
    box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
    border-radius: {{$theme->getRadius()}}px !important;
}




/*----------  07.9 Shop grid view product  ----------*/
.shop-grid-view-product {
    margin-right: 5px;
    padding: 30px 5px;
    text-align: center;
    position: relative;
    margin-bottom: 5px;
    border-radius: {{$theme->getRadius()}}px !important;
    background-color: white;
}
.shop-grid-view-product .image {
    margin-bottom: 20px; }
.shop-grid-view-product .image a {
    display: block; }
/*.shop-grid-view-product .image a img {*/
/*  width: 100%; }*/
.shop-grid-view-product .product-content .product-categories {
    margin-bottom: 7px; }
.shop-grid-view-product .product-content .product-categories a {
    color: #999;
    font-size: 13px; }
.shop-grid-view-product .product-content .product-categories a:hover {
    color: #{{$theme->getMainColor()}}; }
.shop-grid-view-product .product-content h3.product-title {
    font-size: 16px;
    color: #222;
    font-weight: 500;
    line-height: 23px; }
.shop-grid-view-product .product-content .price-box .main-price {
    color: #999;
    font-size: 17px;
    text-decoration: line-through;
    margin-right: 8px; }
.shop-grid-view-product .product-content .price-box .discounted-price {
    color: #{{$theme->getMainColor()}};
    font-size: 21px; }

/*----------  07.10 Shop list view product  ----------*/
.shop-list-view-product {
    padding: 20px;
    background-color: #ffffff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-radius: {{$theme->getRadius()}}px !important;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: start;
    margin-bottom: 5px;
     }
@media only screen and (max-width: 575px) {
    .shop-list-view-product {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column; } }
.shop-list-view-product .image {
    margin-right: 20px;
    -ms-flex-preferred-size: 40%;
    flex-basis: 40%; }
@media only screen and (max-width: 767px) {
    .shop-list-view-product .image {
        -ms-flex-preferred-size: 50%;
        flex-basis: 50%; } }
.shop-list-view-product .image a {
    display: block; }
.shop-list-view-product .image a img {
    width: 100%; }
.shop-list-view-product .product-content {
    -ms-flex-preferred-size: 60%;
    flex-basis: 60%;
    position: relative; }
@media only screen and (max-width: 767px) {
    .shop-list-view-product .product-content {
        -ms-flex-preferred-size: 50%;
        flex-basis: 50%; } }
.shop-list-view-product .product-content .product-categories {
    margin-bottom: 7px; }
.shop-list-view-product .product-content .product-categories a {
    color: #999;
    font-size: 13px; }
.shop-list-view-product .product-content .product-categories a:hover {
    color: #{{$theme->getMainColor()}}; }
.shop-list-view-product .product-content h3.product-title {
    font-size: 16px;
    color: #222;
    font-weight: 500;
    line-height: 23px; }
.shop-list-view-product .product-content .price-box .main-price {
    color: #999;
    font-size: 17px;
    text-decoration: line-through;
    margin-right: 8px; }
.shop-list-view-product .product-content .price-box .discounted-price {
    color: #{{$theme->getMainColor()}};
    font-size: 21px; }
.shop-list-view-product .product-content p.product-description {
    font-size: 15px;
    line-height: 30px;
    color: #666666; }

.related-product-slider-wrapper {
    background-color: #ffffff;
}
.related-product-slider-wrapper .slick-active.related-slider-product {
    -webkit-animation: customZoomIn 500ms ease-in-out;
    animation: customZoomIn 500ms ease-in-out; }




.pagination-container {
    padding: 15px 15px; }
.pagination-content ul li {
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;
    border-radius: 3px; }
.pagination-content ul li a {
    background-color: #666666;
    border-radius: 3px;
    color: #ffffff;
    display: block; }
.pagination-content ul li a:hover {
    background-color: #{{$theme->getMainColor()}}; }
.pagination-content ul li a.active {
    background-color: #{{$theme->getMainColor()}}; }

/* sub menu */
.sub-menu {
    position: absolute;
    left: -20px;
    top: 100%;
    background-color: #ffffff;
    -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.2);
    z-index: -999;
    width: 250px;
    padding: 15px 0;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
    transition: all 0.5s ease 0s;
    -webkit-transform: perspective(600px) rotateX(-90deg);
    transform: perspective(600px) rotateX(-90deg);
    -webkit-transform-origin: center top 0;
    -ms-transform-origin: center top 0;
    transform-origin: center top 0; }
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 767px) {
    .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 575px) {
    .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 479px) {
    .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
.sub-menu li {
    position: relative; }
.sub-menu li a {
    line-height: 24px;
    padding: 6px 20px;
    display: block;
    font-weight: 400;
    color: #777777;
    text-transform: capitalize; }
.sub-menu li.menu-item-has-children > a::after {
    font-family: Fontawesome;
    content: "";
    margin-left: 5px;
    float: right; }
.sub-menu li.active > a, .sub-menu li:hover > a {
    color: #{{$theme->getMainColor()}};
    font-weight: 400; }
.sub-menu li:hover > .sub-menu {
    -webkit-transform: perspective(600px) rotateX(0deg);
    transform: perspective(600px) rotateX(0deg);
    -webkit-transform-origin: center top 0;
    -ms-transform-origin: center top 0;
    transform-origin: center top 0;
    opacity: 1;
    visibility: visible;
    margin-top: 0;
    z-index: 999; }
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .sub-menu li:hover > .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 767px) {
    .sub-menu li:hover > .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 575px) {
    .sub-menu li:hover > .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 479px) {
    .sub-menu li:hover > .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
.sub-menu .sub-menu {
    left: 100%;
    right: auto;
    top: 0;
    margin-top: 30px;
    -webkit-transform: perspective(0) rotateX(0deg);
    transform: perspective(0) rotateX(0deg);
    -webkit-transform-origin: center top 0;
    -ms-transform-origin: center top 0;
    transform-origin: center top 0; }
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .sub-menu .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 767px) {
    .sub-menu .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 575px) {
    .sub-menu .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
@media only screen and (max-width: 479px) {
    .sub-menu .sub-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }
.sub-menu .sub-menu .sub-menu {
    left: auto;
    right: 100%; }
.sub-menu .sub-menu .sub-menu .sub-menu {
    left: 100%;
    right: auto; }
.sub-menu .sub-menu .sub-menu .sub-menu {
    left: auto;
    right: 100%; }


/* main menu */
.menubar-top {
    height: 40px; }
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .menubar-top {
        height: 40px; } }
@media only screen and (max-width: 767px) {
    .menubar-top {
        height: 130px; } }
@media only screen and (max-width: 575px) {
    .menubar-top {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap; } }
@media only screen and (max-width: 479px) {
    .menubar-top {
        height: 180px;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap; } }

.main-menu nav > ul > li {
    display: block;
    float: left;
    margin-right: 40px;
    position: relative; }
.main-menu nav > ul > li:last-child {
    margin-right: 0; }
@media only screen and (min-width: 992px) and (max-width: 1199px) {
    .main-menu nav > ul > li {
        margin-right: 30px; } }
.main-menu nav > ul > li > a {
    display: block;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 500;
    color: #222222;
    line-height: 40px; }
.main-menu nav > ul > li.menu-item-has-children > a::after {
    font-family: Fontawesome;
    content: "";
    margin-left: 5px;
    float: right; }
.main-menu nav > ul > li.active > a, .main-menu nav > ul > li:hover > a {
    color: #{{$theme->getMainColor()}}; }
.main-menu nav > ul > li:hover > .sub-menu,
.main-menu nav > ul > li:hover > .mega-menu {
    -webkit-transform: perspective(600px) rotateX(0deg);
    transform: perspective(600px) rotateX(0deg);
    opacity: 1;
    visibility: visible;
    margin-top: 0;
    z-index: 999; }
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .main-menu nav > ul > li:hover > .sub-menu,
    .main-menu nav > ul > li:hover > .mega-menu {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; } }


/*=============================================
=            11. Single product            =
=============================================*/
.single-product-content-container {
    background-color: #ffffff;
    box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
    border-radius: {{$theme->getRadius()}}px !important;
    padding: 50px 30px;
}
.single-product-content-container.tabstyle-3 .product-image-slider {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%; }
.single-product-content-container.tabstyle-3 .product-small-image-list {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%; }
.single-product-content-container .small-image-slider-single-product-tabstyle-3 .slick-arrow {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 10px;
    width: 28px;
    height: 28px;
    background: #fff;
    color: #333;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    line-height: 28px;
    font-size: 14px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    text-align: center;
    z-index: 99; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .small-image-slider-single-product-tabstyle-3 .slick-arrow {
        margin-top: 0; } }
.single-product-content-container .small-image-slider-single-product-tabstyle-3 .slick-next-btn.slick-arrow {
    left: auto;
    right: 0;
    top: 50%; }
.single-product-content-container .small-image-slider-single-product-tabstyle-3 .slick-arrow:hover {
    background: #{{$theme->getMainColor()}};
    color: #fff;
    border-color: #{{$theme->getMainColor()}}; }
.single-product-content-container .product-image-gallery-slider .slick-arrow {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 10px;
    width: 40px;
    height: 40px;
    background: #fff;
    color: #333;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    line-height: 40px;
    font-size: 20px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    text-align: center;
    z-index: 99; }
@media only screen and (max-width: 767px) {
    .single-product-content-container .product-image-gallery-slider .slick-arrow {
        width: 28px;
        height: 28px;
        line-height: 28px; } }
.single-product-content-container .product-image-gallery-slider .slick-next-btn.slick-arrow {
    left: auto;
    right: 0;
    top: 50%; }
.single-product-content-container .product-image-gallery-slider .slick-arrow:hover {
    background: #{{$theme->getMainColor()}};
    color: #fff;
    border-color: #{{$theme->getMainColor()}}; }
.single-product-content-container .nav.small-image-slider-single-product a,
.single-product-content-container .nav.small-image-slider-single-product-tabstyle-3 a {
    display: block;
    border: 1px solid #ededed;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
.single-product-content-container .nav.small-image-slider-single-product a:hover,
.single-product-content-container .nav.small-image-slider-single-product-tabstyle-3 a:hover {
    border-color: #{{$theme->getMainColor()}}; }
.single-product-content-container .nav.small-image-slider-single-product a img,
.single-product-content-container .nav.small-image-slider-single-product-tabstyle-3 a img {
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
.single-product-content-container .product-image-gallery .single-product-img, .single-product-content-container .product-image-gallery-slider .single-product-img {
    position: relative;
    border: 1px solid #ddd; }
.single-product-content-container .product-image-gallery .single-product-img a.big-image-popup, .single-product-content-container .product-image-gallery-slider .single-product-img a.big-image-popup {
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #373737;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 5px;
    visibility: hidden;
    opacity: 0;
    margin-left: -20px;
    margin-top: -20px; }
.single-product-content-container .product-image-gallery .single-product-img a.big-image-popup:hover, .single-product-content-container .product-image-gallery-slider .single-product-img a.big-image-popup:hover {
    background-color: #{{$theme->getMainColor()}}; }
.single-product-content-container .product-image-gallery .single-product-img:hover a.big-image-popup, .single-product-content-container .product-image-gallery-slider .single-product-img:hover a.big-image-popup {
    visibility: visible;
    opacity: 1; }
.single-product-content-container .product-image-slider {
    -ms-flex-preferred-size: 75%;
    flex-basis: 75%; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .product-image-slider {
        -webkit-box-flex: 1;
        -ms-flex: 1 0 100%;
        flex: 1 0 100%;
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1; } }
.single-product-content-container .product-image-slider .single-product-img {
    position: relative; }
.single-product-content-container .product-image-slider .single-product-img a.big-image-popup {
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #373737;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 5px;
    visibility: hidden;
    opacity: 0;
    margin-left: -20px;
    margin-top: -20px; }
.single-product-content-container .product-image-slider .single-product-img a.big-image-popup:hover {
    background-color: #{{$theme->getMainColor()}}; }
.single-product-content-container .product-image-slider .single-product-img:hover a.big-image-popup {
    visibility: visible;
    opacity: 1; }
.single-product-content-container .product-small-image-list {
    margin: 15px 0;
    -ms-flex-preferred-size: 160px;
    flex-basis: 160px;
    display: inline-block; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .product-small-image-list {
        -webkit-box-flex: 1;
        -ms-flex: 1 0 100%;
        flex: 1 0 100%;
        max-width: 100%;
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2; } }
@media only screen and (max-width: 575px) {
    .single-product-content-container .flex-custom-xs-wrap {
        -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important; } }
@media only screen and (max-width: 479px) {
    .single-product-content-container .flex-custom-xs-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important; } }
.single-product-content-container .single-small-image {
    padding: 0 10px; }
.single-product-content-container .small-image-slider-single-product .slick-list {
    width: 100%;
    display: inline-block; }
.single-product-content-container .slick-arrow {
    position: absolute;
    top: -20px;
    left: 50%;
    width: 28px;
    height: 28px;
    background: #fff;
    color: #333;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    line-height: 26px;
    font-size: 14px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    text-align: center;
    z-index: 99;
    margin-left: -15px; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .slick-arrow {
        top: 60%;
        left: 10px;
        margin-top: -15px; } }
.single-product-content-container .slick-next-btn.slick-arrow {
    bottom: -40px;
    left: 50%;
    top: 50%;
    right: auto; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .slick-next-btn.slick-arrow {
        top: 60%;
        right: 0;
        left: auto; } }
.single-product-content-container .easyzoom-flyout {
    width: 100%;
    height: 100%;
    top: 0;
    right: -100%;
    border: 3px solid #ddd;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .single-product-content-container .easyzoom-flyout {
        display: none; } }
@media only screen and (max-width: 767px) {
    .single-product-content-container .easyzoom-flyout {
        display: none; } }
.single-product-content-container .product-feature-details h2.product-title {
    font-size: 34px; }
@media only screen and (max-width: 479px) {
    .single-product-content-container .product-feature-details h2.product-title {
        font-size: 25px;
        line-height: 35px; } }
.single-product-content-container .product-feature-details p.product-rating i.fa {
    color: #e1e1e1; }
.single-product-content-container .product-feature-details p.product-rating i.fa.active {
    color: #fbbf00; }
.single-product-content-container .product-feature-details p.product-rating a {
    display: inline-block;
    margin-left: 10px; }
.single-product-content-container .product-feature-details h2.product-price span {
    font-size: 28px; }
.single-product-content-container .product-feature-details .size {
    font-weight: 500;
    color: #333; }
.single-product-content-container .product-feature-details .size select {
    width: 45%;
    border: 1px solid #ddd;
    padding: 5px;
    margin-top: 5px; }
.single-product-content-container .product-feature-details .color {
    font-weight: 500;
    color: #333; }
.single-product-content-container .product-feature-details .color span.color-block {
    width: 30px;
    height: 30px;
    display: inline-block;
    margin-right: 5px;
    margin-top: 10px; }
.single-product-content-container .product-feature-details .color span.color-choice-1 {
    background-color: #d66238; }
.single-product-content-container .product-feature-details .color span.color-choice-2 {
    background-color: #3fc43f; }
.single-product-content-container .product-feature-details .color span.color-choice-3 {
    background-color: #4343cc; }
.single-product-content-container .product-feature-details .color span.active {
    border: 2px solid #{{$theme->getMainColor()}};
    width: 32px;
    height: 32px; }
.single-product-content-container .product-feature-details p.product-description {
    font-size: 15px;
    line-height: 30px;
    border: none;
    padding: 0; }

.single-product-content-container .product-feature-details .add-to-cart-btn a:hover {
    background-color: #5d8801;
    border-color: #5d8801; }
.single-product-content-container .product-feature-details .group-product-form .table-content table {
    background: #fff none repeat scroll 0 0;
    border-color: #e5e5e5;
    border-radius: 0;
    border-style: solid;
    border-width: 1px 0 0 1px;
    margin: 0 0 15px;
    text-align: center;
    width: 100%; }
.single-product-content-container .product-feature-details .group-product-form .table-content table td {
    padding: 12px 10px;
    border-bottom: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
    width: 33.33%; }
.single-product-content-container .product-feature-details .group-product-form .table-content table td.product-name {
    font-weight: 500; }
.single-product-content-container .product-feature-details .group-product-form .table-content table td p span {
    display: block;
    margin-top: 10px; }
.single-product-content-container .product-feature-details .single-product-action-btn a {
    display: inline-block;
    font-size: 15px;
    margin-right: 20px;
    line-height: 40px; }
.single-product-content-container .product-feature-details .single-product-action-btn a:hover span {
    -webkit-animation-name: rotate;
    animation-name: rotate;
    -webkit-animation-duration: 1.5s;
    animation-duration: 1.5s; }
.single-product-content-container .product-feature-details .single-product-action-btn a:hover:before, .single-product-content-container .product-feature-details .single-product-action-btn a:hover:after {
    visibility: visible;
    opacity: 1; }
.single-product-content-container .product-feature-details .single-product-category h3 {
    font-size: 16px;
    line-height: 30px;
    font-weight: 500;
    color: #323232;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 20px 0;
    text-transform: uppercase; }
.single-product-content-container .product-feature-details .single-product-category h3 span {
    display: inline-block;
    margin-left: 5px; }
.single-product-content-container .product-feature-details .single-product-category h3 span a {
    display: inline-block;
    font-size: 14px;
    line-height: 24px;
    font-weight: 400;
    text-transform: none; }
.single-product-content-container .product-feature-details .social-share-buttons h3 {
    color: #323232; }

.single-product-action-btn a {
    position: relative; }
.single-product-action-btn a:before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 60%;
    left: 50%;
    margin-bottom: 12px;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    font-size: 14px;
    font-weight: 400;
    background-color: #444444;
    color: #ffffff;
    line-height: 16px;
    padding: 5px 10px;
    border-radius: 2px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }
.single-product-action-btn a:after {
    position: absolute;
    left: 50%;
    bottom: 63%;
    margin-bottom: 8px;
    margin-left: -4px;
    content: "";
    border-width: 4px 4px 0 4px;
    border-style: solid;
    border-color: #444444 transparent transparent transparent;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s; }

/*----------  tab style  ----------*/
/*----------  single product tab section  ----------*/
.single-product-tab-section {
    /*----------  tab table style  ----------*/
    /*-- Single Product Rating --*/
    /*-- Ratting Form Wrap --*/
    /*-- Ratting Form --*/ }
.single-product-tab-section .tab-content {
    background-color: #ffffff;
    padding: 30px 20px;
    -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }
.single-product-tab-section .tab-content p.product-desc {
    font-size: 15px;
    line-height: 25px; }
.single-product-tab-section .table-data-sheet {
    width: 100%;
    border-width: 0px 1px 1px;
    border-style: solid solid solid;
    border-color: #d6d4d4 #d6d4d4 #d6d4d4;
    -webkit-border-image: initial;
    -o-border-image: initial;
    border-image: initial;
    border-top: 0px;
    margin: 0px 0px 20px;
    background: white; }
.single-product-tab-section .table-data-sheet tr {
    border-top: 1px solid #d6d4d4; }
.single-product-tab-section .table-data-sheet tr td {
    padding: 10px 20px 11px; }
.single-product-tab-section .table-data-sheet tr td:first-child {
    width: 30%;
    font-weight: 500;
    color: #333333;
    border-right: 1px solid #d6d4d4; }
.single-product-tab-section .product-ratting-wrap {
    overflow: hidden; }
.single-product-tab-section .pro-avg-ratting {
    margin-bottom: 20px;
    float: left;
    width: 100%; }
.single-product-tab-section .pro-avg-ratting h4 {
    font-size: 18px;
    font-weight: 500;
    line-height: 28px;
    margin: 0 0 7px; }
.single-product-tab-section .pro-avg-ratting h4 span {
    color: #666666;
    font-size: 12px;
    font-weight: 400;
    line-height: 10px; }
.single-product-tab-section .pro-avg-ratting > span {
    display: block;
    font-size: 12px;
    line-height: 10px; }
.single-product-tab-section .ratting-list {
    margin-bottom: 30px;
    float: left;
    width: 100%; }
.single-product-tab-section .ratting-list .sin-list {
    margin-right: 30px; }
.single-product-tab-section .ratting-list .sin-list:last-child {
    margin-right: 0; }
.single-product-tab-section .ratting-list .sin-list i {
    color: #666666;
    font-size: 12px; }
.single-product-tab-section .ratting-list .sin-list span {
    color: #666666; }
.single-product-tab-section .rattings-wrapper {
    margin-bottom: 40px;
    float: left;
    width: 100%; }
.single-product-tab-section .sin-rattings {
    margin-bottom: 40px; }
.single-product-tab-section .sin-rattings:last-child {
    margin-bottom: 0; }
.single-product-tab-section .sin-rattings .ratting-author {
    float: left;
    width: 100%;
    margin-bottom: 10px; }
.single-product-tab-section .sin-rattings .ratting-author h3 {
    float: left;
    font-size: 16px;
    font-weight: 500;
    margin: 0;
    line-height: 18px;
    margin-right: 15px; }
@media only screen and (max-width: 575px) {
    .single-product-tab-section .sin-rattings .ratting-author .ratting-star {
        float: left;
        width: 100%;
        margin-top: 5px; } }
.single-product-tab-section .sin-rattings .ratting-author .ratting-star i,
.single-product-tab-section .sin-rattings .ratting-author .ratting-star span {
    color: #666666;
    font-size: 12px;
    line-height: 18px;
    float: left; }
.single-product-tab-section .sin-rattings .ratting-author .ratting-star span {
    margin-left: 5px; }
.single-product-tab-section .sin-rattings p {
    color: #666666;
    font-size: 15px;
    line-height: 24px; }
.single-product-tab-section .ratting-form-wrapper {
    float: left;
    width: 100%; }
.single-product-tab-section .ratting-form-wrapper h3 {
    font-size: 16px;
    margin: 0 0 30px;
    text-transform: uppercase;
    font-weight: 500;
    line-height: 16px; }
.single-product-tab-section .ratting-form h5 {
    float: left;
    font-size: 14px;
    line-height: 18px;
    margin-right: 10px; }
.single-product-tab-section .ratting-form .ratting-star i {
    font-size: 14px;
    float: left;
    line-height: 18px;
    display: block;
    margin-right: 3px; }
.single-product-tab-section .ratting-form .ratting-star i:last-child {
    margin: 0; }
.single-product-tab-section .ratting-form label {
    display: block;
    font-size: 14px;
    color: #666666;
    margin-bottom: 3px; }
.single-product-tab-section .ratting-form input {
    width: 100%;
    background-color: transparent;
    border: 1px solid #dddddd;
    font-size: 13px;
    line-height: 24px;
    padding: 8px 15px;
    color: #666666; }
.single-product-tab-section .ratting-form input[type="submit"] {
    width: auto;
    padding: 8px 30px;
    border-color: #{{$theme->getMainColor()}};
    background-color: #{{$theme->getMainColor()}};
    text-transform: uppercase;
    font-weight: 600;
    color: #ffffff; }
.single-product-tab-section .ratting-form input[type="submit"]:hover {
    border-color: #5d8801;
    background-color: #5d8801;
    color: #ffffff; }
.single-product-tab-section .ratting-form textarea {
    width: 100%;
    background-color: transparent;
    border: 1px solid #dddddd;
    font-size: 13px;
    line-height: 24px;
    padding: 8px 15px;
    color: #666666;
    height: 80px;
    resize: none; }

.single-product-content-container .slider-box-feature-details .size select {
    width: 15%; }
@media only screen and (max-width: 575px) {
    .single-product-content-container .slider-box-feature-details .size select {
        width: 50%; } }

/*=====  End of 11. Single product  ======*/

.save-btn {
    background: none;
    border: none;
    font-weight: 400;
    text-transform: uppercase;
    color: #ffffff;
    background-color: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    width: 140px;
    padding: 10px 0;
    border-radius: 5px; }
.save-btn:hover {
    background-color: #{{$theme->getMainColorHover()}};
}


.sidebar-area .sidebar {
    background-color: #ffffff;
    padding: 30px 20px;
    box-shadow: 0 0 30px 0 rgba(82,63,105,.05);
    border-radius: {{$theme->getRadius()}}px !important;
    position: relative; }
.sidebar-area .sidebar h3.sidebar-title {
    font-size: 18px;
    line-height: 24px;
    font-weight: 400;
    color: #222222;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 5px;
    margin-bottom: 25px;
    text-transform: uppercase; }
@media only screen and (min-width: 992px) and (max-width: 1199px) {
    .sidebar-area .sidebar h3.sidebar-title {
        font-size: 15px; } }
.sidebar-area .sidebar ul.product-categories li {
    padding-right: 25px;
    margin-bottom: 7px; }
.sidebar-area .sidebar ul.product-categories li a:before {
    border: 0px solid #e0e0e0;
    color: #e0e0e0;
    content: '';
    display: inline-block;
    font-family: FontAwesome;
    font-size: 0;
    height: 10px;
    line-height: 8px;
    margin-right: 10px;
    position: relative;
    text-align: center;
    top: -2px;
    vertical-align: middle;
    width: 10px; }
.sidebar-area .sidebar ul.product-list {
    margin-bottom: 20px;
    padding: 0; }
.sidebar-area .sidebar ul.product-list li {
    padding: 10px 0;
    padding-right: 35px;
    position: relative;
    border-bottom: 1px solid #dfdfdf; }
.sidebar-area .sidebar ul.product-list li a.remove {
    background: none;
    color: #999 !important;
    font-size: 18px;
    height: auto;
    left: auto;
    padding: 10px;
    position: absolute;
    right: 0;
    top: 50%;
    width: auto;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%); }
.sidebar-area .sidebar ul.product-list li a.remove:hover {
    color: #{{$theme->getMainColor()}}; }
.sidebar-area .sidebar ul.product-list li a.title {
    color: #323232;
    font-size: 1em;
    text-transform: none;
    line-height: 1.2; }
.sidebar-area .sidebar ul.product-list li a.title:hover {
    color: #{{$theme->getMainColor()}}; }
.sidebar-area .sidebar ul.tag-container li {
    display: inline-block; }
.sidebar-area .sidebar ul.tag-container li a {
    display: block;
    margin-right: 5px;
    margin-bottom: 10px;
    padding: 5px 10px;
    border: 1px solid #e0e0e0;
    text-transform: uppercase;
    border-radius: 5px;
    color: #afafaf;
    font-size: 13px;
    text-align: center; }
.sidebar-area .sidebar ul.tag-container li a:hover {
    background-color: #{{$theme->getMainColor()}};
    color: #fff;
    border-color: #{{$theme->getMainColor()}}; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product {
    margin-bottom: 20px; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p {
    margin-bottom: 0; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p a {
    font-size: 15px;
    line-height: 20px;
    font-weight: 500;
    color: #323232; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p a:hover {
    color: #{{$theme->getMainColor()}}; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-rating {
    color: #e0e0e0; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-rating i.fa {
    font-size: 12px; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-rating .active {
    color: #fbbf00; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-price {
    font-size: 17px;
    line-height: 32px; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-price span.discounted-price {
    color: #{{$theme->getMainColor()}}; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product p.product-price span.main-price {
    text-decoration: line-through;
    color: #999999; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product .image {
    -ms-flex-preferred-size: 100px;
    flex-basis: 100px; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product .content {
    padding-left: 10px; }
.sidebar-area .sidebar .top-rated-product-container .single-top-rated-product:last-child {
    margin-bottom: 0; }
.sidebar-area .sidebar .compare-btns {
    overflow: hidden; }
.sidebar-area .sidebar a.clear-all {
    float: left;
    font-size: inherit;
    height: 40px;
    line-height: 40px;
    color: #a43d21; }
.sidebar-area .sidebar a.compare {
    background: #008459;
    border: none;
    color: #fff;
    font-size: 1em;
    font-weight: 500;
    height: 40px;
    letter-spacing: 0;
    line-height: 40px;
    padding: 0 30px;
    text-transform: uppercase;
    border-radius: 50px;
    display: inline-block;
    float: right;
    overflow: hidden; }
.sidebar-area .sidebar a.compare:hover {
    background-color: #{{$theme->getMainColor()}}; }

/*-- Sidebar Price --*/
.sidebar-price #price-range {
    width: 90%;
    height: 7px;
    margin: 7px 0;
    background-color: #c7c7c7;
    position: relative; }
.sidebar-price #price-range .ui-slider-range {
    position: absolute;
    height: 100%;
    top: 0;
    background-color: #{{$theme->getMainColor()}}; }
.sidebar-price #price-range .ui-slider-handle {
    background-color: #{{$theme->getMainColor()}};
    position: absolute;
    width: 21px;
    height: 21px;
    border-radius: 50px;
    display: block;
    top: -7px;
    -webkit-transition: none;
    -o-transition: none;
    transition: none;
    -webkit-box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.15);
    box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.15); }

.sidebar-price #price-amount {
    font-size: 14px;
    font-weight: 500;
    color: #666666;
    line-height: 24px;
    padding: 0;
    background-color: transparent;
    border: none;
    margin-top: 12px; }

/*----------  single block  ----------*/
.single-block {
    border-bottom: 1px solid #ddd;
    padding: 15px 0; }
.single-block:first-child {
    padding-top: 0; }
.single-block:last-child {
    padding-bottom: 0;
    border-bottom: 0; }
.single-block .image {
    -ms-flex-preferred-size: 100px;
    flex-basis: 100px;
    margin-right: 5px; }
.single-block .image a {
    border: 2px solid transparent;
    display: block; }
.single-block .image a img {
    width: 100%; }
.single-block .image a:hover {
    border: 2px solid #{{$theme->getMainColor()}}; }
.single-block .content {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%; }
.single-block .content p {
    margin-bottom: 0;
    font-weight: 500;
    font-size: 15px;
    line-height: 20px;
    color: #323232; }
.single-block .content p span {
    font-size: 12px;
    line-height: 16px;
    color: #999;
    font-weight: 400;
    margin-top: 5px;
    display: block; }
.single-block.comment-block .image {
    -ms-flex-preferred-size: 80px;
    flex-basis: 80px; }
.single-block.comment-block .content p span {
    font-size: 14px;
    line-height: 20px;
    color: #666666; }
.single-block.comment-block .content p a {
    font-size: 12px;
    line-height: 16px;
    font-weight: 400;
    color: #808080; }
.single-block.comment-block .content p a:hover {
    color: #{{$theme->getMainColor()}}; }

/*----------  Sidebar search box  ----------*/
.sidebar-search-box {
    border: 1px solid #e0e0e0;
    position: relative;
    padding-right: 10px; }
.sidebar-search-box input {
    border: none;
    padding: 5px;
    padding-left: 10px; }
.sidebar-search-box button {
    position: absolute;
    top: 5px;
    right: 0;
    background: none;
    border: none; }
.sidebar-search-box button:hover {
    color: #{{$theme->getMainColor()}}; }

/*=====  End of 13. Sidebar  ======*/



































/*-----------------------------------------------------------------------------------

    CSS INDEX
    ===================

    01. Theme default CSS
    02. Header
        02.1 Header top
        02.2 Header bottom
        02.3 Home 3 and 4 header style
    03. Buttons
    04. Hero Section

-----------------------------------------------------------------------------------*/
/*=============================================
=            01. Theme defaultt css            =
=============================================*/
/*-- Google Font --*/
@import url("https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i");
/*-- Common Style --*/
*, *::after, *::before {
  -webkit-box-sizing: border-box;
  box-sizing: border-box; }

html, body {
  height: 100%; }

body {
  background-color: #f5f5f5;
  line-height: 24px;
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  visibility: visible;
  font-family: "Rubik", sans-serif;
  color: #666666;
  position: relative;
  overflow-x: hidden;
  padding-top: 140px; }
  @media only screen and (max-width: 767px) {
    body {
      padding-top: 295px; } }
  @media only screen and (max-width: 575px) {
    body {
      padding-top: 319px; } }
  @media only screen and (max-width: 479px) {
    body {
      padding-top: 349px; } }

h1, h2, h3, h4, h5, h6 {
  color: #222222;
  font-family: "Rubik", sans-serif;
  font-weight: 400;
  margin-top: 0; }

h1 {
  font-size: 36px;
  line-height: 42px; }

h2 {
  font-size: 30px;
  line-height: 36px; }

h3 {
  font-size: 24px;
  line-height: 30px; }

h4 {
  font-size: 18px;
  line-height: 24px; }

h5 {
  font-size: 14px;
  line-height: 18px; }

h6 {
  font-size: 12px;
  line-height: 14px; }

p:last-child {
  margin-bottom: 0; }

a, button {
  color: inherit;
  display: inline-block;
  line-height: inherit;
  text-decoration: none;
  cursor: pointer; }

a, button, img, input, span {
  -webkit-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s; }

*:focus {
  outline: none !important; }

a:focus {
  color: inherit;
  outline: none;
  text-decoration: none; }

a:hover {
  text-decoration: none;
  color: #{{$theme->getMainColor()}}; }

button, input[type="submit"] {
  cursor: pointer; }

ul {
  list-style: outside none none;
  margin: 0;
  padding: 0; }

/*-- Tab Content & Pane Fix --*/
.tab-content {
  width: 100%; }
  .tab-content .tab-pane {
    display: block;
    height: 0;
    max-width: 100%;
    visibility: hidden;
    overflow: hidden;
    opacity: 0; }
    .tab-content .tab-pane.active {
      height: auto;
      visibility: visible;
      opacity: 1;
      overflow: visible; }


/*----------  scroll to top  ----------*/
/* scroll to top */
a.scroll-top {
  background: #666;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  line-height: 40px;
  display: none;
  text-align: center;
  color: #fff;
  font-family: 'FontAwesome';
  position: fixed;
  right: 25px;
  bottom: 25px;
  z-index: 50000; }
  a.scroll-top:hover {
    background-color: #{{$theme->getMainColor()}};
    color: #ffffff; }

/*----------  breadcrumb  ----------*/
.breadcrumb-area .breadcrumb-container {
  border-bottom: 1px solid #dddddd;
  padding: 20px 0; }
  .breadcrumb-area .breadcrumb-container ul li {
    display: inline-block;
    padding-right: 60px;
    position: relative;
    font-size: 15px;
    line-height: 25px; }
    .breadcrumb-area .breadcrumb-container ul li:last-child:after {
      content: ""; }
    .breadcrumb-area .breadcrumb-container ul li.active {
      color: #{{$theme->getMainColor()}}; }
    .breadcrumb-area .breadcrumb-container ul li:after {
      position: absolute;
      top: 0;
      right: 30px;
      content: ">"; }


/*=============================================
=            02. Header            =
=============================================*/
header {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 999; }

/*----------  02.1 Header top  ----------*/
.header-top {
  background-color: #f5f5f5; }

/* language currency dropdown */
.lang-currency-dropdown ul li {
  position: relative;
  display: inline-block;
  margin-right: 30px; }
  .lang-currency-dropdown ul li:last-child {
    margin-right: 0; }
  .lang-currency-dropdown ul li a i.fa {
    font-size: 10px;
    font-weight: 300; }
  .lang-currency-dropdown ul li ul {
    position: absolute;
    top: 33px;
    left: 0;
    padding: 20px;
    background-color: #ffffff;
    visibility: hidden;
    opacity: 0;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    z-index: 999;
    border: 1px solid #ddd; }
    .lang-currency-dropdown ul li ul li {
      display: block;
      margin-bottom: 10px; }
      .lang-currency-dropdown ul li ul li a {
        display: block;
         }
      .lang-currency-dropdown ul li ul li:last-child {
        margin-bottom: 0; }
  .lang-currency-dropdown ul li:hover ul {
    visibility: visible;
    opacity: 1; }

/* header top menu */
.header-top-menu ul li {
  display: inline-block;
  margin-left: 20px; }
  .header-top-menu ul li:first-child {
    margin-left: 0; }
  .header-top-menu ul li a {
    display: block;
    color: #777; }
    .header-top-menu ul li a:hover {
      color: #{{$theme->getMainColor()}}; }

/*----------  02.2 header bottom  ----------*/

@media only screen and (max-width: 767px) {
  .logo {
    text-align: center; } }

@media only screen and (max-width: 767px) {
  .logo img {
    width: 90px; } }

@media only screen and (max-width: 479px) {
  .logo img {
    width: 70px; } }

.header-bottom {
  background-color: #ffffff;
  -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }

@media only screen and (min-width: 768px) and (max-width: 991px) {
  .header-contact {
    -ms-flex-preferred-size: 50%;
    flex-basis: 50%;
    margin-bottom: 15px; } }

@media only screen and (max-width: 767px) {
  .header-contact {
    -ms-flex-preferred-size: 50%;
    flex-basis: 50%;
    margin-bottom: 15px; } }

@media only screen and (max-width: 575px) {
  .header-contact {
    -ms-flex-preferred-size: 50%;
    flex-basis: 50%;
    margin-bottom: 15px; } }

@media only screen and (max-width: 479px) {
  .header-contact {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
    margin-bottom: 15px;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center; } }

.header-contact .phone-icon {
  margin-right: 20px; }

.header-contact .phone-number {
  line-height: 14px; }
  .header-contact .phone-number span.number {
    display: block;
    padding-top: 10px; }


/* shopping cart */
.shopping-cart .cart-icon {
  margin-right: 10px; }
  .shopping-cart .cart-icon span {
    font-size: 40px; }

.shopping-cart .cart-info a {
  -webkit-transition: 0s;
  -o-transition: 0s;
  transition: 0s; }

.shopping-cart .cart-info span {
  display: block; }
  .shopping-cart .cart-info span span {
    display: inline-block; }

/* cart floating box */
.cart-floating-box {
  position: absolute;
  top: 80px;
  z-index: 999999;
  right: 0;
  width: 360px;
height: auto;
  background-color: #ffffff;
  padding: 20px;
  -webkit-box-shadow: 0 0 10px #ddd;
  box-shadow: 0 0 10px #ddd;
  display: none; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .cart-floating-box {
      display: none; } }
  @media only screen and (max-width: 767px) {
    .cart-floating-box {
      display: none; } }
  @media only screen and (max-width: 575px) {
    .cart-floating-box {
      display: none; } }
  @media only screen and (max-width: 479px) {
    .cart-floating-box {
      display: none; } }
  .cart-floating-box .cart-items {
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px; }
  .cart-floating-box .cart-float-single-item {
    position: relative;
    margin-bottom: 20px; }
    .cart-floating-box .cart-float-single-item span.remove-item {
      position: absolute;
      top: 0;
      right: 0;
      font-size: 20px; }
    .cart-floating-box .cart-float-single-item .cart-float-single-item-image {
      width: 25%;
      margin-right: 10px; }
      .cart-floating-box .cart-float-single-item .cart-float-single-item-image a {
        display: inline-block;
        border: 1px solid #ddd;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s; }
        .cart-floating-box .cart-float-single-item .cart-float-single-item-image a:hover {
          border: 1px solid #{{$theme->getMainColor()}}; }
    .cart-floating-box .cart-float-single-item .cart-float-single-item-desc p {
      margin-bottom: 5px; }
    .cart-floating-box .cart-float-single-item .cart-float-single-item-desc p.product-title a {
      font-weight: 500;
      color: #333; }
      .cart-floating-box .cart-float-single-item .cart-float-single-item-desc p.product-title a:hover {
        color: #{{$theme->getMainColor()}}; }
  .cart-floating-box .cart-calculation .calculation-details {
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px; }
    .cart-floating-box .cart-calculation .calculation-details p {
      font-weight: 500;
      color: #333;
      font-size: 18px;
      line-height: 20px;
      margin-bottom: 20px; }
      .cart-floating-box .cart-calculation .calculation-details p span {
        float: right; }
    .cart-floating-box .cart-calculation .calculation-details p.shipping {
      border-bottom: 1px solid #333;
      margin-bottom: 10px;
      padding-bottom: 10px; }
  .cart-floating-box .cart-calculation .checkout-button a {
    background-color: #333;
    color: #fff;
    padding: 10px 15px;
    display: inline-block;
    margin-top: 25px;
    margin-left: 25px;
    font-weight: 500;
    border-radius: 3px; }
    .cart-floating-box .cart-calculation .checkout-button a:hover {
      background-color: #{{$theme->getMainColor()}}; }




/*----------  02.3 Home 3 and 4 header style  ----------*/
.header-bottom-other .main-menu-other-homepage {
  display: none; }

.header-bottom-other .home-other-navigation-menu {
  display: block; }

.header-bottom-other.is-sticky .home-other-navigation-menu {
  display: none; }

.header-bottom-other.is-sticky .main-menu-other-homepage {
  display: block; }

.header-bottom-other.is-sticky .logo {
  position: relative;
  top: 0;
  -webkit-transform: translateY(0);
  -ms-transform: translateY(0);
  transform: translateY(0);
  margin-top: 15px;
  margin-bottom: 15px; }

.header-bottom-other .logo {
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-70%);
  -ms-transform: translateY(-70%);
  transform: translateY(-70%); }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .header-bottom-other .logo {
      position: relative;
      top: 0;
      -webkit-transform: translateY(0);
      -ms-transform: translateY(0);
      transform: translateY(0);
      margin-top: 15px;
      margin-bottom: 15px; } }
  @media only screen and (max-width: 767px) {
    .header-bottom-other .logo {
      position: relative;
      top: 0;
      -webkit-transform: translateY(0);
      -ms-transform: translateY(0);
      transform: translateY(0);
      margin-top: 15px;
      margin-bottom: 15px; } }

.home-other-navigation-menu {
  background-color: #008459;
  -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .home-other-navigation-menu {
      background-color: #ffffff; } }
  @media only screen and (max-width: 767px) {
    .home-other-navigation-menu {
      background-color: #ffffff; } }
  .home-other-navigation-menu .main-menu > nav > ul > li > a {
    color: #ffffff; }
    .home-other-navigation-menu .main-menu > nav > ul > li > a:hover {
      color: #{{$theme->getMainColor()}}; }

/*=====  End of 02. Header  ======*/
/*=============================================
=            Button style            =
=============================================*/
/*----------  floating cart   ----------*/
.floating-cart-btn a {
  background: #fff;
  border: 2px solid #e0e0e0;
  color: #323232;
  display: inline-block;
  font-size: 14px;
  font-weight: 500;
  height: 47px;
  line-height: 43px;
  margin: 0 4px;
  min-width: 130px;
  padding: 0 15px;
  text-align: center;
  text-transform: none;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0; }
  .floating-cart-btn a:hover {
    background: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    color: #fff; }

/*----------  Hero section  ----------*/
a.slider-btn {
  font-size: 20px;
  font-weight: 500;
  color: #fff;
  background-color: #{{$theme->getMainColor()}};
  padding: 20px 50px;
  border-radius: 50px; }
  a.slider-btn:hover {
    background-color: #5d8801; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    a.slider-btn {
      font-size: 15px;
      padding: 15px 40px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    a.slider-btn {
      font-size: 15px;
      padding: 15px 40px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    a.slider-btn {
      font-size: 15px;
      padding: 15px 40px; } }
  @media only screen and (max-width: 767px) {
    a.slider-btn {
      font-size: 12px;
      padding: 10px 30px; } }
  @media only screen and (max-width: 575px) {
    a.slider-btn {
      font-size: 15px;
      padding: 10px 30px; } }
  @media only screen and (max-width: 479px) {
    a.slider-btn {
      font-size: 15px;
      padding: 10px 30px; } }

a.slider-two-btn {
  font-size: 15px;
  font-weight: 500;
  color: #fff;
  background-color: #{{$theme->getMainColor()}};
  padding: 10px 40px;
  border-radius: 50px;
  text-transform: uppercase; }
  a.slider-two-btn:hover {
    background-color: #5d8801; }
  @media only screen and (min-width: 1200px) and (max-width: 1499px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 40px; } }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 40px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 40px; } }
  @media only screen and (max-width: 767px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 30px; } }
  @media only screen and (max-width: 575px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 30px; } }
  @media only screen and (max-width: 479px) {
    a.slider-two-btn {
      font-size: 15px;
      padding: 10px 30px; } }

/*----------  blog slider readmore  ----------*/
a.readmore-btn {
  color: #999;
  display: inline-block;
  font-weight: 500;
  text-transform: capitalize; }
  a.readmore-btn i.fa {
    margin-left: 10px; }
  a.readmore-btn:hover {
    color: #{{$theme->getMainColor()}}; }

/*----------  Modal add to cart button  ----------*/
.add-to-cart-btn a {
  background: #fff;
  border: 2px solid #e0e0e0;
  border-radius: 5px;
  display: inline-block;
  font-size: 14px;
  font-weight: 500;
  height: 45px;
  line-height: 43px;
  min-width: 130px;
  padding: 0 15px;
  text-align: center;
  text-transform: none; }
  .add-to-cart-btn a i.fa {
    padding-right: 5px; }
  .add-to-cart-btn a:hover {
    background: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    color: #fff; }

/*----------  single sale add to cart button  ----------*/
a.single-sale-add-to-cart-btn {
  background: #{{$theme->getMainColor()}};
  border: none;
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  height: 50px;
  line-height: 50px;
  margin: 0;
  max-width: 100%;
  padding: 0 35px;
  text-transform: uppercase;
  white-space: nowrap;
  width: auto;
  border-radius: 50px; }
  @media only screen and (max-width: 479px) {
    a.single-sale-add-to-cart-btn {
      font-size: 14px;
      padding: 0 25px; } }
  a.single-sale-add-to-cart-btn:hover {
    background: #5d8801;
    border-color: #5d8801;
    color: #fff; }

/*----------  contact form button   ----------*/
.contact-form-btn {
  background: #fff;
  border: 2px solid #e0e0e0;
  color: #323232;
  display: inline-block;
  font-size: 16px;
  font-weight: 500;
  height: 47px;
  line-height: 43px;
  margin: 0 4px;
  min-width: 130px;
  padding: 0 15px;
  text-align: center;
  text-transform: uppercase;
  border-radius: 5px; }
  .contact-form-btn:hover {
    background: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    color: #fff; }

/*----------  blog readmore button   ----------*/
.blog-readmore-btn {
  background: #fff;
  border: 2px solid #e0e0e0;
  color: #323232;
  display: inline-block;
  font-size: 15px;
  font-weight: 500;
  height: 47px;
  line-height: 43px;
  margin: 0 4px;
  min-width: 130px;
  padding: 0 15px;
  text-align: center;
  text-transform: uppercase;
  border-radius: 5px; }
  .blog-readmore-btn:hover {
    background: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    color: #fff; }

/*----------  post comment button  ----------*/
.post-comment-btn {
  background: #fff;
  border: 2px solid #e0e0e0;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: #323232;
  cursor: pointer;
  display: inline-block;
  font-size: 1em;
  font-weight: 500;
  height: 50px;
  letter-spacing: 0;
  line-height: 46px;
  outline: none;
  overflow: hidden;
  padding: 0 30px;
  text-shadow: none;
  text-transform: uppercase;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
  vertical-align: middle;
  white-space: nowrap;
  border-radius: 4px; }
  .post-comment-btn:hover {
    background-color: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    color: #ffffff; }

/*=====  End of Button style  ======*/


/*=============================================
=            06. Slider            =
=============================================*/


.slider .slick-arrow {
  position: absolute;
  top: -30px;
  right: 10px;
  background: none;
  border: none;
  text-align: center;
  line-height: 20px; }
  .slider .slick-arrow:hover i.fa {
    color: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}}; }
  .slider .slick-arrow i.fa {
    width: 20px;
    height: 20px;
    border: 2px solid #999;
    color: #999;
    padding-top: 2px;
    border-radius: 50%; }

.slider .slick-disabled {
  color: #999; }
  .slider .slick-disabled:hover i.fa {
    color: #999;
    border-color: #999; }

.slider .slick-prev {
  right: 40px; }
  .slider .slick-prev i.fa {
    padding-right: 2px; }

.slider .slick-next i.fa {
  padding-left: 2px; }

/*----------  06.3 brand logo slider  ----------*/
.brand-logo-wrapper.slick-slider {
  background-color: #ffffff;
  -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }

.single-banners1-logo a {
  display: block;
  overflow: hidden; }
  .single-banners1-logo a img {
    width: 100%; }
  .single-banners1-logo a:hover img {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1); }

.single-banners2-logo a {
  display: block;
  overflow: hidden; }
  .single-banners2-logo a img {
    width: 100%; }
  .single-banners2-logo a:hover img {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1); }

/*=============================================
=            07. product            =
=============================================*/

/*----------  07.1 Best slider product  ----------*/
.best-seller-sub-product {
  padding: 25px 10px; }
  .best-seller-sub-product .image a {
    display: block; }
    .best-seller-sub-product .image a img {
      width: 100%; }
  @media only screen and (max-width: 575px) {
    .best-seller-sub-product .image {
      width: 80%;
      margin: auto; } }
  @media only screen and (max-width: 479px) {
    .best-seller-sub-product .image {
      width: 80%;
      margin: auto; } }
  .best-seller-sub-product .product-content {
    padding-left: 20px; }
    .best-seller-sub-product .product-content .product-categories a {
      color: #999;
      font-size: 13px; }
      .best-seller-sub-product .product-content .product-categories a:hover {
        color: #{{$theme->getMainColor()}}; }
    .best-seller-sub-product .product-content h3.product-title {
      font-size: 16px;
      color: #222;
      font-weight: 500;
      line-height: 23px; }
    .best-seller-sub-product .product-content .price-box .main-price {
      color: #999;
      font-size: 17px;
      text-decoration: line-through; }
    .best-seller-sub-product .product-content .price-box .discounted-price {
      color: #{{$theme->getMainColor()}};
      font-size: 21px; }

/*----------  07.2 Tab slider product   ----------*/
.tab-slider-sub-product {
  border-bottom: 1px solid #e0e0e0;
  border-right: 1px solid #e0e0e0;
  padding: 20px 10px;
  text-align: center;
  position: relative; }
  .tab-slider-sub-product:last-child {
    border-bottom: 0; }
  .tab-slider-sub-product .image {
    margin-bottom: 20px; }
    .tab-slider-sub-product .image a {
      display: block; }
      .tab-slider-sub-product .image a img {
        width: 100%; }
  .tab-slider-sub-product .product-content .product-categories {
    margin-bottom: 7px; }
    .tab-slider-sub-product .product-content .product-categories a {
      color: #999;
      font-size: 13px; }
      .tab-slider-sub-product .product-content .product-categories a:hover {
        color: #{{$theme->getMainColor()}}; }
  .tab-slider-sub-product .product-content h3.product-title {
    font-size: 16px;
    color: #222;
    font-weight: 500;
    line-height: 23px; }
  .tab-slider-sub-product .product-content .price-box .main-price {
    color: #999;
    font-size: 17px;
    text-decoration: line-through;
    margin-right: 8px; }
  .tab-slider-sub-product .product-content .price-box .discounted-price {
    color: #{{$theme->getMainColor()}};
    font-size: 21px; }

/*----------  07.3 Category product  ----------*/
.single-category {
  text-align: center; }
  .single-category .category-title h3 {
    font-size: 14px;
    margin-bottom: 0;
    line-height: 17px; }
  .single-category .category-image {
    margin-bottom: 10px; }
    .single-category .category-image a {
      border: 5px solid #ddd;
      border-radius: 50%; }
      .single-category .category-image a:hover {
        border-color: #{{$theme->getMainColor()}}; }





/*=====  End of 07. product  ======*/
/*=============================================
=           08.  Modal            =
=============================================*/
/*----------  quick view modal style  ----------*/
.quick-view-modal-container .modal-header {
  border-bottom: 0;
  padding: 0.5rem 1rem 0 0; }
  .quick-view-modal-container .modal-header .close {
    padding-top: 25px;
    padding-right: 20px; }

.quick-view-modal-container .modal-dialog {
  max-width: 900px; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .quick-view-modal-container .modal-dialog {
      max-width: 700px;
      margin: auto; } }
  @media only screen and (max-width: 767px) {
    .quick-view-modal-container .modal-dialog {
      max-width: 500px;
      margin: auto; } }
  @media only screen and (max-width: 575px) {
    .quick-view-modal-container .modal-dialog {
      max-width: 400px;
      margin: auto; } }

.product-image-slider {
  /*----------  product image slider  ----------*/ }
  .product-image-slider .nav.small-image-slider a {
    display: block;
    border: 1px solid #ededed;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
    .product-image-slider .nav.small-image-slider a:hover {
      border-color: #c1bcbc; }
  .product-image-slider .nav.small-image-slider a img {
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
  .product-image-slider .product-small-image-list {
    /*margin: 15px 0; */
  }
  .product-image-slider .nav.small-image-slider {
    padding: 0 26px; }
  .product-image-slider .single-small-image {
    padding: 0 10px; }
  .product-image-slider .small-image-slider .slick-list {
    width: 100%; }
  .product-image-slider .slick-arrow {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    width: 28px;
    height: 28px;
    background: #fff;
    color: #333;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    line-height: 26px;
    font-size: 14px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    text-align: center;
    z-index: 99; }
  .product-image-slider .slick-next-btn.slick-arrow {
    left: auto;
    right: 0; }
  .product-image-slider .slick-arrow:hover {
    background: #{{$theme->getMainColor()}};
    color: #fff;
    border-color: #{{$theme->getMainColor()}}; }

.single-product-img.img-full {
  text-align: center; }

@media only screen and (max-width: 767px) {
  .product-image-slider {
    margin-bottom: 30px; } }

.product-feature-details h2.product-title {
  font-weight: 500;
  color: #323232;
  font-size: 30px;
  line-height: 35px; }

.product-feature-details h2.product-price {
  font-weight: 400;
  color: #{{$theme->getMainColor()}};
  font-size: 20px; }
  .product-feature-details h2.product-price span.main-price {
    color: #999;
    text-decoration: line-through; }

.product-feature-details p.product-description {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  padding: 20px 0; }

.product-feature-details .social-share-buttons h3 {
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 500;
  line-height: 30px; }

.product-feature-details .social-share-buttons ul {
  margin-bottom: 15px; }
  .product-feature-details .social-share-buttons ul li {
    display: inline-block;
    margin-right: 5px; }
    @media only screen and (max-width: 767px) {
      .product-feature-details .social-share-buttons ul li {
        margin-bottom: 5px; } }
    .product-feature-details .social-share-buttons ul li a {
      display: block;
      border: 1px solid #ddd;
      height: 40px;
      width: 40px;
      line-height: 40px;
      text-align: center; }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .product-feature-details .social-share-buttons ul li a {
          margin-bottom: 5px; } }
      @media only screen and (max-width: 767px) {
        .product-feature-details .social-share-buttons ul li a {
          margin-bottom: 5px; } }
      .product-feature-details .social-share-buttons ul li a i.fa-twitter {
        color: #1DA1F2; }
      .product-feature-details .social-share-buttons ul li a i.fa-facebook {
        color: #4867AA; }
      .product-feature-details .social-share-buttons ul li a i.fa-google-plus {
        color: #DD5144; }
      .product-feature-details .social-share-buttons ul li a i.fa-pinterest {
        color: #BD081B; }
    .product-feature-details .social-share-buttons ul li:hover a {
      color: #fff; }
      .product-feature-details .social-share-buttons ul li:hover a i.fa {
        color: #fff; }
    .product-feature-details .social-share-buttons ul li:hover a.twitter {
      background-color: #1DA1F2; }
    .product-feature-details .social-share-buttons ul li:hover a.facebook {
      background-color: #4867AA; }
    .product-feature-details .social-share-buttons ul li:hover a.google-plus {
      background-color: #DD5144; }
    .product-feature-details .social-share-buttons ul li:hover a.pinterest {
      background-color: #BD081B; }

.product-feature-details .pro-qty {
  display: inline-block;
  position: relative;
  width: 100px;
  border: 1px solid #ddd;
  height: 40px; }
  .product-feature-details .pro-qty input {
    padding-right: 25px;
    width: 100%;
    border: none;
    height: 100%;
    padding-left: 20px; }
  .product-feature-details .pro-qty a {
    width: 20px;
    height: 20px;
    position: absolute;
    font-weight: normal;
    line-height: 20px;
    text-align: center;
    font-size: 18px; }
    .product-feature-details .pro-qty a.inc {
      top: 0;
      right: 0;
      border-left: 1px solid #ddd;
      border-bottom: 1px solid #ddd; }
    .product-feature-details .pro-qty a.dec {
      bottom: 0;
      right: 0;
      border-left: 1px solid #ddd;
      padding-top: 2px; }

.product-feature-details .add-to-cart-btn {
  display: inline-block; }

/*=============================================
=            10. Category            =
=============================================*/
/*-- Category Toggle Wrap --*/
.category-toggle-wrap {
  width: 100%;
  padding: 12px 25px;
  position: relative;
  border-top-right-radius: 5px; }
  .category-toggle-wrap:before {
    background: #{{$theme->getMainColor()}};
    content: '';
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 15px;
    z-index: 1;
    -webkit-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    transform: translateX(-100%); }
  .category-toggle-wrap:after {
    border-bottom: 15px solid transparent;
    border-left: 15px solid transparent;
    border-top: 15px solid #5d8801;
    bottom: 0;
    content: '';
    left: -15px;
    position: absolute;
    z-index: 1;
    -webkit-transform: translateY(100%);
    -ms-transform: translateY(100%);
    transform: translateY(100%); }
  @media only screen and (max-width: 767px) {
    .category-toggle-wrap {
      padding: 8px 25px; } }
  .category-toggle-wrap .category-toggle {
    padding: 0;
    margin: 0;
    border: none;
    background-color: transparent;
    color: #ffffff;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    line-height: 30px;
    width: 100%;
    text-align: left; }
    @media only screen and (max-width: 767px) {
      .category-toggle-wrap .category-toggle {
        font-size: 14px; } }
    .category-toggle-wrap .category-toggle i {
      font-size: 24px;
      display: block;
      line-height: 30px;
      float: right; }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .category-toggle-wrap .category-toggle i::before {
          content: "\e62a"; } }
      @media only screen and (max-width: 767px) {
        .category-toggle-wrap .category-toggle i::before {
          content: "\e62a"; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .category-toggle-wrap .category-toggle i {
          font-size: 18px; } }
      @media only screen and (max-width: 767px) {
        .category-toggle-wrap .category-toggle i {
          font-size: 18px; } }

.hero-side-category {
  background-color: #ffffff;
  width: 100%;
  text-transform: capitalize; }
  @media only screen and (max-width: 767px) {
    .hero-side-category {
      min-height: 50px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .hero-side-category {
      width: 100%;
      position: relative; } }
  @media only screen and (max-width: 767px) {
    .hero-side-category {
      width: 100%;
      z-index: 9;
      position: relative; } }
  .hero-side-category .category-toggle-wrap {
    background-color: #{{$theme->getMainColor()}}; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .hero-side-category .category-toggle-wrap .category-toggle i::before {
        content: "\e62a"; } }
    @media only screen and (max-width: 767px) {
      .hero-side-category .category-toggle-wrap .category-toggle i::before {
        content: "\e62a"; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .hero-side-category .category-toggle-wrap .category-toggle i {
        font-size: 18px; } }
    @media only screen and (max-width: 767px) {
      .hero-side-category .category-toggle-wrap .category-toggle i {
        font-size: 18px; } }
  .hero-side-category nav.category-menu {
    background-color: #ffffff;
    float: left;
    width: 100%;
    left: 0;
    top: 45px;
    -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .hero-side-category nav.category-menu {
        position: absolute;
        top: 55px;
        z-index: 9; } }
    @media only screen and (max-width: 767px) {
      .hero-side-category nav.category-menu {
        position: absolute; } }
    @media only screen and (max-width: 767px) {
      .hero-side-category nav.category-menu > ul {
        max-height: 180px;
        overflow-y: auto; } }
    @media only screen and (max-width: 575px) {
      .hero-side-category nav.category-menu > ul {
        max-height: 220px;
        overflow-y: auto; } }
    .hero-side-category nav.category-menu > ul > li:last-child > a {
      border-bottom: none !important; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .hero-side-category nav.category-menu > ul > li {
        position: relative; } }
    @media only screen and (max-width: 767px) {
      .hero-side-category nav.category-menu > ul > li {
        position: relative; } }
    .hero-side-category nav.category-menu > ul > li.menu-item-has-children {
      position: relative; }
      .hero-side-category nav.category-menu > ul > li.menu-item-has-children > a::before {
        font-family: 'fontAwesome';
        content: "\f054";
        position: absolute;
        right: 25px;
        top: 0;
        line-height: 50px; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .hero-side-category nav.category-menu > ul > li.menu-item-has-children > a::before {
            display: none; } }
        @media only screen and (max-width: 767px) {
          .hero-side-category nav.category-menu > ul > li.menu-item-has-children > a::before {
            display: none; } }
    .hero-side-category nav.category-menu > ul > li i {
      position: absolute;
      right: 0;
      top: 0;
      cursor: pointer;
      height: 50px;
      width: 40px;
      line-height: 50px;
      z-index: 9; }
      .hero-side-category nav.category-menu > ul > li i::before {
        background-color: #606060;
        width: 8px;
        height: 2px;
        content: "";
        position: absolute;
        left: 50%;
        margin-left: -4px;
        margin-top: -1px;
        top: 50%; }
      .hero-side-category nav.category-menu > ul > li i::after {
        background-color: #606060;
        width: 2px;
        height: 8px;
        content: "";
        position: absolute;
        left: 50%;
        margin-top: -4px;
        margin-left: -1px;
        top: 50%;
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        -webkit-transform: scaleY(0);
        -ms-transform: scaleY(0);
        transform: scaleY(0); }
      .hero-side-category nav.category-menu > ul > li i.expand::after {
        -webkit-transform: scaleY(1);
        -ms-transform: scaleY(1);
        transform: scaleY(1); }
    .hero-side-category nav.category-menu > ul > li > a {
      display: block;
      padding: 10px 25px;
      line-height: 30px;
      font-size: 14px;
      color: #606060;
      font-weight: 400;
      position: relative;
      border-bottom: 1px solid #e8e8e8; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .hero-side-category nav.category-menu > ul > li > a {
          border-bottom: none; } }
      .hero-side-category nav.category-menu > ul > li > a:hover {
        color: #{{$theme->getMainColor()}}; }
    .hero-side-category nav.category-menu > ul > li:hover .category-mega-menu {
      z-index: 9;
      opacity: 1;
      visibility: visible; }
    .hero-side-category nav.category-menu > ul > li .banner {
      padding: 15px;
      max-width: 300px; }
    .hero-side-category nav.category-menu.category-menu-5 > ul > li > a {
      padding: 12px 25px; }
  .hero-side-category nav.shop-category-menu {
    background: none;
    display: block; }
    .hero-side-category nav.shop-category-menu ul li a {
      padding: 5px 0;
      display: block;
      line-height: 30px;
      font-size: 14px;
      color: #606060;
      font-weight: 500;
      position: relative;
      border-bottom: 1px solid #e8e8e8; }
      .hero-side-category nav.shop-category-menu ul li a:hover {
        color: #{{$theme->getMainColor()}}; }
  .hero-side-category.shop-side-category {
    height: auto;
    min-height: 200px; }

/*=============================================
=            12. Shop Page              =
=============================================*/
/*----------  Shop header  ----------*/
@media only screen and (max-width: 767px) {
  .view-mode-icons {
    margin-bottom: 20px; } }

.view-mode-icons a {
  font-size: 15px;
  background-color: #ebebeb;
  color: #999;
  width: 50px;
  height: 30px;
  line-height: 30px;
  text-align: center; }
  .view-mode-icons a:first-child {
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    padding-left: 5px; }
  .view-mode-icons a:last-child {
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    padding-right: 5px; }
  .view-mode-icons a:hover, .view-mode-icons a.active {
    background-color: #{{$theme->getMainColor()}};
    color: #ffffff; }

.sort-by-dropdown {
  font-weight: 500;
  margin-right: 10px;
  font-size: 15px;
  color: #323232; }
  @media only screen and (max-width: 767px) {
    .sort-by-dropdown {
      font-size: 14px; } }
  .sort-by-dropdown select {
    padding: 5px 10px;
    margin-left: 10px; }
  .sort-by-dropdown p {
    margin-bottom: 0; }

p.result-show-message {
  font-size: 15px;
  font-weight: 500; }
  @media only screen and (max-width: 767px) {
    p.result-show-message {
      font-size: 14px; } }

/*----------  Shop product grid list switcher style  ----------*/
.shop-product-wrap.grid .shop-list-view-product {
  display: none; }

.shop-product-wrap.list .shop-grid-view-product {
  display: none; }

.shop-product-wrap.list [class*="col"],
.shop-product-wrap.list [class*="col-"] {
  -webkit-box-flex: 1;
  -ms-flex: 1 0 100%;
  flex: 1 0 100%;
  width: 100%;
  max-width: 100%; }

/*=============================================
=            14. Cart & Wishlist            =
=============================================*/
.cart-table {
  background-color: #ffffff;
    border-radius: {{$theme->getRadius()}}px !important;
  -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }
  .cart-table .table {
    margin: 0; }
    @media only screen and (max-width: 767px) {
      .cart-table .table {
        border-top: 8px solid #ddd; } }
    .cart-table .table thead {
      background-color: #ddd; }
      @media only screen and (max-width: 767px) {
        .cart-table .table thead {
          display: none; } }
      .cart-table .table thead tr th {
        text-align: center;
        border: none;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
        color: #222222;
        padding: 12px 20px; }
    .cart-table .table tbody tr td {
      text-align: center;
      border: none;
      padding: 25px 20px;
      vertical-align: middle;
      border-bottom: 1px solid #dddddd; }
      @media only screen and (max-width: 767px) {
        .cart-table .table tbody tr td {
          display: block;
          width: 100%;
          max-width: none;
          padding: 15px;
          text-align: left; } }

.cart-table th.pro-thumbnail, .cart-table td.pro-thumbnail {
  max-width: 160px;
  min-width: 120px;
  width: 160px; }
  @media only screen and (max-width: 767px) {
    .cart-table th.pro-thumbnail a, .cart-table td.pro-thumbnail a {
      width: 160px; } }

.cart-table th.pro-title, .cart-table td.pro-title {
  min-width: 200px; }

.cart-table td.pro-thumbnail a {
  display: block; }
  .cart-table td.pro-thumbnail a img {
    width: 100%;
    background-color: #f6f7f8; }

.cart-table td.pro-title a {
  font-size: 16px;
  font-weight: 500;
  color: #666666; }
  .cart-table td.pro-title a:hover {
    color: #{{$theme->getMainColor()}}; }

.cart-table td.pro-price span {
  display: block;
  font-size: 15px;
  font-weight: 500;
  color: #666666; }

.cart-table td.pro-quantity .pro-qty {
  display: inline-block;
  position: relative;
  width: 100px;
  border: 1px solid #ddd;
  height: 40px; }
  .cart-table td.pro-quantity .pro-qty input {
    padding-right: 25px;
    width: 100%;
    border: none;
    height: 100%;
    padding-left: 20px; }
  .cart-table td.pro-quantity .pro-qty a {
    width: 20px;
    height: 20px;
    position: absolute;
    font-weight: normal;
    line-height: 20px;
    text-align: center;
    font-size: 18px; }
    .cart-table td.pro-quantity .pro-qty a.inc {
      top: 0;
      right: 0;
      border-left: 1px solid #ddd;
      border-bottom: 1px solid #ddd; }
    .cart-table td.pro-quantity .pro-qty a.dec {
      bottom: 0;
      right: 0;
      border-left: 1px solid #ddd;
      padding-top: 2px; }

.cart-table td.pro-subtotal span {
  display: block;
  font-size: 15px;
  font-weight: 500;
  color: #666666; }

.cart-table td.pro-addtocart button {
  width: 140px;
  border-radius: 50px;
  height: 36px;
  border: 1px solid #{{$theme->getMainColor()}};
  line-height: 24px;
  padding: 5px 20px;
  font-weight: 700;
  text-transform: capitalize;
  color: #222222;
  background-color: #{{$theme->getMainColor()}}; }

.cart-table td.pro-remove a {
  display: block;
  font-weight: 500;
  color: #666666; }
  .cart-table td.pro-remove a i {
    font-size: 15px; }
  .cart-table td.pro-remove a:hover {
    color: #ff0000; }
  @media only screen and (max-width: 767px) {
    .cart-table td.pro-remove a {
      width: 60px;
      text-align: center; } }

/*-- Calculate Shipping --*/
.calculate-shipping {
  margin-bottom: 23px; }
  .calculate-shipping h4 {
    font-size: 20px;
    line-height: 23px;
    text-decoration: underline;
    text-transform: capitalize;
    font-weight: 700;
    margin-bottom: 30px; }
  .calculate-shipping form .nice-select {
    width: 100%;
    border-radius: 50px;
    height: 36px;
    border: 1px solid #999999;
    line-height: 24px;
    padding: 5px 20px;
    background-color: transparent; }
    .calculate-shipping form .nice-select::after {
      border-color: #666666; }
    .calculate-shipping form .nice-select .current {
      display: block;
      line-height: 24px;
      font-size: 14px;
      color: #666666; }
  .calculate-shipping form input {
    width: 100%;
    border-radius: 50px;
    height: 36px;
    border: 1px solid #999999;
    line-height: 24px;
    padding: 5px 20px;
    color: #666666;
    background-color: transparent; }
    .calculate-shipping form input[type="submit"] {
      font-weight: 400;
      text-transform: uppercase;
      color: #ffffff;
      background-color: #{{$theme->getMainColor()}};
      border-color: #{{$theme->getMainColor()}};
      width: 140px; }
      .calculate-shipping form input[type="submit"]:hover {
        background-color: #5d8801; }

/*-- Discount Coupon --*/
.discount-coupon h4 {
  font-size: 20px;
  line-height: 23px;
  text-decoration: underline;
  text-transform: capitalize;
  font-weight: 700;
  margin-bottom: 30px; }

.discount-coupon form input {
  width: 100%;
  border-radius: 50px;
  height: 36px;
  border: 1px solid #999999;
  line-height: 24px;
  padding: 5px 20px;
  color: #666666;
  background-color: transparent; }
  .discount-coupon form input[type="submit"] {
    font-weight: 400;
    text-transform: uppercase;
    color: #ffffff;
    background-color: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    width: 140px; }
    .discount-coupon form input[type="submit"]:hover {
      background-color: #5d8801; }

/*-- Cart Summary --*/
.cart-summary {
  float: right;
  max-width: 410px;
  width: 100%;
  margin-left: auto; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .cart-summary {
      margin-left: 0; } }
  @media only screen and (max-width: 767px) {
    .cart-summary {
      margin-left: 0; } }
  .cart-summary .cart-summary-wrap {
    background-color: #ddd;
    padding: 45px 50px;
    margin-bottom: 20px; }
    @media only screen and (max-width: 575px) {
      .cart-summary .cart-summary-wrap {
        padding: 25px 30px; } }
    .cart-summary .cart-summary-wrap h4 {
      font-size: 20px;
      line-height: 23px;
      text-decoration: underline;
      text-transform: capitalize;
      font-weight: 700;
      margin-bottom: 30px; }
    .cart-summary .cart-summary-wrap p {
      font-size: 14px;
      font-weight: 500;
      line-height: 23px;
      color: #222222; }
      .cart-summary .cart-summary-wrap p span {
        float: right; }
    .cart-summary .cart-summary-wrap h2 {
      border-top: 1px solid #999999;
      padding-top: 9px;
      font-size: 18px;
      line-height: 23px;
      font-weight: 700;
      color: #000000;
      margin: 0; }
      .cart-summary .cart-summary-wrap h2 span {
        float: right; }
  .cart-summary .cart-summary-button {
    overflow: hidden;
    width: 100%; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .cart-summary .cart-summary-button {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start; } }
    @media only screen and (max-width: 767px) {
      .cart-summary .cart-summary-button {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start; } }
    .cart-summary .cart-summary-button button {
      margin-top: 10px;
      width: 140px;
      border-radius: 50px;
      height: 36px;
      border: 1px solid #999999;
      line-height: 24px;
      padding: 5px 20px;
      color: #666666;
      background-color: transparent;
      margin-left: 20px;
      float: right; }
      .cart-summary .cart-summary-button button:last-child {
        margin-left: 0; }
      .cart-summary .cart-summary-button button:hover {
        background-color: #{{$theme->getMainColor()}};
        border-color: #{{$theme->getMainColor()}};
        color: #ffffff; }
      .cart-summary .cart-summary-button button.checkout-btn {
        font-weight: 400;
        text-transform: uppercase;
        color: #ffffff;
        background-color: #{{$theme->getMainColor()}};
        border-color: #{{$theme->getMainColor()}}; }
        .cart-summary .cart-summary-button button.checkout-btn:hover {
          background-color: #5d8801; }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .cart-summary .cart-summary-button button {
          margin-left: 0;
          margin-right: 20px; }
          .cart-summary .cart-summary-button button:last-child {
            margin-right: 0; } }
      @media only screen and (max-width: 767px) {
        .cart-summary .cart-summary-button button {
          margin-left: 0;
          margin-right: 10px; }
          .cart-summary .cart-summary-button button:last-child {
            margin-right: 0; } }
      @media only screen and (max-width: 575px) {
        .cart-summary .cart-summary-button button {
          width: 130px; } }

/*=====  End of 16. Compare  ======*/
/*=============================================
=            17. My account            =
=============================================*/
.myaccount-tab-menu {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
    border-radius: {{$theme->getRadius()}}px !important;
  -ms-flex-direction: column;
  flex-direction: column;
  background-color: #ffffff; }
  .myaccount-tab-menu a {
    border: 1px solid #eeeeee;
    border-bottom: none;
    color: #666666;
    font-weight: 500;
    font-size: 12px;
    display: block;
    padding: 15px 15px 13px;
    text-transform: uppercase; }
    .myaccount-tab-menu a:last-child {
      border-bottom: 1px solid #eeeeee; }
    .myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
      background-color: #{{$theme->getMainColor()}};
      color: #ffffff; }
    .myaccount-tab-menu a i {
      font-size: 14px;
      text-align: center;
      width: 25px; }

/*-- My Account Content -*/
.myaccount-content {
  background-color: #ffffff;
  font-size: 14px;
  border: 1px solid #eeeeee;
border-radius: {{$theme->getRadius()}}px !important;
  padding: 30px; }
  @media only screen and (max-width: 575px) {
    .myaccount-content {
      padding: 20px 15px; } }
  .myaccount-content h3 {
    border-bottom: 1px dashed #eeeeee;
    padding-bottom: 10px;
    margin-bottom: 25px; }
  .myaccount-content .welcome a {
    color: #000000; }
    .myaccount-content .welcome a:hover {
      color: #{{$theme->getMainColor()}}; }
  .myaccount-content .welcome strong {
    font-weight: 600; }
  .myaccount-content a.edit-address-btn {
    background: none;
    border: none;
    font-weight: 400;
    font-size: 14px;
    text-transform: uppercase;
    color: #ffffff;
    background-color: #{{$theme->getMainColor()}};
    border-color: #{{$theme->getMainColor()}};
    padding: 10px 20px;
    border-radius: 50px; }
    .myaccount-content a.edit-address-btn i {
      padding-right: 5px; }
    .myaccount-content a.edit-address-btn:hover {
      background-color: #5d8801; }


/*-- My Account Table -*/
.myaccount-table {
  white-space: nowrap;
  font-size: 15px; }
  .myaccount-table table th,
  .myaccount-table .table th {
    padding: 10px; }
  .myaccount-table table td,
  .myaccount-table .table td {
    padding: 20px 10px;
    vertical-align: middle; }

.saved-message {
  border-top: 3px solid #{{$theme->getMainColor()}};
  border-radius: 5px 5px 0 0;
  font-weight: 600;
  font-size: 13px;
  padding: 20px; }

/*-- My Account Details Form -*/
.account-details-form h4 {
  margin: 0; }

.account-details-form input {
  display: block;
  width: 100%;
  border: 1px solid #ebebeb;
  border-radius: 5px;
  line-height: 24px;
  padding: 11px 25px;
  color: #656565; }

/*=====  End of 17. My account  ======*/
/*=============================================
=            18. Login register            =
=============================================*/
/*-- Checkout Title --*/
.login-title {
  font-size: 20px;
  line-height: 23px;
  text-decoration: underline;
  text-transform: capitalize;
  font-weight: 700;
  margin-bottom: 30px; }

/*-- Checkout Form --*/
.login-form {
  background-color: #ffffff;
  padding: 30px;
    border-radius: {{$theme->getRadius()}}px !important;
  -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1); }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .login-form {
      padding: 15px; } }
  .login-form label {
    display: block;
    font-size: 14px;
    margin-bottom: 12px;
    font-weight: 500; }
  .login-form .nice-select {
    width: 100%;
    background-color: transparent;
    border: 1px solid #999999;
    border-radius: 50px;
    line-height: 23px;
    padding: 10px 20px;
    font-size: 14px;
    height: 45px;
    color: #666666;
    margin-bottom: 15px; }
    .login-form .nice-select::after {
      width: 6px;
      height: 6px;
      border-width: 1px;
      right: 20px;
      border-color: #666666; }
    .login-form .nice-select .current {
      color: #666666;
      display: block;
      line-height: 23px; }
    .login-form .nice-select .list {
      width: 100%; }
  .login-form input {
    width: 100%;
    background-color: transparent;
    border: 1px solid #999999;
    border-radius: 5px;
    line-height: 23px;
    padding: 10px 20px;
    font-size: 14px;
    color: #666666;
    margin-bottom: 15px; }
    .login-form input[type="checkbox"] {
      width: auto; }
  .login-form .check-box {
    float: left;
    margin-right: 70px; }
    .login-form .check-box:last-child {
      margin-right: 0; }
    .login-form .check-box input[type="checkbox"] {
      display: none; }
      .login-form .check-box input[type="checkbox"] + label {
        position: relative;
        padding-left: 30px;
        line-height: 20px;
        font-size: 14px;
        font-weight: 400;
        color: #222222;
        margin: 0; }
        .login-form .check-box input[type="checkbox"] + label::before {
          position: absolute;
          left: 0;
          top: 0;
          width: 20px;
          height: 20px;
          display: block;
          border: 2px solid #999999;
          content: "";
          -webkit-transition: all 0.3s ease 0s;
          -o-transition: all 0.3s ease 0s;
          transition: all 0.3s ease 0s; }
        .login-form .check-box input[type="checkbox"] + label::after {
          position: absolute;
          left: 0;
          top: 0;
          display: block;
          content: "\f00c";
          font-family: Fontawesome;
          font-size: 12px;
          line-height: 20px;
          opacity: 0;
          color: #222222;
          width: 20px;
          text-align: center;
          -webkit-transition: all 0.3s ease 0s;
          -o-transition: all 0.3s ease 0s;
          transition: all 0.3s ease 0s; }
      .login-form .check-box input[type="checkbox"]:checked + label::before {
        border: 2px solid #222222; }
      .login-form .check-box input[type="checkbox"]:checked + label::after {
        opacity: 1; }

/*-- Place Order --*/
.register-button {
  display: block;
  margin-top: 40px;
  width: 140px;
  border-radius: 5px;
  height: 36px;
  border: none;
  line-height: 24px;
  padding: 6px 20px;
  float: right;
  font-weight: 400;
  text-transform: uppercase;
  color: #ffffff;
  background-color: #{{$theme->getMainColor()}}; }
  .register-button:hover {
    background-color: #5d8801; }

/*=====  End of 18. Login register   ======*/





.single-navigation-section ul li {
  margin-bottom: 10px; }
  .single-navigation-section ul li:last-child {
    margin-bottom: 0; }
  .single-navigation-section ul li a {
    font-size: 12px;
    line-height: 18px;
    color: #777777; }
    .single-navigation-section ul li a:hover {
      color: #{{$theme->getMainColor()}}; }

/*----------  copyright section  ----------*/
.copyright-section p {
  margin-bottom: 0; }

@media only screen and (max-width: 767px) {
  .copyright-section .copyright-segment {
    margin-bottom: 15px; } }

.copyright-section .copyright-segment p a {
  color: #222; }
  .copyright-section .copyright-segment p a:hover {
    color: #{{$theme->getMainColor()}}; }

.copyright-section .copyright-segment p span.separator {
  padding: 0 10px;
  color: #222; }

.copyright-section .copyright-segment p.copyright-text a {
  color: #777; }
  .copyright-section .copyright-segment p.copyright-text a:hover {
    color: #{{$theme->getMainColor()}}; }

/*=====  End of 22. Footer ======*/

</style>
