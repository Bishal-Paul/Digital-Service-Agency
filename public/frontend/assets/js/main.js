

(function($){
	"use strict";
    jQuery(document).ready(function () {
        jQuery('.menu').meanmenu();
	});
	
    jQuery(document).ready(function () {
        jQuery('.third-menu').meanmenu();
	});
	
	// PRELOADER JS CODE
    jQuery(window).on('load',function(){
        jQuery(".loader-box").fadeOut(400);
    });
	// END PRELOADER JS CODE
	

	
	$(document).on('ready', function(){
		
		// START MENU JS CODE
		$(window).on('scroll', function() {
			if ($(this).scrollTop() > 50) {
				$('.main-menu-area').addClass('menu-shrink animated slideInDown');
			} else {
				$('.main-menu-area').removeClass('menu-shrink animated slideInUp');
			}
		});	

		$('.menu li a').on('click', function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1000);
			e.preventDefault();
        });
		
		$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
		});

		$('.scroll-btm a').on('click', function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1000);
			e.preventDefault();
        });
		

		
		var $screen = $('.screen .slider');
		$screen.slick({ //init Slick 
			fade: true,
			arrows : false,
			dots: false,
			useCSS: false,
			autoplay: true,
			autoplaySpeed: 900,
			speed: 900,
			infinite: true,
			cssEase: 'ease-in-out',
			touchThreshold: 300
		});
		$screen.on('click',function(){ //go to next slide on click
			$screen.slick('slickNext');
		});

		// Inline popups
$('#inline-popups').magnificPopup({
	delegate: 'a',
	removalDelay: 500, //delay removal by X to allow out-animation
	callbacks: {
	  beforeOpen: function() {
		 this.st.mainClass = this.st.el.attr('data-effect');
	  }
	},
	midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });


		$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
	
			fixedContentPos: false
		});

			//create the slider
				$('.cd-testimonials').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					infinite: true,
					cssEase: 'linear',
					slide: 'li',
					arrows: false,
				});

	
		//   Wow js
		new WOW().init();
	

		// TOP BUTTON JS CODE
		$('body').append('<div id="toTop" class="top-arrow"><img  src="assets/image/arrow-up.png" alt=""></div>');
		$(window).on('scroll', function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
			$('#toTop').fadeOut();
			}
		}); 
		$('#toTop').on('click', function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});
		// END TOP BUTTON JS CODE
	});
}(jQuery));

