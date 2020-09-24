/*
    Theme Name: Arkai - Modern and Minimal HTML5 Blog Template
    Author: ElectronThemes
    Author URI: http://electronthemes.com
    Version: 1.0.0
*/
/**---------------------------------------*/
/**           Table Of contents          **/
/**---------------------------------------*/
/**
 * 0. Preloader
 * 1. Mobile Menu
 * 2. OWL Carousel Sliders
 * 3. Portfolio Grip
 * 4. Blog Grip
 * 5. Hero Page Slider
 * 6. Post Inner Slider
 * 7. Related posts
 * 8. Menu JS
 * 9. Gmaps
 * 10. FAQ
 * 11. AOS Initialization
 */

////////////////////////////////// 0. Preloader JS //////////////////////////////
$(window).on('load', function() {
    $('body').imagesLoaded(function() {
        $('.loader').fadeOut()
        $('.site-preloader')
            .delay(200)
            .fadeOut('slow')
            .remove()
    })

    //// AOS Initialization /////
    if ($('[data-aos]').length) {
        AOS.init({
            duration: 1000,
            mirror: true,
            once: true,
            offset: 0,
        })
    }

    ///  Isotope Grip //////

    // Portfolio Grip
    var $grid = $('.portfolio-grid').imagesLoaded(function() {
        $grid.isotope({
            itemSelector: '.a-scrollitem',
            percentPosition: true,
            masonry: {
                columnWidth: '.a-scrollitem',
            },
        })
    })

    // Blog Grip
    var $bloggrid = $('.blog-grid').imagesLoaded(function() {
        $bloggrid.isotope({
            itemSelector: '.col-lg-4',
            percentPosition: true,
            masonry: {
                columnWidth: '.col-lg-4',
            },
        })
    })
})

$(document).ready(function() {
    'use strict'

    //// Stticky Menu /////
    var header = $('.header-area'),
        $window = $(window)
    $window.on('scroll', function() {
        if ($window.scrollTop() > $('.ak-header-sec').outerHeight()) {
            header.addClass('sticky-menu')
        } else {
            header.removeClass('sticky-menu')
        }
    })

    ///////////////////////////////// 12. Counter JS ///////////////////////////////
    $('.counter').counterUp({
        delay: 200,
        time: 2000,
    })

    ////////////////////////// 2. OWL Carousel Sliders ////////////////////////
    $('.fp-slider-wrap').owlCarousel({
        items: 1,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 900,
        responsiveClass: true,
        autoHeight: true,
        margin: 0,
        responsive: {
            0: {
                nav: false,
                dots: true,
            },
            768: {
                nav: true,
                dots: false,
            },
        },
    })

    // HERO PAGE SLIDE
    $('.post-page-slide').owlCarousel({
        items: 1,
        autoplay: false,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    })

    ////////////////////////////// 6. Post Inner Slider ////////////////////////////
    $('.blog-single-slider').owlCarousel({
        items: 1,
        autoplay: false,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
    })

    /////////////////////////////// 7. Related posts //////////////////////////
    $('.related-post-wrapper').owlCarousel({
        items: 3,
        autoplay: false,
        nav: false,
        responsiveClass: true,
        loop: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    })

    ////////////////////////////////// 8. Menu JS ////////////////////////////////
    $('.navbar-nav > li').each(function() {
        $(this)
            .find('ul')
            .siblings('a')
            .append('<i class="fa aroow-down fa-angle-down"></i>')
    })

    $('.navbar-nav li .aroow-down').on('click', function(e) {
        e.preventDefault()
        $(this)
            .parent()
            .siblings('ul')
            .toggle()
    })

    ///////////////////////////////// 9. Gmaps ///////////////////////////////
    // Googe map
    if ($('#map').length) {
        $(function() {
            var mapStyle = [{
                    featureType: 'administrative',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#444444',
                    }, ],
                },
                {
                    featureType: 'landscape',
                    elementType: 'all',
                    stylers: [{
                        color: '#f2f2f2',
                    }, ],
                },
                {
                    featureType: 'poi',
                    elementType: 'all',
                    stylers: [{
                        visibility: 'off',
                    }, ],
                },
                {
                    featureType: 'road',
                    elementType: 'all',
                    stylers: [{
                            saturation: -100,
                        },
                        {
                            lightness: 45,
                        },
                    ],
                },
                {
                    featureType: 'road.highway',
                    elementType: 'all',
                    stylers: [{
                        visibility: 'simplified',
                    }, ],
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'labels.icon',
                    stylers: [{
                        visibility: 'off',
                    }, ],
                },
                {
                    featureType: 'transit',
                    elementType: 'all',
                    stylers: [{
                        visibility: 'off',
                    }, ],
                },
                {
                    featureType: 'water',
                    elementType: 'all',
                    stylers: [{
                            color: '#a6a6a6',
                        },
                        {
                            visibility: 'on',
                        },
                    ],
                },
            ]
            var locationCode = new google.maps.LatLng(33.5722086,-7.4469076)
            // Create the map
            var map = new google.maps.Map($('#map')[0], {
                zoom: 11,
                styles: mapStyle,
                center: locationCode,
            })

            // Add a marker
            var marker = new google.maps.Marker({
                map: map,
                position: locationCode,
            })
        })
    }

    /////////////////////////////// 10. FAQ ///////////////////////////////
    $('.faq-qus-title').on('click', function() {
        var $this = $(this)
        $this
            .toggleClass('active')
            .next()
            .slideToggle()
            .parent()
            .siblings()
            .children('.faq-qus-title')
            .removeClass('active')
            .next()
            .slideUp()
    })

    /////////////////////////////// 11. Menu Active link ///////////////////////////////
    var url = window.location.href
    url = url.substring(
        0,
        url.indexOf('#') == -1 ? url.length : url.indexOf('#')
    )
    url = url.substring(
        0,
        url.indexOf('?') == -1 ? url.length : url.indexOf('?')
    )
    url = url.substr(url.lastIndexOf('/') + 1)
    if (url == '') {
        url = 'index.html'
    }
    $('.navbar-nav li').each(function() {
        var href = $(this)
            .find('a')
            .attr('href')
        if (url == href) {
            $(this)
                .addClass('active')
                .parents('li')
                .addClass('active')
                .siblings()
                .removeClass('active')
        }
    })
})