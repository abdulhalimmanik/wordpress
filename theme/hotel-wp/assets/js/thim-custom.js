/**
 * Script custom for theme
 *
 * TABLE OF CONTENT
 *
 * Header: Main menu
 * Header: Sticky menu
 *
 * Blog: Grid layout
 * Blog: Masonry layout
 * Blog: Post gallery
 *
 * Features: Back to top
 * Features: Preload
 * Features: RTL
 *
 * WooCommerce: Quick view
 * WooCommerce: Switcher layout
 * WooCommerce: Shopping cart
 * WooCommerce: Product slider
 * WooCommerce: Product share
 * WooCommerce: Cart widget
 *
 * Footer: Sticky footer
 *
 * Sidebar: Sticky sidebar
 * Contact form: Loading
 * Parallax
 * Change value input Mailchimp plugin
 * Custom select use Dropkickjs.
 * Search box
 * Language plugin
 */

(function ($) {
    "use strict";

    $(document).ready(function () {
        thim_hotel_wp.ready();
    });

    $(window).load(function () {
        thim_hotel_wp.load();
    });


    var thim_hotel_wp = {

            /**
             * Call functions when document ready
             */
            ready: function () {
                this.back_to_top();
                this.feature_preloading();
                this.sticky_sidebar();
                this.header_menu();
                if ($("body.woocommerce").length) {
                    this.list_switcher();
                }
                if ($("body.post-type-archive-tp_event").length) {
                    this.event_switch_tabs();
                }
                this.minicart_hover();
                this.contactform7();
                this.room_gallery();
                this.room_toggle_review_form();
                this.popup_share();
                this.comingsoon();
                this.custom_select();
                this.rooms_search_custom_datepicker();
                this.rooms_search();
            },

            /**
             * Call functions when window load.
             */
            load: function () {
                this.header_menu();
                this.header_menu_mobile();
                this.parallax();
                this.post_gallery();
                this.quick_view();
                this.blog_layout_grid();
                this.blog_layout_masonry();
                if ($("body.woocommerce").length) {
                    this.product_slider();
                }
                this.custom_select();
                this.rtl_support();
                this.search_box();
                this.language();
            },

            // CUSTOM FUNCTION IN BELOW
            header_menu_mobile: function () {
                $(document).on('click', '.menu-mobile-effect', function (e) {
                    e.stopPropagation();
                    $('.responsive').toggleClass('mobile-menu-open');
                });

                $(document).on('click', '.mobile-menu-open #main-content', function () {
                    $('.responsive').removeClass('mobile-menu-open');
                });

                $('header li.menu-item-has-children >a, header li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');

                $('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children >a, .responsive .mobile-menu-container .mega-menu>li.menu-item-has-children >a').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');

                $('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children .icon-toggle, .responsive .mobile-menu-container .mega-menu>li.menu-item-has-children .icon-toggle').on('click', function () {
                    if ($(this).next('ul.sub-menu').is(':hidden')) {
                        $(this).next('ul.sub-menu').slideDown(200, 'linear');
                        $(this).html('<i class="fa fa-angle-up"></i>');
                    }
                    else {
                        $(this).next('ul.sub-menu').slideUp(200, 'linear');
                        $(this).html('<i class="fa fa-angle-down"></i>');
                    }
                });
            },

            header_menu: function () {
                var $header = $('#masthead.sticky-header'),
                    off_Top = ( $('.content-pusher').length > 0 ) ? $('.content-pusher').offset().top : 0,
                    $topbar = $('#thim-header-topbar'),
                    menuH = $header.outerHeight(),
                    topbarH = $topbar.outerHeight(),
                    latestScroll = 0,
                    target = 2;
                if ($('#masthead.header-default').hasClass('sticky-header')) {
                    $('#main-content').css('padding-top', menuH + topbarH);
                }

                if ($(window).width() <= 600) {
                    $('html').addClass('thim');
                }

                $(window).scroll(function () {
                        var current = $(this).scrollTop();

                        if (current >= target) {
                            $header.removeClass('affix-top').addClass('affix');
                        } else {
                            $header.removeClass('affix').addClass('affix-top');
                        }

                        if (current > latestScroll && current > off_Top) {
                            if (!$header.hasClass('menu-hidden')) {
                                $header.addClass('menu-hidden');
                            }
                        }
                        else {
                            if ($header.hasClass('menu-hidden')) {
                                $header.removeClass('menu-hidden');
                            }
                        }

                        latestScroll = current;
                    }
                );

                $('#masthead .navbar > .menu-item-has-children, .navbar > li ul li').on({
                    mouseenter: function () {
                        $(this).children('.sub-menu').stop(true, false).slideDown(250);
                    },
                    mouseleave: function () {
                        $(this).children('.sub-menu').stop(true, false).slideUp(250);
                    }
                });

                if ($(window).width() > 768) {
                    var menu_active = $('#masthead.header-magic-line .navbar>li.menu-item.current-menu-item,#masthead.header-magic-line .navbar>li.menu-item.current-menu-parent');
                    if (menu_active.length > 0) {
                        menu_active.before('<span id="magic-line"></span>');
                        var menu_active_child = menu_active.find('>a,>span.disable_link'),
                            menu_left = menu_active.position().left,
                            menu_child_left = parseInt(menu_active_child.css('padding-left')),
                            magic = $('#magic-line');
                        magic.width(menu_active_child.width()).css("left", Math.round(menu_child_left + menu_left)).data('magic-width', magic.width()).data('magic-left', magic.position().left);
                    } else {
                        var first_menu = $('#masthead.header-magic-line .navbar>li.menu-item:first-child');
                        first_menu.after('<span id="magic-line"></span>');
                        var magic = $('#magic-line');
                        magic.data('magic-width', 0);
                    }

                    var nav_H = parseInt($('.site-header .navigation').outerHeight());
                    magic.css('bottom', nav_H - (nav_H - 90) / 2 - 64);

                    $('#masthead .navbar>li.menu-item').on({
                        'mouseenter': function () {
                            var elem = $(this).find('>a,>span.disable_link'),
                                new_width = elem.width(),
                                parent_left = elem.parent().position().left,
                                left = parseInt(elem.css('padding-left'));
                            if (!magic.data('magic-left')) {
                                magic.css('left', Math.round(parent_left + left));
                                magic.data('magic-left', 'auto');
                            }
                            magic.stop().animate({
                                left: Math.round(parent_left + left),
                                width: new_width
                            });
                        },
                        'mouseleave': function () {
                            magic.stop().animate({
                                left: magic.data('magic-left'),
                                width: magic.data('magic-width')
                            });
                        }
                    });
                }
            },

            back_to_top: function () {
                var $element = $('#back-to-top');
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $element.addClass('scrolldown').removeClass('scrollup');
                    } else {
                        $element.addClass('scrollup').removeClass('scrolldown');
                    }
                });

                $element.on('click', function () {
                    $('html,body').animate({scrollTop: '0px'}, 800);
                    return false;
                });
            }
            ,

            sticky_sidebar: function () {
                var offsetTop = 20;

                if ($(window).width() <= 768) {
                    return false;
                }

                if ($("#wpadminbar").length) {
                    offsetTop += $("#wpadminbar").outerHeight();
                }

                if ($('.sticky-sidebar').height() > $('#main').height()) {
                    return false;
                }

                if ($('#masthead.sticky-header')) {
                    offsetTop += $('#masthead.sticky-header').outerHeight();
                }

                $(".sticky-sidebar").theiaStickySidebar({
                    "containerSelector": "",
                    "additionalMarginTop": offsetTop,
                    "additionalMarginBottom": "0",
                    "updateSidebarHeight": false,
                    "minWidth": "768",
                    "sidebarBehavior": "modern"
                });
            }
            ,

            /**
             * Effect parallax.
             */
            parallax: function () {
                $(window).stellar({
                    horizontalOffset: 0,
                    verticalOffset: 0
                });
            }
            ,

            /**
             * Feature: Preloading
             */
            feature_preloading: function () {
                var $preload = $('#thim-preloading');
                if ($preload.length > 0) {
                    $preload.fadeOut(1000, function () {
                        $preload.remove();
                    });
                }
            }
            ,


            /**
             * Custom select use Dropkickjs
             */
            custom_select: function () {

                $('select').select2({
                    minimumResultsForSearch: -1,
                });

                $('select').on('select2:select', function (evt) {
                    $(this).next().removeClass('hotel_booking_invalid_quantity');
                });


                $(".number_room_select").bind('cssClassChanged', function () {
                    if ($(this).hasClass('hotel_booking_invalid_quantity')) {
                        $(this).next().addClass('hotel_booking_invalid_quantity');
                    }
                });

            },

            /**
             * Support plugin google language
             */
            support_plugin_google_language: function () {
                $('#google_language_translator .skiptranslate').contents().filter(function () {
                    return this.nodeType == Node.TEXT_NODE;
                }).remove();
            }
            ,

            /**
             * Product Grid, List switch
             */
            list_switcher: function () {

                var activeClass = 'switcher-active';
                var gridClass = 'product-grid';
                var listClass = 'product-list';
                $('.switchToList').on('click', function () {
                    switchToList();
                });
                $('.switchToGrid').on('click', function () {
                    switchToGrid();
                });

                function switchToList() {
                    $('.switchToList').addClass(activeClass);
                    $('.switchToGrid').removeClass(activeClass);
                    $('.archive_switch').fadeOut(300, function () {
                        $(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
                    });
                    localStorage.magwp_products_page = 'list';
                }

                function switchToGrid() {
                    $('.switchToGrid').addClass(activeClass);
                    $('.switchToList').removeClass(activeClass);
                    $('.archive_switch').fadeOut(300, function () {
                        $(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
                    });
                    localStorage.magwp_products_page = 'grid';
                }


                if (typeof(Storage) !== "undefined") {
                    if (typeof localStorage.magwp_products_page != 'undefined') {
                        if (localStorage.magwp_products_page === 'list') {
                            $('.archive_switch').removeClass('product-grid').addClass('product-list');
                            $('.switchToList').addClass(activeClass);
                        } else {
                            $('.switchToGrid').addClass(activeClass);
                            $('.archive_switch').removeClass('product-list').addClass('product-grid');
                        }
                    } else {
                        $('.switchToGrid').addClass(activeClass);
                        $('.archive_switch').removeClass('product-list').addClass('product-grid');
                    }
                } else {
                    $('.switchToGrid').addClass(activeClass);
                    $('.archive_switch').removeClass('product-list').addClass('product-grid');
                }
            }
            ,
            /**
             * Archive events page: switch between tabs Upcoming, Happening, Expired
             */
            event_switch_tabs: function () {
                var activeClass = 'event-tab-active';

                $(".thim-event-tabs .tab").on("click", function (e) {
                    var $current_status = $(this).attr("data-tab");
                    if ($current_status == "upcoming") {
                        switchToUpcoming();
                    } else if ($current_status == 'happening') {
                        switchToHappening();
                    } else {
                        switchToExpired();
                    };


                    $.ajax({
                        url: ajaxurl,
                        type: 'GET',
                        data: {
                            action: 'status_event_ajax',
                            status: localStorage.current_event_tab
                        }
                    });

                });

                function switchToUpcoming() {
                    localStorage.current_event_tab = 'upcoming';
                }

                function switchToHappening() {
                    localStorage.current_event_tab = 'happening';
                }

                function switchToExpired() {
                    localStorage.current_event_tab = 'expired';
                }

                if (typeof(Storage) !== "undefined") {
                    if (typeof localStorage.current_event_tab != 'undefined') {
                        if (localStorage.current_event_tab === 'upcoming') {
                            $(".thim-event-tabs .tab").removeClass("active");
                            $(".thim-event-tabs .tab[data-tab=upcoming]").addClass("active");

                            $(".archive-content .tab-pane").removeClass("active");
                            $(".archive-content #upcoming").addClass("active");

                        } else if (localStorage.current_event_tab === 'happening') {
                            $(".thim-event-tabs .tab").removeClass("active");
                            $(".thim-event-tabs .tab[data-tab=happening]").addClass("active");

                            $(".archive-content .tab-pane").removeClass("active");
                            $(".archive-content #happening").addClass("active");

                        } else {
                            $(".thim-event-tabs .tab").removeClass("active");
                            $(".thim-event-tabs .tab[data-tab=expired]").addClass("active");

                            $(".archive-content .tab-pane").removeClass("active");
                            $(".archive-content #expired").addClass("active");

                        }
                    }
                }


            },

            /**
             * Post gallery
             */
            post_gallery: function () {
                $('article.format-gallery .flexslider').imagesLoaded(function () {
                    $('.flexslider').flexslider({
                        slideshow: true,
                        animation: 'fade',
                        pauseOnHover: true,
                        animationSpeed: 400,
                        smoothHeight: true,
                        directionNav: true,
                        controlNav: false
                    });
                });
            }
            ,

            /**
             * Quickview product
             */
            quick_view: function () {
                $('.quick-view').on('click', function (e) {
                    /* add loader  */
                    $('.quick-view span').css('display', 'none');
                    $(this).append('<span class="loading dark"></span>');
                    var product_id = $(this).attr('data-prod');
                    var data = {action: 'jck_quickview', product: product_id};
                    $.post(ajaxurl, data, function (response) {
                        $.magnificPopup.open({
                            mainClass: 'my-mfp-zoom-in',
                            items: {
                                src: response,
                                type: 'inline'
                            }
                        });
                        $('.quick-view span').css('display', 'inline-block');
                        $('.loading').remove();
                        $('.product-card .wrapper').removeClass('animate');
                        setTimeout(function () {
                            $('.product-lightbox form').wc_variation_form();
                        }, 600);
                        thim_hotel_wp.product_slider();
                    });
                    e.preventDefault();
                });
            }
            ,

            /**
             * Custom effect and UX for contact form.
             */
            contactform7: function () {
                $(".wpcf7-submit").on('click', function () {
                    $(this).css("opacity", 0.2);
                    $(this).parents('.wpcf7-form').addClass('processing');
                    $('input:not([type=submit]), textarea').attr('style', '');
                });

                $(document).on('spam.wpcf7', function () {
                    $(".wpcf7-submit").css("opacity", 1);
                    $('.wpcf7-form').removeClass('processing');
                });

                $(document).on('invalid.wpcf7', function () {
                    $(".wpcf7-submit").css("opacity", 1);
                    $('.wpcf7-form').removeClass('processing');
                });

                $(document).on('mailsent.wpcf7', function () {
                    $(".wpcf7-submit").css("opacity", 1);
                    $('.wpcf7-form').removeClass('processing');
                });

                $(document).on('mailfailed.wpcf7', function () {
                    $(".wpcf7-submit").css("opacity", 1);
                    $('.wpcf7-form').removeClass('processing');
                });

                $('body').on('click', 'input:not([type=submit]).wpcf7-not-valid, textarea.wpcf7-not-valid', function () {
                    $(this).removeClass('wpcf7-not-valid');
                });
            }
            ,

            /**
             * Effect when hover on mini cart.
             */
            minicart_hover: function () {
                $("body").on("mouseenter mouseleave", ".widget_shopping_cart", function (e) {
                    var cart = $('.widget_shopping_cart');
                    var cart_content = cart.find('.widget_shopping_cart_content');
                    if (e.type == "mouseenter") {
                        cart_content.stop().slideDown(200);
                    } else {
                        cart_content.stop().slideUp(200);
                    }
                });
            }
            ,

            /**
             * Product single slider
             */
            product_slider: function () {
                $('#carousel').flexslider({
                    animation: "slide",
                    direction: "vertical",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 101,
                    itemMargin: 5,
                    maxItems: 3,
                    directionNav: false,
                    asNavFor: '#slider'
                });

                $('#slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    directionNav: false,
                    slideshow: false,
                    sync: "#carousel"
                });
            }
            ,

            /**
             * Blog layout grid
             */
            blog_layout_grid: function () {

                var windownWidth = $(window).outerWidth();

                if (windownWidth <= 768) {
                    return false;
                }

                var $blog = $('.thim-sc-posts article, .blog .grid_layout article, .archive .grid_layout article, .post-type-archive-tp_event .tab-pane article'),
                    maxHeight = 0;

                // Get max height of all items.
                $blog.each(function () {
                    if (maxHeight < $(this).find('.content-inner').height()) {
                        maxHeight = $(this).find('.content-inner').height();
                    }
                });

                // Set height for all items.
                if (maxHeight > 0) {
                    $blog.each(function () {
                        $(this).find('.content-inner').css('height', maxHeight);
                    });
                }
            }
            ,

            /**
             * Blog layout masonry
             */
            blog_layout_masonry: function () {
                $(".masonry_layout").isotope({
                    itemSelector: '.type-post',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.type-post',
                        fitWidth: true
                    }
                });
            }
            ,


            /**
             * RTL
             */
            rtl_support: function () {
                $(document).ready(function () {

                    setTimeout(function () {
                        $(window).trigger('resize');
                    }, 150);

                    $(window).resize(function () {

                        var $rtl = $('body.class-rtl #wrapper-container ');
                        var get_padding1 = $rtl.find('.vc_row-has-fill').css('left');
                        var get_padding2 = $rtl.find('.vc_row-no-padding').css('left');
                        var get_padding3 = $rtl.find('.vc_row[data-vc-full-width].vc_slider').css('left');

                        if (get_padding1 != null) {
                            var right = 0 - parseInt(get_padding1.replace('px', '')) + 15;
                            $rtl.find('.vc_row-has-fill').css('right', get_padding1);
                        }

                        if (get_padding2 != null) {
                            $rtl.find('.vc_row-no-padding').css('right', get_padding2);
                        }

                        if (get_padding3 != null) {
                            $rtl.find('.vc_row[data-vc-full-width].vc_slider').css('right', get_padding3);
                        }
                    });

                });
            }
            ,

            /**
             * Search widget
             */
            search_box: function () {
                $('.thim-search-box').on('click', '.toggle-form', function (e) {
                    e.preventDefault();
                    $('body').toggleClass('thim-active-search');
                    var $search = $(this).parent();
                    setTimeout(function () {
                        $search.find('.search-field').focus();
                    }, 400);
                });

                $('.thim-search-box .background-toggle').on('click', function (e) {
                    e.preventDefault();
                    $('body').removeClass('thim-active-search');
                });

                $(window).scroll(function () {
                    $('body').removeClass('thim-active-search');
                });

            }
            ,

            /**
             * Change text language translate
             */
            language: function () {
                $(".goog-te-combo .dk-selected, .goog-te-combo .dk-select-options .dk-option:first").text("EN");
            }
            ,


            isInteger: function (a) {
                return Number(a) || ( a % 1 === 0 );
            }
            ,


            rooms_search_custom_datepicker: function () {

                var today = new Date();
                var tomorrow = new Date();

                var start_plus = $(document).triggerHandler('hotel_booking_min_check_in_date', [1, today, tomorrow]);
                start_plus = parseInt(start_plus);
                if (!thim_hotel_wp.isInteger(start_plus)) {
                    start_plus = 1;
                }

                tomorrow.setDate(today.getDate() + start_plus);


                $('input[id^="check_in_date"]').datepicker("option", {
                    showOn: 'button',
                    buttonText: '<i class="fa fa-calendar"></i>',
                    altField: $('input[id^="check_in_date"]').parent().find('.day'),
                    altFormat: "dd",

                    onClose: function () {
						var unique = $(this).attr('id');
						unique = unique.replace('check_in_date_', '');
						var checkout = $('#check_out_date_' + unique);
						checkout.datepicker("show");
                    },
                });

                $('input[id^="check_in_date"]').datepicker('refresh');


                $('input[id^="check_out_date"]').datepicker("option", {
                    showOn: 'button',
                    buttonText: '<i class="fa fa-calendar"></i>',
                    altField: $('input[id^="check_out_date"]').parent().find('.day'),
                    altFormat: "dd",
                });

                $('input[id^="check_out_date"]').datepicker('refresh');

            }
            ,

            /**
             * HB rooms search
             */
            rooms_search: function () {
                var $form = $('form[name=hb-search-form]');
                $form.on('click', '.hb-submit button', function (e) {
                    setTimeout(function () {
                        $form.find('input').each(function (index, element) {
                            if ($(element).hasClass('error')) {
                                var id = $(element).attr('id');
                                $('.' + id).addClass('error');
                            }
                            else {
                                $(element).removeClass('error');
                            }
                        });
                    }, 300);
                });

                $('.goUp').on('click', function () {
                    var index = $('select[name="adults_capacity"] option:selected').index();
                    var count = $(' select[name="adults_capacity"] option').length;

                    if (index + 1 >= count) {
                        return;
                    }

                    var selected = $($('select[name="adults_capacity"] option')[index + 1]).val();

                    $('select[name="adults_capacity"]').val(selected);

                    $('select[name="adults_capacity"]').trigger('change.select2'); // Notify only Select2 of changes

                });

                $('.goDown').on('click', function () {
                    var index = $('select[name="adults_capacity"] option:selected').index();
                    if (index <= 0) {
                        return;
                    }
                    var selected = $($('select[name="adults_capacity"] option')[index - 1]).val();
                    $('select[name="adults_capacity"]').val(selected);

                    $('select[name="adults_capacity"]').trigger('change.select2'); // Notify only Select2 of changes

                });

                //Multidate
                $('#guests').each(function () {
                    var $form_list = $('.layout-special .hb-form-field-list');
                    $('#guests').on('click touch', function () {
                        $form_list.toggleClass('active');
                    });
                    $(document).on('click touch', function (event) {
                        if (!$(event.target).parents().addBack().is('#guests')) {
                            $form_list.removeClass('active');
                        }
                    });
                    $form_list.on('click touch', function (event) {
                        event.stopPropagation();
                    });
                });

                function changeNumber() {
                    var $max_child = $(' select[name="max_child"] option:selected').html();
                    var $adults_capacity = $('select[name="adults_capacity"] option:selected').html();
                    var $number_total =  Math.round($adults_capacity);
                    if ($number_total < 10) {
                        $('#number').val('0' + $number_total);
                    } else {
                        $('#number').val($number_total);
                    }
                }

                $('.layout-special .goUp').on('click', function () {
                    changeNumber();
                });
                $('.layout-special .goDown').on('click', function () {
                    changeNumber();
                });
                $('.goUp2').on('click', function () {
                    var index = $('select[name="max_child"] option:selected').index();
                    var count = $(' select[name="max_child"] option').length;

                    if (index + 1 >= count) {
                        return;
                    }

                    var selected = $($('select[name="max_child"] option')[index + 1]).val();

                    $('select[name="max_child"]').val(selected);

                    $('select[name="max_child"]').trigger('change.select2'); // Notify only Select2 of changes

                    changeNumber();

                });

                $('.goDown2').on('click', function () {
                    var index = $('select[name="max_child"] option:selected').index();
                    if (index <= 0) {
                        return;
                    }
                    var selected = $($('select[name="max_child"] option')[index - 1]).val();
                    $('select[name="max_child"]').val(selected);
                    $('select[name="max_child"]').trigger('change.select2'); // Notify only Select2 of changes

                    changeNumber();

                });

                $('input, .select2, .ui-datepicker-trigger').on('click', function () {
                    var $parent = $(this).parent();
                    if ($parent.hasClass('hotel_booking_invalid_quantity') || $(this).hasClass('hotel_booking_invalid_quantity')) {
                        $(this).removeClass('hotel_booking_invalid_quantity');
                        $parent.removeClass('hotel_booking_invalid_quantity');

                    }
                    ;
                });
            }
            ,

            /**
             * Single Room gallery
             */
            room_gallery: function () {
                $('.hb_room_gallery ').imagesLoaded(function () {
                    $('.hb_room_gallery').flexslider({
                        slideshow: true,
                        animation: 'fade',
                        pauseOnHover: true,
                        animationSpeed: 400,
                        smoothHeight: true,
                        directionNav: true,
                        controlNav: true
                    });
                });
            }
            ,


            /**
             * Single room toggle reply form
             */
            room_toggle_review_form: function () {
                $('.hb_single_room_details #reply-title').on('click', function () {
                    $('.hb_single_room_details #commentform').slideToggle();
                });
            }
            ,


            /**
             * Popup when click on share social icon.
             */
            popup_share: function () {
                $('.thim-social-share.popup').on('click', 'a', function (event) {
                    event.preventDefault();
                    var shareurl = $(this).attr('href');
                    var top = (screen.availHeight - 500) / 2;
                    var left = (screen.availWidth - 500) / 2;
                    var popup = window.open(shareurl, 'social sharing', 'width=550,height=420,left=' + left + ',top=' + top + ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
                    return false;
                });
            }
            ,


            /**
             * Page comming soon
             */
            comingsoon: function () {
                if ($('.page-template-comingsoon').length > 0) {
                    $(".thim-countdown .count-down").mbComingsoon({
                        expiryDate: new Date($(".thim-countdown").data('date')),
                        speed: 100
                    });
                    $('.comingsoon-wrapper .background').imagesLoaded(function () {
                        $('.comingsoon-wrapper .background').flexslider({
                            slideshow: true,
                            animation: 'fade',
                            animationSpeed: 400,
                            controlNav: true,
                            directionNav: false
                        });
                    });
                }
            }

        }
        ;
})
(jQuery);


// Create a closure
(function () {
    // Your base, I'm in it!
    var originalAddClassMethod = jQuery.fn.addClass;

    jQuery.fn.addClass = function () {
        // Execute the original method.
        var result = originalAddClassMethod.apply(this, arguments);

        // trigger a custom event
        jQuery(this).trigger('cssClassChanged');

        // return the original result
        return result;
    }
})();