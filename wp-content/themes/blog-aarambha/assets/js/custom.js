(function ($) {
    'use strict';


    /* back-to-top button */
     $('.back-to-top').hide();
     $('.back-to-top').on("click", function (e) {
         e.preventDefault();
        $('html, body').animate({
             scrollTop: 0
         }, 'slow');
     });

     $(window).scroll(function () {
         var scrollheight = 400;
         if ($(window).scrollTop() > scrollheight) {
             $('.back-to-top').fadeIn();

         } else {
             $('.back-to-top').fadeOut();
         }
     });

    /*meanmenu js for responsive menu for header-layout-1*/
     $('.main-navigation').meanmenu({
         meanMenuContainer: '.blog-mean-menu',
         meanScreenWidth: "768",
         meanRevealPosition: "right",
     });

    //header search
    // 	focus search
	$('.search-toggle').on("click",function(e){
		e.preventDefault();
        BlogAArambha_search();
	});
	
	function BlogAArambha_search(e) {
        $('.search-section').toggleClass('active');
		setTimeout(function(){
        $('.search-section form input[type="search"]').focus();
			}, 500 );
        var focusableEls = $('.search-section a[href]:not([disabled]), .search-section input[type="submit"]:not([disabled]), .search-section input:not([disabled]) ');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;
        $('.search-section').on('keydown', function (e) {
            if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {

                if ( e.shiftKey && document.activeElement === lastFocusableEl ) {
                  e.preventDefault();
                  $('.search-section form input[type="search"]').focus();
                } else {
                  if (document.activeElement === lastFocusableEl) {
                      // firstFocusableEl.focus();
                      e.preventDefault();
                      $('.search-section').removeClass('active');
                  }
                }    
            }
        });
    }
	$(document).on('keyup', function(e){
		 if ( e.keyCode === 27 && $('.search-section').hasClass('active') ) {
            $(".search-section").removeClass('active');
        }
//         removeClass = true;
	});

    /*main slider*/
    var $main_slider_wrap = $('.main-slider-wrap');

    if ( $main_slider_wrap.length > 0) {
      $main_slider_wrap.slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 7000,
      });
    }
    
    /*category-section slider*/
    var $category_section_wrap =$('.category-section-wrap');

    if( $category_section_wrap.length > 0){
      $category_section_wrap.slick({
        slidesToShow: 3,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 7000,
          responsive: [
          {
            breakpoint: 840,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint:540,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    }
    

    /*shop section slider*/
    var $shop_slide =$('.shop-slide');

    if( $shop_slide.length > 0){
      $shop_slide.slick({
        slidesToShow: 3,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 840,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint:540,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    }

    /*pop up of gallery sections*/
    var $gallery =$('.gallery');

    if( $gallery.length > 0){
      $gallery.magnificPopup({
        delegate: 'a.insta-popup',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          titleSrc: function (item) {
            return item.el.attr('title');
          }
        }
      });
    }

  /*sticky sidebar*/
   jQuery('.section-left , .section-wrap-sidebar , #primary , #secondary').theiaStickySidebar({
     additionalMarginTop: 30
   });
	
    
  $('.mean-bar').on('keydown', function (e) {

      $(".sub-menu").attr("aria-expanded", "true");
      var focusableEls = $(' .mean-bar .meanmenu-reveal, .mean-bar a[href]:not([disabled]), .mean-bar li');
      var firstFocusableEl = focusableEls[0];
      var lastFocusableEl = focusableEls[focusableEls.length - 1];
      var logo = document.querySelector('.custom-logo-link,.site-title a');

      var KEYCODE_TAB = 9;
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {

          if (e.shiftKey) /* shift + tab */ {
              if (document.activeElement === firstFocusableEl) {
                e.preventDefault();
                if( firstFocusableEl.classList.contains('meanClose') ) {
                  lastFocusableEl.focus();
                } else {
                  logo.focus();
                }
              }
          } else /* tab */ {
              if (document.activeElement === lastFocusableEl) {
                  firstFocusableEl.focus();
                  e.preventDefault();
              }
          }
      }

  });
	
		



})(jQuery);


