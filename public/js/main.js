(function ($) {
	"use strict";

	/*--
    Menu Sticky
    -----------------------------------*/
    var windows = $(window);
    var screenSize = windows.width();
    var sticky = $('.header-sticky');
    var menubarTop = $('.menubar-top');


    windows.on('scroll', function () {
    	var scroll = windows.scrollTop();


    	if (scroll < 300) {
    		sticky.removeClass('is-sticky');

    		menubarTop.removeClass('d-none');
    		menubarTop.addClass('d-flex');
    	} else {
    		sticky.addClass('is-sticky');
    		menubarTop.addClass('d-none');
    		menubarTop.removeClass('d-flex');
    	}


		//code for scroll top

		if (scroll >= 400) {
			$('.scroll-top').fadeIn();
		} else {
			$('.scroll-top').fadeOut();
		}

	});



	/*--
	Scroll to top
	-----------------------------------*/

	$('.scroll-top').on('click', function () {
		$('html,body').animate({
			scrollTop: 0
		}, 2000);
	});



	/*--
	Hero slider one active
	-----------------------------------*/
	var heroSlider = $('.hero-slider-one');
	heroSlider. on( 'touchstart', function() {
        heroSlider. slick( 'slickPlay');
    });
    
	heroSlider.slick({
		arrows: true,
		autoplay: true,
		autoplaySpeed: 8000,
		dots: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		fade: true,
		infinite: true,
		slidesToShow: 1,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
	});

	/*--
	Hero slider two active
	-----------------------------------*/
	var heroSliderTwo = $('.hero-slider-two');
	heroSliderTwo.slick({
		arrows: false,
		autoplay: true,
		autoplaySpeed: 10000,
		dots: true,
		pauseOnFocus: false,
		pauseOnHover: false,
		fade: true,
		infinite: true,
		slidesToShow: 1
	});

	/*--
	Hero slider three active
	-----------------------------------*/
	var heroSliderThree = $('.hero-slider-three');
	heroSliderThree.slick({
		arrows: false,
		autoplay: true,
		autoplaySpeed: 10000,
		dots: true,
		pauseOnFocus: false,
		pauseOnHover: false,
		fade: true,
		infinite: true,
		slidesToShow: 1
	});

	/*--
	Single blog post slider active
	-----------------------------------*/
	var blogPostSlider = $('.blog-image-gallery');
	blogPostSlider.slick({
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
		arrows: true,
		autoplay: false,
		autoplaySpeed: 5000,
		dots: false,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		slidesToShow: 1
	});

	/*--
	Category slider active
	-----------------------------------*/
	var catSlider = $('.category-slider-container');
	catSlider.slick({
		arrows: true,
		autoplay: false,
		draggable: false,
		dots: false,
		infinite: true,
		slidesToShow: 6,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-caret-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-caret-right"></i></button>',
		responsive: [{
			breakpoint: 1499,
			settings: {
				slidesToShow: 6,
			}
		},
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 5,
			}
		},
		{
			breakpoint: 991,

			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
			}
		}
		]
	});

	/*--
	Blog slider active
	-----------------------------------*/
	var blogSlider = $('.blog-slider-container');
	blogSlider.slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: true,
		slidesToShow: 3,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-caret-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-caret-right"></i></button>',
		responsive: [{
			breakpoint: 1499,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
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
				slidesToShow: 1,
			}
		}
		]
	});

	/*--
	Best seller slider active
	-----------------------------------*/
	var bestSellerSlider = $('.best-seller-slider-container');
	bestSellerSlider.slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: false,
		slidesToShow: 3,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-caret-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-caret-right"></i></button>',
		responsive: [{
			breakpoint: 1499,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 3,
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

	/*--
	Tab slider active
	-----------------------------------*/
	var tabSlider = $('.tab-slider-container');
	tabSlider.slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-caret-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-caret-right"></i></button>',
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
				slidesToShow: 3,
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
        /*--
	Multisale slider active
	-----------------------------------*/
	var multisaleSlider = $('.multisale-slider-wrapper');
	multisaleSlider.slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-caret-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-caret-right"></i></button>',
		responsive: [{
			breakpoint: 1499,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
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

	/*--
	Related product slider active
	-----------------------------------*/
	var relatedSlider = $('.related-product-slider-wrapper');
	relatedSlider.slick({
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
				slidesToShow: 3,
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
				slidesToShow: 1,
			}
		}
		]
	});

	/*--
	Sale single product slider active
	-----------------------------------*/
	var saleSingleSlider = $('.sale-single-product-container');
	saleSingleSlider.slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: true,
		slidesToShow: 1,
		prevArrow: '<button type="button" class="slick-prev"><span class="arrow_carrot-left"></span></button>',
		nextArrow: '<button type="button" class="slick-next"><span class="arrow_carrot-right"></span></button>',
		responsive: [{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 1,
				arrows: false
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				arrows: false
			}
		}
		]
	});

		/*----------------------------------- 
    	Single Product slide image Active 
    	--------------------------------------*/
    	$('.small-image-slider-single-product').slick({
    		prevArrow: '<i class="fa fa-angle-up"></i>',
    		nextArrow: '<i class="fa fa-angle-down slick-next-btn"></i>',
    		slidesToShow: 3,
    		vertical: true,
    		responsive: [{
    			breakpoint: 1200,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 991,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 767,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 3
    			}
    		},
    		{

    			breakpoint: 480,
    			settings: {
    				prevArrow: '<i class="fa fa-angle-left"></i>',
    				nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
    				vertical: false,
    				slidesToShow: 2,
    				slidesToScroll: 1
    			}
    		}
    		]
    	});

    	$('.small-image-slider-single-product a').on('click', function (e) {
    		e.preventDefault();

    		var $thisParent = $(this).closest('.product-image-slider');
    		var $href = $(this).attr('href');
    		$thisParent.find('.small-image-slider-single-product a').removeClass('active');
    		$(this).addClass('active');

    		$thisParent.find('.product-large-image-list .tab-pane').removeClass('active show');
    		$thisParent.find('.product-large-image-list ' + $href).addClass('active show');

    	});
		/*----------------------------------- 
    	Single Product image gallery Tabstyle Three  Active 
    	--------------------------------------*/
    	$('.small-image-slider-single-product-tabstyle-3').slick({
    		prevArrow: '<i class="fa fa-angle-left"></i>',
    		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
    		slidesToShow: 3,
    		responsive: [{
    			breakpoint: 1200,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 991,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 767,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 3
    			}
    		},
    		{
    			breakpoint: 480,
    			settings: {
    				slidesToShow: 2,
    				slidesToScroll: 2
    			}
    		}
    		]
    	});

    	$('.small-image-slider-single-product-tabstyle-3 a').on('click', function (e) {
    		e.preventDefault();

    		var $thisParent = $(this).closest('.product-image-slider');
    		var $href = $(this).attr('href');
    		$thisParent.find('.small-image-slider-single-product-tabstyle-3 a').removeClass('active');
    		$(this).addClass('active');

    		$thisParent.find('.product-large-image-list .tab-pane').removeClass('active show');
    		$thisParent.find('.product-large-image-list ' + $href).addClass('active show');

    	});



	/*----------------------------------- 
    	Product image gallery slider
    	--------------------------------------*/
    	$('.product-image-gallery-slider').slick({
    		prevArrow: '<i class="fa fa-angle-left"></i>',
    		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
    		slidesToShow: 3,
    		responsive: [{
    			breakpoint: 1200,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 991,
    			settings: {
    				slidesToShow: 2,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 767,
    			settings: {
    				slidesToShow: 2,
    				slidesToScroll: 1
    			}
    		},
    		{
    			breakpoint: 480,
    			settings: {
    				slidesToShow: 1,
    				slidesToScroll: 1
    			}
    		}
    		]
    	});

	/*----------------------------------- 
    	Single Product slide image Active 
    	--------------------------------------*/
    	$('.small-image-slider').slick({
    		prevArrow: '<i class="fa fa-angle-left"></i>',
    		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
    		slidesToShow: 3,
    		responsive: [{
    			breakpoint: 1200,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 3
    			}
    		},
    		{
    			breakpoint: 991,
    			settings: {
    				slidesToShow: 2,
    				slidesToScroll: 2
    			}
    		},
    		{
    			breakpoint: 767,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 3
    			}
    		},
    		{
    			breakpoint: 480,
    			settings: {
    				slidesToShow: 3,
    				slidesToScroll: 3
    			}
    		}
    		]
    	});

    	$('.modal').on('shown.bs.modal', function (e) {
    		$('.small-image-slider').resize();
    		$('.small-image-slider').slick('setPosition');

    	}) 

    	$('.small-image-slider a').on('click', function (e) {
    		e.preventDefault();

    		var $thisParent = $(this).closest('.product-image-slider');
    		var $href = $(this).attr('href');
    		$thisParent.find('.small-image-slider a').removeClass('active');
    		$(this).addClass('active');

    		$thisParent.find('.product-large-image-list .tab-pane').removeClass('active show');
    		$thisParent.find('.product-large-image-list ' + $href).addClass('active show');

    	});

	


	/*----- 
	Activate countdown
	--------------------------------*/
	$('[data-countdown]').each(function () {
		var $this = $(this),
		finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function (event) {
			$this.html(event.strftime('<div class="single-countdown"><span class="single-countdown-time">%D</span><span class="single-countdown-text">Days</span></div><div class="single-countdown"><span class="single-countdown-time">%H</span><span class="single-countdown-text">Hours</span></div><div class="single-countdown"><span class="single-countdown-time">%M</span><span class="single-countdown-text">Mins</span></div><div class="single-countdown"><span class="single-countdown-time">%S</span><span class="single-countdown-text">Secs</span></div>'));
		});
	});

	/*--------------------------
		Mobile Menu
		------------------------*/
		var mainMenuNav = $('.main-menu nav');
		mainMenuNav.meanmenu({
			meanScreenWidth: '991',
			meanMenuContainer: '.mobile-menu',
			meanMenuClose: '<span class="menu-close"></span>',
			meanMenuOpen: '<span class="menu-bar"></span>',
			meanRevealPosition: 'right',
			meanMenuCloseSize: '0',
		});



	/*--
		MailChimp
		-----------------------------------*/
		$('#mc-form').ajaxChimp({
			language: 'en',
			callback: mailChimpResponse,
		// ADD YOUR MAILCHIMP URL BELOW HERE!
		url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

	});

		function mailChimpResponse(resp) {

			if (resp.result === 'success') {
				$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
				$('.mailchimp-error').fadeOut(400);

			} else if (resp.result === 'error') {
				$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
			}

			// clear subscription form
			$("#mc-form input").val('');

		}



		/*---------------------
			Category Menu
			------------------------*/

			/*-- Variables --*/
			var categoryToggleWrap = $('.category-toggle-wrap');
			var categoryToggle = $('.category-toggle');
			var categoryMenu = $('.category-menu');

		/*
		 *  Category Menu Default Close for Mobile & Tablet Device
		 *  And Open for Desktop Device and Above
		 */
		 function categoryMenuToggle() {
		 	var screenSize = windows.width();
		 	if (screenSize <= 991) {
		 		categoryMenu.slideUp();
		 	} else {
		 		categoryMenu.slideDown();
		 	}
		 }

		 /*-- Category Menu Toggles --*/
		 function categorySubMenuToggle() {
		 	var screenSize = windows.width();
		 	if (screenSize <= 991) {
		 		$('.category-menu .menu-item-has-children > a').prepend('<i class="expand menu-expand"></i>');
		 		$('.category-menu .menu-item-has-children ul').slideUp();
				//        $('.category-menu .menu-item-has-children i').on('click', function(e){
				//            e.preventDefault();
				//            $(this).toggleClass('expand');
				//            $(this).siblings('ul').css('transition', 'none').slideToggle();
				//        })
			} else {
				$('.category-menu .menu-item-has-children > a i').remove();
				$('.category-menu .menu-item-has-children ul').slideDown();
			}
		}
		categoryMenuToggle();
		windows.resize(categoryMenuToggle);
		categorySubMenuToggle();
		windows.resize(categorySubMenuToggle);

		categoryToggle.on('click', function () {
			categoryMenu.slideToggle();
		});

		/*-- Category Sub Menu --*/
		$('.category-menu').on('click', 'li a, li a .menu-expand', function (e) {
			var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
			if ($a.parent().hasClass('menu-item-has-children')) {
				if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
					if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
					else {
						$(this).parents('li').siblings('li').find('ul:visible').slideUp();
						$a.siblings('ul').slideDown();
					}
				}
			}
			if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
				e.preventDefault();
				return false;
			}
		});

		/*-- Sidebar Category --*/
		var categoryChildren = $('.sidebar-category li .children');

		categoryChildren.slideUp();
		categoryChildren.parents('li').addClass('has-children');

		$('.sidebar-category').on('click', 'li.has-children > a', function (e) {

			if ($(this).parent().hasClass('has-children')) {
				if ($(this).siblings('ul:visible').length > 0) $(this).siblings('ul').slideUp();
				else {
					$(this).parents('li').siblings('li').find('ul:visible').slideUp();
					$(this).siblings('ul').slideDown();
				}
			}
			if ($(this).attr('href') === '#') {
				e.preventDefault();
				return false;
			}
		});

		//More category

		$(".category-menu li.hidden").hide();
		$("#more-btn").on('click', function (e) {
			e.preventDefault();
			$(".category-menu li.hidden").toggle(500);
			var htmlAfter = '<span class="icon_minus_alt2"></span> Less Categories';
			var htmlBefore = '<span class="icon_plus_alt2"></span> More Categories';


			if($(this).html() == htmlBefore){
				$(this).html(htmlAfter);
			}else{
				$(this).html(htmlBefore);
			}
		});
		

		/*--
		Image Popup
		-----------------------------------*/
		var imagePopup = $('.big-image-popup');
		imagePopup.magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});

		/*--
		Image Zoom
		-----------------------------------*/

		$('.easyzoom').easyZoom();

		/*--
		Sticky sidebar
		-----------------------------------*/

		$('#product-feature-details').stickySidebar({
			topSpacing: 90,
			bottomSpacing: -90,
			minWidth: 767
		});



		/*--
		Product View Mode
		------------------------*/
		$('.view-mode-icons a').on('click', function (e) {
			e.preventDefault();

			var shopProductWrap = $('.shop-product-wrap');
			var viewMode = $(this).data('target');

			$('.view-mode-icons a').removeClass('active');
			$(this).addClass('active');
			shopProductWrap.removeClass('grid list').addClass(viewMode);
		});



	/*--
    Nice Select
    ------------------------*/
    $('.nice-select').niceSelect();

	/*----- 
	Shipping Form Toggle
	--------------------------------*/ 
	$('[data-shipping]').on('click', function(){
		if( $('[data-shipping]:checked').length > 0 ) {
			$('#shipping-form').slideDown();
		} else {
			$('#shipping-form').slideUp();
		}
	});

/*----- 
	Payment Method Select
	--------------------------------*/
	$('[name="payment-method"]').on('click', function(){

		var $value = $(this).attr('value');

		$('.single-method p').slideUp();
		$('[data-method="'+$value+'"]').slideDown();

	});
	




})(jQuery);