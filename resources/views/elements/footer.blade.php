@inject('lang', 'App\Lang')
@inject('doc', 'App\Docs')

<footer>

    <div class="footer-navigation-section pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">

                    <div class="single-navigation-section">
                        @if ($docs["about"] == "true" || $docs["delivery"] == "true" || $docs["privacy"] == "true" || $docs["terms"] == "true" || $docs["refund"] == "true")
                            <h3 class="nav-section-title">{{$lang->get(28)}}</h3>   {{--INFORMATION--}}
                        @endif
                        <ul>
                            @if ($docs["about"] == "true")
                                <li> <a href="{{route('/about')}}">{{$doc->getName("about_text_name")}}</a></li>  {{--About Us--}}
                            @endif
                            @if ($docs["delivery"] == "true")
                                <li> <a href="{{route('/delivery')}}">{{$doc->getName("delivery_text_name")}}</a></li> {{--Delivery Information--}}
                            @endif
                            @if ($docs["privacy"] == "true")
                                <li> <a href="{{route('/privacy')}}">{{$doc->getName("privacy_text_name")}}</a></li> {{--Privacy Policy--}}
                            @endif
                            @if ($docs["terms"] == "true")
                                <li> <a href="{{route('/terms')}}">{{$doc->getName("terms_text_name")}}</a></li> {{--Terms & Condition--}}
                            @endif
                            @if ($docs["refund"] == "true")
                                <!--<li> <a href="{{route('/refund')}}">{{$doc->getName("refund_text_name")}}</a></li> {{--Refund Policy--}} -->
                            @endif
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">{{$lang->get(29)}}</h3> {{--MY ACCOUNT--}}
                        <ul>
                            <li> <a href="{{route("/account")}}">{{$lang->get(30)}}</a></li> {{--My Account--}}
                            <li> <a href="{{route("/wishlist")}}">{{$lang->get(31)}}</a></li> {{--Wishlist--}}
                            <li> <a href="{{route("/cart")}}">{{$lang->get(32)}}</a></li> {{--Shopping Cart--}}
                        </ul>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">

                    <div class="contact-summery">
@isset ($market)
@if ($market != '0' && $market != '' )
                        @if ($docs["address"] != "" || $docs["phone"] != "" || $docs["mobilephone"] != "")
                        <h2>{{$lang->get(33)}}</h2> {{--Contact us--}}
                        @endif
                        <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_pin_alt"></span>
                                </div>
                                <div class="contact-info">
                                    @if ($docs["address"] != "")
                                    <p>{{$lang->get(36)}}: <span>{{$docs["address"]}}</span></p> {{--Address--}}
                                    @endif
                                </div>
                            </div>

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    @if ($docs["phone"] != "")
                                    <p>{{$lang->get(34)}}: <span>{{$docs["phone"]}}</span></p>  {{--Phone--}}
                                    @endif
                                    @if ($docs["mobilephone"] != "")
                                    <p>{{$lang->get(35)}}: <span>{{$docs["mobilephone"]}}</span></p>  {{--Mobile Phone--}}
                                    @endif
                                </div>
                            </div>
                        </div>
@endif
@endisset
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright-section pt-35 pb-35">
        <div class="container">
            <div class="row align-items-md-center align-items-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">

                    <div class="copyright-segment">
                        <p>
                            @if ($docs["privacy"] == "true")
                                <a href="{{route('/privacy')}}">{{$doc->getName("privacy_text_name")}}</a> {{--Privacy Policy--}}
                            @endif
                            @if ($docs["terms"] == "true")
                                <span class="separator">|</span>
                                <a href="{{route('/terms')}}">{{$doc->getName("terms_text_name")}}</a> {{--Terms & Condition--}}
                            @endif
                        </p>
                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text-md-left">
                        <p class="copyright-text mt-10">&copy; {{$docs["copyright_text"]}}</p> <img src="{{url('/img/GPA.png')}}" style="padding-left: 15px; height:25px;" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="payment-info text-center text-md-right">
                        <p>{{$lang->get(27)}}<img src="img/payment-icon.png" class="img-fluid" alt=""></p>  {{--Allow payment base on --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
