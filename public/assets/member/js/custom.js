/**
  * Template Name: Varsity
  * Version: 1.0
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS


  1. SEARCH FORM
  2. ABOUT US VIDEO
  2. TOP SLIDER
  3. ABOUT US (SLICK SLIDER)
  4. LATEST COURSE SLIDER (SLICK SLIDER)
  5. TESTIMONIAL SLIDER (SLICK SLIDER)
  6. COUNTER
  7. RELATED ITEM SLIDER (SLICK SLIDER)
  8. MIXIT FILTER (FOR GALLERY)
  9. FANCYBOX (FOR PORTFOLIO POPUP VIEW)
  11. HOVER DROPDOWN MENU
  12. SCROLL TOP BUTTON


**/

jQuery(function($) {


    $('.filter-btn').click(function(event) {
        $('.side-search-bar').toggleClass('hidden-xs').css('margin-top', '85px');
    });

    $('.sort-btn').click(function(event) {
        $('.sort-bar').toggleClass('hidden-xs');
    });

    $('.menu-profile-mobile').slideUp();

    $('.menu-profile-open').click(function(event) {
        $('.menu-profile-mobile').slideToggle();
        $('.icon-profile-mobile').toggleClass('fa-arrow-circle-down').toggleClass('fa-arrow-circle-up');
    });



    /* ----------------------------------------------------------- */
    /*  1. SEARCH FORM
    /* ----------------------------------------------------------- */

    jQuery('#mu-search-icon').on('click', function(event) {
        event.preventDefault();
        $('#mu-search').addClass('mu-search-open');
        $('#mu-search form input[type="search"]').focus();
    });

    jQuery('.mu-search-close').on('click', function(event) {
        $("#mu-search").removeClass('mu-search-open');
    });

    /* ----------------------------------------------------------- */
    /*  2. ABOUT US VIDEO
    /* ----------------------------------------------------------- */
    // WHEN CLICK PLAY BUTTON
    jQuery('#mu-abtus-video').on('click', function(event) {
        event.preventDefault();
        $('body').append("<div id='about-video-popup'><span id='mu-video-close' class='fa fa-close'></span><iframe id='mutube-video' name='mutube-video' frameborder='0' allowfullscreen></iframe></div>");
        $("#mutube-video").attr("src", $(this).attr("href"));
    });
    // WHEN CLICK CLOSE BUTTON
    $(document).on('click', '#mu-video-close', function(event) {
        $(this).parent("div").fadeOut(1000);
    });
    // WHEN CLICK OVERLAY BACKGROUND
    $(document).on('click', '#about-video-popup', function(event) {
        $(this).remove();
    });


    /* ----------------------------------------------------------- */
    /*  3. NEWS SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-news-slide').slick({
        infinite: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        cssEase: 'linear',
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {

                    slidesToShow: 2,
                    slidesToScroll: 2
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


    /* ----------------------------------------------------------- */
    /*  4. POPULAR COURSE (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-popular').slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: 'linear'
    });




    /* ----------------------------------------------------------- */
    /*  3. TOP SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-slider').slick({
        dots: false,
        infinite: true,
        arrows: false,
        speed: 500,
        autoplay: true,
        cssEase: 'linear'
    });


    /* ----------------------------------------------------------- */
    /*  4. ABOUT US (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-testimonial-slide').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 500,
        autoplay: true,
        cssEase: 'linear'
    });


    /* ----------------------------------------------------------- */
    /*  5. LATEST COURSE SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-latest-course-slide').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        centerMode: true,
        centerPadding: '60px',
        autoplaySpeed: 5000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /* ----------------------------------------------------------- */
    /*  6. TESTIMONIAL SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('.mu-testimonial-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: false,
        mode: 'center',
        speed: 500,
        cssEase: 'linear'
    });

    /* ----------------------------------------------------------- */
    /*  7. COUNTER
    /* ----------------------------------------------------------- */

    jQuery('.counter').counterUp({
        delay: 10,
        time: 1000
    });


    /* ----------------------------------------------------------- */
    /*  8. RELATED ITEM SLIDER (SLICK SLIDER)
    /* ----------------------------------------------------------- */

    jQuery('#mu-related-item-slide').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
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
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    /* ----------------------------------------------------------- */
    /*  10. Last Watch
    /* ----------------------------------------------------------- */

    jQuery('#lastwatch').slick({
        infinite: true,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        cssEase: 'linear',
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                }
            }
        ]
    });

    /* ----------------------------------------------------------- */
    /*  11. Wishlist
    /* ----------------------------------------------------------- */

    jQuery('#wishlist').slick({
        infinite: true,
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        cssEase: 'linear',
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
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

    /* ----------------------------------------------------------- */
    /*  9. MIXIT FILTER (FOR GALLERY)
    /* ----------------------------------------------------------- */

    jQuery(function() {
        jQuery('#mixit-container').mixItUp();
    });

    /* ----------------------------------------------------------- */
    /*  10. FANCYBOX (FOR PORTFOLIO POPUP VIEW)
    /* ----------------------------------------------------------- */

    jQuery(document).ready(function() {
        jQuery(".fancybox").fancybox();
        $(".datepicker-input").each(function() { $(this).datepicker(); });
    });

    /* ----------------------------------------------------------- */
    /*  11. HOVER DROPDOWN MENU
    /* ----------------------------------------------------------- */

    // for hover dropdown menu
    jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });


    /* ----------------------------------------------------------- */
    /*  12. SCROLL TOP BUTTON
    /* ----------------------------------------------------------- */

    //Check to see if the window is top if not then display button

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 300) {
            jQuery('.scrollToTop').fadeIn();
        } else {
            jQuery('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function() {
        jQuery('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });








});