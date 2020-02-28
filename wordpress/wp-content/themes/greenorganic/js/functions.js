(function ($) {
    "use strict";
    $.fn.wrapStart = function(numWords){
        return this.each(function(){
            var $this = $(this);
            var node = $this.contents().filter(function(){
                return this.nodeType == 3;
            }).first(),
            text = node.text().trim(),
            first = text.split(' ', 1).join(" ");
            if (!node.length) return;
            node[0].nodeValue = text.slice(first.length);
            node.before('<b>' + first + '</b>');
        });
    }; 

    jQuery(document).ready(function() {
        $('.mod-heading .widget-title > span').wrapStart(1);
        function init_owl() {
            $(".owl-carousel[data-carousel=owl]").each( function(){
                var config = {
                    loop: false,
                    nav: $(this).data( 'nav' ),
                    dots: $(this).data( 'pagination' ),
                    items: 4,
                    navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>']
                };
            
                var owl = $(this);
                if( $(this).data('items') ){
                    config.items = $(this).data( 'items' );
                }
                if( $(this).data('loop') ){
                    config.loop = true;
                }

                if ($(this).data('large')) {
                    var desktop = $(this).data('large');
                } else {
                    var desktop = config.items;
                }
                if ($(this).data('medium')) {
                    var medium = $(this).data('medium');
                } else {
                    var medium = config.items;
                }
                if ($(this).data('smallmedium')) {
                    var smallmedium = $(this).data('smallmedium');
                } else {
                    var smallmedium = config.items;
                }
                if ($(this).data('extrasmall')) {
                    var extrasmall = $(this).data('extrasmall');
                } else {
                    var extrasmall = 2;
                }
                if ($(this).data('verysmall')) {
                    var verysmall = $(this).data('verysmall');
                } else {
                    var verysmall = 1;
                }
                config.responsive = {
                    0:{
                        items:verysmall
                    },
                    414:{
                        items:extrasmall
                    },
                    768:{
                        items:smallmedium
                    },
                    980:{
                        items:medium
                    },
                    1280:{
                        items:desktop
                    }
                }
                if ( $('html').attr('dir') == 'rtl' ) {
                    config.rtl = true;
                }
                $(this).owlCarousel( config );
                // owl enable next, preview
                var viewport = jQuery(window).width();
                var itemCount = jQuery(".owl-item", $(this)).length;

                if(
                    (viewport >= 1280 && itemCount <= desktop) //desktop
                    || ((viewport >= 980 && viewport < 1280) && itemCount <= medium) //desktop
                    || ((viewport >= 768 && viewport < 980) && itemCount <= smallmedium) //tablet
                    || ((viewport >= 320 && viewport < 768) && itemCount <= extrasmall) //mobile
                    || (viewport < 320 && itemCount <= verysmall) //mobile
                ) {
                    $(this).find('.owl-prev, .owl-next').hide();
                }
            } );
        }
        setTimeout(function(){
            init_owl();
        }, 50);
        
        // Fix owl in bootstrap tabs
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href");
            var carousel = $(".owl-carousel[data-carousel=owl]", target).data('owlCarousel');

            if ($(".owl-carousel[data-carousel=owl]", target).length > 0) {
                carousel._width = $(".owl-carousel[data-carousel=owl]", target).width();
                carousel.invalidate('width');
                carousel.refresh();
            }
            initProductImageLoad();
        });

        // loading ajax
        $('[data-load="ajax"] a').click(function(e){
            e.preventDefault();
            var $href = $(this).attr('href');

            $(this).parent().parent().find('li').removeClass('active');
            $(this).parent().addClass('active');

            var self = $(this);
            var main = $($href);
            if ( main.length > 0 ) {
                if ( main.data('loaded') == false ) {
                    main.parent().addClass('loading');
                    main.data('loaded', 'true');

                    $.ajax({
                        url: greenorganic_ajax.ajaxurl,
                        type:'POST',
                        dataType: 'html',
                        data:  'action=apus_get_products&columns=' + main.data('columns') + '&product_type=' + main.data('product_type') +
                            '&number=' + main.data('number') + '&categories=' + main.data('categories') + '&view_more=' + main.data('view_more')
                             + '&page=' + main.data('page') + '&layout_type=' + main.data('layout_type')
                    }).done(function(reponse) {
                        main.html( reponse );
                        main.parent().removeClass('loading');
                        main.parent().find('.tab-pane').removeClass('active');
                        main.addClass('active');

                        if ( main.find('.owl-carousel') ) {
                            init_owl();
                        }
                        initProductImageLoad();
                    });
                    return true;
                } else {
                    main.parent().removeClass('loading');
                    main.parent().find('.tab-pane').removeClass('active');
                    main.addClass('active');
                }
            }
        });
        // tab view more
        $('body').on('click', '.viewmore-products-btn', function(e) {
            e.preventDefault();

            var self = $(this);
            if (self.hasClass('loading')) {
                return false;
            }
            self.addClass('loading');
            var main = $($(this).parent().parent().parent());
            var page = parseInt(main.data('page')) + 1;
            var max_page = parseInt(self.data('max-page'));
            if (page > max_page) {
                return false;
            }
            var main_products = main.find('.tab-content-products .row-products');
            
            $.ajax({
                url: greenorganic_ajax.ajaxurl,
                type:'POST',
                dataType: 'html',
                data:  'action=apus_get_products&columns=' + main.data('columns') + '&product_type=' + main.data('product_type')
                    + '&number=' + main.data('number') + '&categories=' + main.data('categories') + '&page=' + page + '&load_type=products'
                    + '&layout_type=' + main.data('layout_type') 
            }).done(function(reponse) {
                main.data('page', page );
                self.removeClass('loading');
                if (page >= max_page) {
                    self.addClass('hidden');
                    self.parent().find('.all-products-loaded').removeClass('hidden');
                }
                if ( main.data('layout_type') == 'mansory' ) {
                    main.find('.isotope-items').isotope( 'insert', $(reponse).appendTo(main_products) ); 
                } else {
                    main.find('.tab-content-products > .products-grid').append( reponse );
                }
                setTimeout(function(){
                    initProductImageLoad();
                },300);
            });
        });

        setTimeout(function(){
            initProductImageLoad();
        }, 500);
        function initProductImageLoad() {
            $(window).off('scroll.unveil resize.unveil lookup.unveil');
            var $images = $('.image-wrapper:not(.image-loaded) .unveil-image'); // Get un-loaded images only
            if ($images.length) {
                $images.unveil(1, function() {
                    $(this).load(function() {
                        $(this).parents('.image-wrapper').first().addClass('image-loaded');
                    });
                });
            }

            var $images = $('.product-image:not(.image-loaded) .unveil-image'); // Get un-loaded images only
            if ($images.length) {
                $images.unveil(1, function() {
                    $(this).load(function() {
                        $(this).parents('.product-image').first().addClass('image-loaded');
                    });
                });
            }
        }
        
        //counter up
        if($('.counterUp').length > 0){
            $('.counterUp').counterUp({
                delay: 10,
                time: 800
            });
        }
        /*---------------------------------------------- 
         * Play Isotope masonry
         *----------------------------------------------*/  
        jQuery('.isotope-items').each(function(){  
            var $container = jQuery(this);
            
            setTimeout( function(){
                $container.isotope({
                    itemSelector : '.isotope-item',
                    transformsEnabled: true,         // Important for videos
                    masonry: {
                        columnWidth: $container.data('columnwidth')
                    }
                }); 
            }, 100 );
        });
        /*---------------------------------------------- 
         *    Apply Filter        
         *----------------------------------------------*/
        jQuery('.isotope-filter li a').on('click', function(){
           
            var parentul = jQuery(this).parents('ul.isotope-filter').data('related-grid');
            jQuery(this).parents('ul.isotope-filter').find('li a').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-filter'); 
            jQuery('#'+parentul).isotope({ filter: selector }, function(){ });
            
            return(false);
        });

        //Sticky Header
        setTimeout(function(){
            change_margin_top();
        }, 50);
        $(window).resize(function(){
            change_margin_top();
        });
        function change_margin_top() {
            if ($(window).width() > 991) {
                if ( $('.main-sticky-header').length > 0 ) {
                    var header_height = $('.main-sticky-header').outerHeight();
                    $('.main-sticky-header-wrapper').css({'height': header_height});
                }
            }
        }
        var main_sticky = $('.main-sticky-header');
        setTimeout(function(){
            if ( main_sticky.length > 0 ){
                var _menu_action = main_sticky.offset().top;

                var Apus_Menu_Fixed = function(){
                    "use strict";

                    if( $(document).scrollTop() > _menu_action ){
                      main_sticky.addClass('sticky-header');
                    }else{
                      main_sticky.removeClass('sticky-header');
                    }
                }
                if ($(window).width() > 991) {
                    $(window).scroll(function(event) {
                        Apus_Menu_Fixed();
                    });
                    Apus_Menu_Fixed();
                }
            }
        }, 50);

        //Tooltip
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

        $('.topbar-mobile .dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });

        var back_to_top = function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 400) {
                    jQuery('#back-to-top').addClass('active');
                } else {
                    jQuery('#back-to-top').removeClass('active');
                }
            });
            jQuery('#back-to-top').on('click', function () {
                jQuery('html, body').animate({scrollTop: '0px'}, 800);
                return false;
            });
        };
        back_to_top();
        
        // popup
        $(document).ready(function() {
            $(".popup-image").magnificPopup({type:'image'});
            $('.popup-video').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });

            $('.widget-gallery').each(function(){
                var tagID = $(this).attr('id');
                $('#' + tagID).magnificPopup({
                    delegate: '.popup-image-gallery',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        });
        // menu top header
        $('.show-top-menu,.hidden-menu').on('click', function (e) {
            e.stopPropagation();
            $('.main-menu-top').toggleClass('active');
            $('.over-dark').toggleClass('active');           
        });
        $('body').click(function() {
            if ($('.main-menu-top').hasClass('active')) {
                $('.main-menu-top').toggleClass('active');
                $('.over-dark').toggleClass('active'); 
            }
        });
        $('.main-menu-top').click(function(e) {
            e.stopPropagation();
        });
        
        // search full
        $('.button-show-search,.hidden-search').on('click', function(){
            $('.full-search').toggleClass('active');
            $('.over-dark').toggleClass('active');
            if ( $('.full-search').hasClass('active') ) {
                setTimeout(function(){
                    $('input.apus-search').trigger('focus');
                }, 50);
            }
        });

        // perfectScrollbar
        $('.main-menu-top').perfectScrollbar();
        // preload page
        if ( $('body').hasClass('apus-body-loading') ) {
            $('body').removeClass('apus-body-loading');
            $('.apus-page-loading').fadeOut(250);
        }

        // gmap
        $('.apus-google-map').each(function(){
            var $item = $(this);
            var id = $item.attr('id');
            var lat = $item.data('lat');
            var lng = $item.data('lng');
            var map = null;
            var fenway = new google.maps.LatLng(lat, lng);
            var mapOptions = {
                center: fenway,
                zoom: $item.data('zoom'),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById(id), mapOptions);
            
            map.setOptions({styles: $item.data('style')});
            
            var latlng = new google.maps.LatLng(lat, lng);
            
            var marker_obj = {
                position: latlng,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
            };
            if ($item.data('marker_icon')) {
                marker_obj.icon = $item.data('marker_icon');
            }
            var marker = new google.maps.Marker(marker_obj);
        });
        
        // popup newsletter
        setTimeout(function(){
            var hiddenmodal = getCookie('hiddenmodal');
            if (hiddenmodal == "") {
                jQuery('#popupNewsletterModal').modal('show');
            }
        }, 3000);
        $('#popupNewsletterModal').on('hidden.bs.modal', function () {
            setCookie('hiddenmodal', 1, 30);
        });

        // mmenu
        var mobilemenu = $("#navbar-offcanvas").mmenu({
            offCanvas: true,
        }, {
            // configuration
            offCanvas: {
                pageSelector: "#wrapper-container"
            }
        });

        // sidebar mobile
        setTimeout(function(){
            $( ".sidebar-left, .sidebar-right" ).clone().appendTo( "#mobile-offcanvas-sidebar .mobile-sidebar-wrapper" );
        }, 100);

        $('.mobile-sidebar-wrapper').perfectScrollbar();
        $('.mobile-sidebar-btn').click(function(){
            
            $('#mobile-offcanvas-sidebar').toggleClass('active');
            var overlay_left = $('#mobile-offcanvas-sidebar').width();
            
            if ( $('#mobile-offcanvas-sidebar').hasClass('active') ) {
                if ( $('#mobile-offcanvas-sidebar').hasClass('mobile-offcanvas-left') ) {
                    var translate_w_rtl = '-'+overlay_left+'px';
                    var translate_w = overlay_left+'px';
                } else {
                    var translate_w = '-'+overlay_left+'px';
                    var translate_w_rtl = overlay_left+'px';
                }
                if ( $('html').attr('dir') == 'rtl' ) {
                    $('#wrapper-container').css({
                        'transform': 'translate3d('+translate_w_rtl+', 0px, 0px)'
                    });
                } else {
                    $('#wrapper-container').css({
                        'transform': 'translate3d('+translate_w+', 0px, 0px)'
                    });
                }
            } else {
                $('#wrapper-container').attr('style', '');
            }
            $('.mobile-sidebar-panel-overlay').toggleClass('active');
        });
        $('.mobile-sidebar-panel-overlay').click(function(){
            $('#mobile-offcanvas-sidebar').removeClass('active');
            $('.mobile-sidebar-panel-overlay').removeClass('active');
            $('#wrapper-container').attr('style', '');
        });
    });

    // testimonial
    $("[data-testimonial=content]").each( function(){
        var self = $(this);
        var owl = $(this).find('.owl-carousel');
        setTimeout(function(){
            owl.find('.testimonial-body').removeClass('active');
            owl.find('.owl-item.active').find('.testimonial-body').addClass('active');
            self.find('.testimonial-content').html( '' ).fadeOut(200);
            self.find('.testimonial-content').html( owl.find('.owl-item.active').find('.description').html() ).fadeIn(300);
        }, 100);
        owl.on('changed.owl.carousel',function(property){
            setTimeout(function(){
                owl.find('.testimonial-body').removeClass('active');
                owl.find('.owl-item.active').find('.testimonial-body').addClass('active');
                self.find('.testimonial-content').html( '' ).fadeOut(200);
                self.find('.testimonial-content').html( owl.find('.owl-item.active').find('.description').html() ).fadeIn(300);
            }, 100);
        });
    });
    
    // tabs
    var APUS_Tab_Scroll = function(){
        "use strict";
        // perfect scroll
        $('.widget-products-tabs').each(function(){
            var total_wd = 0;
            $('.nav-tabs-selector li', $(this)).each(function(){
                total_wd = total_wd + $(this).outerWidth();
            });
            $('.nav-tabs-selector .nav-tabs', $(this)).width(total_wd + 20);
            $('.nav-tabs-selector', $(this)).width('100%');
        });
    }
    setTimeout(function(){
        APUS_Tab_Scroll();    
    }, 20);
    
    $('.widget-products-tabs .nav-tabs-selector').perfectScrollbar();
    $(window).resize(function(event) {
        APUS_Tab_Scroll();
        $('.widget-products-tabs .nav-tabs-selector').perfectScrollbar('update');
    });
})(jQuery)

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires+";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
